<?php
/**
 * @author Victor Demin <mail@vdemin.com>
 * @copyright (c) 2015, Victor Demin <mail@vdemin.com>
 */

namespace GlenDemon\ZabbixApi\Entity;

/**
 * @property string $hostid (readonly) ID of the host.
 * @property string $host Technical name of the host.
 * @property integer $available (readonly) Availability of Zabbix agent.

  Possible values are:
  0 - (default) unknown;
  1 - available;
  2 - unavailable.
 * @property text $description Description of the host.
 * @property timestamp $disable_until (readonly) The next polling time of an unavailable Zabbix agent.
 * @property string $error (readonly) Error text if Zabbix agent is unavailable.
 * @property timestamp $errors_from (readonly) Time when Zabbix agent became unavailable.
 * @property integer $flags (readonly) Origin of the host.

  Possible values:
  0 - a plain host;
  4 - a discovered host.
 * @property integer $ipmi_authtype IPMI authentication algorithm.

  Possible values are:
  -1 - (default) default;
  0 - none;
  1 - MD2;
  2 - MD5
  4 - straight;
  5 - OEM;
  6 - RMCP+.
 * @property integer $ipmi_available (readonly) Availability of IPMI agent.

  Possible values are:
  0 - (default) unknown;
  1 - available;
  2 - unavailable.
 * @property timestamp $ipmi_disable_until (readonly) The next polling time of an unavailable IPMI agent.
 * @property string $ipmi_error (readonly) Error text if IPMI agent is unavailable.
 * @property timestamp $ipmi_errors_from (readonly) Time when IPMI agent became unavailable.
 * @property string $ipmi_password IPMI password.
 * @property integer $ipmi_privilege IPMI privilege level.

  Possible values are:
  1 - callback;
  2 - (default) user;
  3 - operator;
  4 - admin;
  5 - OEM.
 * @property string $ipmi_username IPMI username.
 * @property integer $jmx_available (readonly) Availability of JMX agent.

  Possible values are:
  0 - (default) unknown;
  1 - available;
  2 - unavailable.
 * @property timestamp $jmx_disable_until (readonly) The next polling time of an unavailable JMX agent.
 * @property string $jmx_error (readonly) Error text if JMX agent is unavailable.
 * @property timestamp $jmx_errors_from (readonly) Time when JMX agent became unavailable.
 * @property timestamp $maintenance_from (readonly) Starting time of the effective maintenance.
 * @property integer $maintenance_status (readonly) Effective maintenance status.

  Possible values are:
  0 - (default) no maintenance;
  1 - maintenance in effect.
 * @property integer $maintenance_type (readonly) Effective maintenance type.

  Possible values are:
  0 - (default) maintenance with data collection;
  1 - maintenance without data collection.
 * @property string $maintenanceid (readonly) ID of the maintenance that is currently in effect on the host.
 * @property string $name Visible name of the host.

  Default: host property value.
 * @property string $proxy_hostid ID of the proxy that is used to monitor the host.
 * @property integer $snmp_available (readonly) Availability of SNMP agent.

  Possible values are:
  0 - (default) unknown;
  1 - available;
  2 - unavailable.
 * @property timestamp $snmp_disable_until (readonly) The next polling time of an unavailable SNMP agent.
 * @property string $snmp_error (readonly) Error text if SNMP agent is unavailable.
 * @property timestamp $snmp_errors_from (readonly) Time when SNMP agent became unavailable.
 * @property integer $status Status and function of the host.

  Possible values are:
  0 - (default) monitored host;
  1 - unmonitored host.
 */
class Host extends AbstractEntity
{
    /**
     * {@inheritdoc}
     */
    public function getIdKey()
    {
        return 'hostid';
    }
}