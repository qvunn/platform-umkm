<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Feed;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Feed $feed)
    {
        $comment = new Comment();
        $comment->feed_id = $feed->id;
        $comment->user_id = auth()->id();
        $comment->content = request()->content;
        $comment->save();

        return redirect()->route('feeds.show', $feed->id)->with('success', 'Comment has been posted!');
    }
}
