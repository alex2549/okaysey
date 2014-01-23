<?php
/* @var $this BlockController */
/* @var $model Block */

$this->pageTitle = Yii::app()->name . ' - ' . 'Список блоков';

$this->breadcrumbs=array(
    'Блоки'=>array('index'),
    'Список блоков',
);

$this->menu = array(
    array(
        'label' => 'Добавить блок',
        'icon'  => 'plus',
        'url'   => array('create')
    ),
);

?>

<h1>Блоки сайта</h1>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
    'block'     => true,
    'fade'      => true,
    'closeText' => '&times;',
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'               => 'block-grid',
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
            'name'        => 'slug',
            'htmlOptions' => array('class' => 'block-slug'),
            'type'        => 'html',
            'value'       => 'CHtml::link(CHtml::encode($data->slug), array("update", "id" => $data->id))'
        ),
        array(
            'class'              => 'bootstrap.widgets.TbButtonColumn',
            'template'           => '{delete}',
            'deleteConfirmation' => "js:'Вы действительно хотите удалить блок ' + $(this).parents('tr').children('.block-title').text() + '?'",
            'buttons'            => array(
                'delete' => array(
                    'label' => 'Удалить',
                    'icon'  => 'remove',
                    'url'   => 'Yii::app()->createUrl("block/delete", array("id" => $data->id))',
                ),
            ),
        ),
    ),
)); ?>
