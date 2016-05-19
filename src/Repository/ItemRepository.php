<?php
/**
 * @author Victor Demin <mail@vdemin.com>
 * @copyright (c) 2015, Victor Demin <mail@vdemin.com>
 */

namespace GlenDemon\ZabbixApi\Repository;

use \GlenDemon\ZabbixApi\Entity\Item;

/**
 * Item repository.
 */
class ItemRepository extends AbstractRepository
{
    /**
     * Finds an object by its primary key / identifier.
     *
     * @param mixed $id The identifier.
     *
     * @return Item The object.
     */
    public function find($id)
    {
        return parent::find($id);
    }

    /**
     * Finds all objects in the repository.
     *
     * @return Item[] The objects.
     */
    public function findAll()
    {
        return parent::findAll();
    }

    /**
     * @inherit
     */
    protected function getRawData(array $params)
    {
        return $this->api->itemGet($params);
    }

    /**
     * Finds a single object by a set of criteria.
     *
     * @param array $criteria The criteria.
     *
     * @return Item|null The object.
     */
    public function findOneBy(array $criteria)
    {
        return parent::findOneBy($criteria);
    }
}
