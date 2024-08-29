<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categorie;

class CategoriesTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Categorie::create([
            'category_name' => 'Dessert',
        ]);
        Categorie::create([
            'category_name' => 'Appetizer',
        ]);
        Categorie::create([
            'category_name' => 'Main Course',
        ]);
        Categorie::create([
            'category_name' => 'Snack',
        ]);
        Categorie::create([
            'category_name' => 'Beverage',
        ]);
    }
}
