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
        // Validate the request data, including limiting to 4 images
        $validated = request()->validate([
            'content' => 'required|min:5|max:1000',
            'category' => 'required',
            'images' => 'nullable|array|max:4', // Ensure that there are no more than 4 images
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048', // Ensure each file is an image and validate the size
        ]);

        $validated['user_id'] = auth()->id();

        // Store the image paths in an array
        $imagePaths = [];
        if (request()->hasFile('images')) {
            foreach (request()->file('images') as $image) {
                $imagePaths[] = $image->store('feeds', 'public'); // Store each image in the 'feeds' directory
            }
        }

        // Create the feed entry with image paths stored as JSON
        Feed::create([
            'content' => $validated['content'],
            'category_id' => $validated['category'],
            'user_id' => $validated['user_id'],
            'images' => json_encode($imagePaths), // Store images as JSON in the database
        ]);

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
