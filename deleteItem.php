<?php
require 'db.php';
require_once 'devel.php';

$db = getConnection();
$id = $_POST['id'];

$sql = "DELETE FROM item 
WHERE id = ". $id;
$result = $db->prepare($sql);
if ($result->execute()) {
    header("location: /");
}





