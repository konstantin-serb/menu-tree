<?php

require_once 'devel.php';
require_once 'db.php';

$parents_id = $_GET['id'];
$db = getConnection();
$sql = 'SELECT * FROM item WHERE id = :id';
$result = $db->prepare($sql);
$result->bindParam(':id', $parents_id, PDO::PARAM_INT);
$result->setFetchMode(PDO::FETCH_ASSOC);
$result->execute();

$item = $result->fetch();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление пункта субменю</title>
    <style>

    </style>
</head>
<body>


<h1>Редактирование меню</h1>

<form action="createSubmenu.php" method="post">
    <div class="edit-admin">
        <p>Добавте дочерний пункт подменю: </p>
        <h4><?=$item['title']?></h4>
        <input type="text" name="title">
        <input type="hidden" name="parents_id" value="<?=$parents_id?>">
    </div>
    <br>
    <div class="button-admin admin-edit">
        <input class="buttonSave" type="submit" name="submit" value="Добавить">
    </div>
</form>

</body>
</html>

