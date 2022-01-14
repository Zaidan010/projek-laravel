<div class="card text-white bg-dark mb-4">
  <div
    style="height:36em; background-size: cover; background-image: url('{{ asset('images/'.$thumbnail) }}');"
    class="card-img-top w-100"
  ></div>
  <div class="card-body">
    <h2 class="card-title">{{ $title }}</h2>
    @if($href !== '')
      <p class="card-text" dangerously>
        {!! \Illuminate\Support\Str::limit(strip_tags($description), $limit = 200, $end = '...') !!}
      </p>
      @else
      {!! $description !!}
    @endif
    <p class="card-text"><small class="text-muted">{{ $author }} - {{ $publishedAt }}</small></p>
    @if($href !== '')
      <a href="{{ $href }}" class="stretched-link"></a>
    @endisset
  </div>
</div>