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
  <?php message(); ?>
  <div class="container">
    <h2>単行本一覧</h2>
    <table class="table">
      <thead>
        <th>タイトル</th>
        <th>巻数</th>
        <th>価格</th>
        <th>発売日</th>
        <th>購入日</th>
        <th>変更・削除</th>
      </thead>
      <?php foreach ($books as $book) { ?>
        <tr>
          <td><?php echo $book['title']; ?></td>
          <td><?php echo $book['volume']; ?></td>
          <td><?php echo $book['price']; ?></td>
          <td><?php echo $book['release_date']; ?></td>
          <td><?php echo $book['purchase_date']; ?></td>
          <td>
            <a href="./update.php?id=<?php echo $book['id']; ?>">変更</a>・
            <a href="./delete.php?id=<?php echo $book['id']; ?>">削除</a>
          </td>
        </tr>
      <?php } ?>
    </table>
    <div class="col-md-6 offset-md-5 py-2">
      <div class="text-center">
        <?php paging_main($all_page, $current_page, 'pagination', 'page-item', 'active'); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
        <a href="./insert.php" class="btn btn-primary">単行本を登録する</a>
      </div>
      <div class="col-md-2 offset-7">
        <form method="POST">
          <input type="submit" name="logout" value="ログアウト" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</body>

</html>