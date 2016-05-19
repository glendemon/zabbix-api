<?php
/**
 * @author Victor Demin <mail@vdemin.com>
 * @copyright (c) 2015, Victor Demin <mail@vdemin.com>
 */

namespace GlenDemon\ZabbixApi\Entity;

/**
 * @abstract
 * @property timestamp $clock Time when that value was received.
 * @property string $itemid ID of the related item.
 * @property integer $ns Nanoseconds when the value was received.
 * @property text $value Received value.
 */
abstract class AbstractHistory extends AbstractEntity
{
    public function getIdKey()
    {
        return array('itemid', 'clock');
    }
}