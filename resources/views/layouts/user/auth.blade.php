<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <!-- <link rel="preconnect" href="https://fonts.bunny.net"> -->
  <!-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> -->

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

  <div class="flex flex-col justify-center items-center pt-6 sm:pt-0">
    <div>
      <x-user.application-logo class="w-20 h-20 fill-current text-gray-500" />
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
      {{ $slot }}
    </div>
  </div>
</body>

</html>