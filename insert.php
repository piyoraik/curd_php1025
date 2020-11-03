<?php
require_once('./function.php');

// セッション確認
if (!isset($_SESSION['id'])) {
  header('Location: ./login.php');
}

//
if (post_check() == 1) {
  $_POST['purchase_date'] = null_convert($_POST['purchase_date']);
  $_SESSION['msg'] = inesrt_sql($_POST);
  $_SESSION['info'] = "book_insert";
  header('Location: ./list.php');
}

// 値チェック
function post_check()
{
  if (empty($_POST) || $_POST['title'] == '' || $_POST['volume'] == '' || $_POST['price'] == '' || $_POST['release_date'] == '') return 0;
  return 1;
}

// INSERT処理
function inesrt_sql($insert_data)
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
