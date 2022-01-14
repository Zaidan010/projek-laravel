@props([
  'title' => '',
  'thumbnail' => '',
  'content' => '',
  'action' => '',
  'id' => '',
])

@push('styles')
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush

@if(session()->has('success'))
  <div class="alert alert-success">
      {{ session()->get('success') }}
  </div>
@endif
<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
  @if($id !== '')
    @method('PUT')
  @endif
  @csrf
  <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" value="{{ old('title') ?? $title }}" class="form-control @error('title') is-invalid @enderror" placeholder="Your post title">
    @error('title')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label>Thumbnail</label>
    @if($thumbnail !== '')
      <img src="{{ asset('images/' . $thumbnail) }}" class="img-fluid" />
    @endif
    <input type="file" name="thumbnail" value="{{ old('thumbnail') }}" class="form-control @error('thumbnail') is-invalid @enderror" placeholder="Your post thumbnail">
    @error('thumbnail')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label>Content</label>
    <textarea id="content" name="content" placeholder="Your post content" class="@error('content') is-invalid @enderror">{{ old('content') ?? $content }}</textarea>
    @error('content')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>
  <button type="submit" class="btn btn-success">Save</button>       
  @if($id !== '')
    <a onclick="return confirm('Do you want to delete this post?')" href="{{ route('user.post.delete', ['post' => $id]) }}" class="btn btn-danger">Delete Post</a>
  @endif
</form>


@push('scripts')  
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#content').summernote();
    });
  </script>
@endpush