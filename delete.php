<?php

//require_once 'devel.php';
require_once 'db.php';

$id = $_GET['id'];
$db = getConnection();
$sql = 'SELECT * FROM item WHERE id = :id';
$result = $db->prepare($sql);
$result->bindParam(':id', $id, PDO::PARAM_INT);
$result->setFetchMode(PDO::FETCH_ASSOC);
$result->execute();

$item = $result->fetch();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Удаление записи из базы данных</title>
    <style>

    </style>
</head>
<body>


<h1>Удаление записи из базы данных</h1>

<form action="deleteItem.php" method="post">
        <input type="hidden" name="id" value="<?=$item['id']?>">
    <h2>Вы точно хотите удалить запись: <?=$item['title']?></h2>
    <br>
    <div class="button-admin admin-edit">
        <input class="buttonSave" type="submit" name="submit" value="Удалить">
    </div>
</form>

</body>
</html>

