<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Feed;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view("post", [
            'feed' => Feed::orderBy('created_at', 'desc')->paginate(5),
            'categories' => Category::all()->sortBy('category_name')
        ]);
    }

    public function show(Feed $feed)
    {
        return view('contents.show', compact('feed'));
    }

    public function store()
    {
        request()->validate([
            'content' => 'required|min:5|max:1000',
            'category' => 'required'
        ]);

        $feed = Feed::create(
            [
                'content' => request()->get('content'),
                'category_id' => request()->get('category')
            ]
        );

        return redirect()->route('feed')->with('success', 'Story has been shared successfully!');
    }

    public function destroy(Feed $feed)
    {
        $feed->delete();

        return redirect()->route('feed')->with('success', 'Story has been deleted!');
    }

    public function edit(Feed $feed)
    {
        $editing = true;
        $categories = Category::all()->sortBy('category_name');

        return view('contents.show', compact('feed', 'editing', 'categories'));
    }

    public function update(Feed $feed)
    {
        // Validate the form data
        request()->validate([
            'content' => 'required|min:5|max:1000',
            'category' => 'required'
        ]);

        // Update the existing feed
        $feed->update([
            'content' => request()->get('content'),
            'category_id' => request()->get('category')
        ]);

        // Redirect back to the feed page with a success message
        return redirect()->route('feeds.show', $feed->id)->with('success', 'Story updated successfully!');
    }
}
