<?php
  header('Content-Type: text/html; charset=utf-8');

  $db = new mysqli("localhost:3306", "root", "1234", "php_test");
  $db->set_charset("utf-8");

  function query($query) {
    global $db;
    return $db->query($query);
  }
