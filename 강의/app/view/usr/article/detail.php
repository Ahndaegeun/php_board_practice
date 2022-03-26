<?php
$headTitle = 'detail';
?>
<?php require_once __DIR__ . '/../head.php' ?>
no: <?=$item['id']?><br>
title: <?=$item['title']?><br>
date: <?=$item['regDate']?><br><br>
body: <?=$item['body']?><br>
<hr>
<a href="list">list</a>
<a href="modify?id=<?=$item['id']?>">modify</a>
<a onclick="if(!confirm('del?')) return false;" href="doDelete?id=<?=$item['id']?>">delete</a>
<?php require_once __DIR__ . '/../foot.php' ?>

