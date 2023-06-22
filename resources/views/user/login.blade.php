<x-user-login>
  <h1 class="mb-8 text-2xl font-extrabold">ログイン</h1>

  <x-user.form-group name="email" labelName="メールアドレス" type="email" />

  <x-user.form-group name="password" labelName="パスワード" type="password" />

  <x-user.button name="ログインする" />
  
  <a class="mt-6 text-blue-500" href="{{ route('user.register') }}">会員登録はこちら</a>
</x-user-login>