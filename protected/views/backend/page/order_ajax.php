<?php
echo get_ol($pages);

function get_ol ($array, $child = FALSE)
{
    $str = '';

    if (count($array)) {
        $str .= $child == FALSE ? '<ol class="sortable">' : '<ol>';

        foreach ($array as $item) {
            if ((isset($item->parent)) && ($child == FALSE)) {
                continue;
            }
            $str .= '<li id="list_' . $item->id .'">';
            $str .= '<div>' . $item->title .'</div>';

            // Do we have any children?
            if (isset($item->pages) && count($item->pages)) {
                $str .= get_ol($item->pages, TRUE);
            }

            $str .= '</li>' . PHP_EOL;
        }

        $str .= '</ol>' . PHP_EOL;
    }

    return $str;
}
?>

<script>
$(document).ready(function(){

    $('.sortable').nestedSortable({
        handle: 'div',
        items: 'li',
        toleranceElement: '> div',
        maxLevels: 2
    });

});
</script>