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
    <div class="mx-auto col-md-10">
      <h2 class="col-md-12">単行本情報変更</h2>
      <form method="POST" enctype="multipart/form-data">
        <div class="row">
          <label for="title" class="col-md-12">タイトル</label>
          <input type="text" name="title" id="title" class="form-control" value="<?php echo $book['title']; ?>">
        </div>
        <div class="row">
          <label for="volume" class="col-md-12">巻数</label>
          <input type="text" name="volume" id="volume" class="form-control" value="<?php echo $book['volume']; ?>">
        </div>
        <div class="row">
          <label for="price" class="col-md-12">価格</label>
          <input type="text" name="price" id="price" class="form-control" value="<?php echo $book['price']; ?>">
        </div>
        <div class="row">
          <label for="release_date" lass="col-md-12">発売日</label>
          <input type="text" name="release_date" id="release_date" class="form-control" value="<?php echo $book['release_date']; ?>">
        </div>
        <div class="row">
          <label for="purchase_date" lass="col-md-12">購入日</label>
          <input type="text" name="purchase_date" id="purchase_date" class="form-control" value="<?php echo $book['purchase_date']; ?>">
        </div>
        <div class="">
          <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
          <input type="submit" class="btn btn-primary col-md-12" value="単行本情報を変更する">
        </div>
      </form>
    </div>
  </div>
</body>

</html>