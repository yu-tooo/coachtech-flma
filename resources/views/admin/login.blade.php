<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>Admin</title>
</head>

<body>
  <x-auth-session-status :status="session('status')" />
  <h1 class="mb-8 text-2xl font-extrabold">ログイン(管理者)</h1>

  <form class="w-full" method="POST" action="{{ route('admin.login') }}">
    @csrf

    <x-user.form-group name="email" labelName="メールアドレス" type="email" />

    <x-user.form-group name="password" labelName="パスワード" type="password" />

    <div class="w-full mt-8">
      <x-user.button name="ログインする" />
    </div>
  </form>

  <a class="mt-6 text-blue-500" href="{{ route('admin.register') }}">会員登録はこちら</a>
</body>

</html>