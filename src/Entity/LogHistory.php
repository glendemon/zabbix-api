<?php
/**
 * @author Victor Demin <mail@vdemin.com>
 * @copyright (c) 2015, Victor Demin <mail@vdemin.com>
 */

namespace GlenDemon\ZabbixApi\Entity;

/**
 * @property string $id ID of the history entry.
 * @property integer $logeventid Windows event log entry ID.
 * @property integer $severity Windows event log entry level.
 * @property string $source Windows event log entry source.
 * @property timestamp $timestamp Windows event log entry time.
 */
class LogHistory extends AbstractHistory
{
}