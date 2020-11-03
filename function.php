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

// ソルト
function solt($password, $password_str, $password_cnt)
{
  for ($i = 0; $i <= $password_cnt; $i++) {
    $password = md5($password_str . $password);
  }
  return $password;
}
