<?php
/**
 * @author Victor Demin <mail@vdemin.com>
 * @copyright (c) 2015, Victor Demin <mail@vdemin.com>
 */

namespace GlenDemon\ZabbixApi\Entity;

/**
 * @property string $itemid (readonly) ID of the item.
 * @property integer $delay Update interval of the item in seconds.
 * @property string $hostid ID of the host that the item belongs to.
 * @property string $interfaceid ID of the item's host interface. Used only for host items.

  Optional for Zabbix agent (active), Zabbix internal, Zabbix trapper, Zabbix aggregate, database monitor and calculated items.
 * @property string $key_ Item key.
 * @property string $name Name of the item.
 * @property integer $type Type of the item.

  Possible values:
  0 - Zabbix agent;
  1 - SNMPv1 agent;
  2 - Zabbix trapper;
  3 - simple check;
  4 - SNMPv2 agent;
  5 - Zabbix internal;
  6 - SNMPv3 agent;
  7 - Zabbix agent (active);
  8 - Zabbix aggregate;
  9 - web item;
  10 - external check;
  11 - database monitor;
  12 - IPMI agent;
  13 - SSH agent;
  14 - TELNET agent;
  15 - calculated;
  16 - JMX agent;
  17 - SNMP trap.
 * @property integer $value_type Type of information of the item.

  Possible values:
  0 - numeric float;
  1 - character;
  2 - log;
  3 - numeric unsigned;
  4 - text.
 * @property integer $authtype SSH authentication method. Used only by SSH agent items.

  Possible values:
  0 - (default) password;
  1 - public key.
 * @property integer $data_type Data type of the item.

  Possible values:
  0 - (default) decimal;
  1 - octal;
  2 - hexadecimal;
  3 - boolean.
 * @property string $delay_flex Flexible intervals as a serialized string.

  Each serialized flexible interval consists of an update interval and a time period separated by a forward slash. Multiple intervals are separated by a colon.
 * @property integer $delta Value that will be stored.

  Possible values:
  0 - (default) as is;
  1 - Delta, speed per second;
  2 - Delta, simple change.
 * @property string $description Description of the item.
 * @property string $error (readonly) Error text if there are problems updating the item.
 * @property integer $flags (readonly) Origin of the item.

  Possible values:
  0 - a plain item;
  4 - a discovered item.
 * @property integer/float $formula Custom multiplier.

  Default: 1.
 * @property integer $history Number of days to keep item's history data.

  Default: 90.
 * @property integer $inventory_link ID of the host inventory field that is populated by the item.

  Refer to the host inventory page for a list of supported host inventory fields and their IDs.

  Default: 0.
 * @property string $ipmi_sensor IPMI sensor. Used only by IPMI items.
 * @property timestamp $lastclock (readonly) Time when the item was last updated.

  This property will only return a value for the period configured in ZBX_HISTORY_PERIOD.
 * @property integer $lastns (readonly) Nanoseconds when the item was last updated.

  This property will only return a value for the period configured in ZBX_HISTORY_PERIOD.
 * @property string $lastvalue (readonly) Last value of the item.

  This property will only return a value for the period configured in ZBX_HISTORY_PERIOD.
 * @property string $logtimefmt Format of the time in log entries. Used only by log items.
 * @property timestamp $mtime Time when the monitored log file was last updated. Used only by log items.
 * @property integer $multiplier Whether to use a custom multiplier.
 * @property string $params Additional parameters depending on the type of the item:
  - executed script for SSH and Telnet items;
  - SQL query for database monitor items;
  - formula for calculated items.
 * @property string $password Password for authentication. Used by simple check, SSH, Telnet, database monitor and JMX items.
 * @property string $port Port monitored by the item. Used only by SNMP items.
 * @property string $prevvalue (readonly) Previous value of the item.

  This property will only return a value for the period configured in ZBX_HISTORY_PERIOD.
 * @property string $privatekey Name of the private key file.
 * @property string $publickey Name of the public key file.
 * @property string $snmp_community SNMP community. Used only by SNMPv1 and SNMPv2 items.
 * @property string $snmp_oid SNMP OID.
 * @property string $snmpv3_authpassphrase SNMPv3 auth passphrase. Used only by SNMPv3 items.
 * @property integer $snmpv3_authprotocol SNMPv3 authentication protocol. Used only by SNMPv3 items.

  Possible values:
  0 - (default) MD5;
  1 - SHA.
 * @property string $snmpv3_contextname SNMPv3 context name. Used only by SNMPv3 items.
 * @property string $snmpv3_privpassphrase SNMPv3 priv passphrase. Used only by SNMPv3 items.
 * @property integer $snmpv3_privprotocol SNMPv3 privacy protocol. Used only by SNMPv3 items.

  Possible values:
  0 - (default) DES;
  1 - AES.
 * @property integer $snmpv3_securitylevel SNMPv3 security level. Used only by SNMPv3 items.

  Possible values:
  0 - noAuthNoPriv;
  1 - authNoPriv;
  2 - authPriv.
 * @property string $snmpv3_securityname SNMPv3 security name. Used only by SNMPv3 items.
 * @property integer $state (readonly) State of the item.

  Possible values:
  0 - (default) normal;
  1 - not supported.
 * @property integer $status Status of the item.

  Possible values:
  0 - (default) enabled item;
  1 - disabled item.
 * @property string $templateid (readonly) ID of the parent template item.
 * @property string $trapper_hosts Allowed hosts. Used only by trapper items.
 * @property integer $trends Number of days to keep item's trends data.

  Default: 365.
 * @property string $units Value units.
 * @property string $username Username for authentication. Used by simple check, SSH, Telnet, database monitor and JMX items.

  Required by SSH and Telnet items.
 * @property string $valuemapid ID of the associated value map.
 */
class Item extends AbstractEntity
{
    /**
     * {@inheritdoc}
     */
    public function getIdKey()
    {
        return 'itemid';
    }
}