<?php 
  include $_SERVER['DOCUMENT_ROOT']."/db.php";

  $bno = $_GET['idx'];
  $username = $_POST['name'];
  $userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
  $title = $_POST['title'];
  $content = $_POST['content'];
  $sql = query("update board set name='".$username."', title='".$title."', content='".$content."' where idx = $bno");
?>

<script>alert('수정 완료!')</script>
<meta http-equiv="refresh" content="0 url=/page/board/read.php?idx=<?php echo $bno; ?>">