<?php
/* @var $this UserController */
/* @var $model User */

$this->pageTitle = Yii::app()->name . ' - ' . 'Редактировать пользователя "' . $model->username . '"';

$this->breadcrumbs = array(
    'Пользователи' => array('index'),
    $model->username => array('update', 'id'=>$model->id),
    'Редактировать'
);

$this->menu = array(
    array(
        'label' => 'Список пользователей',
        'icon'  => 'list',
        'url'   => array('index')
    ),
    array(
        'label' => 'Создать ползователя',
        'icon'  => 'plus',
        'url'   => array('create')
    ),
    array(
        'label' => 'Сменить пароль',
        'icon'  => 'lock',
        'url'   => array('user/changepassword&id=' . $model->id),
    ),
    array(
        'label' => 'Удалить пользователя',
        'icon'  => 'remove',
        'url'   => array('delete', 'id' => $model->id),
        'htmlOptions' => array(
            'confirm' => 'Вы действительно хотите удалить этого пользователя (' . $model->username . ')?'
        ),
    ),
);

?>

<h1>Редактировать пользователя "<?php echo $model->username; ?>"</h1>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
    'block'     => true,
    'fade'      => true,
    'closeText' => '&times;',
)); ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>