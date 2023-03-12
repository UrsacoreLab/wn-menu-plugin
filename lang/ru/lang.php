<?php

return [
    'plugin' => [
        'name'        => 'Меню',
        'description' => 'Управление меню сайта',
    ],

    'permissions' => [
        'access' => 'Доступ к плагину Меню',
    ],

    'models' => [
        'id'          => 'ID',
        'title'       => 'Заголовок',
        'description' => 'Описание',
        'slug'        => 'URL',
        'is_external' => 'Внешняя ссылка?',
        'link_target' => 'Цель ссылки',
        'status'      => 'Статус',
        'created_at'  => 'Создано',
        'updated_at'  => 'Обновлено',

        'external' => [
            0 => 'Нет',
            1 => 'Да',
        ],
    ],

    'controller' => [
        'label'        => 'Меню',
        'label_plural' => 'Меню',

        'create'   => 'Добавить пункт меню',
        'creating' => 'Добавление',

        'save'   => 'Сохранить пункт меню',
        'saving' => 'Сохранение',

        'update'   => 'Редактировать пункт меню',
        'updating' => 'Обновление',

        'deleting' => 'Удаление',
    ],
];
