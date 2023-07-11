<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Coach Flma Owners</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-data="{ open: false }">
  <header class="flex items-center justify-between px-4 h-12 bg-black">
    <div class="flex items-center text-white">
      <a href="{{ route('owner.home') }}">
        <x-application-logo />
      </a>
      <span class="hidden sm:inline">for</span>
      <span class="text-xl sm:ml-2">Owner</span>
    </div>
    <div class="px-4 space-x-4 hidden sm:block">
      <a href="{{ route('owner.home') }}'" class="text-white hover:underline">
        ユーザー
      </a>
      <a href="{{ route('owner.home') }}'" class="text-white hover:underline">
        アイテム
      </a>
    </div>
    <button @click="open = ! open" class="sm:hidden h-6 w-8 cursor-pointer outline-none">
      <span class="block w-full h-0.5 bg-white mb-2  duration-500" :class="{'translate-y-2.5': open, 'rotate-45': open}"></span>
      <span class="block w-full h-0.5 bg-white mb-2  duration-500" :class="{'-translate-x-4': open, 'scale-0': open}"></span>
      <span class="block w-full h-0.5 bg-white mb-0  duration-500" :class="{'-translate-y-2.5': open, '-rotate-45': open}"></span>
    </button>
  </header>
  <div :class="{'translate-y-24': open }" class="flex items-center flex-row-reverse absolute px-8 -top-12 bg-black h-12 w-screen duration-500">
    <a href="{{ route('owner.home') }}" class="text-white mx-4 hover:underline">
      アイテム
    </a>
    <a href="{{ route('owner.home') }}" class="text-white mx-4 hover:underline">
      ユーザー
    </a>
  </div>
  <div class="mt-8 w-11/12 sm:w-3/4 md:w-1/2 mx-auto">
    <span class="text-xl font-bold">森田悠斗</span>さん
  </div>
  <div class="flex flex-col items-center py-8 w-11/12 sm:w-3/4 md:w-1/2 mx-auto">
    {{ $slot }}
  </div>

</body>

</html>