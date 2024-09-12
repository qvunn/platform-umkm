<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Feed;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Feed $feed)
    {
        // Validate the request
        $validated = request()->validate([
            'content' => 'required|min:5|max:500',
        ]);

        // Create and save the new comment
        $comment = new Comment();
        $comment->feed_id = $feed->id;
        $comment->user_id = auth()->id();
        $comment->content = $validated['content']; // Use the validated content
        $comment->save();

        return redirect()->route('feeds.show', $feed->id)->with('success', 'Comment has been posted!');
    }
}
