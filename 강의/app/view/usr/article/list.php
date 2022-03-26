<?php
$headTitle = 'list';
?>
<?php require_once __DIR__ . '/../head.php' ?>
<h2><a href="write">write</a></h2>
<h3>totalCount: <?=$totalCnt?></h3>
<ul>
    <?php foreach ($result as $item) {?>
        <li>
            <a href="detail?id=<?=$item['id']?>">
                no: <?=$item['id']?><br>
                date: <?=$item['regDate']?><br>
                title: <?=$item['title']?><br>
                writer: <?=$item['x']?>
            </a>
            <hr>
        </li>
    <?php }?>
</ul>
<?php require_once __DIR__ . '/../foot.php' ?>

