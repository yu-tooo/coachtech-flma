<x-user.app-layout>
  <h1 class="mb-8 text-2xl font-extrabold">ログイン</h1>

  <div class="w-full mb-8">
    <label class="block text-lg font-bold" for="email">メールアドレス</label>
    <input class="w-full rounded-md focus:ring-0" type="email" id="email">
  </div>

  <div class="w-full mb-8">
    <label class="block text-lg font-bold" for="password">パスワード</label>
    <input class="w-full rounded-md focus:ring-0" type="password" id="password">
  </div>

  <x-user.button name="ログインする"/>
  <a class="mt-6 text-blue-500" href="{{ route('user.register') }}">会員登録はこちら</a>
</x-user.app-layout>