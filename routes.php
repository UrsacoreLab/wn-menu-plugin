<?php

use Illuminate\Support\Facades\Route;
use UrsacoreLab\Menu\Controllers\MenuController;

Route::prefix('api')->group(function () {
    Route::prefix('menus')->group(function () {
        Route::get('/', [MenuController::class, 'list']);
        Route::get('{slug}', [MenuController::class, 'getMenu']);
    });
});
