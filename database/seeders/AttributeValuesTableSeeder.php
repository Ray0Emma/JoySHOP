<?php

namespace Database\Seeders;

use App\Models\AttributeValue;
use Illuminate\Database\Seeder;

class AttributeValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contenus = ['100ml', '200ml', '300ml'];
        $colors = ['noir', 'bleu', 'rouge', 'rose'];

        foreach ($contenus as $contenu)
        {
            AttributeValue::create([
                'attribute_id'      =>  1,
                'value'             =>  $contenus,
                'price'             =>  10,
            ]);
        }

        foreach ($colors as $color)
        {
            AttributeValue::create([
                'attribute_id'      =>  2,
                'value'             =>  $color,
                'price'             =>  10,
            ]);
        }

    }
}
