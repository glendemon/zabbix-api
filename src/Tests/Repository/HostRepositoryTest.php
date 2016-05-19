<?php

namespace GlenDemon\ZabbixApi\Tests\Repository;

use \GlenDemon\ZabbixApi\Repository\HostRepository;

class HostRepositoryTest extends AbstractRepositoryTest
{
    /**
     * @var string
     */
    protected $entityName = 'GlenDemon\ZabbixApi\Entity\Host';

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        self::bootKernel();
        $this->api = static::$kernel->getContainer()
            ->get('zabbix_api');
        $this->repository = new HostRepository($this->api);
    }

    public function testFindAll()
    {
        $hosts = parent::testFindAll();
        foreach ($hosts as $host) {
            $this->assertNotEmpty($host->host);
        }
    }
}
