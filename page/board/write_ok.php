<?php

include $_SERVER['DOCUMENT_ROOT'] . "/db.php";

$username = $_POST['name'];
$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');
if(isset($_POST['lockpost'])) {
  $lo_post = '1';
} else {
  $lo_post = '0';
}
if ($username && $userpw && $title && $content) {
  $sql = query("insert into board(name, pw, title, content, date, lock_post) values('".$username."', '".$userpw."', '".$title."', '".$content."', '".$date."', '".$lo_post."')");
  echo "<script>alert('글쓰기 완료!'); location.href='/';</script>";
} else {
  echo "<script>alert('글쓰기 실패...'); history.back();</script>";
}
