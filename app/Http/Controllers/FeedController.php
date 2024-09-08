<?php

namespace App\Http\Controllers;


use App\Models\Feed;
use Illuminate\Http\Request;
use App\Models\Category;

class FeedController extends Controller
{
    public function index()
    {
        $categoryIcons = [
            'Jajanan Asin' => 'fa-solid fa-hotdog fa-fw',
            'Minuman' => 'fa-solid fa-beer-mug-empty fa-fw',
            'Jajanan Manis' => 'fa-solid fa-ice-cream fa-fw',
            'Makanan Berat' => 'fa-solid fa-bowl-rice fa-fw',
        ];

        $feeds = Feed::orderBy('created_at', 'desc')->paginate(5);
        $categories = Category::all()->sortBy('category_name');

        return view("feed", compact('feeds', 'categories', 'categoryIcons')); // Pass the array to the view
    }
    public function feedcategory($name)
    {
        $category = Category::where('category_name', $name)->first();

        $categoryIcons = [
            'Jajanan Asin' => 'fa-solid fa-hotdog fa-fw',
            'Minuman' => 'fa-solid fa-beer-mug-empty fa-fw',
            'Jajanan Manis' => 'fa-solid fa-ice-cream fa-fw',
            'Makanan Berat' => 'fa-solid fa-bowl-rice fa-fw',
        ];

        $feeds = Feed::where('category_id', $category->id) -> orderBy('created_at', 'desc') -> paginate(5);
        $categories = Category::all()->sortBy('category_name');

        return view("feed", compact('feeds', 'categories', 'categoryIcons'));
    }
}
