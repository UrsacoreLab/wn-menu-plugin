<?php

namespace UrsacoreLab\Menu\Models;

use Lang;
use UrsacoreLab\StaticVars\Classes\LinkTarget;
use UrsacoreLab\StaticVars\Classes\Statuses;
use Winter\Storm\Database\Model;
use Winter\Storm\Database\Traits\NestedTree;
use Winter\Storm\Database\Traits\Validation;

class Menu extends Model
{
    use Validation, NestedTree;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'ursacorelab_menus';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'title',
        'description',
        'slug',
        'is_external',
        'link_target',
        'status',
    ];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [
        'title'       => 'required|string',
        'description' => 'string|nullable',
        'slug'        => 'required|string',
        'is_external' => 'boolean',
        'link_target' => 'string',
        'status'      => 'integer',
    ];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [
        'title'       => 'string',
        'description' => 'string',
        'slug'        => 'string',
        'is_external' => 'boolean',
        'link_target' => 'string',
        'status'      => 'integer',
    ];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getStatusOptions(): array
    {
        return Statuses::short_list();
    }

    public function getIsExternalOptions(): array
    {
        return [
            0 => Lang::get("ursacorelab.menu::lang.models.external.0"),
            1 => Lang::get("ursacorelab.menu::lang.models.external.1"),
        ];
    }

    public function getLinkTargetOptions(): array
    {
        return LinkTarget::list();
    }
}
