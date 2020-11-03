<?php
require_once('./function.php');

// セッション確認
if (!isset($_SESSION['id'])) {
  header('Location: ./login.php');
}

if (!empty($_GET['id'])) {
  $book = fetch_book($_GET['id']);
  // 本の販売日・購入日情報変換
  $book['release_date'] = str_replace('-', '', $book['release_date']);
  if (empty($book['purchase_date'])) {
    $book['purchase_date'] = str_replace('-', '', $book['purchase_date']);
  }
}

if (!empty($_POST && !$_POST['id'] == '')) {
  // update処理
  $_POST['purchase_date'] = null_convert($_POST['purchase_date']);
  $_SESSION['msg'] = update_sql();
  $_SESSION['info'] = 'book_update';
  header('Location: ./list.php');
}

// UPDATE処理
function update_sql()
{
  $link = db_connect();
  $sql = "UPDATE m_book SET
          title = '{$_POST['title']}',
          volume = '{$_POST['volume']}',
          price = '{$_POST['price']}',
          release_date = {$_POST['release_date']},
          purchase_date = {$_POST['purchase_date']}
          WHERE id = '{$_POST['id']}'
          ";
  if ($link->query($sql)) {
    $id = $_POST['id'];
    $link->close();
    return $id;
  } else {
    $link->close();
    return false;
  }
}

require_once('./tpl/update.php');
