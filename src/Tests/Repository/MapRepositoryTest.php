<?php

namespace GlenDemon\ZabbixApi\Tests\Repository;

use \GlenDemon\ZabbixApi\Repository\MapRepository;

class MapRepositoryTest extends AbstractRepositoryTest
{
    /**
     * @var string
     */
    protected $entityName = 'GlenDemon\ZabbixApi\Entity\Map';

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        self::bootKernel();
        $this->api = static::$kernel->getContainer()
            ->get('zabbix_api');
        $this->repository = new MapRepository($this->api);
    }

    public function testFindAll()
    {
        $hosts = parent::testFindAll();
        foreach ($hosts as $host) {
            $this->assertNotEmpty($host->height);
            $this->assertNotEmpty($host->name);
            $this->assertNotEmpty($host->width);
        }
    }
}
