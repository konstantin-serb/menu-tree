<?php

require_once 'devel.php';
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
    <title>Редактирование меню</title>
    <style>

    </style>
</head>
<body>


<h1>Редактирование меню</h1>

<form action="updateSubmenu.php" method="post">
    <div class="edit-admin">
        <label>Редактирование меню: </label>
        <br>
        <input type="text" name="title" value="<?=$item['title']?>">
        <br><br>
        <label>Номер сортировки</label>
        <br>
        <input type="text" name="sort" value="<?=$item['sort']?>">
        <input type="hidden" name="id" value="<?=$item['id']?>">
    </div>
    <br>
    <div class="button-admin admin-edit">
        <input class="buttonSave" type="submit" name="submit" value="Внести изменения">
    </div>
</form>

</body>
</html>

