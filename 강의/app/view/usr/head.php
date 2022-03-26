<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/webInit.php';
$isLogin = $_REQUEST['App_isLogin'];
$loginMember = $_REQUEST['App_loginMember'];
$loginMemberId = $_REQUEST['App_loginMemberId'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>게시물 리스트</title>
</head>
<body>
<h1><?=$headTitle?></h1>
<?php if ( $isLogin ) {?>
    <hr>
    <a href="../member/mypage"><?=$loginMember['nickname']?> my page</a>
    <a href="../member/doLogout">logout</a>
    <a href="../member/doSecession">secession</a>
    <hr>
<?php } else {?>
    <hr>
    <a href="../member/login">login</a>
    <a href="../member/join">sign in</a>
    <hr>
<?php }?>
