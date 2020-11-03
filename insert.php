<?php
require_once('./function.php');

// セッション確認
if (!isset($_SESSION['id'])) {
  header('Location: ./login.php');
}

// POSTチェック
if (!empty($_POST)) {
  post_check();
  header('Location: ./list.php');
}

// 値チェック
function post_check()
{
  if ($_POST['title'] == '' || $_POST['volume'] == '' || $_POST['price'] == '' || $_POST['release_date'] == '') {
    // 空の場合の処理
  } else {
    $_POST['purchase_date'] = null_convert($_POST['purchase_date']);
    $id = inesrt_sql($_POST);
    return $id;
  }
}

// NULLの場合変換
function null_convert(string $purchase_date)
{
  if ($purchase_date == '') {
    $purchase_date = 'NULL';
    return $purchase_date;
  } else {
    return $purchase_date;
  }
}

// INSERT処理
function inesrt_sql(array $insert_data)
{
  $link = db_connect();
  $sql = "INSERT INTO m_book (title, volume, price, release_date, purchase_date)
          VALUES('{$insert_data['title']}', '{$insert_data['volume']}', '{$insert_data['price']}', {$insert_data['release_date']}, {$insert_data['purchase_date']})";
  if ($link->query($sql)) {
    $id = $link->insert_id;
    $link->close();
    return $id;
  } else {
    $link->close();
    return false;
  }
}


require_once('./tpl/insert.php');
