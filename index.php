<?php
require 'devel.php';
require 'tree.php';
require 'db.php';

$db = getConnection();
$sql = "SELECT * FROM item ORDER BY parents_id";
$result = $db->prepare($sql);
$result->execute();
$i = 1;
$item = array();
while ($row = $result->fetch()) {
    $item[$i]['id'] = $row['id'];
    $item[$i]['title'] = $row['title'];
    $item[$i]['parents_id'] = $row['parents_id'];
    $i++;
}

$tree = createTree($item);
//dumper($item);
//dumper($tree);die;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Дерево меню</title>
    <style>
        li {
            list-style-type: none; /* Убираем маркеры */
            margin-left: 0.5em;
            padding-top: 0.2em;
        }
        ul {
            margin-left: 0.5em;
            padding: 0.2em 0;
        }
        a {
            text-decoration: none;
        }

        .del {
            color:red;
        }

        .update {
            color:blue;
        }

        .add {
            color: green;
        }
    </style>
</head>
<body>




<h1>Создание и редактирование меню</h1>

<?php function view($tree)
{ ?>
    <ul class="comment-tree client">
        <?php foreach ($tree as $key => $value): ?>
            <li>
                <?=$value['title']?> (<a class="add" href="submenu.php?id=<?=$value['id']?>">add</a>)
                (<a class="update" href="update.php?id=<?=$value['id']?>" >update</a>)
                <?php if(empty($value['children'])):?>
                <a class="del" href="delete.php?id=<?=$value['id']?>" title="delete">&#10006;</a>
                <?php endif?>
            </li>
            <?php if (!empty($value['children'])): ?>
                <li>
                    <?php view($value['children']); ?>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
<?php }

view($tree);
?>

<form action="create.php" method="post">
    <div class="edit-admin">
        <p>Введите название</p>
        <input type="text" name="title">
    </div>
    <br>
    <div class="button-admin admin-edit">
        <input class="buttonSave" type="submit" name="submit" value="Добавить">
    </div>
</form>

</body>
</html>
