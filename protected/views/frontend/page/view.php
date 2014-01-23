<?php
/* @var $this PageController */
/* @var $model Page */

if (isset($parent->id)) {
    $this->breadcrumbs = array(
        $parent->title => CHelper::buildUrl($parent->slug),
    );
}

$this->breadcrumbs[] = $model->title;

?>

<h1><?=$model->title?></h1>

<div class="body"><?=$this->decodeWidgets($model->body)?></div>
