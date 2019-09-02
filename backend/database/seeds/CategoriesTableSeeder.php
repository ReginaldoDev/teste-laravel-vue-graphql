<?php

use App\Category;
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
        
        Category::create([
            'name' => 'Categoria1'
        ]);

        Category::create([
            'name' => 'Categoria2'
        ]);

        Category::create([
            'name' => 'Categoria3'
        ]);

        Category::create([
            'name' => 'Categoria4'
        ]);

        Category::create([
            'name' => 'Categoria5'
        ]);

        Category::create([
            'name' => 'Categoria6'
        ]);
    }
}
