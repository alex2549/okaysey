<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

    <div class="container">

        <?php if ($this->page->show_title == 1) : ?>
            <h1><?=$this->page->title?></h1>
        <?php endif; ?>

        <div>
            <?=$this->decodeWidgets($this->page->begin_body)?>
        </div>

        <?php echo $content; ?>

        <div>
            <?=$this->decodeWidgets($this->page->end_body)?>
        </div>

    </div>

<?php $this->endContent(); ?>