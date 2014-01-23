<?php if (count($pages)) : ?>
    <ul class="">
        <?php foreach ($pages as $page) : ?>
            <?php if ((isset($page->parent)) && ($child == false)) {
                continue;
            } ?>

            <?php $active = CHelper::segment(1) == $page->slug ? true : false; ?>

            <?php if (!isset($page->pages) || !count($page->pages)) : ?>
                <?=$active ? '<li class="active">' : '<li>'?>
                    <?='<a href="' . CHelper::buildUrl($page->slug) . '" title="' . $page->title . '">' . $page->title . '</a>'?>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
        </ul>
<?php endif; ?>
