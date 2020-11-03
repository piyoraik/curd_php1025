<?php
require_once('./function.php');

// セッション確認
if (isset($_SESSION['id'])) {
  header('Location: ./list.php');
}

if (post_check() == 1) {
  $user = fetch_user($_POST['login_id']);
  $password = solt($_POST['password'], $user['password_str'], $user['password_cnt']);
  // 認証
  if ($user['password'] == $password) {
    $_SESSION['id'] = $user['id'];
    header('Location: ./list.php');
  }
}

// ユーザー情報を取得
function fetch_user($login_id)
{
  $link = db_connect();
  $sql = "SELECT * FROM m_member
          WHERE login_id = '{$login_id}'";
  if ($result = $link->query($sql)) {
    $user = $result->fetch_assoc();
  }
  $link->close();
  return $user;
}



// 値チェック
function post_check()
{
  if (empty($_POST) || $_POST['login_id'] == '' || $_POST['password'] == '') return 0;
  return 1;
}

require_once('./tpl/login.php');
