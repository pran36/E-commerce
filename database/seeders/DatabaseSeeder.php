<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\products;
use App\Models\category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // \App\Models\User::factory(10)->create();
       $category = category::create([
        'category_name' => 'cup',
        'category_desc' => 'This category contains cup',
       ]);
       products::factory(5)->create(
       );
    }
}
