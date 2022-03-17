<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
  public function show(Post $post)
  {
    return view('post-show', compact('post'));
  }

  public function edit(Post $post)
  {
    return view('post-edit', compact('post'));
  }
}
