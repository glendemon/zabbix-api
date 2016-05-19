<?php
/**
 * @author Victor Demin <mail@vdemin.com>
 * @copyright (c) 2015, Victor Demin <mail@vdemin.com>
 */

namespace GlenDemon\ZabbixApi\Entity;

/**
 * @property string $sysmapid (readonly) ID of the map.
 * @property integer $height (required) Height of the map in pixels.
 * @property string $name (required) Name of the map.
 * @property integer $width (required) Width of the map in pixels.
 * @property string $backgroundid ID of the image used as the background for the map.
 * @property integer $expand_macros Whether to expand macros in labels when configuring the map.

  Possible values:
  0 - (default) do not expand macros;
  1 - expand macros.
 * @property integer $expandproblem Whether the the problem trigger will be displayed for elements with a single problem.

  Possible values:
  0 - always display the number of problems;
  1 - (default) display the problem trigger if there's only one problem.
 * @property integer $grid_align Whether to enable grid aligning.

  Possible values:
  0 - disable grid aligning;
  1 - (default) enable grid aligning.
 * @property integer $grid_show Whether to show the grid on the map.

  Possible values:
  0 - do not show the grid;
  1 - (default) show the grid.
 * @property integer $grid_size Size of the map grid in pixels.

  Supported values: 20, 40, 50, 75 and 100.

  Default: 50.
 * @property integer $highlight Whether icon highlighting is enabled.

  Possible values:
  0 - highlighting disabled;
  1 - (default) highlighting enabled.
 * @property string $iconmapid ID of the icon map used on the map.
 * @property integer $label_format Whether to enable advanced labels.

  Possible values:
  0 - (default) disable advanced labels;
  1 - enable advanced labels.
 * @property integer $label_location Location of the map element label.

  Possible values:
  0 - (default) bottom;
  1 - left;
  2 - right;
  3 - top.
 * @property string $label_string_host Custom label for host elements.

  Required for maps with custom host label type.
 * @property string $label_string_hostgroup Custom label for host group elements.

  Required for maps with custom host group label type.
 * @property string $label_string_image Custom label for image elements.

  Required for maps with custom image label type.
 * @property string $label_string_map Custom label for map elements.

  Required for maps with custom map label type.
 * @property string $label_string_trigger Custom label for trigger elements.

  Required for maps with custom trigger label type.
 * @property integer $label_type Map element label type.

  Possible values:
  0 - label;
  1 - IP address;
  2 - (default) element name;
  3 - status only;
  4 - nothing.
 * @property integer $label_type_host Label type for host elements.

  Possible values:
  0 - label;
  1 - IP address;
  2 - (default) element name;
  3 - status only;
  4 - nothing;
  5 - custom.
 * @property integer $label_type_hostgroup Label type for host group elements.

  Possible values:
  0 - label;
  2 - (default) element name;
  3 - status only;
  4 - nothing;
  5 - custom.
 * @property integer $label_type_image Label type for host group elements.

  Possible values:
  0 - label;
  2 - (default) element name;
  4 - nothing;
  5 - custom.
 * @property integer $label_type_map Label type for map elements.

  Possible values:
  0 - label;
  2 - (default) element name;
  3 - status only;
  4 - nothing;
  5 - custom.
 * @property integer $label_type_trigger Label type for trigger elements.

  Possible values:
  0 - label;
  2 - (default) element name;
  3 - status only;
  4 - nothing;
  5 - custom.
 * @property integer $markelements Whether to highlight map elements that have recently changed their status.

  Possible values:
  0 - (default) do not highlight elements;
  1 - highlight elements.
 * @property integer $severity_min Minimum severity of the triggers that will be displayed on the map.

  Refer to the trigger "severity" property for a list of supported trigger severities.
 * @property integer $show_unack How problems should be displayed.

  Possible values:
  0 - (default) display the count of all problems;
  1 - display only the count of unacknowledged problems;
  2 - display the count of acknowledged and unacknowledged problems separately.
 *
 */
class Map extends AbstractEntity
{

    /**
     * {@inheritdoc}
     */
    public function getIdKey()
    {
        return 'sysmapid';
    }
}