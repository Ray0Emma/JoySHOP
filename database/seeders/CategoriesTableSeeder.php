<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create([
            'name'          =>  'Root',
            'description'   =>  'Ceci est la catégorie racine, ne supprimez pas celle-ci',
            'parent_id'     =>  null,
            'menu'          =>  0,
        ]);

        Category::factory()->count(10)->create();
    }
}
