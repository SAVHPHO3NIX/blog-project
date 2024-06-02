<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $id){

        $comment = new Comment();
        $comment->post_id = $id->id;
        $comment->user_id = auth()->id();
        $comment->content = request()->get('content');
        $comment->save();

        return redirect()->route('posts.show',$id->id)->with('success', 'Comment created successfully!');
    }
}
