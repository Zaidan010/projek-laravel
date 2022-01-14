@props([
  'title' => 'title',
  'subtitle' => 'subtitle',
  'description' => 'description',
])

<div class="jumbotron bg-dark text-white">
  <h1 class="display-4">{{ $title }}</h1>
  <p class="lead">{{ $subtitle }}</p>
  <hr class="my-4">
  <p>{{ $description }}</p>
  <!-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> -->
</div>