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

// POSTチェック
if (!empty($_POST)) {
  // update処理
  update_sql();
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
          release_date = '{$_POST['release_date']}',
          purchase_date = '{$_POST['purchase_date']}'
          WHERE id = '{$_POST['id']}'
          ";
  if ($link->query($sql)) {
    $id = $link->insert_id;
    $link->close();
    return $id;
  } else {
    $link->close();
    return false;
  }
}

require_once('./tpl/update.php');
