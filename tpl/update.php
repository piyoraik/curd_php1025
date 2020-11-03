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

</html>