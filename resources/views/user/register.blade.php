<x-user-login>
  <h1 class="mb-8 text-2xl font-extrabold">会員登録</h1>

  <form class="w-full" method="POST" action="{{ route('user.register') }}">
    @csrf

    <x-user.form-group name="email" labelName="メールアドレス" type="email" />
    <x-input-error :messages="$errors->get('email')" class="-translate-y-8" />

    <x-user.form-group name="password" labelName="パスワード" type="password" />
    <x-input-error :messages="$errors->get('password')" class="-translate-y-8" />
    
    <div class="w-full mt-8">
      <x-user.button name="会員登録する" />
    </div>
  </form>

  <a class="mt-6 text-blue-500" href="{{ route('user.login') }}">ログインはこちら</a>
</x-user-login>