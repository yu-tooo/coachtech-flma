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
  <x-user.menu-header />

  <div class="sm:flex sm:justify-between p-4 sm:p-8 md:p-12 ">
    <div class="sm:w-2/5 md:w-1/2 mb-8 sm:mb-0">
      {{ $first }}
    </div>
    <div class="flex flex-col sm:w-1/2 md:w-2/5 items-center sm:items-start">
      {{ $second }}
    </div>
  </div>

</body>

</html>