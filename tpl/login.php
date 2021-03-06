<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/bootstrap.min.css" crossorigin="anonymous">
</head>

<body>
  <script src="./js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <div class="container">
    <h2>ログイン</h2>
    <form method="POST">
      <div class="row">
        <label for="login_id">ログインID</label>
        <input type="text" name="login_id" id="login_id" class="form-control">
      </div>
      <div class="row">
        <label for="password">パスワード</label>
        <input type="password" name="password" id="password" class="form-control">
      </div>
      <div>
        <input type="submit" class="btn btn-primary col-md-12" value="ログインする">
      </div>
    </form>
    <div>
      新規登録は<a href="./entry.php">こちら</a>
    </div>
  </div>
</body>

</html>