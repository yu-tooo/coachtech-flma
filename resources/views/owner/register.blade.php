<x-owner.auth-layout>
  <h1 class="mb-8 text-2xl font-extrabold">会員登録(オーナー)</h1>

  <form class="w-full" method="POST" action="{{ route('owner.register') }}">
    @csrf
    <x-user.form-group name="name" labelName="名前" />

    <x-user.form-group name="email" labelName="メールアドレス" type="email" />

    <x-user.form-group name="password" labelName="パスワード" type="password" />

    <div class="w-full mt-8">
      <x-user.button name="会員登録する" />
    </div>
  </form>
</x-owner.auth-layout>