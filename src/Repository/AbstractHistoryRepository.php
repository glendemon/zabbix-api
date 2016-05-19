<?php
/**
 * @author Victor Demin <mail@vdemin.com>
 * @copyright (c) 2015, Victor Demin <mail@vdemin.com>
 */

namespace GlenDemon\ZabbixApi\Repository;

use \GlenDemon\ZabbixApi\Entity\AbstractHistory;

/**
 * AbstractHistory repository.
 */
abstract class AbstractHistoryRepository extends AbstractRepository
{

    /**
     * @var int $type Possible values:
      0 - float;
      1 - string;
      2 - log;
      3 - integer;
      4 - text.
     */
    protected $type;

    /**
     * Finds an object by its primary key / identifier.
     *
     * @param mixed $id The identifier.
     *
     * @return AbstractHistory The object.
     */
    public function find($id)
    {
        $criteria['itemids'] = $id['itemid'];
        $criteria['time_from'] = $id['clock'];
        $criteria['time_till'] = $id['clock'];
        return $this->findOneBy($criteria);
    }

    /**
     * Finds all objects in the repository.
     *
     * @param int $limit
     * @param int $offset
     *
     * @return AbstractHistory[] The objects.
     */
    public function findAll($limit = 100, $offset = 0)
    {
        return $this->findBy(array(), null, $limit, $offset);
    }

    /**
     * Finds objects by a set of criteria.
     *
     * Optionally sorting and limiting details can be passed. An implementation may throw
     * an UnexpectedValueException if certain values of the sorting or limiting details are
     * not supported.
     *
     * @param array      $criteria
     * @param array|null $orderBy array('field_name' => $value, ...)

      Possible values are:

      ASC - ascending;
      DESC - descending.
     * @param int|null   $limit
     * @param int|null   $offset
     *
     * @return AbstractHistory[] The objects.
     *
     * @throws \UnexpectedValueException
     */
    public function findBy(array $criteria, array $orderBy = null,
                                    $limit = null, $offset = null)
    {
        $criteria['history'] = $this->type;
        $params = $this->prepare($criteria, $orderBy, $limit, $offset);
        $array = $this->getRawData($params);
        if ($offset) {
            $array = array_slice($array, $offset);
        }
        return $this->getEntities($array);
    }

    /**
     * @inherit
     */
    protected function getRawData(array $params)
    {
        return $this->api->historyGet($params);
    }
}