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

            <div class="navbar-collapse align-items-stretch collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto align-items-center mt-3  mt-md-0">
                    <li class="nav-item ">
                        <a class="nav-link nav-link-personal" href="{{ route('apartments.index') }}">Cerca</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-personal" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-personal" href="#">Contatti</a>
                    </li>

                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-link-personal" data-bs-toggle="modal"
                                data-bs-target="#loginModal">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item mt-3 my-md-0">
                                <button class="btn btn-primary text-light" data-bs-toggle="modal"
                                    data-bs-target="#registerModal">{{ __('Register') }}</button>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown mt-3 my-md-0">
                            <a id="navbarDropdown"
                                class="btn btn-primary dropdown-toggle text-white fw-bold text-upppercase" href="#"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ substr(Auth::user()->first_name, 0, 1) }}{{ substr(Auth::user()->last_name, 0, 1) }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                                id="dropdownAuth">

                                 {{-- dashboard --}}
                                 <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                    {{ __('Dashboard') }}
                                 </a>

                                 {{-- aggiungi appartaemnto --}}
                                 <a class="dropdown-item" href="{{ route('admin.apartments.create') }}">
                                    {{ __('Add apartments') }}
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
        </nav>
    </div>
</header>







<!-- Modal Login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-3 overflow-hidden">

            <div class="modal-body d-flex p-0">
                <img src="{{ asset('img/login_img.jpg') }}" alt="Login" class="d-none d-lg-block img-fluid w-50">

                <div class="d-flex flex-column p-3 flex-grow-1">
                    <div class="text-end">
                        <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                    </div>

                    <form method="POST" action="{{ route('login') }}"
                        class="flex-grow-1 px-3 pb-3 rounded-0 d-flex flex-column justify-content-center">
                        @csrf

                        <div class="form-group row mb-2 text-center">
                            <h1>Login</h1>
                            <p>Non sei registrato? <a href="#" class="fw-3" data-bs-toggle="modal"
                                    data-bs-target="#registerModal">Registrati</a></p>
                        </div>

                        <div class="form-group row mb-2">
                            <div class="col">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="{{ __('E-Mail Address') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <div class="col">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" placeholder="{{ __('Password') }}">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary text-white d-block w-100 mb-3">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" data-bs-toggle="modal"
                                    data-bs-target="#passwordResetModal">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal Register -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-3 overflow-hidden">

            <div class="modal-body d-flex p-0">
                <img src="{{ asset('img/login_img.jpg') }}" alt="Login"
                    class="d-none d-lg-block img-fluid w-100">

                <div class="d-flex flex-column p-3 flex-grow-1">
                    <div class="text-end">
                        <button type="button" class="btn-close" aria-label="Close"
                            data-bs-dismiss="modal"></button>
                    </div>

                    <form method="POST" @change="register" action="{{ route('register') }}"
                        class="flex-grow-1 px-3 pb-3 rounded-0 d-flex flex-column justify-content-center"
                        id="formReg">
                        @csrf

                        <div class="form-group row text-center">
                            <h1>Registrazione</h1>
                            <p class="mb-3">Sei già registrato? <a href="#" class="fw-3"
                                    data-bs-toggle="modal" data-bs-target="#loginModal">Accedi</a></p>
                            <p class="mb-1">Tutti i campi sono obbligatori.</p>
                        </div>

                        <div class="form-group row mb-2">
                            <div class="col">
                                <input id="email" v-model="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="{{ __('E-Mail Address') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <div class="col">
                                <input id="password" v-model="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" placeholder="{{ __('Password') }}">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <div class="col">

                                <input id="password_confirm" v-model="password_confirmation" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password_confirmation" required autocomplete="current-password"
                                    placeholder="{{ __('Conferma la password') }}">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-2">
                            <div class="col">
                                <input id="first_name" v-model="name" type="text"
                                    class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                    value="{{ old('first_name') }}" required autocomplete="first_name" autofocus
                                    placeholder="{{ __('First name') }}">

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <div class="col">
                                <input id="last_name" v-model="last_name" type="text"
                                    class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                    value="{{ old('last_name') }}" required autocomplete="last_name" autofocus
                                    placeholder="{{ __('Last name') }}">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <div class="col">
                                <input id="date_of_birth" v-model="date" type="text"
                                    class="form-control @error('date_of_birth') is-invalid @enderror"
                                    name="date_of_birth" value="{{ old('date_of_birth') }}" required
                                    autocomplete="date_of_birth" autofocus placeholder="{{ __('Birth date') }}"
                                    onfocus="(this. type='date')">

                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" id="btnReg" disabled="true"
                            class="btn btn-primary text-white d-block w-100 mb-3">
                            {{ __('Register') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Password Reset -->
<div class="modal fade" id="passwordResetModal" tabindex="-1" aria-labelledby="passwordResetModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-3 overflow-hidden">

            <div class="modal-body d-flex p-0">
                <img src="{{ asset('img/login_img.jpg') }}" alt="Login"
                    class="d-none d-lg-block img-fluid w-100">

                <div class="d-flex flex-column p-3 flex-grow-1">
                    <div class="text-end">
                        <button type="button" class="btn-close" aria-label="Close"
                            data-bs-dismiss="modal"></button>
                    </div>

                    <form method="POST" action="{{ route('password.update') }}"
                        class="flex-grow-1 px-3 pb-3 rounded-0 d-flex flex-column justify-content-center">
                        @csrf

                        <div class="form-group row text-center">
                            <h1>Reset password</h1>
                            <p>Compila i campi sottostanti per reimpostare la password.</p>
                        </div>

                        <div class="form-group row mb-2 text-center">
                            <div class="col">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                                    placeholder="{{ __('E-Mail Address') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <div class="col">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password" placeholder="{{ __('Password') }}">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <div class="col">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="{{ __('Confirm Password') }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary text-white">
                            {{ __('Reset Password') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
