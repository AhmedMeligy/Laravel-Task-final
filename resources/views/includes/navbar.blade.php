<nav class="navbar navbar-expand-lg navbar-dark bg-dark fs-5">
  <a class="navbar-brand fs-1" href="#">Laravel</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('welcome') }}">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Users
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item {{ request()->is('users') ? 'active' : '' }}" href="{{ route('users.index') }}">List</a>
          <a class="dropdown-item {{ request()->is('users/create') ? 'active' : '' }}" href="{{ route('users.create') }}">New User</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Posts
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item {{ request()->is('posts') ? 'active' : '' }}" href="{{ route('posts.index') }}">List</a>
          <a class="dropdown-item {{ request()->is('posts/create') ? 'active' : '' }}" href="{{ route('posts.create') }}">New Post</a>
        </div>
      </li>
    </ul>
  </div>
  @guest
    <a href="{{ route('login') }}">Login</a>
    <a href="{{ route('register') }}">Register</a>
@else
    <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
        Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
@endguest
</nav>
