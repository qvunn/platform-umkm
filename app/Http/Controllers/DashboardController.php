<?php

namespace App\Http\Controllers;


use App\Models\Feed;
use Illuminate\Http\Request;
use App\Models\Categorie;

class DashboardController extends Controller
{
    public function index()
    {
        $categoryIcons = [
            'Appetizer' => 'fa-solid fa-hotdog fa-fw',
            'Beverage' => 'fa-solid fa-beer-mug-empty fa-fw',
            'Dessert' => 'fa-solid fa-ice-cream fa-fw',
            'Snack' => 'fa-solid fa-cookie fa-fw',
            'Main Course' => 'fa-solid fa-bowl-rice fa-fw',
        ];

        $feeds = Feed::orderBy('created_at', 'desc')->paginate(5);
        $categories = Categorie::all()->sortBy('category_name');

        return view("dashboard", compact('feeds', 'categories', 'categoryIcons')); // Pass the array to the view
    }
    public function feedcategory($name)
    {
        $category = Categorie::where('category_name', $name)->first();

        $categoryIcons = [
            'Appetizer' => 'fa-solid fa-hotdog fa-fw',
            'Beverage' => 'fa-solid fa-beer-mug-empty fa-fw',
            'Dessert' => 'fa-solid fa-ice-cream fa-fw',
            'Snack' => 'fa-solid fa-cookie fa-fw',
            'Main Course' => 'fa-solid fa-bowl-rice fa-fw',
        ];

        $feeds = Feed::where('category_id', $category->id) -> orderBy('created_at', 'desc') -> paginate(5);
        $categories = Categorie::all()->sortBy('category_name');

        return view("dashboard", compact('feeds', 'categories', 'categoryIcons'));
    }
}
