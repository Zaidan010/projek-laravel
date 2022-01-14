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
  </div>
@endsection
