<?php
$headTitle = 'write';
require_once __DIR__ . '/../head.php'
?>
<hr>
<form action="doWrite" method="post">
    title :
    <input required type="text" name="title"> <br>
    body :
    <textarea required name="body" id="" cols="30" rows="10"></textarea> <br>
    <button type="submit">submit</button>
</form>
<?php require_once __DIR__ . '/../foot.php' ?>
