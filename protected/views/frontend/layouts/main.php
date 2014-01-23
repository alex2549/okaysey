<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">

    <?php if ($this->pageIndex != 1) : ?>
    <meta name="robots" content="none">
    <?php endif; ?>

    <!--[if lte IE 9]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->

    <?php Yii::app()->clientScript->registerPackage('jquery'); ?>
    <?php Yii::app()->clientScript->registerPackage('bootstrap3'); ?>
    <?php Yii::app()->clientScript->registerPackage('my-css'); ?>
    <?php Yii::app()->clientScript->registerPackage('my-js'); ?>

    <meta name="description" content='<?php echo CHtml::encode($this->pageDescription); ?>'>
    <meta name="keywords" content='<?php echo CHtml::encode($this->pageKeywords); ?>'>

    <link rel="icon" href="<?=CHelper::buildUrl('favicon.ico', false)?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?=CHelper::buildUrl('favicon.ico', false)?>" type="image/x-icon">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-47165909-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<body>

    <?=isset($this->block['nav']) ? $this->decodeWidgets($this->block['nav']) : ''?>

	<?php echo $content; ?>

    <?=isset($this->block['footer']) ? $this->decodeWidgets($this->block['footer']) : ''?>

<!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter2667448 = new Ya.Metrika({id:2667448, clickmap:true, trackLinks:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/2667448" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->

</body>


</html>

