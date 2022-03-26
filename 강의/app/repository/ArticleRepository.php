<?php
class APP_ArticleRepository {
    public function getForPrintArticles(): array
    {
        $sql = new DB_SeqSql();
        $sql->add("select a.*");
        $sql->add(", ifnull(m.nickname, 'no user') as x");
        $sql->add("from article as a");
        $sql->add("left join `member` as m");
        $sql->add("on a.memberId = m.id");
        $sql->add("order by id desc");
        return DB_getRows($sql);
    }

    public function getForPrintArticlesById(int $id): ?array
    {
        $sql = new DB_SeqSql();
        $sql->add("select *");
        $sql->add("from article");
        $sql->add("where id = ?", $id);
        return DB_getRow($sql);
    }

    public function writeArticle(int $id, string $title, string $body): int
    {
        $sql = new DB_SeqSql();
        $sql->add("insert into article");
        $sql->add("set regDate = now(),");
        $sql->add("updateDate = now(),");
        $sql->add("title = ?,", $title);
        $sql->add("`body` = ?,", $body);
        $sql->add("memberId = ?", $id);
        return DB_insert($sql);
    }

    public function modifyArticle(string $title, string $body, int $id): void
    {
        $sql = new DB_SeqSql();
        $sql->add("update article");
        $sql->add("set updateDate = now(),");
        $sql->add("title = ?,", $title);
        $sql->add("`body` = ?", $body);
        $sql->add("where id = ?", $id);

        DB_modify($sql);
    }

    public function deleteArticle(int $id): void
    {
        $sql = new DB_SeqSql();
        $sql->add("delete from article");
        $sql->add("where id = ?", $id);
        DB_delete($sql);
    }

    public function getTotalCnt(): int
    {
        $sql = new DB_SeqSql();
        $sql->add("select count(*)");
        $sql->add("from article");
        return DB_getRowsIntValue($sql, 0);
    }
}