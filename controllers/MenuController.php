<?php

namespace UrsacoreLab\Menu\Controllers;

use Backend\Classes\Controller;
use Backend\Facades\BackendMenu;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use UrsacoreLab\Menu\Models\Menu;
use UrsacoreLab\Menu\Models\MenuSettings;
use UrsacoreLab\Menu\Resources\MenuResource;
use UrsacoreLab\StaticVars\Classes\Additional;
use UrsacoreLab\StaticVars\Classes\Statuses;

class MenuController extends Controller
{
    protected bool $additional_parameter_show_for_list = false;

    protected bool $additional_parameter_show_for_single = false;

    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
        \Backend\Behaviors\ReorderController::class,
    ];

    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        $this->additional_parameter_show_for_list   = (boolean) MenuSettings::instance()->additional_parameter_show_for_list;
        $this->additional_parameter_show_for_single = (boolean) MenuSettings::instance()->additional_parameter_show_for_single;

        parent::__construct();

        BackendMenu::setContext('UrsacoreLab.Menu', 'menu', 'menucontroller');

        $this->addCss('/plugins/ursacorelab/staticvars/assets/ursacorelab_backend_styles.css');
        $this->bodyClass = 'ursacorelab_body';
    }

    public function list(): AnonymousResourceCollection
    {
        $data = Menu::query()
            ->where('status', Statuses::ACTIVE)
            ->where('parent_id', null)
            ->orderBy('nest_left')
            ->get();

        return MenuResource::collection($data)
            ->additional(
                $data->isEmpty()
                    ?
                    Additional::warning($this->additional_parameter_show_for_list)
                    :
                    Additional::success($this->additional_parameter_show_for_list, null, 'statuses.synced')
            );
    }

    public function getMenu($id): MenuResource|array
    {
        $data = Menu::query()
            ->where('id', $id)
            ->where('status', Statuses::ACTIVE)
            ->orderBy('nest_left')
            ->first();

        if (empty($data)) {
            return Additional::error($this->additional_parameter_show_for_single);
        }

        return MenuResource::make($data)
            ->additional(Additional::success($this->additional_parameter_show_for_single, null, 'statuses.synced'));
    }
}
