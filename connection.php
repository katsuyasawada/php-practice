<?php
require_once('config.php');

function connectPdo()
{
    try {
        return new PDO(DSN, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}

function createTodoData($todoText)
{
    $dbh = connectPdo();
    $sql = "INSERT INTO todos (content) VALUES '{$todoText}'" ; 
    $dbh->query($sql);
}

function updateTodoData($post)
{
    $dbh = connectPdo();
    $sql = "UPDATE todos SET content = '{$post['content']}' WHERE id = '{$post['id']}'" ;
    $dbh->query($sql);
}

function deleteTodoData($id)
{
    $dbh = connectPdo();
    $now = date('Y-m-d H:i:s');
    $sql = "UPDATE todos SET deleted_at = '$now' WHERE id = $id";
    $dbh->query($sql);
}

function getTodoTextById($id)
{
    $dbh = connectPdo();
    $sql = "SELECT * FROM todos WHERE deleted_at IS NULL AND id = $id";
    $data = $dbh->query($sql)->fetch();
    return $data['content'];
}

function getAllRecords()
{
    $dbh = connectPdo();
    $sql = 'SELECT * FROM todos WHERE deleted_at IS NULL';
    return $dbh->query($sql)->fetchAll();
}




//fetch()の戻り値の中身
// array(10) {
//     ["id"]=> int(3) [0]=> int(3)
//     ["content"]=> string(12) "おはよう" [1]=> string(12) "おはよう"
//     ["create_at"]=> string(19) "2026-10-15 19:05:17" [2]=> string(19) "2026-10-15 19:05:17"
//     ["updated_at"]=> string(19) "2026-11-06 21:08:20" [3]=> string(19) "2026-11-06 21:08:20"
//     ["deleted_at"]=> NULL [4]=> NULL }