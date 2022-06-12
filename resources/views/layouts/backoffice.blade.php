<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <x-head/>

   <!-- Scripts -->
   <script src="{{ asset('js/backoffice.js') }}" defer></script>

   <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
</head>
<body class="pt-5">

   <x-navheader/>

   <main class="">
      @yield('content')
   </main>

   <x-foot/>

</body>
</html>
