<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Feed;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view("post",[
            'feeds' => Feed::orderBy('created_at', 'desc')->paginate(5),
            'categories' => Categorie::all()->sortBy('category_name')
        ]);
    }
    public function store()
    {
        request()->validate([
            'story' => 'required|min:5|max:1000',
            'category' => 'required'
        ]);

        $feeds = Feed::create(
            [
                'contents' => request()->get('story', ''),
                'category_id' => request()->get('category')
            ]
        );

        return redirect()->route('dashboard')->with('success', 'Story successfully shared!!!');
    }

    public function destroy($id){
        $feed = Feed::where('id', $id)->firstOrFail()->delete();

        return redirect()->route('dashboard')->with('success', 'Story has been deleted!!!');
    }
}
