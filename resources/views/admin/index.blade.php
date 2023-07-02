<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
</head>
<body>
  <h1>Admin Page</h1>
  <form action="{{ route('admin.register') }}">
    <button>登録画面</button>
  </form>
  <form action="{{ route('admin.login') }}">
    <button>ログイン画面</button>
  </form>
  <form method="POST" action="{{ route('admin.logout') }}">
    @csrf
    <button>ログアウト</button>
  </form>
</body>
</html>