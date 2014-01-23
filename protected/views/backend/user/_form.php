<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'                   => 'user-form',
	'enableAjaxValidation' => true,
	'clientOptions'        => array(
    	'validateOnSubmit' => true,
    ),
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="input-field">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username', array('class' => 'input-large')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<?php if (empty($model->id)) : ?>
	<div class="input-field">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password', array('class' => 'input-large')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<?php endif; ?>

    <div>
        <?php echo $form->labelEx($model,'role'); ?>
        <?php echo $form->dropDownList($model, 'role', $model->roles); ?>
        <?php echo $form->error($model,'role'); ?>
    </div>

	<div class="buttons">
		<?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->