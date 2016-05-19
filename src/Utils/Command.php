<?php
/*
 * Copyright 2015 Victor Demin <mail@vdemin.com>.
 */
namespace GlenDemon\ZabbixApi\Utils;

use GlenDemon\ZabbixApi\Repository\AbstractRepository;
use GlenDemon\ZabbixApi\Repository\HostGroupRepository;
use GlenDemon\ZabbixApi\Repository\HostRepository;
use GlenDemon\ZabbixApi\Repository\MapRepository;
use GlenDemon\ZabbixApi\Repository\TemplateRepository;
use ZabbixApiAbstract;

/**
 * Description of Command
 *
 * @author Victor Demin <mail@vdemin.com>
 */
class Command
{
    /**
     * @var ZabbixApiAbstract
     */
    protected $api;

    public function __construct(ZabbixApiAbstract $api)
    {
        $this->api = $api;
    }

    /**
     * @param string[] $names
     * @return string[]
     */
    public function getHostIdsByNamesOrIds(array $names)
    {
        $repository = new HostRepository($this->api);

        return $this->getIdsByNamesOrIds($repository, array('host' => $names),
                array('hostids' => $names));
    }

    /**
     * @param string $name
     * @return string|false
     */
    public function getHostId($name)
    {
        return $this->getId($name, 'host');
    }

    /**
     * @param string $name
     * @return \GlenDemon\ZabbixApi\Entity\Host
     */
    public function getHost($name)
    {
        $repository = new HostRepository($this->api);
        $id = $this->getHostId($name);
        return $repository->find($id);
    }

    /**
     * @param string[] $names
     * @return string[]
     */
    public function getGroupIdsByNamesOrIds(array $names)
    {
        $repository = new HostGroupRepository($this->api);

        return $this->getIdsByNamesOrIds($repository, array('name' => $names),
                array('groupids' => $names));
    }

    /**
     * @param string $name
     * @return string|false
     */
    public function getGroupId($name)
    {
        return $this->getId($name, 'group');
    }

    /**
     * @param string[] $names
     * @return string[]
     */
    public function getTemplateIdsByNamesOrIds(array $names)
    {
        $repository = new TemplateRepository($this->api);

        return $this->getIdsByNamesOrIds($repository, array('host' => $names),
                array('templateids' => $names));
    }

    /**
     * @param string[] $names
     * @return string[]
     */
    public function getMapIdsByNamesOrIds(array $names)
    {
        $repository = new MapRepository($this->api);

        return $this->getIdsByNamesOrIds($repository, array('name' => $names),
                array('sysmapids' => $names));
    }

    /**
     * @param string $name
     * @return string|false
     */
    public function getMapId($name)
    {
        return $this->getId($name, 'map');
    }

    /**
     * @param string $name
     * @return \GlenDemon\ZabbixApi\Entity\Map
     */
    public function getMap($name)
    {
        $repository = new MapRepository($this->api);
        $id = $this->getMapId($name);
        return $repository->find($id);
    }

    /**
     * @param string $name
     * @param string $type
     * @return string|false
     */
    protected function getId($name, $type)
    {
        $method = 'get' . ucfirst($type) . 'IdsByNamesOrIds';
        if (method_exists($this, $method)) {
            $ids = $this->$method(array($name));
            if ($ids && $id = array_pop($ids)) {
                return array_pop($id);
            }
        }
        return false;
    }

    /**
     * @param AbstractRepository $repository
     * @param string $queryName
     * @param string $queryId
     * @return string[]
     */
    protected function getIdsByNamesOrIds(AbstractRepository $repository,
                                          array $queryName, array $queryId)
    {
        $params = array(
            'output' => 'extend',
            'filter' => $queryName,
        );
        $items = $repository->findBy($params);

        //Try to search by ids
        if (empty($items)) {
            $items = $repository->findBy($queryId);
        }

        $idKey = current(array_keys($queryId));
        $idKey = substr($idKey, 0, -1);

        $results = array();
        foreach ($items as $template) {
            $results[] = array($idKey => $template->getId());
        }
        return $results;
    }
}