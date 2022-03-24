<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/강의/webInit.php';

if(isset($_GET['id']) == false) {
    echo "nope";
    exit;
}
$id = intval($_GET['id']);

$sql = "
select *
  from article as a
 where id = '${id}'
";

$article = DB__getRow($sql);


if($article === null) {
    echo 'nope';
    exit;
}
?>
<?php require_once __DIR__.'/layout/head.php'; ?>
no : <?=$article['id']?><br>
regDate : <?=$article['regDate']?><br>
updateDate : <?=$article['updateDate']?><br>
title : <?=$article['title']?><br>
body : <?=$article['body']?>
<?php require_once __DIR__.'/layout/footer.php'; ?>