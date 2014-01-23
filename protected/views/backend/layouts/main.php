<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="robots" content="none">

    <?php Yii::app()->clientScript->registerPackage('jquery'); ?>

    <?php Yii::app()->bootstrap->register(); ?>

    <?php Yii::app()->clientScript->registerPackage('jquery-ui'); ?>
    <?php Yii::app()->clientScript->registerPackage('my-admin-js'); ?>
    <?php Yii::app()->clientScript->registerPackage('my-admin-css'); ?>

    <?php if ($this->loginPage === false) : ?>
        <?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-ui-1.10.2.custom.min.js'); ?>
        <?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.mjs.nestedSortable.js'); ?>
        <?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/js/admin.js'); ?>
    <?php endif; ?>

    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin.css" rel="stylesheet">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<?php if ($this->loginPage === false) : ?>
    <?php $this->widget('AdminMainMenu')?>
<?php endif; ?>

<div class="container-fluid" id="page">

<?php if ($this->loginPage === false) : ?>

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

<?php endif; ?>

	<?php echo $content; ?>

	<div class="clear"></div>

</div><!-- page -->

</body>

<?php if ($this->loginPage === false) : ?>
<!-- TinyMCE -->
<script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        mode : "specific_textareas",
        editor_selector : "tinymce",
        editor_deselector : "no-tinymce",

        content_css : "<?=Yii::app()->getBaseUrl(true)?>/css/bootstrap.min.css, <?=Yii::app()->getBaseUrl(true)?>/css/styles.css",

        plugins: [
          "advlist autolink lists link image charmap print preview anchor",
          "searchreplace visualblocks code fullscreen",
          "textcolor",
          "insertdatetime media table contextmenu paste jbimages"
        ],

        toolbar: "insertfile undo redo | forecolor backcolor | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages | code",

        relative_urls: true,
        valid_elements : '*[*]'

    });
</script>
<!-- /TinyMCE -->
<?php endif; ?>

</html>
