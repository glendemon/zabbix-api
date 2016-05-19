<?php
/**
 * @author Victor Demin <mail@vdemin.com>
 * @copyright (c) 2015, Victor Demin <mail@vdemin.com>
 */

namespace GlenDemon\ZabbixApi\Entity;

/**
 * @property string $groupid (readonly) ID of the host group.
 * @property string $name Name of the host group.
 * @property integer $flags (readonly) Origin of the host group.

  Possible values:
  0 - a plain host group;
  4 - a discovered host group.
 * @property integer $internal (readonly) Whether the group is used internally by the system. An internal group cannot be deleted.

  Possible values:
  0 - (default) not internal;
  1 - internal.
 */
class HostGroup extends AbstractEntity
{

    /**
     * {@inheritdoc}
     */
    public function getIdKey()
    {
        return 'groupid';
    }
}