<?php
  include $_SERVER['DOCUMENT_ROOT']."/db.php";

  $bno = $_GET['idx'];
  $sql = query("delete from board where idx='$bno'");
?>

<script>alert('삭제!!')</script>
<meta http-equiv="refresh" content="0 url=/">