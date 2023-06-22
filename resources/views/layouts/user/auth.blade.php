<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <!-- <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> -->

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <header class="w-full px-4  bg-black">
    <div class="flex items-center">
      <a href="/">
        <x-user.application-logo />
      </a>
    </div>
  </header>

  <div class="flex flex-col justify-center items-center py-8 w-11/12 sm:w-3/4 md:w-1/2 mx-auto">
    {{ $slot }}
  </div>

</body>

</html>