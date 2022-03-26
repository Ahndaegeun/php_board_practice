<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/app/repository/MemberRepository.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/app/repository/ArticleRepository.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/app/service/MemberService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/app/service/ArticleService.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/app/controller/MemberController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/app/controller/ArticleController.php';

require_once __DIR__ . '/interceptor.php';
require_once __DIR__ . '/Application.php';

$App_articleRepository = new APP_ArticleRepository();
$App_memberRepository = new APP_MemberRepository();

$App_memberService = new APP_MemberService();
$App_articleService = new APP_ArticleService();

$application = new App_Application();