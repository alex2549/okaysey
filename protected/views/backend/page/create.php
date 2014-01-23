<?php
/* @var $this PageController */
/* @var $model Page */

$this->pageTitle = Yii::app()->name . ' - ' . 'Создать страницу';

$this->breadcrumbs = array(
    'Страницы' => array('index'),
    'Создать новую',
);

$this->menu = array(
    array(
        'label' => 'Список страниц',
        'icon'  => 'list',
        'url'   => array('index')
    ),
);
?>

<h1>Создать страницу</h1>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
    'block'     => true,
    'fade'      => true,
    'closeText' => '&times;',
)); ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>