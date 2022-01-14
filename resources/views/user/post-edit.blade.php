@extends('layouts.app')

@section('title')
User - Edit Post - {{ $post->title }}
@endsection

@section('content')
  <div class="container mt-4">
    <div class="card text-white bg-dark">
      <div class="card-body">
        <h2 class="card-title">Edit post</h2>
        <x-post-form
          :action="route('user.post.update', ['post' => $post->id])"
          :title="$post->title"
          :thumbnail="$post->thumbnail"
          :content="$post->content"
          :id="$post->id"
        />
      </div>
    </div>
  </div>
@endsection