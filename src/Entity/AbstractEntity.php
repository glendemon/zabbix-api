<?php
/**
 * @author Victor Demin <mail@vdemin.com>
 * @copyright (c) 2015, Victor Demin <mail@vdemin.com>
 */

namespace GlenDemon\ZabbixApi\Entity;

/**
 * Abstract class for zabbix's objects.
 */
abstract class AbstractEntity
{
    protected $data = array();

    public function __construct($data)
    {
        if (is_array($data)) {
            $this->data = $data;
        } else {
            $this->data = json_decode(json_encode($data), true);
        }
    }

    /**
     * Get name of identifier key.
     *
     * @return string
     */
    abstract public function getIdKey();

    /**
     * Get object's identifier.
     *
     * @return mixed
     */
    public function getId()
    {
        $key = $this->getIdKey();
        if (is_array($key)) {
            $result = array();
            foreach ($key as $subKey) {
                $result[$subKey] = $this->$subKey;
            }
            return $result;
        }
        return $this->$key;
    }

    /**
     * Get raw data.
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Magic methods.
     *
     * @param string $method
     * @param array $args
     *
     * @return mixed
     *
     * @throws \BadMethodCallException
     */
    public function __call($method, $args)
    {
        $command = substr($method, 0, 3);
        $field = lcfirst(substr($method, 3));
        if ($command == "set") {
            $this->set($field, $args);
        } else if ($command == "get") {
            return $this->get($field);
        } else {
            throw new \BadMethodCallException("There is no method " . $method);
        }
    }

    public function __get($name)
    {
        $function = 'get' . ucfirst($name);
        return $this->$function();
    }

    public function __set($name, $value)
    {
        $function = 'set' . ucfirst($name);
        return $this->$function($value);
    }

    protected function get($name)
    {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        } else {
            return null;
        }
    }

    protected function set($name, $value)
    {
        $this->data[$name] = $value;
    }
}