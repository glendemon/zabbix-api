<?php
/*
 * Copyright 2015 Victor Demin <mail@vdemin.com>.
 */
namespace GlenDemon\ZabbixApi\Utils;

use \GlenDemon\ZabbixApi\Entity\Graph;
use Ob\HighchartsBundle\Highcharts\Highchart;
use GlenDemon\ZabbixApi\Entity\Item;

/**
 * Description of Chart
 *
 * @author Victor Demin <mail@vdemin.com>
 */
class Chart
{
    /**
     * Convert zabbix graph to Highchart.
     *
     * @param Graph $zabbixGraph
     * 
     * @return Highchart
     */
    public function getChart(Graph $zabbixGraph)
    {
        $chart = new Highchart();
        $chart->title->text($zabbixGraph->name);
        $chart->height($zabbixGraph->height);
        $chart->width($zabbixGraph->name);
        $chart->xAxis->type('datetime');
        $chart->yAxis->min($zabbixGraph->yaxismin);
        $chart->yAxis->max($zabbixGraph->yaxismax);

        return $chart;
    }
    
    public function getSeries(Item $item, \ZabbixApiAbstract $api)
    {
        $results = array();
        $results['name'] = $item->name;
        $results['data'] = array();
        $repository = $this->getRepository($item, $api);
        $history = $repository->findBy(array('itemids' => $item->getId()));
        foreach ($history as $data) {
            $results['data'][] = array(
                (int) $data->clock,
                (float) $data->value,
            );
        }
        return $results;
    }

    /**
     * @param Item $item
     * @param \ZabbixApiAbstract $api
     * @return \GlenDemon\ZabbixApi\Repository\AbstractHistoryRepository
     * @throws \OutOfBoundsException
     */
    protected function getRepository(Item $item, \ZabbixApiAbstract $api)
    {
        switch ($item->value_type) {
            case 0:
                $repository = new \GlenDemon\ZabbixApi\Repository\FloatHistoryRepository($api);
                break;
            case 1:
                $repository = new \GlenDemon\ZabbixApi\Repository\StringHistoryRepository($api);
                break;
            case 2:
                $repository = new \GlenDemon\ZabbixApi\Repository\LogHistoryRepository($api);
                break;
            case 3:
                $repository = new \GlenDemon\ZabbixApi\Repository\IntegerHistoryRepository($api);
                break;
            case 4:
                $repository = new \GlenDemon\ZabbixApi\Repository\TextHistoryRepository($api);
                break;

            default:
                throw new \OutOfBoundsException();
        }
        return $repository;
    }
}