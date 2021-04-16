<?php
require 'db.php';

$db = getConnection();
$title = $_POST['title'];
$sort = getSort();
$parents_id = 0;

$sql = 'INSERT INTO item (title, sort, parents_id) '
    . 'VALUES '
    . '(:title, :sort, :parents_id)';

$result = $db->prepare($sql);
$result->bindParam(':title', $title, PDO::PARAM_STR);
$result->bindParam(':sort', $sort, PDO::PARAM_INT);
$result->bindParam(':parents_id', $parents_id, PDO::PARAM_INT);
if ($result->execute()) {
    header("location: /");
}


function getSort()
{
    $db = getConnection();
    $sql = 'SELECT count(id) AS count FROM item';
    $result = $db->prepare($sql);

    $result->execute();

    $row = $result->fetch();

        return $row['count'] + 1;

}



