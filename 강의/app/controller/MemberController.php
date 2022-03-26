<?php

use JetBrains\PhpStorm\Pure;

class APP_UsrMemberController {
    private APP_MemberService $memberService;

    public function __construct()
    {
        global $App_memberService;
        $this->memberService = $App_memberService;
    }

    public function actionShowLogin(): void
    {

        require_once App_getViewPath("usr/member/login");
    }

    public function actionDoLogin(): void
    {

        if (!isset($_POST['loginId'])) {
            jsHistoryBackExit("id 없음");
        }

        if (!isset($_POST['loginPw'])) {
            jsHistoryBackExit("pw 없음");
        }

        $loginId = $_POST['loginId'];
        $loginPw = $_POST['loginPw'];

        $member = $this->memberService->loginMember($loginId, $loginPw);

        if( $member === null ) {
            jsHistoryBackExit("member 없음");
        }

        $_SESSION['loginMemberId'] = $member['id'];
        jsLocationReplaceExit("../article/list", "${member['nickname']}님 환영합니다.");
    }

    public function actionDoLogout() {
        unset($_SESSION['loginMemberId']);
        jsLocationReplaceExit("../article/list");
    }

    public function actionDoSecession()
    {
        unset($_SESSION['loginMemberId']);

        $this->memberService->secession($_REQUEST['App_loginMemberId']);

        jsLocationReplaceExit("../article/list");
    }

    public function actionShowJoin()
    {
        require_once App_getViewPath("usr/member/join");
    }
}
