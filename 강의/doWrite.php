<?php
$dbConn = mysqli_connect('127.0.0.1', 'root', '1234', 'php_test') or die('DB CONNECTION ERROR');
$title = $_POST['title'];
$body = $_POST['body'];

$sql = "
insert into article
set regDate = now(),
updateDate = now(),
title = '${title}',
`body` = '${body}'
";

mysqli_query($dbConn, $sql);

$id = mysqli_insert_id($dbConn);

echo "${id}번 게시물 생성";
?>
