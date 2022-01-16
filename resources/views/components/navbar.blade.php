<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="/">Public Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      @auth
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user.post.create') }} ">Create Post</a>
        </li>
        <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                 logout
              </a>
              <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                 {{ csrf_field() }}
              </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="@auth /user @else / @endauth">User Post</a>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/register">Register</a>
        </li>
      @endauth
    </ul>
    @auth  
    <form action="/user" method="GET" class="form-inline my-2 my-lg-0">
            <input type="search" name="search" value="{{ request()->get('search') }}" class="form-control mr-sm-2" type="search" placholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
       </form>
       @else
       <form action="/" method="GET" class="form-inline my-2 my-lg-0">
            <input type="search" name="search" value="{{ request()->get('search') }}" class="form-control mr-sm-2" type="search" placholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
       </form>
       @endauth
       
       
  </div>
</nav>