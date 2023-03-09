<?php

namespace UrsacoreLab\Menu\Updates;

use UrsacoreLab\Menu\Models\Menu;
use Winter\Storm\Database\Updates\Seeder;

class SeedMenuTable extends Seeder
{
    public function run()
    {
        $main = Menu::query()
            ->create([
                'title' => 'Главное меню',
                'slug'  => 'main',
            ]);

        $main->children()->create([
            'title' => 'Главная',
            'slug'  => '/',
        ]);
    }
}
