<?php

namespace GlenDemon\ZabbixApi\Tests\Repository;

use \GlenDemon\ZabbixApi\Repository\TemplateRepository;

class TemplateRepositoryTest extends AbstractRepositoryTest
{
    /**
     * @var string
     */
    protected $entityName = 'GlenDemon\ZabbixApi\Entity\Template';

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        self::bootKernel();
        $this->api = static::$kernel->getContainer()
            ->get('zabbix_api');
        $this->repository = new TemplateRepository($this->api);
    }

    public function testFindAll()
    {
        $hosts = parent::testFindAll();
        foreach ($hosts as $host) {
            $this->assertNotEmpty($host->host);
        }
    }
}
