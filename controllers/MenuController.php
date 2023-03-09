<?php

namespace UrsacoreLab\Menu\Controllers;

use Backend\Classes\Controller;
use Backend\Facades\BackendMenu;

class MenuController extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
        \Backend\Behaviors\ReorderController::class,
    ];

    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('UrsacoreLab.Menu', 'menu', 'menucontroller');

        $this->addCss('/plugins/ursacorelab/staticvars/assets/ursacorelab_backend_styles.css');
        $this->bodyClass = 'ursacorelab_body';
    }
}
