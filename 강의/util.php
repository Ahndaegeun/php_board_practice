<?php

class DB_SeqSql
{
    private string $templateStr = "";
    private array $params = [];

    public function _toString(): string
    {
        $str = '[';
        $str .= 'SQL=(' . $this->getTemplate() . ')';
        $str .= ', PARAMS=(' . implode(',', $this->getParams()) . ')';
        $str .= ']';

        return $str;
    }

    public function add(string $sqlBit, string $param = null): void
    {
        $this->templateStr .= " " . $sqlBit;

        if ($param !== null) {
            $this->params[] = $param;
        }
    }

    public function getTemplate(): string
    {
        return trim($this->templateStr);
    }

    public function getForBindParam1stArg(): string
    {

        $count = count($this->params);

        return str_repeat("s", $count);
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function getParamsCount(): int
    {
        return count($this->params);
    }
}

function DB_secSql(): DB_SeqSql
{
    return new DB_SeqSql();
}

function DB_getStmtFromSecSql(DB_SeqSql $sql): mysqli_stmt
{
    global $dbConn;
    $stmt = $dbConn->prepare($sql->getTemplate());
    if ($sql->getParamsCount()) {
        $stmt->bind_param($sql->getForBindParam1stArg(), ...$sql->getParams());
    }

    return $stmt;
}

function DB_getRow(DB_SeqSql $sql): ?array
{
    $rows = DB_getRows($sql);

    if (is_array($rows[0])) {
        return $rows[0];
    }

    return null;
}

function DB_getRows(DB_SeqSql $sql): array
{
    $stmt = DB_getStmtFromSecSql($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = [];

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    return $rows;
}

function DB_getRowsIntValue(DB_SeqSql $sql, int $defaultValue): int
{
    $row = DB_getRow($sql);

    if($row == null) {
        return $defaultValue;
    }

    $key = array_key_first($row);
    return intval($row[$key]);
}

function DB_getRowsFloatValue(string $sql, float $defaultValue): float
{
    $row = DB_getRow($sql);

    if($row == null) {
        return $defaultValue;
    }

    $key = array_key_first($row);
    return floatval($row[$key]);
}

function DB_getRowsStringValue(string $sql, float $defaultValue): string
{
    $row = DB_getRow($sql);

    if($row == null) {
        return $defaultValue;
    }

    $key = array_key_first($row);
    return $row[$key];
}

function DB_execute(DB_SeqSql $sql): void
{
    $stmt = DB_getStmtFromSecSql($sql);
    $stmt->execute();
}

function DB_insert(DB_SeqSql $sql): int
{
    global $dbConn;
    DB_execute($sql);

    return mysqli_insert_id($dbConn);
}

function DB_modify(DB_SeqSql $sql): void
{
    DB_execute($sql);
}

function DB_delete($sql): void
{
    DB_execute($sql);
}

function getIntValueOr(&$value, $defaultValue): int
{
    if (isset($value)) {
        return intval($value);
    }

    return $defaultValue;
}

function getStrValueOr(&$value, $defaultValue): string
{
    if (isset($value)) {
        return strval($value);
    }

    return $defaultValue;
}

function jsAlert($msg) {
    echo "<script>";
    echo "alert('${msg}')";
    echo "</script>";
}

function jsLocationReplaceExit($url, $msg = null) {
    if($msg) {
        jsAlert($msg);
    }
    echo "<script>";
    echo "location.replace('${url}')";
    echo "</script>";
    exit;
}

function jsHistoryBackExit($msg = null) {
    if($msg) {
        jsAlert($msg);
    }
    echo "<script>";
    echo "history.back()";
    echo "</script>";
    exit;
}