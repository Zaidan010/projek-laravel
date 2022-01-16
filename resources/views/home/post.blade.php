@extends('layouts.app')

@section('title')
Post - {{ $post->title }}
@endsection

@section('content')
  <div class="container mt-4">
    <x-post
      :title="$post->title"
      :author="$post->user->name"
      :thumbnail="$post->thumbnail"
      :description="$post->content"
      :published-at="$post->created_at"
      href=""
    />
    
    

    <hr>

<!-- Comments Form -->
@auth @include('partials.comment-form') @endauth

<h3>Comments</h3>

<hr>

@if($post->comments->isNotEmpty()) 

    @foreach ($post->comments as $comment)

        @include('partials.comment')

    @endforeach

@endif
  
  </div>
  

@endsection
