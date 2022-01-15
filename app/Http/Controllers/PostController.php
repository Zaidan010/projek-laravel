<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('search');
        if($q) {
          $posts = Post::where('title', 'LIKE', '%' . $q . '%')
                ->orWhere('content', 'LIKE', '%' . $q . '%')
                 ->orderBy('id', 'desc')->paginate(5);
        } else {
          $posts = Post::orderBy('id', 'desc')->paginate(5);
        }       
          
          return view('home.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.post-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->save(new Post, $request);
      return back()->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('home.post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('user.post-edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      $this->save($post, $request);
      return back()->with('success', 'Post updated successfully.');
    }

    private function save(Post $post, Request $request) {
      $request->validate([
        'title' => ['required', 'max:255'],
        'content' => ['required'],
        'thumbnail' => ['sometimes', 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
      ]);

      if ($request->file('thumbnail')) {
        $imagePath = $request->file('thumbnail');
        $uuid = Str::uuid()->toString();
        $imageName = $uuid . '-' . $imagePath->getClientOriginalName();
        $request->thumbnail->move(public_path('images'), $imageName);
        $post->thumbnail = $imageName;
      }
      
      $post->title = $request->input('title');
      $post->content = $request->input('content');      
      $post->user_id = auth()->user()->id;
      $post->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $image_path = "/images/" . $post->thumbnail;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $post->delete();
        return redirect('user');
    }
}
