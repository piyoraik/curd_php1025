<?php
require_once('./function.php');

// セッション確認
if (!isset($_SESSION['id'])) {
  header('Location: ./login.php');
}

// GETチェック
if (!empty($_GET['id'])) {
  $book = fetch_book($_GET['id']);
}

// POSTチェック
if (!empty($_POST)) {
  // delete処理
  if ($_SESSION['msg'] = delete_sql()) {
    $_SESSION['info'] = '削除しました';
    header('Location: ./list.php');
  } else {
    $_SESSION['msg'] = "データの削除に失敗しました";
    error_message();
  }
}

// DELETE処理
function delete_sql()
{
  $date = date('Y-m-d');
  $link = db_connect();
  $sql = "UPDATE m_book SET
          del_date = '{$date}'
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

require_once('./tpl/delete.php');
