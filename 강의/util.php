<?php
function DB__getRow($sql) {
    global $dbConn;

    $rs = mysqli_query($dbConn, $sql);
    $row = mysqli_fetch_assoc($rs);
    return $row;
}

function DB__getRows($sql) {
    global $dbConn;

    $rs = mysqli_query($dbConn, $sql);

    $rows = [];

    while($row = mysqli_fetch_assoc($rs)) {
        $rows[] = $row;
    }
    return $row;
}