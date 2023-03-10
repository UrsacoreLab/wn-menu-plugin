<?php

namespace UrsacoreLab\Menu;

use Backend\Facades\Backend;
use Backend\Models\UserRole;
use System\Classes\PluginBase;
use UrsacoreLab\Menu\Models\MenuSettings;

class Plugin extends PluginBase
{
    public $require = ['UrsacoreLab.StaticVars'];

    public function pluginDetails(): array
    {
        return [
            'name'        => 'ursacorelab.menu::lang.plugin.name',
            'description' => 'ursacorelab.menu::lang.plugin.description',
            'author'      => 'UrsacoreLab',
            'icon'        => 'icon-leaf',
        ];
    }

    public function registerPermissions(): array
    {
        return [
            'ursacorelab.menu.access' => [
                'tab'   => 'ursacorelab.menu::lang.plugin.name',
                'label' => 'ursacorelab.menu::lang.permissions.access',
                'roles' => [UserRole::CODE_DEVELOPER, UserRole::CODE_PUBLISHER],
            ],
        ];
    }

    public function registerNavigation(): array
    {
        return [
            'menu' => [
                'label'       => 'ursacorelab.menu::lang.plugin.name',
                'url'         => Backend::url('UrsacoreLab/Menu/MenuController'),
                'icon'        => 'icon-leaf',
                'iconSvg'     => 'plugins/ursacorelab/menu/assets/icon_ursacorelab_menu.svg',
                'permissions' => ['ursacorelab.menu.access'],
                'order'       => 500,
            ],
        ];
    }

    public function registerSettings(): array
    {
        return [
            'value' => [
                'label'       => 'ursacorelab.menu::lang.plugin.name',
                'description' => 'ursacorelab.menu::lang.plugin.description',
                'category'    => 'UrsacoreLab',
                'icon'        => 'icon-cogs',
                'class'       => MenuSettings::class,
                'order'       => 500,
                'keywords'    => '',
                'permissions' => ['ursacorelab.menu.access'],
            ],
        ];
    }
}
