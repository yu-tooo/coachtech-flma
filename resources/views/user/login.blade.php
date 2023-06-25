<x-user-login>
  <x-auth-session-status :status="session('status')" />
  <h1 class="mb-8 text-2xl font-extrabold">ログイン</h1>

  <form class="w-full" method="POST" action="{{ route('user.login') }}">
    @csrf
    
    <x-user.form-group name="email" labelName="メールアドレス" type="email" />

    <x-user.form-group name="password" labelName="パスワード" type="password" />

    <div class="w-full mt-8">
      <x-user.button name="ログインする" />
    </div>
  </form>

  <a class="mt-6 text-blue-500" href="{{ route('user.register') }}">会員登録はこちら</a>
</x-user-login>