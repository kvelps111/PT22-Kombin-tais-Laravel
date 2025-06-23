<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store()
    {
        $request->validate(['content' => 'required|string']);
        $post->comments()->create(['content' => $request->content]);
        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}
