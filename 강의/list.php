<?php
$dbConn = mysqli_connect('127.0.0.1', 'root', '1234', 'php_test') or die('DB CONNECTION ERROR');

$sql = "
select * 
  from article as a 
 order by a.id desc
";

$rs = mysqli_query($dbConn, $sql);
$articles = [];

while($article = mysqli_fetch_assoc($rs)) {
    $articles[] = $article;
}

$pageTitle = 'hello';

?>
<?php require_once __DIR__.'/layout/head.php'; ?>
    <h1>article list</h1>
    <ul>
        <?php foreach($articles as $article) {?>
        <li>
            <a href="/강의/detail.php?id=<?=$article['id']?>">
                no : <?=$article['id']?><br>
                regDate : <?=$article['regDate']?><br>
                updateDate : <?=$article['updateDate']?><br>
                title : <?=$article['title']?>
            </a>
            <hr>
        </li>
        <?php }?>
    </ul>
<?php require_once __DIR__.'/layout/footer.php'; ?>