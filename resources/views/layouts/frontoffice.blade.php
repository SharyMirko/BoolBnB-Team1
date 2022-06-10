<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <x-head/>

   <!-- Scripts -->
   <script src="{{ asset('js/frontoffice.js') }}" defer></script>

   <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">

   <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
</head>
<body class="pt-5">

   <x-navheader/>

   <main class="container py-4 mt-5">
      @yield('content')
   </main>

</body>
</html>
