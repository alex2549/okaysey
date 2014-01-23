<?php
function getMenu($pages, $child = false)
{
    $str = '';

    if (count($pages)) {
        if ($child == false) {
            $str .= '<ul class="nav navbar-nav">' . PHP_EOL;
        } else {
            $str .= '<ul class="dropdown-menu">' . PHP_EOL;
        }

        foreach ($pages as $page) {
            if ((isset($page->parent)) && ($child == false)) {
                continue;
            }

            $active = CHelper::segment(1) == $page->slug ? true : false;

            if (isset($page->pages) && count($page->pages)) {
                $str .= $active ? '<li class="dropdown active">' : '<li class="dropdown">';
                $str .= '<a class="dropdown-toggle" data-toggle="dropdown" href="' . Yii::app()->createUrl($page->slug) . '" title="' . $page->title . '">' . $page->title;
                $str .= '<b class="caret"></b></a>' . PHP_EOL;
                $str .= getMenu($page->pages, true);
            } else {
                $item_class = $page->menu_class;
                $str .= $active ? '<li class="active">' : '<li class="' . $page->menu_class . '">';
                $str .= '<a href="' . Yii::app()->createUrl($page->slug) . '" title="' . $page->title . '">' . $page->title . '</a>';
            }
            $str .= '</li>' . PHP_EOL;
        }

        $str .= '</ul>' . PHP_EOL;
    }

    return $str;
}

echo getMenu($pages);

?>