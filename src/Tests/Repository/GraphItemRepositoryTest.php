<?php

namespace GlenDemon\ZabbixApi\Tests\Repository;

use \GlenDemon\ZabbixApi\Repository\GraphItemRepository;

/**
 * @see GraphItemRepository
 * @deprecated
 */
class GraphItemRepositoryTest extends AbstractRepositoryTest
{
    /**
     * @var string
     */
    protected $entityName = 'GlenDemon\ZabbixApi\Entity\GraphItem';

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->markTestSkipped(
            'GraphItemRepository has bug.'
        );
        self::bootKernel();
        $this->api = static::$kernel->getContainer()
            ->get('zabbix_api');
        $this->repository = new GraphItemRepository($this->api);
    }

    public function testFindAll()
    {
        $items = parent::testFindAll();
        foreach ($items as $item) {
            $this->assertNotEmpty($item->color);
            $this->assertNotEmpty($item->itemid);
        }
    }
}