<div data-control="toolbar">
    <a
        href="<?= Backend::url('UrsacoreLab/Menu/MenuController/create') ?>"
        class="btn btn-primary wn-icon-plus">
        <?= trans('ursacorelab.menu::lang.controller.create'); ?>
    </a>

    <button
        class="btn btn-danger wn-icon-trash-o"
        disabled="disabled"
        onclick="$(this).data('request-data', { checked: $('.control-list').listWidget('getChecked') })"
        data-request="onDelete"
        data-request-confirm="<?= e(trans('backend::lang.list.delete_selected_confirm')); ?>"
        data-trigger-action="enable"
        data-trigger=".control-list input[type=checkbox]"
        data-trigger-condition="checked"
        data-request-success="$(this).prop('disabled', 'disabled')"
        data-stripe-load-indicator>
        <?= e(trans('backend::lang.list.delete_selected')); ?>
    </button>

    <a
        href="<?= Backend::url('UrsacoreLab/Menu/MenuController/reorder') ?>"
        class="btn btn-primary wn-icon-sort">
        <?= trans('ursacorelab.menu::lang.controller.reorder.title'); ?>
    </a>
</div>
