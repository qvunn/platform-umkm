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

        $feeds = Feed::orderBy('created_at', 'DESC');

        // Search logic
        if (request()->has('search')) {
            $search = request()->get('search');
            $feeds = $feeds->where('content', 'like', '%' . $search . '%');
        }

        $feeds = $feeds->paginate(5); // Pagination after search logic
        $categories = Category::all()->sortBy('category_name');

        return view("feed", compact('feeds', 'categories', 'categoryIcons'));
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

        $feeds = Feed::where('category_id', $category->id)->orderBy('created_at', 'desc')->paginate(5);
        $categories = Category::all()->sortBy('category_name');

        return view("feed", compact('feeds', 'categories', 'categoryIcons'));
    }
}
