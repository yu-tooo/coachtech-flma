<x-owner.auth-layout>
  <x-auth-session-status :status="session('status')" />
  <h1 class="mb-8 text-2xl font-extrabold">ログイン</h1>
  <p class="mb-8">オーナー</p>

  <form class="w-full" method="POST" action="{{ route('admin.login') }}">
    @csrf

    <x-user.form-group name="email" labelName="メールアドレス" type="email" />
    <x-input-error :messages="$errors->get('email')" class="-translate-y-8" />

    <x-user.form-group name="password" labelName="パスワード" type="password" />
    <x-input-error :messages="$errors->get('password')" class="-translate-y-8" />

    <div class="w-full mt-8">
      <x-user.button name="ログインする" />
    </div>
  </form>
</x-owner.auth-layout>