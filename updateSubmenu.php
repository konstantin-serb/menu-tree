<?php
require 'db.php';
require_once 'devel.php';

$db = getConnection();
$title = $_POST['title'];
$sort = $_POST['sort'];
$id = $_POST['id'];

$sql = "UPDATE item SET  
            title = :title, sort = :sort
            WHERE id = :id";
$result = $db->prepare($sql);
$result->bindParam(':title', $title, PDO::PARAM_STR);
$result->bindParam(':sort', $sort, PDO::PARAM_INT);
$result->bindParam(':id', $id, PDO::PARAM_INT);
if ($result->execute()) {
    header("location: /");
}





