<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Owner</title>
</head>
<body>
  <h1>Owner Page</h1>
  <form action="{{ route('owner.register') }}">
    <button>登録画面</button>
  </form>
  <form action="{{ route('owner.login') }}">
    <button>ログイン画面</button>
  </form>
  <form method="POST" action="{{ route('owner.logout') }}">
    @csrf
    <button>ログアウト</button>
  </form>
</body>
</html>