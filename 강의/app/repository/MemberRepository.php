<?php
class APP_MemberRepository {

    public function loginMember(string $loginId, string $loginPw): ?array
    {
        $sql = DB_secSql();
        $sql->add('select *');
        $sql->add('from member');
        $sql->add('where loginId = ?', $loginId);
        $sql->add('and loginPw = ?', $loginPw);
        $sql->add('and delStatus = 0');

        return DB_getRow($sql);
    }

    public function getForPrintMemberById(int $id): ?array
    {
        $sql = DB_secSql();
        $sql->add('select *');
        $sql->add('from member');
        $sql->add('where id = ?', $id);
        $sql->add('and delStatus = 0');

        return DB_getRow($sql);
    }

    public function secession(int $id)
    {
        $sql = DB_secSql();
        $sql->add('update `member`');
        $sql->add('set delStatus = 1');
        $sql->add(', delDate = now()');
        $sql->add('where id = ?', $id);
        DB_modify($sql);
    }
}