<header class="fixed-top">
   <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
      <div class="container">

         <a class="navbar-brand" href="{{ route('guestsHome') }}">
            {{ config('app.name', 'Laravel') }}
         </a>

         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
               <!-- Authentication Links -->
               @guest
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                     </li>
                  @endif
               @else
                  <li class="nav-item d-block dropdown">
                     {{-- posts btn --}}
                     <a href="{{ route('admin.posts.index') }}" aria-controls="posts" class="btn btn-light me-2">My posts</a>
                  </li>
                  <li class="nav-item d-block dropdown">
                     {{-- categories btn --}}
                     <a href="{{ route('admin.categories.index') }}" aria-controls="categories" class="btn btn-light me-2">Categories</a>
                  </li>
                  <li class="nav-item dropdown">
                     <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                     </a>

                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        {{-- dashboard --}}
                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                           {{ __('My dashboard') }}
                        </a>

                        {{-- logout --}}
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                           {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                           @csrf
                        </form>

                     </div>
                  </li>
               @endguest
            </ul>
         </div>
      </div>
   </nav>
</header>
