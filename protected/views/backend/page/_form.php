<?php
/* @var $this PageController */
/* @var $model Page */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'page-form',
	'enableAjaxValidation' => false,
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php foreach (DMultilangHelper::suffixList() as $suffix => $lang) : ?>
	    <div class="input-field">
	        <?php echo $form->labelEx($model, 'title'); ?> <?php echo $lang; ?><br />
	        <?php echo $form->textField($model, 'title' . $suffix, array('class' => 'input-large')); ?><br />
	        <?php echo $form->error($model, 'title' . $suffix); ?>
	    </div>
	<?php endforeach; ?>

    <div class="input-field">
        <?php echo $form->labelEx($model, 'slug'); ?>
        <?php echo $form->textField($model, 'slug', array('class' => 'input-large')); ?>
        <?php echo $form->error($model, 'slug'); ?>
    </div>

	<?php foreach (DMultilangHelper::suffixList() as $suffix => $lang) : ?>
	    <div class="input-field">
	        <?php echo $form->labelEx($model, 'begin_body'); ?> <?php echo $lang; ?><br />
	        <?php echo $form->textArea(
			$model,
				'begin_body' . $suffix,
				array(
					'rows'  => 6,
					'cols'  => 50,
					'class' => 'tinymce',
				)
			); ?>
	        <?php echo $form->error($model, 'begin_body' . $suffix); ?>
	    </div>
	<?php endforeach; ?>

	<?php foreach (DMultilangHelper::suffixList() as $suffix => $lang) : ?>
	    <div class="input-field">
	        <?php echo $form->labelEx($model, 'end_body'); ?> <?php echo $lang; ?><br />
	        <?php echo $form->textArea(
			$model,
				'end_body' . $suffix,
				array(
					'rows'  => 6,
					'cols'  => 50,
					'class' => 'tinymce',
				)
			); ?>
	        <?php echo $form->error($model, 'end_body' . $suffix); ?>
	    </div>
	<?php endforeach; ?>

	<div class="input-field">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php
			echo $form->dropDownList($model,'parent_id',
				CHtml::listData(
            		Page::model()->findAll(array('order' => '`order`')),
            		'id', 'title'
        		),
				array('empty' => 'Выберите страницу')
			);
		?>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="input-field">
		<?php echo $form->labelEx($model,'show_in_menu'); ?>
		<?php echo $form->dropDownList($model,'show_in_menu',
			array(0 => 'Нет', 1 => 'Да'),
			array('class' => 'span2')
		); ?>
		<?php echo $form->error($model,'show_in_menu'); ?>
	</div>

	<div class="input-field">
		<?php echo $form->labelEx($model,'menu_class'); ?>
		<?php echo $form->textField($model,'menu_class', array('class' => 'input-large')); ?>
		<?php echo $form->error($model,'menu_class'); ?>
	</div>

	<div class="input-field">
		<?php echo $form->labelEx($model,'show_title'); ?>
		<?php echo $form->dropDownList($model,'show_title',
			array(0 => 'Нет', 1 => 'Да'),
			array('class' => 'span2')
		); ?>
		<?php echo $form->error($model,'show_title'); ?>
	</div>

	<div class="input-field">
		<?php echo $form->labelEx($model,'template'); ?>
		<?php echo $form->textField($model,'template', array('class' => 'input-large')); ?>
		<?php echo $form->error($model,'template'); ?>
	</div>

	<div class="input-field">
		<?php echo $form->labelEx($model,'meta_index'); ?>
		<?php echo $form->dropDownList($model,'meta_index',
			array(0 => 'Нет', 1 => 'Да'),
			array('class' => 'span2')
		); ?>
		<?php echo $form->error($model,'meta_index'); ?>
	</div>

	<?php foreach (DMultilangHelper::suffixList() as $suffix => $lang) : ?>
	    <div class="input-field">
	        <?php echo $form->labelEx($model, 'meta_title'); ?> <?php echo $lang; ?><br />
	        <?php echo $form->textField($model, 'meta_title' . $suffix, array('class' => 'input-large')); ?><br />
	        <?php echo $form->error($model, 'meta_title' . $suffix); ?>
	    </div>
	<?php endforeach; ?>

	<?php foreach (DMultilangHelper::suffixList() as $suffix => $lang) : ?>
	    <div class="input-field">
	        <?php echo $form->labelEx($model, 'meta_description'); ?> <?php echo $lang; ?><br />
	        <?php echo $form->textArea($model, 'meta_description' . $suffix, array('class' => 'input-large')); ?><br />
	        <?php echo $form->error($model, 'meta_description' . $suffix); ?>
	    </div>
	<?php endforeach; ?>

	<?php foreach (DMultilangHelper::suffixList() as $suffix => $lang) : ?>
	    <div class="input-field">
	        <?php echo $form->labelEx($model, 'meta_keywords'); ?> <?php echo $lang; ?><br />
	        <?php echo $form->textArea($model, 'meta_keywords' . $suffix, array('class' => 'input-large')); ?><br />
	        <?php echo $form->error($model, 'meta_keywords' . $suffix); ?>
	    </div>
	<?php endforeach; ?>

	<div class="buttons">
		<?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->