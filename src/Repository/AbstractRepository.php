<?php
/**
 * @author Victor Demin <mail@vdemin.com>
 * @copyright (c) 2015, Victor Demin <mail@vdemin.com>
 */

namespace GlenDemon\ZabbixApi\Repository;

use GlenDemon\ZabbixApi\Entity\AbstractEntity;

/**
 * Abstract repository.
 */
abstract class AbstractRepository implements \Doctrine\Common\Persistence\ObjectRepository
{
    /**
     * @var \ZabbixApiAbstract
     */
    protected $api;

    /**
     * @var string
     */
    private $name;

    public function __construct(\ZabbixApiAbstract $api)
    {
        $this->api = $api;
    }

    /**
     * Finds an object by its primary key / identifier.
     *
     * @param mixed $id The identifier.
     *
     * @return AbstractEntity The object.
     */
    public function find($id)
    {
        $criteria[$this->getIdKey().'s'] = $id;
        return $this->findOneBy($criteria);
    }

    /**
     * Finds all objects in the repository.
     *
     * @return AbstractEntity[] The objects.
     */
    public function findAll()
    {
        return $this->findBy(array());
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
     * @return AbstractEntity[] The objects.
     *
     * @throws \UnexpectedValueException
     */
    public function findBy(array $criteria, array $orderBy = null,
                                    $limit = null, $offset = null)
    {
        $params = $this->prepare($criteria, $orderBy, $limit, $offset);
        $array = $this->getRawData($params);
        if ($offset) {
            $array = array_slice($array, $offset);
        }
        return $this->getEntities($array);
    }

    /**
     * @param array $params Parameters to pass through.
     * 
     * @return stdClass
     */
    abstract protected function getRawData(array $params);

    /**
     * Prepare parameters in {@see findBy}.
     *
     * @param array $criteria
     * @param array $orderBy array('field_name' => $value, ...)

      Possible values are:

      ASC - ascending;
      DESC - descending.
     * @param int $limit
     * @param int $offset
     */
    protected function prepare(array $criteria, array $orderBy = null,
                               $limit = null, $offset = null)
    {
        if ($limit) {
            $criteria['limit'] = $limit;
        }
        if ($limit) {
            $criteria['limit'] = $limit;
        }
        if ($offset) {
            $criteria['limit'] = $limit + $offset;
        }
        if ($orderBy) {
            $criteria['sortfield'] = array_keys($orderBy);
            $criteria['sortorder'] = array_values($orderBy);
        }

        return $criteria;
    }

    /**
     * Finds a single object by a set of criteria.
     *
     * @param array $criteria The criteria.
     *
     * @return AbstractEntity|null The object.
     */
    public function findOneBy(array $criteria)
    {
        $results = $this->findBy($criteria, null, 1);
        return array_pop($results);
    }

    /**
     * Returns the class name of the object managed by the repository.
     *
     * @return string
     */
    public function getClassName()
    {
        if (!$this->name) {
            $name       = get_called_class();
            $name       = substr($name, 0, strlen($name) - strlen('Repository'));
            $name       = str_replace('Repository', 'Entity', $name);
            $this->name = $name;
        }
        return $this->name;
    }

    /**
     * Get entity's id key.
     * 
     * @return string
     */
    protected function getIdKey()
    {
        $class = $this->getClassName();
        $obj   = new $class(array());
        return $obj->getIdKey();
    }

    /**
     * Create AbstractEntity from data.
     *
     * @param array $data
     * @return AbstractEntity
     */
    protected function getEntity(\stdClass $data)
    {
        $class = $this->getClassName();
        return new $class($data);
    }

    /**
     * Create AbstractEntity[] from data.
     *
     * @param array $array
     * @return AbstractEntity[]
     */
    protected function getEntities(array $array)
    {
        $result = array();
        foreach ($array as $data) {
            $result[] = $this->getEntity($data);
        }
        return $result;
    }
}