<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Coach Flma</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <header class="flex items-center justify-between px-4 h-12 bg-black">
    <div class="flex items-center">
      <a href="{{ route('user.home') }}">
        <x-application-logo />
      </a>
    </div>
  </header>

  <div class="flex flex-col items-center py-8 w-11/12 sm:w-3/4 md:w-1/2 mx-auto">
    {{ $slot }}
  </div>

</body>

</html>