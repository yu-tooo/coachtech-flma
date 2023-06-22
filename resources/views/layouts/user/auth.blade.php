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
    <h1 class="mb-8 text-2xl font-extrabold">ログイン</h1>

    <div class="w-full mb-8">
      <label class="block text-lg font-bold" for="email">メールアドレス</label>
      <input class="w-full rounded-sm focus:outline-none focus:ring-0" type="email" id="email">
    </div>

    <div class="w-full mb-8">
      <label class="block text-lg font-bold" for="password">パスワード</label>
      <input class="w-full rounded-sm focus:outline-none focus:ring-0" type="password" id="password">
    </div>

    <button class="w-full mt-12 p-2 text-white text-lg rounded-sm bg-red-500">ログインする</button>
    <a class="mt-6 text-blue-500 visited" href="/">会員登録はこちら</a>
  </div>

</body>

</html>