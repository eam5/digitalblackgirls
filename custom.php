<?php

require_once dirname(__FILE__) . '/functions.php';


// return item type selection dropdown
// @todo: this is going to return some empty results if other query params are set
// i.e. the totals only represent all items of a type, not items of a type within a subset of items being queried
function ob_item_type_selection($showcount = false, $options=null, $html=null)
{
    $totalRecords = intval(total_records('Item'));
    $withItemType = 0;
    $types = get_records('ItemType');
    foreach ($types as $type) {
        if ($type->totalItems()) {
            $withItemType += $type->totalItems();
            $count = $showcount ? '('.$type->totalItems().')' : null;
            $options .= '<option value="'.$type->id.'">'.$type->name.' '.$count.'</option>';
        }
    }
    $count = $showcount ? '('.($totalRecords - $withItemType).')' : null;
    $options .= '<option value="0">'.__("Other").' '.$count.'</option>';
    $html .= '<div id="item-type-selection">';
    $html .= '<select onchange="item_type_filter();">';
    $html .= '<option>'.__('Filter by Item Type').'</option>'.$options;
    $html .= '</select>';
    $html .= '</div>';
    return $html;
}