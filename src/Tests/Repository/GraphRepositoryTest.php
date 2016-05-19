<?php

namespace GlenDemon\ZabbixApi\Tests\Repository;

use \GlenDemon\ZabbixApi\Repository\GraphRepository;

class GraphRepositoryTest extends AbstractRepositoryTest
{
    /**
     * @var string
     */
    protected $entityName = 'GlenDemon\ZabbixApi\Entity\Graph';

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        self::bootKernel();
        $this->api = static::$kernel->getContainer()
            ->get('zabbix_api');
        $this->repository = new GraphRepository($this->api);
    }

    public function testFindAll()
    {
        $items = parent::testFindAll();
        foreach ($items as $item) {
            $this->assertNotEmpty($item->height);
            $this->assertNotEmpty($item->name);
            $this->assertNotEmpty($item->width);
        }
    }
}
