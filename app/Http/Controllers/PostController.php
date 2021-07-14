<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postInsert(Request $request){
        $request->validate([
            'name' => ['required', 'min:5'],
            'content' => ['min:15', 'nullable'],
            'link' => ['min:5', 'nullable'],
            'filename' => ['mimes:jpeg,png,pdf']
        ]);

        $fileName = null;
        if ($request->file('filename')) {
            $fileName = time() . '_' . $request->filename->getClientOriginalName();
            $request->file('filename')->storeAs('file', $fileName, 'public');
        }

        $post = Post::create([
            'name' => $request->name,
            'content' => $request->content,
            'link' => $request->link,
            'filename' => $fileName
        ]);

        return redirect()->route('home')->with([
            'success' => 'Post has been created!',
        ]);
    }

    public function getAllPost(){
        $Posts = Post::latest()->get();
        return view('home', compact('Posts'));
    }
}
