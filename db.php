<?php

function getConnection()
{
    $params = [
        'host' => 'localhost',
        'dbname' => 'menu_tree',
        'user' => 'root',
        'password' => '',
    ];
    $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
    $db = new PDO($dsn, $params['user'], $params['password']);
    $db->exec("set names utf8");
    return $db;
}
