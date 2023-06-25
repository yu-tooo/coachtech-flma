<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>Owner</title>
</head>

<body>
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

  <a class="mt-6 text-blue-500" href="{{ route('owner.login') }}">ログインはこちら</a>

</body>

</html>