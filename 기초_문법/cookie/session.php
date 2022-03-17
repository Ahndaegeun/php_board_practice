<?php
session_start();
$_SESSION['name'] = 'kade';

// 가져오기
echo $_SESSION['name'];

// 삭제
unset($_SESSION['name']);

// 모든 세션 변수 삭제
session_unset();

// 세션 아이디 삭제
session_destroy();
?>