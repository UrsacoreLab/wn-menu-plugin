<?php

namespace UrsacoreLab\Menu\Models;

use System\Behaviors\SettingsModel;
use Winter\Storm\Database\Model;

class MenuSettings extends Model
{
    /**
     * @var array Behaviors implemented by this model.
     */
    public $implement = [SettingsModel::class];

    /**
     * @var string Unique code
     */
    public $settingsCode = 'ursacorelab_menu_settings';

    /**
     * @var mixed Settings form field definitions
     */
    public $settingsFields = 'fields.yaml';
}
