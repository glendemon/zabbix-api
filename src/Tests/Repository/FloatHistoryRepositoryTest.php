<?php

namespace GlenDemon\ZabbixApi\Tests\Repository;

use \GlenDemon\ZabbixApi\Repository\FloatHistoryRepository;

class FloatHistoryRepositoryTest extends AbstractHistoryRepositoryTest
{
    /**
     * @var string
     */
    protected $entityName = 'GlenDemon\ZabbixApi\Entity\FloatHistory';

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        self::bootKernel();
        $this->api = static::$kernel->getContainer()
            ->get('zabbix_api');
        $this->repository = new FloatHistoryRepository($this->api);
    }
}
