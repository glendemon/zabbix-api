<?php
/**
 * @author Victor Demin <mail@vdemin.com>
 * @copyright (c) 2015, Victor Demin <mail@vdemin.com>
 */

namespace GlenDemon\ZabbixApi\Entity;

/**
 * @property string $eventid ID of the event.
 * @property integer $acknowledged Whether the event has been acknowledged.
 * @property timestamp $clock Time when the event was created.
 * @property integer $ns Nanoseconds when the event was created.
 * @property integer $object Type of object that is related to the event.

  Possible values for trigger events:
  0 - trigger.

  Possible values for discovery events:
  1 - discovered host;
  2 - discovered service.

  Possible values for auto-registration events:
  3 - auto-registered host.

  Possible values for internal events:
  0 - trigger;
  4 - item;
  5 - LLD rule.
 * @property string $objectid ID of the related object.
 * @property integer $source Type of the event.

  Possible values:
  0 - event created by a trigger;
  1 - event created by a discovery rule;
  2 - event created by active agent auto-registration;
  3 - internal event.
 * @property integer $value State of the related object.

  Possible values for trigger events:
  0 - OK;
  1 - problem.

  Possible values for discovery events:
  0 - host or service up;
  1 - host or service down;
  2 - host or service discovered;
  3 - host or service lost.

  Possible values for internal events:
  0 - “normal” state;
  1 - “unknown” or “not supported” state.

  This parameter is not used for active agent auto-registration events.
 * @property integer $value_changed Whether the state of the related object has changed since the previous event
 */
class Event extends AbstractEntity
{
    /**
     * {@inheritdoc}
     */
    public function getIdKey()
    {
        return 'eventid';
    }
}