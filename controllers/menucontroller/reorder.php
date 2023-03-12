<?php
Block::put('breadcrumb') ?>
<ul>
    <li>
        <a href="<?= Backend::url('UrsacoreLab/Menu/MenuController') ?>">
            <?= e(trans('ursacorelab.menu::lang.controller.label_plural')); ?>
        </a>
    </li>
    <li><?= e($this->pageTitle) ?></li>
</ul>
<?php
Block::endPut() ?>

<?= $this->reorderRender() ?>
