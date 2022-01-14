@extends('layouts.app')

@section('title')
User - Create Post
@endsection

@section('content')
  <div class="container mt-4">
    <div class="card text-white bg-dark">
      <div class="card-body">
        <h2 class="card-title">Create post</h2>
        <x-post-form
          :action="route('user.post.store')"
        />
      </div>
    </div>
  </div>
@endsection