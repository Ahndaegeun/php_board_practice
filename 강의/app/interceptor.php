<?php
require_once __DIR__ . '/vo.php';

function App_getViewPath($viewName): string
{
    return $_SERVER['DOCUMENT_ROOT'] . '/app/view/' . $viewName . '.php';
}

function App_runBeforeInterCaptor()
{
    $_REQUEST['App_isLogin'] = false;
    $_REQUEST['App_loginMemberId'] = 0;
    $_REQUEST['App_loginMember'] = null;

    if(isset($_SESSION['loginMemberId'])) {
        global $App_memberService;

        $_REQUEST['App_isLogin'] = true;
        $_REQUEST['App_loginMemberId'] = intval($_SESSION['loginMemberId']);
        $_REQUEST['App_loginMember'] = $App_memberService->getMemberById($_REQUEST['App_loginMemberId']);
    }
}

function App_runNeedLoginInterCaptor($action)
{
    switch ($action) {
        case 'usr/member/login':
        case 'usr/member/doLogin':
        case 'usr/member/join':
        case 'usr/member/doJoin':
        case 'usr/article/list':
        case 'usr/article/detail':
        case 'usr/article/doList':
            return;
    }

    if($_REQUEST['App_isLogin'] === false) {
        jsHistoryBackExit('do Login');
    }
}

function App_runNeedLogoutInterCaptor($action)
{
    switch ($action) {
        case 'usr/member/login':
        case 'usr/member/doLogin':
        case 'usr/member/join':
        case 'usr/member/doJoin':
            break;
        default:
            return;
    }

    if($_REQUEST['App_isLogin']) {
        jsHistoryBackExit('Login!');
    }
}

function APP_runInterceptors($action)
{
    App_runBeforeInterCaptor();
    App_runNeedLoginInterCaptor($action);
    App_runNeedLogoutInterCaptor($action);
}