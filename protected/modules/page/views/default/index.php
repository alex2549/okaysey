<?php if ($page->show_title == 1) : ?>
    <h1><?=$page->title?></h1>
<?php endif; ?>

<div>
    <?=$this->decodeWidgets($page->begin_body)?>
</div>
