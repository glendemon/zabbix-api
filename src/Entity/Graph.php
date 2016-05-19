<?php
/**
 * @author Victor Demin <mail@vdemin.com>
 * @copyright (c) 2015, Victor Demin <mail@vdemin.com>
 */

namespace GlenDemon\ZabbixApi\Entity;

/**
 * @property string $graphid (readonly) ID of the graph.
 * @property integer $height Height of the graph in pixels.
 * @property string $name Name of the graph
 * @property integer $width Width of the graph in pixels.
 * @property integer $flags (readonly) Origin of the graph.

  Possible values are:
  0 - (default) a plain graph;
  4 - a discovered graph.
 * @property integer $graphtype Graph's layout type.

  Possible values:
  0 - (default) normal;
  1 - stacked;
  2 - pie;
  3 - exploded.
 * @property float $percent_left Left percentile.

  Default: 0.
 * @property float $percent_right Right percentile.

  Default: 0.
 * @property integer $show_3d Whether to show pie and exploded graphs in 3D.

  Possible values:
  0 - (default) show in 2D;
  1 - show in 3D.
 * @property integer $show_legend Whether to show the legend on the graph.

  Possible values:
  0 - hide;
  1 - (default) show.
 * @property integer $show_work_period Whether to show the working time on the graph.

  Possible values:
  0 - hide;
  1 - (default) show.
 * @property string $templateid (readonly) ID of the parent template graph.
 * @property float $yaxismax The fixed maximum value for the Y axis.

  Default: 100.
 * @property float $yaxismin The fixed minimum value for the Y axis.

  Default: 0.
 * @property string $ymax_itemid ID of the item that is used as the maximum value for the Y axis.
 * @property integer $ymax_type Maximum value calculation method for the Y axis.

  Possible values:
  0 - (default) calculated;
  1 - fixed;
  2 - item.
 * @property string $ymin_itemid ID of the item that is used as the minimum value for the Y axis.
 * @property integer $ymin_type Minimum value calculation method for the Y axis.

  Possible values:
  0 - (default) calculated;
  1 - fixed;
  2 - item.
 */
class Graph extends AbstractEntity
{
    /**
     * {@inheritdoc}
     */
    public function getIdKey()
    {
        return 'graphid';
    }

    /**
     * @return GraphItem[]
     */
    public function getGraphItems()
    {
        $results = array();
        $data = $this->gitems;
        if ($data && is_array($data)) {
            foreach ($data as $item) {
                $results[] = new GraphItem($item);
            }
        }
        return $results;
    }

    /**
     * @return Item[]
     */
    public function getItems()
    {
        $results = array();
        $data = $this->get('items');
        if ($data && is_array($data)) {
            foreach ($data as $item) {
                $results[] = new Item($item);
            }
        }
        return $results;
    }
}