<?php

namespace GlenDemon\ZabbixApi\Tests\Repository;

abstract class AbstractHistoryRepositoryTest extends AbstractRepositoryTest
{

    /**
     * @return \GlenDemon\ZabbixApi\Entity\AbstractEntity[]
     */
    public function testFindAll()
    {
        $items = $this->repository->findAll();
        foreach ($items as $item) {
            $this->assertInstanceOf($this->entityName, $item);
            foreach ($item->getIdKey() as $key) {
                $this->assertNotEmpty($item->$key);
            }
        }
        return $items;
    }

    /**
     * @depends testFindAll
     */
    public function testFindOne()
    {
        $items = $this->repository->findAll();
        foreach ($items as $item) {
            $id = $item->getId();
            $found = $this->repository->findOneBy(array(
                'itemids' => $id['itemid'],
                'time_from' => $id['clock'],
                'time_till' => $id['clock'],
            ));
            $this->assertEquals($item->getId(), $found->getId());
        }
    }
}