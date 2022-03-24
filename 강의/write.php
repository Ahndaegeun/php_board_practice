<?php require_once __DIR__.'/layout/head.php'; ?>
<form action="/강의/doWrite.php" method="post">
    <input type="text" name="title">
    <input type="text" name="body">
    <button type="submit">submit</button>
</form>
<?php require_once __DIR__.'/layout/footer.php'; ?>