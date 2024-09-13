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

    public function store()
    {
        // Validate the request data
        $validated = request()->validate([
            'content' => 'required|min:5|max:1000',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Ensure image validation
        ]);

        $validated['user_id'] = auth()->id();

        // Check if an image is uploaded
        if (request()->hasFile('image')) {
            $validated['image'] = request()->file('image')->store('feeds', 'public'); // Store image in the 'feeds' directory within 'public'
        }

        // Create the feed entry in the database
        Feed::create([
            'content' => $validated['content'],
            'category_id' => $validated['category'],
            'user_id' => $validated['user_id'],
            'image' => $validated['image'] ?? null // Store image path if uploaded, else null
        ]);

        // Redirect back to the feed with a success message
        return redirect()->route('feed')->with('success', 'Story has been shared successfully!');
    }



    public function show(Feed $feed)
    {
        return view('contents.show', compact('feed'));
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

    public function destroy(Feed $feed)
    {
        if (auth()->id() !== $feed->user_id) {
            abort(404);
        }

        $feed->delete();

        return redirect()->route('feed')->with('success', 'Story has been deleted!');
    }
}
