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
    <h2>単行本削除</h2>
    <div class="row">
      <table class="table">
        <tr>
          <th>タイトル</th>
          <td><?php echo $book['title']; ?></td>
        </tr>
        <tr>
          <th>巻数</th>
          <td><?php echo $book['volume']; ?></td>
        </tr>
        <tr>
          <th>価格</th>
          <td><?php echo $book['price']; ?></td>
        </tr>
        <tr>
          <th>販売日</th>
          <td><?php echo $book['release_date']; ?></td>
        </tr>
        <tr>
          <th>購入日</th>
          <td><?php echo $book['purchase_date']; ?></td>
        </tr>
      </table>
    </div>
    <div class="row">
      <form method="post" class="col-md-12">
        <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
        <input type="submit" value="削除する" class="btn btn-danger col-md-12">
      </form>
    </div>
  </div>
</body>

</html>