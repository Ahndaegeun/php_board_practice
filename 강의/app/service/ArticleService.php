<?php

use JetBrains\PhpStorm\Pure;

class APP_ArticleService {

    private APP_ArticleRepository $articleRepository;

    public function __construct()
    {
        global $App_articleRepository;
        $this->articleRepository = $App_articleRepository;
    }

    public function getForPrintArticles(): array
    {
        return $this->articleRepository->getForPrintArticles();
    }

    public function getForPrintArticlesById(int $id): ?array
    {
        return $this->articleRepository->getForPrintArticlesById($id);
    }

    public function writeArticle(int $id, string $title, string $body): int
    {
        return $this->articleRepository->writeArticle($id, $title, $body);
    }

    public function modifyArticle(string $title, string $body, int $id): void
    {
        $this->articleRepository->modifyArticle($title, $body, $id);
    }

    public function deleteArticle(int $id): void
    {
        $this->articleRepository->deleteArticle($id);
    }

    public function getActorCanModify($actor, $item): ResultData
    {
        if($actor['id'] == $item['memberId']) {
            return new ResultData("S-1", "Role ok");
        }

        return new ResultData("F-1", "no Role");
    }

    public function getActorCanDelete($actor, $item): ResultData
    {
        if($actor['id'] == $item['memberId']) {
            return new ResultData("S-1", "Role ok");
        }

        return new ResultData("F-1", "no Role");
    }

    public function getTotalCnt(): int
    {
        return $this->articleRepository->getTotalCnt();
    }
}