<?php

namespace GlenDemon\ZabbixApi\Tests\Repository;

use \GlenDemon\ZabbixApi\Repository\ItemRepository;

class ItemRepositoryTest extends AbstractRepositoryTest
{
    /**
     * @var string
     */
    protected $entityName = 'GlenDemon\ZabbixApi\Entity\Item';

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        self::bootKernel();
        $this->api = static::$kernel->getContainer()
            ->get('zabbix_api');
        $this->repository = new ItemRepository($this->api);
    }

    public function testFindAll()
    {
        $items = parent::testFindAll();
        foreach ($items as $item) {
            $this->assertNotEmpty($item->delay);
            $this->assertNotEmpty($item->hostid);
            $this->assertNotEmpty($item->key_);
            $this->assertNotEmpty($item->name);
            $this->assertGreaterThanOrEqual(0, $item->type);
            $this->assertGreaterThanOrEqual(0, $item->value_type);
            //see constants in https://www.zabbix.com/documentation/2.4/manual/api/reference/item/object#item
            if (!in_array($item->type, array(7, 5, 2, 8, 11, 15))) {
                $this->assertInternalType('string', $item->interfaceid);
            }
        }
    }
}