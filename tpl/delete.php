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

</html>