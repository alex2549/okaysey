<?php
/* @var $this PageController */
/* @var $model Page */

$this->pageTitle = Yii::app()->name . ' - ' . 'Список страниц';

$this->breadcrumbs=array(
    'Страницы'=>array('index'),
    'Список страниц',
);

$this->menu = array(
    array(
        'label' => 'Добавить страницу',
        'icon'  => 'plus',
        'url'   => array('create')
    ),
    array(
        'label' => 'Сортировать страницы',
        'icon'  => 'move',
        'url'   => array('order')
    ),
);

?>

<h1>Страницы сайта</h1>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
    'block'     => true,
    'fade'      => true,
    'closeText' => '&times;',
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'               => 'page-grid',
    'dataProvider'     => $model->search(),
    'selectableRows'   => 0,
    'rowCssClassExpression' => '($data->active == 1) ? "row-on" : "row-off"',
    'type'                  => 'striped',
    'columns'               => array(
        array(
            'class'               => 'DataColumn',
            'evaluateHtmlOptions' => true,
            'type'        => 'html',
            'htmlOptions'         => array(
                'class' => '($data->active == 1) ? "td-active" : "td-inactive"',
                'title' => '($data->active == 1) ? "Выключить" : "Включить"',
            ),
            'value'       => 'CHtml::link(($data->active == 1) ? "<i class=\'icon-off\'></i>" : "<i class=\'icon-play\'></i>", array(($data->active == 1) ? "turnOff" : "turnOn", "id" => $data->id))',
        ),
        array(
            'name'        => 'title',
            'htmlOptions' => array('class' => 'page-title'),
            'type'        => 'html',
            'value'       => 'CHtml::link(CHtml::encode($data->title), array("update", "id" => $data->id))'
        ),
        'slug',
        array(
            'name'        => 'parent_id',
            'type'        => 'html',
            'value'       => 'empty($data->parent_id) ? "" : "$data->parent_id->title"',
        ),
        array(
            'class'              => 'bootstrap.widgets.TbButtonColumn',
            'template'           => '{delete}',
            'deleteConfirmation' => "js:'Вы действительно хотите удалить станицу ' + $(this).parents('tr').children('.page-title').text() + '?'",
            'buttons'            => array(
                'delete' => array(
                    'visible' => '$data->undeletable == 0',
                    'label' => 'Удалить',
                    'icon'  => 'remove',
                    'url'   => 'Yii::app()->createUrl("page/delete", array("id" => $data->id))',
                ),
            ),
        ),
    ),
)); ?>
