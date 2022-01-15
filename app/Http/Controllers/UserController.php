<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class UserController extends Controller
{
    public function index(Request $request) {
      $q = $request->get('search');
      if($q) {
          $posts = Post::where('user_id', auth()->user()->id)
          ->where(function($builder) use ($q) {
              $builder->where('title', 'LIKE', '%' . $q . '%');
              $builder->orWhere('content', 'LIKE', '%' . $q . '%');
          })->orderBy('id', 'desc')->paginate(5);
            } else {
               
                $posts = Post::where('user_id', auth()->user()->id)
                ->orderBy('id', 'desc')
                ->paginate(5);
            }
        return view('user.index', compact('posts'));
    }
}
