<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post )
    {
         $post = new Post();
        $request->validate(['content' => 'required|string']);
        $post->comments()->create(['content' => $request->content]);
        $post->user_id = Auth::id();
        $post->post_id = Post::id();
          $post->save();
        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}
