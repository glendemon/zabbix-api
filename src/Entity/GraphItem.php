<?php
/**
 * @author Victor Demin <mail@vdemin.com>
 * @copyright (c) 2015, Victor Demin <mail@vdemin.com>
 */

namespace GlenDemon\ZabbixApi\Entity;

/**
 * @property string $gitemid (readonly) ID of the graph item.
 * @property string $color Graph item's draw color as a hexadecimal color code.
 * @property string $itemid ID of the item.
 * @property integer $calc_fnc Value of the item that will be displayed.

  Possible values:
  1 - minimum value;
  2 - (default) average value;
  4 - maximum value;
  7 - all values;
  9 - last value, used only by pie and exploded graphs.
 * @property integer $drawtype Draw style of the graph item.

  Possible values:
  0 - (default) line;
  1 - filled region;
  2 - bold line;
  3 - dot;
  4 - dashed line;
  5 - gradient line.
 * @property string $graphid ID of the graph that the graph item belongs to.
 * @property integer $sortorder Position of the item in the graph.

  Default: 0.
 * @property integer $type Type of graph item.

  Possible values:
  0 - (default) simple;
  2 - graph sum, used only by pie and exploded graphs.
 * @property integer $yaxisside Side of the graph where the graph item's Y scale will be drawn.

  Possible values:
  0 - (default) left side;
  1 - right side.
 */
class GraphItem extends AbstractEntity
{
    /**
     * {@inheritdoc}
     */
    public function getIdKey()
    {
        return 'gitemid';
    }
}