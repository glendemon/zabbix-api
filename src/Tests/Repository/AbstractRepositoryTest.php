<?php

namespace GlenDemon\ZabbixApi\Tests\Repository;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use \GlenDemon\ZabbixApi\Repository\AbstractRepository;

abstract class AbstractRepositoryTest extends KernelTestCase
{
    /**
     * @var \ZabbixApiAbstract
     */
    protected $api;

    /**
     * @var AbstractRepository
     */
    protected $repository;

    /**
     * @var string
     */
    protected $entityName;

    /**
     * @abstract
     * {@inheritDoc}
     */
    public function setUp()
    {

    }

    public function testGetClassName()
    {
        $this->assertEquals($this->entityName, $this->repository->getClassName());
    }

    /**
     * @return \GlenDemon\ZabbixApi\Entity\AbstractEntity[]
     */
    public function testFindAll()
    {
        $items = $this->repository->findAll();
        foreach ($items as $item) {
            $this->assertInstanceOf($this->entityName, $item);
            $this->assertNotEmpty($item->{$item->getIdKey()});
        }
        return $items;
    }

    /**
     * @depends testFindAll
     */
    public function testFind()
    {
        $items = $this->repository->findAll();
        foreach ($items as $item) {
            $found = $this->repository->find($item->getId());
            $this->assertEquals($item->getId(), $found->getId());
        }
    }

    /**
     * @depends testFindAll
     */
    public function testFindOne()
    {
        $items = $this->repository->findAll();
        $name  = $this->entityName;
        $obj   = new $name(array());
        $idKey = $obj->getIdKey() . 's';
        foreach ($items as $item) {
            $found = $this->repository->findOneBy(array(
                $idKey => $item->getId()
            ));
            $this->assertEquals($item->getId(), $found->getId());
        }
    }

    public function testFindBy()
    {
        $items = $this->repository->findAll();
        $i = 0;
        foreach ($items as $item) {
            $founds = $this->repository->findBy(array(), null, 1, $i);
            $this->assertCount(1, $founds);
            $this->assertEquals($item->getId(), $founds[0]->getId());
            $i++;
        }
    }
}