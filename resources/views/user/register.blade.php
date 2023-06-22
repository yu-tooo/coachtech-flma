<x-user-login>
  <h1 class="mb-8 text-2xl font-extrabold">会員登録</h1>

  <x-user.form-group name="email" labelName="メールアドレス" type="email" />

  <x-user.form-group name="password" labelName="パスワード" type="password" />

  <x-user.button name="会員登録する" />
  
  <a class="mt-6 text-blue-500" href="{{ route('user.login') }}">ログインはこちら</a>
</x-user-login>