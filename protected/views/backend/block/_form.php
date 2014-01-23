<?php
/* @var $this BlockController */
/* @var $model Block */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'                   => 'block-form',
	'enableAjaxValidation' => false,
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="input-field">
		<?php echo $form->labelEx($model,'slug'); ?>
		<?php echo $form->textField($model,'slug', array('class' => 'input-large')); ?>
		<?php echo $form->error($model,'slug'); ?>
	</div>

	<?php foreach (DMultilangHelper::suffixList() as $suffix => $lang) : ?>
	    <div class="input-field">
	        <?php echo $form->labelEx($model, 'body'); ?> <?php echo $lang; ?><br />
	        <?php echo $form->textArea(
			$model,
				'body' . $suffix,
				array(
					'rows'  => 6,
					'cols'  => 50,
					'class' => 'tinymce',
				)
			); ?>
	        <?php echo $form->error($model, 'body' . $suffix); ?>
	    </div>
	<?php endforeach; ?>

	<div class="buttons">
		<?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->