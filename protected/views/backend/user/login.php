<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

?>

<h1>Вход</h1>

<div class="form">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'                     => 'login-form',
	'enableClientValidation' => true,
	'clientOptions'          => array(
		'validateOnSubmit' => true,
	),
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения.</p>

	<div class="input-field">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="input-field">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="input-field rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton('Войти', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
