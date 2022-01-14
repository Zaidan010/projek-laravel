<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class UserController extends Controller
{
    public function index(Request $request) {
      
        $posts = Post::where('user_id', auth()->user()->id)
                ->orderBy('id', 'desc')
                ->paginate(5);
      
      return view('user.index', compact('posts'));
    }
}
