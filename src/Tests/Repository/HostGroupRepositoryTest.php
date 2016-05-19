<?php

namespace GlenDemon\ZabbixApi\Tests\Repository;

use \GlenDemon\ZabbixApi\Repository\HostGroupRepository;

class HostGroupRepositoryTest extends AbstractRepositoryTest
{
    /**
     * @var string
     */
    protected $entityName = 'GlenDemon\ZabbixApi\Entity\HostGroup';

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        self::bootKernel();
        $this->api = static::$kernel->getContainer()
            ->get('zabbix_api');
        $this->repository = new HostGroupRepository($this->api);
    }

    public function testFindAll()
    {
        $hosts = parent::testFindAll();
        foreach ($hosts as $host) {
            $this->assertNotEmpty($host->host);
        }
    }
}
