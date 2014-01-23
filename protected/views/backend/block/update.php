<?php
/* @var $this BlockController */
/* @var $model Block */

$this->pageTitle = Yii::app()->name . ' - ' . 'Редактировать блок "' . $model->slug . '"';

$this->breadcrumbs = array(
    'Страницы' => array('index'),
    '"' . $model->slug . '"' => array('update', 'id'=>$model->id),
);

$this->menu = array(
    array(
        'label' => 'Список блоков',
        'icon'  => 'list',
        'url'   => array('index')
    ),
    array(
        'label' => 'Создать блок',
        'icon'  => 'plus',
        'url'   => array('create')
    ),
    array(
        'label' => ($model->active == 1) ? 'Выключить блок' : 'Включить блок',
        'icon'  => ($model->active == 1) ? 'icon-off' : 'icon-ok',
        'url'   => ($model->active == 1) ? array('turnOff', 'id' => $model->id) : array('turnOn', 'id' => $model->id)
    ),
    array(
        'label' => 'Удалить блок',
        'icon'  => 'remove',
        'url'   => array('delete', 'id' => $model->id),
        'htmlOptions' => array(
            'confirm' => 'Вы действительно хотите удалить этот блок (' . $model->slug . ')?'
        ),
    )
);

?>

<h1>Редактировать блок "<?php echo $model->slug; ?>"</h1>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
    'block'     => true,
    'fade'      => true,
    'closeText' => '&times;',
)); ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
