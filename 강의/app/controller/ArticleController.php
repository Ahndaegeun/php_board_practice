<?php

use JetBrains\PhpStorm\Pure;

class APP_UsrArticleController {
    private APP_ArticleService $articleService;

    public function __construct()
    {
        global $App_articleService;
        $this->articleService = $App_articleService;
    }

    public function actionShowList(): array
    {
        $result = $this->articleService->getForPrintArticles();
        $totalCnt = $this->articleService->getTotalCnt();
        require_once App_getViewPath("usr/article/list");
        return $result;
    }

    public function actionShowDetail(): array
    {

        if(!isset($_REQUEST['id'])) {
            jsHistoryBackExit("id 없음");
        }

        $id = getIntValueOr($_REQUEST['id'], 0);

        $item = $this->articleService->getForPrintArticlesById($id);
        require_once App_getViewPath("usr/article/detail");

        if($item === null) {
            jsHistoryBackExit("article 없음");
        }

        return $item;
    }

    public function actionShowModify()
    {
        if(!isset($_REQUEST['id'])) {
            jsHistoryBackExit("id 없음");
        }
        $id = intval($_REQUEST['id']);

        $item = $this->articleService->getForPrintArticlesById($id);

        if($item === null) {
            jsHistoryBackExit("article 없음");
        }

        $actorCanModifyRs = $this->articleService->getActorCanModify($_REQUEST['App_loginMember'], $item);

        if( $actorCanModifyRs->isFail() ) {
            jsHistoryBackExit('no role');
        }

        require_once App_getViewPath("usr/article/modify");
    }

    public function actionShowWrite(): void
    {
        require_once App_getViewPath("usr/article/write");
    }

    public function actionDoWrite(): void
    {
        if (!isset($_POST['title'])) {
            jsHistoryBackExit('no id');
        }

        if (!isset($_POST['body'])) {
            jsHistoryBackExit('body 없음');
        }

        require_once $_SERVER['DOCUMENT_ROOT'] . '/webInit.php';
        $title = $_POST['title'];
        $body = $_POST['body'];

        $id = $this->articleService->writeArticle($_REQUEST['App_loginMemberId'], $title, $body);

        jsLocationReplaceExit("detail?id=${id}", "${id}번 게시물 생성 완료");
    }

    public function actionDoModify(): void
    {
        if (!isset($_POST['title'])) {
            jsHistoryBackExit("title 없음");
        }

        if (!isset($_POST['body'])) {
            jsHistoryBackExit("body 없음");
        }

        if (!isset($_POST['id'])) {
            jsHistoryBackExit("id 없음");
        }

        $title = $_POST['title'];
        $body = $_POST['body'];
        $id = intval($_POST['id']);

        $this->articleService->modifyArticle($title, $body, $id);

        jsLocationReplaceExit("detail?id=${id}", "${id}번 게시물 수정 완료");
    }

    public function actionDoDelete(): void
    {
        if (!isset($_REQUEST['id'])) {
            jsHistoryBackExit("id 없음");
        }

        $id = intval($_REQUEST['id']);

        $item = $this->articleService->getForPrintArticlesById($id);
        $actorCanDeleteRs = $this->articleService->getActorCanDelete($_REQUEST['App_loginMember'], $item);

        if( $actorCanDeleteRs->isFail() ) {
            jsHistoryBackExit('no role');
        }

        $this->articleService->deleteArticle($id);

        jsLocationReplaceExit("list", "${id}번 게시물 삭제 완료");
    }


}
