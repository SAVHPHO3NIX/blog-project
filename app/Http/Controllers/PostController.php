<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function show(Post $id){

        return view('posts.show', [
            'post' => $id
        ]);
    }

    public function store(){

        $validated = request()->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $validated['user_id'] = auth()->id();

        Post::create($validated);

        return redirect()->route('dashboard')->with('success', 'Post created successfully!');

    }

    public function destroy(Post $id){

        if(auth()->id()!== $id->user_id){
            return redirect()->route('dashboard')->with('error', 'Unauthorized action!');
        }
        $id->delete();

        return redirect()->route('dashboard')->with('success', 'Post deleted successfully!');

    }

    public function edit(Post $id){

        if(auth()->id()!== $id->user_id){
            return redirect()->route('dashboard')->with('error', 'Unauthorized action!');
        }

        $editing = true;
        return view('posts.show', [
            'post' => $id,
            'editing' => $editing
        ]);
    }

    public function update(Post $id){

        if(auth()->id()!== $id->user_id){
            return redirect()->route('dashboard')->with('error', 'Unauthorized action!');
        }

        $validated = request()->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $id->update($validated);

        return redirect()->route('posts.show',$id->id)->with('success', 'Post updated successfully!');
    }
}
