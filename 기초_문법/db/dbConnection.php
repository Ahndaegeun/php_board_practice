<?php
$dsn = 'mysql:host=localhost;port=3306;dbname=php_test;charset=utf8';
$user = 'root';
$password = '1234';

try 
{
  $conn = new PDO($dsn, $user, $password);
  echo 'connection success';
}
catch (PDOException $e)
{
  echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
</body>
</html>