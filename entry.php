<?php
require_once('./function.php');

// セッションチェック
if (isset($_SESSION['id'])) {
  header('Location: ./list.php');
}

if (!empty($_POST) && post_check() == 1) {
  $password_str = date("His");
  $password_cnt = rand(100000, 1000000);
  $_POST['password'] = solt($_POST['password'], $password_str, $password_cnt);
  // サインアップ処理
  if ($id = sign_up($_POST, $password_str, $password_cnt)) {
    $_SESSION['id'] = $id;
    header('Location: ./list.php');
  }
}

// 値チェック
function post_check()
{
  if ($_POST['name'] == '' || $_POST['login_id'] == '' || $_POST['password'] == '') return 0;
  return 1;
}

// sign_up処理
function sign_up($insert_data, $password_str, $password_cnt)
{
  $link = db_connect();
  $sql = "INSERT INTO m_member (name, login_id, password, password_str, password_cnt)
          VALUES ('{$insert_data['name']}', '{$insert_data['login_id']}', '{$insert_data['password']}', '{$password_str}', {$password_cnt})";
  echo ($sql);
  if ($link->query($sql)) {
    $id = $link->insert_id;
    $link->close();
    return $id;
  } else {
    $link->close();
    return false;
  }
}

require_once('./tpl/entry.php');
