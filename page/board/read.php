<?php include $_SERVER['DOCUMENT_ROOT'] . "/db.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../index.css">
</head>
<body>
  <?php
    $bno = $_GET['idx'];
    $hit = mysqli_fetch_array(query("select * from board where idx = '".$bno."'"));
    $hit = $hit['hit'] + 1;
    $fet = query("update board set hit = '".$hit."' where idx = '".$bno."'");
    $sql = query("select * from board where idx='".$bno."'");
    $board = $sql->fetch_array();
  ?>
  
  <div id="board_read">
    <h2><?php echo $board['title']; ?></h2>
    <div id="user_info">
      <?php echo $board['name']; ?> <?php echo $board['date']; ?> 조회: <?php echo $board['hit']; ?>
      <div id="bo_line"></div>
      <div id="bo_content">
      <?php echo nl2br("$board[content]"); ?>
      </div>
      <div id="bo_ser">
        <ul>
          <li><a href="/">[목록으로]</a></li>
          <li><a href="modify.php?idx=<?php echo $board['idx']; ?>">[수정]</a></li>
          <li><a href="delete.php?idx=<?php echo $board['idx']; ?>">[삭제]</a></li>
        </ul>
      </div>
    </div>
  </div>

</body>
</html>