<?php

namespace Database\Seeders;

use App\Models\Admin;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Faker to generat dummy names.
        //$faker = Faker::create();

        Admin::create([
            'name'      =>  'Administration',
            'email'     =>  'admin@gmail.com',
            'password'  =>  bcrypt('leet-password'),
        ]);
    }
}
