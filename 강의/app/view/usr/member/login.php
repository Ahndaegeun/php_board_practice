<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/webInit.php';
$headTitle = 'write';
require_once __DIR__ . '/../head.php'
?>
<hr>
<form action="doLogin" method="post">
    id :
    <input required type="text" name="loginId"> <br>
    pw :
    <input required type="password" name="loginPw"> <br>
    <button type="submit">login</button>
</form>
<?php require_once __DIR__ . '/../foot.php' ?>
