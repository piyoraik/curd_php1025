<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
<div class="container">
  <h2>会員情報登録</h2>
  <form method="POST">
    <div class="row">
      <label for="name">氏名</label>
      <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="row">
      <label for="login_id">ログインID</label>
      <input type="text" name="login_id" id="login_id" class="form-control">
    </div>
    <div class="row">
      <label for="password">パスワード</label>
      <input type="password" name="password" id="password" class="form-control">
    </div>
    <div>
      <input type="submit" class="btn btn-primary col-md-12" value="登録する">
    </div>
  </form>
  <div>
    ログインは<a href="./login.php">こちら</a>
  </div>
</div>

</html>