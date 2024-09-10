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
        // Validate the request data
        $validated = request()->validate([
            'content' => 'required|min:5|max:1000',
            'category' => 'required'
        ]);

        $validated['user_id'] = auth()->id();

        // Create the feed entry in the database
        Feed::create([
            'content' => $validated['content'],
            'category_id' => $validated['category'],
            'user_id' => $validated['user_id']
        ]);

        // Redirect back to the feed with a success message
        return redirect()->route('feed')->with('success', 'Story has been shared successfully!');
    }


    public function destroy(Feed $feed)
    {
        if (auth()->id() !== $feed->user_id) {
            abort(404);
        }

        $feed->delete();

        return redirect()->route('feed')->with('success', 'Story has been deleted!');
    }

    public function edit(Feed $feed)
    {
        if (auth()->id() !== $feed->user_id) {
            abort(404);
        }

        $editing = true;
        $categories = Category::all()->sortBy('category_name');

        return view('contents.show', compact('feed', 'editing', 'categories'));
    }

    public function update(Feed $feed)
    {
        if (auth()->id() !== $feed->user_id) {
            abort(404);
        }

        // Validate the form data
        $validated = request()->validate([
            'content' => 'required|min:5|max:1000',
            'category' => 'required'
        ]);

        // Update the existing feed
        $feed->update([
            'content' => $validated['content'],
            'category_id' => $validated['category']
        ]);

        // Redirect back to the feed page with a success message
        return redirect()->route('feeds.show', $feed->id)->with('success', 'Story updated successfully!');
    }
}
