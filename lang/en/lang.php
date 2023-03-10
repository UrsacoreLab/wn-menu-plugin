<?php

return [
    'plugin' => [
        'name'        => 'Menu',
        'description' => 'Manage site menu',
    ],

    'permissions' => [
        'access' => 'Access Menu permission',
    ],

    'models' => [
        'id'          => 'ID',
        'title'       => 'Title',
        'description' => 'Description',
        'slug'        => 'URL',
        'is_external' => 'External link?',
        'link_target' => 'Link target',
        'status'      => 'Status',
        'created_at'  => 'Created At',
        'updated_at'  => 'Updated At',

        'external' => [
            0 => 'No',
            1 => 'Yes',
        ],
    ],

    'controller' => [
        'label'        => 'Menu',
        'label_plural' => 'Menus',

        'create'   => 'Create menu item',
        'creating' => 'Creating',

        'save'   => 'Save menu item',
        'saving' => 'Saving',

        'update'   => 'Update menu item',
        'updating' => 'Updating',

        'deleting' => 'Deleting',
    ],

    'settings' => [
        'additional_parameter_show_for_list'   => 'Returned additional parameter "show" for menu list',
        'additional_parameter_show_for_single' => 'Returned additional parameter "show" for single menu',
    ],
];
