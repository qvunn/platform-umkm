<?php

namespace App\Http\Controllers;


use App\Models\Feed;
use Illuminate\Http\Request;
use App\Models\Categorie;

class DashboardController extends Controller
{
    public function index()
    {
        return view("dashboard",[
            'feeds' => Feed::orderBy('created_at', 'desc')->paginate(5),
            'categories' => Categorie::all()->sortBy('category_name')
        ]);
    }
    public function feedcategory($name)
    {
        $category = Categorie::where('category_name', $name)->first();

        return view("dashboard",[
            'feeds' => Feed::where('category_id', $category->id)->orderBy('created_at', 'desc')->paginate(5),
            'categories' => Categorie::all()->sortBy('category_name')
        ]);
    }
}
