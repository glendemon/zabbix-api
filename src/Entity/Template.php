<?php
/**
 * @author Victor Demin <mail@vdemin.com>
 * @copyright (c) 2015, Victor Demin <mail@vdemin.com>
 */

namespace GlenDemon\ZabbixApi\Entity;

/**
 * @property string $templateid (readonly) ID of the template.
 * @property string $host Technical name of the template.
 * @property text $description Description of the template.
 * @property string $name Visible name of the host.

  Default: host property value.
 */
class Template extends AbstractEntity
{

    /**
     * {@inheritdoc}
     */
    public function getIdKey()
    {
        return 'templateid';
    }
}