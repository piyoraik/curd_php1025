<?php
require_once('./function.php');

// セッション確認
if (!isset($_SESSION['id'])) {
  header('Location: ./login.php');
}

// ログアウト
if (!empty($_POST['logout'])) {
  unset($_SESSION['id']);
  header('Location: ./login.php');
}


// ページャ機能
$number_of_display = 2;
if (isset($_GET['page'])) {
  $current_page = $_GET['page'];
} else {
  $current_page = 1;
}
$all_page = ceil(books_count() / $number_of_display);
$start_fetch_book = ($current_page - 1) * $number_of_display;
$books = fetch_books($number_of_display, $start_fetch_book);

// ページャ表示
function paging_main($all_page, $current_page, $ul, $li, $active)
{
  echo "<ul class='{$ul} mx-auto'>";
  for ($i = 1; $i <= $all_page; $i++) {
    paging_back($i, $current_page, $li);
    if ($i == $current_page) {
      echo "<li class='{$li} {$active}'><span class='page-link'>{$i}</span></li>";
    } else {
      echo "<li class='{$li}}'><a href='./list.php?page={$i}' class='page-link'>{$i}</a></li>";
    }
    paging_next($i, $current_page, $all_page, $li);
  }
  echo "</ul>";
}

// ページャ表示(back)
function paging_back($i, $current_page, $li)
{
  if ($i == 1 && $current_page <= 1) {
    echo "<li class='{$li}}'><span class='page-link'>Back</span></li>";
  } else if ($i == 1) {
    $i = $current_page - 1;
    echo "<li class='{$li}}'><a href='./list.php?page={$i}' class='page-link'>Back</a></li>";
  }
}

// ページャ表示(next)
function paging_next($i, $current_page, $all_page, $li)
{
  if ($i == $all_page && $current_page >= $all_page) {
    echo "<li class='{$li}}'><span class='page-link'>Next</span></li>";
  } else if ($i == $all_page) {
    $i = $current_page + 1;
    echo "<li class='{$li}}'><a href='./list.php?page={$i}' class='page-link'>Next</a></li>";
  }
}

// 本一覧の取得
function fetch_books($number_of_display, $start_fetch_book)
{
  $books = [];
  $link = db_connect();
  $sql = "SELECT * FROM m_book
          WHERE del_date IS NULL
          ORDER BY release_date DESC
          LIMIT {$start_fetch_book},{$number_of_display}
          ";
  if ($result = $link->query($sql)) {
    while ($book = $result->fetch_assoc()) {
      $books[] = convert_books($book);
    }
    $link->close();
    return $books;
  } else {
    return false;
  }
}

// 本の件数確認
function books_count()
{
  $count = [];
  $link = db_connect();
  $sql = "SELECT * FROM m_book
          WHERE del_date IS NULL
        ";
  $result = $link->query($sql);
  $count = $result->fetch_all();
  return count($count);
}

// 本の表示形式変更
function convert_books(array $book)
{
  $book['volume'] = $book['volume'] . '巻';

  $book['price'] = $book['price'] . '円';

  $book['release_date'] = str_replace(array('-', 'ー'), array('年', '月', '日'), $book['release_date'] . '日');
  if (!$book['purchase_date'] == NULL) {
    $book['purchase_date'] = str_replace(array('-', 'ー'), array('年', '月', '日'), $book['purchase_date'] . '日');
  }
  return $book;
}

require_once('./tpl/list.php');
