<?php
session_start();

// DB接続
function db_connect()
{
  require_once('../../const.php');
  $link = new mysqli(HOST, USER_ID, PASSWORD, DB_NAME);
  $link->set_charset('utf8');
  return $link;
}

// 本の情報1件を取得
function fetch_book($id)
{
  $link = db_connect();
  $sql = "SELECT * FROM m_book
          WHERE id = {$id}";
  if ($result = $link->query($sql)) {
    $book = $result->fetch_assoc();
  }
  $link->close();
  return $book;
}

// 本の表示形式変更
function convert_books($book)
{
  $book['volume'] = $book['volume'] . '巻';

  $book['price'] = $book['price'] . '円';

  $book['release_date'] = str_replace(array('-', 'ー'), array('年', '月', '日'), $book['release_date'] . '日');
  if (!$book['purchase_date'] == NULL) {
    $book['purchase_date'] = str_replace(array('-', 'ー'), array('年', '月', '日'), $book['purchase_date'] . '日');
  }
  return $book;
}

// NULLの場合変換
function null_convert($purchase_date)
{
  if ($purchase_date == '') {
    $purchase_date = 'NULL';
    return $purchase_date;
  } else {
    return $purchase_date;
  }
}

// ソルト
function solt($password, $password_str, $password_cnt)
{
  for ($i = 0; $i <= $password_cnt; $i++) {
    $password = md5($password_str . $password);
  }
  return $password;
}

// アラートメッセージ
function message()
{
  if (!isset($_SESSION['msg'])) return false;
  echo "<div class='alert alert-success' role='alert'>";
  echo "ID:{$_SESSION['msg']}のデータを{$_SESSION['info']}";
  echo "</div>";
  unset($_SESSION['msg']);
  unset($_SESSION['info']);
}

// エラーメッセージ
function error_message()
{
  if (!isset($_SESSION['msg'])) return false;
  echo "<div class='alert alert-danger' role='alert'>";
  echo "{$_SESSION['msg']}";
  echo "</div>";
  unset($_SESSION['msg']);
}
