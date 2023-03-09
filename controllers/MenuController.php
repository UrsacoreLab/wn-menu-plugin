<?php

namespace UrsacoreLab\Menu\Controllers;

use Backend\Classes\Controller;
use Backend\Facades\BackendMenu;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use UrsacoreLab\Menu\Models\Menu;
use UrsacoreLab\Menu\Resources\MenuResource;
use UrsacoreLab\StaticVars\Classes\Additional;
use UrsacoreLab\StaticVars\Classes\Statuses;

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

    public function list(): AnonymousResourceCollection
    {
        $debug = config('app.debug'); // If APP_DEBUG = true - show additional information on Frontend

        $data = Menu::query()
            ->where('status', Statuses::ACTIVE)
            ->where('parent_id', null)
            ->orderBy('nest_left')
            ->get();

        return MenuResource::collection($data)
            ->additional(
                $data->isEmpty()
                    ?
                    Additional::warning($debug)
                    :
                    Additional::success($debug, null, 'statuses.synced')
            );
    }

    public function getMenu($id): MenuResource|array
    {
        $debug = config('app.debug'); // If APP_DEBUG = true - show additional information on Frontend

        $data = Menu::query()
            ->where('id', $id)
            ->where('status', Statuses::ACTIVE)
            ->orderBy('nest_left')
            ->first();

        if (empty($data)) {
            return Additional::error($debug);
        }

        return MenuResource::make($data)
            ->additional(Additional::success($debug, null, 'statuses.synced'));
    }
}
