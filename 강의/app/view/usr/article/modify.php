<?php
$headTitle = 'modify '.$item['id'];
?>
<?php require_once __DIR__ . '/../head.php' ?>
<hr>
<form action="doModify" method="post">
    <input type="hidden" name="id" value="<?=$item['id']?>">
    title :
    <input required type="text" name="title" value="<?=$item['title']?>"> <br>
    body :
    <textarea required name="body" id="" cols="30" rows="10"><?=$item['body']?></textarea> <br>
    <button type="submit">modify</button>
</form>
<?php require_once __DIR__ . '/../foot.php' ?>

