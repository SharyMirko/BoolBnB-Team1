<header class="fixed-top">
   <div class="container-fluid px-4 py-lg-0">
      <nav class="navbar navbar-expand-md navbar-light bg-light py-4 py-md-0 align-items-stretch">

         <a class="navbar-brand text-dark align-self-center" href="{{ route('LandingPage') }}">
            <img src="{{ asset('img/logo_light.svg') }}" alt="BoolBnB" class="logo">
         </a>

         <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
               data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
               aria-label="{{ __('Toggle navigation') }}">
               <span class="navbar-toggler-icon"></span>
         </button>

         <div class="navbar-collapse align-items-stretch my-3 my-md-0 collapse show" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto align-items-center">
               <li class="nav-item ">
                  <a class="nav-link nav-link-personal" href="{{ route('LandingPage') }}">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link nav-link-personal" href="#">About</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link nav-link-personal" href="#">Contact</a>
               </li>
               <!-- Authentication Links -->
               @guest
                  <li class="nav-item">
                       <a class="nav-link nav-link-personal" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                     <li class="nav-item my-sm-3 my-md-0">
                        <a class="btn btn-primary" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                     </li>
                  @endif
               @else
                  <li class="nav-item d-block dropdown">
                     {{-- posts btn --}}
                     <a href="#!" aria-controls="posts" class="btn btn-light me-2">My posts</a>
                  </li>
                  <li class="nav-item d-block dropdown">
                     {{-- categories btn --}}
                     <a href="#!" aria-controls="categories" class="btn btn-light me-2">Categories</a>
                  </li>
                  <li class="nav-item dropdown">
                     <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                     </a>

                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        {{-- dashboard --}}
                        <a class="dropdown-item" href="#!">
                           {{ __('My dashboard') }}
                        </a>

                        {{-- logout --}}
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                                                                      document.getElementById('logout-form').submit();">
                           {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                           class="d-none">
                           @csrf
                        </form>

                     </div>
                  </li>
               @endguest
            </ul>
         </div>
      </nav>
   </div>
</header>
