<?php

function createTree($array)
{
    $tree = [];
    foreach ($array as $key => &$row) {
        if ($row['parents_id'] == 0) {
            $tree[$key] = &$row;
        } else {
            $array[$row['parents_id']]['children'][$key] = &$row;
        }
    }
    return $tree;
}