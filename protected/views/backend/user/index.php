<?php
/* @var $this UserController */
/* @var $model User */

$this->pageTitle = Yii::app()->name . ' - ' . 'Список пользователей';

$this->breadcrumbs=array(
    'Пользователи' => array('index'),
    'Список пользователей',
);

$this->menu = array(
    array(
        'label' => 'Добавить пользователя',
        'icon'  => 'plus',
        'url'   => array('create')
    ),
);

?>

<h1>Список пользователей</h1>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
    'block'     => true,
    'fade'      => true,
    'closeText' => '&times;',
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'               => 'type-of-article-grid',
    'dataProvider'     => $model->search(),
    'selectableRows'   => 0,
    'type'             => 'striped',
    'enablePagination' => false,
    'summaryText'      => false,
    // 'filter'        => $model,
    'columns'          => array(
        array(
            'name'        => 'username',
            'htmlOptions' => array('class' => 'user-username'),
            'type'        => 'html',
            'value'       => 'CHtml::link(CHtml::encode($data->username), array("update", "id" => $data->id))'
        ),
        array(
            'class'              => 'bootstrap.widgets.TbButtonColumn',
            'template'           => '{delete}',
            'deleteConfirmation' => "js:'Вы действительно хотите удалить пользователя ' + $(this).parents('tr').children('.user-username').text() + '?'",
            'buttons'            => array(
                'delete' => array(
                    'label' => 'Удалить',
                    'icon'  => 'remove',
                    'url'   => 'Yii::app()->createUrl("user/delete", array("id" => $data->id))',
                ),
            ),
        ),
    ),
)); ?>
