<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Category::create([
            'category_name' => 'Jajanan Manis',
        ]);
        Category::create([
            'category_name' => 'Jajanan Asin',
        ]);
        Category::create([
            'category_name' => 'Makanan Berat',
        ]);
        Category::create([
            'category_name' => 'Minuman',
        ]);
    }
}
