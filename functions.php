<?php
require_once('connection.php');

function getRefererPath()
{
    $urlArray = parse_url($_SERVER['HTTP_REFERER']);
    return $urlArray['path'];
}

function savePostedData($post)
{
    $path = getRefererPath();
    switch ($path) {
        case '/new.php':
            createTodoData($post['content']);
            break;
        case '/edit.php':
            updateTodoData($post);
            break;
        case '/index.php':
            deleteTodoData($post['id']);
            break; 
        default:
            break;
    }
}

function getSelectedTodo($id)
{
    return getTodoTextById($id); 
}

function getTodoList()
{
  return getAllRecords();
}

// エスケープ処理
function e($text)
{
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}





//var_dump(getTodoList());
/*
array(8) {
     [0]=> array(10) {
         ["id"]=> int(3) [0]=> int(3) ["content"]=> string(27) "おはようございます" [1]=> string(27) "おはようございます" ["create_at"]=> string(19) "2026-10-15 19:05:17" [2]=> string(19) "2026-10-15 19:05:17" ["updated_at"]=> string(19) "2026-10-15 19:05:17" [3]=> string(19) "2026-10-15 19:05:17" ["deleted_at"]=> NULL [4]=> NULL 
         }
     [1]=> array(10) {
         ["id"]=> int(4) [0]=> int(4) ["content"]=> string(15) "こんばんわ" [1]=> string(15) "こんばんわ" ["create_at"]=> string(19) "2026-10-15 19:26:01" [2]=> string(19) "2026-10-15 19:26:01" ["updated_at"]=> string(19) "2026-10-15 19:26:01" [3]=> string(19) "2026-10-15 19:26:01" ["deleted_at"]=> NULL [4]=> NULL 
         }
     [2]=> array(10) {
         ["id"]=> int(5) [0]=> int(5) ["content"]=> string(9) "テスト" [1]=> string(9) "テスト" ["create_at"]=> string(19) "2026-10-15 19:37:13" [2]=> string(19) "2026-10-15 19:37:13" ["updated_at"]=> string(19) "2026-10-15 19:37:13" [3]=> string(19) "2026-10-15 19:37:13" ["deleted_at"]=> NULL [4]=> NULL 
         } 
     [3]=> array(10) {
         ["id"]=> int(6) [0]=> int(6) ["content"]=> string(12) "テスト２" [1]=> string(12) "テスト２" ["create_at"]=> string(19) "2026-10-15 20:29:55" [2]=> string(19) "2026-10-15 20:29:55" ["updated_at"]=> string(19) "2026-10-15 20:29:55" [3]=> string(19) "2026-10-15 20:29:55" ["deleted_at"]=> NULL [4]=> NULL 
         } 
     [4]=> array(10) {
        ["id"]=> int(8) [0]=> int(8) ["content"]=> string(12) "レビュー" [1]=> string(12) "レビュー" ["create_at"]=> string(19) "2026-10-27 19:25:39" [2]=> string(19) "2026-10-27 19:25:39" ["updated_at"]=> string(19) "2026-10-27 19:25:39" [3]=> string(19) "2026-10-27 19:25:39" ["deleted_at"]=> NULL [4]=> NULL 
        }
     [5]=> array(10) {
        ["id"]=> int(9) [0]=> int(9) ["content"]=> string(12) "テスト３" [1]=> string(12) "テスト３" ["create_at"]=> string(19) "2026-11-04 18:45:21" [2]=> string(19) "2026-11-04 18:45:21" ["updated_at"]=> string(19) "2026-11-04 18:45:21" [3]=> string(19) "2026-11-04 18:45:21" ["deleted_at"]=> NULL [4]=> NULL 
        }
     [6]=> array(10) {
        ["id"]=> int(10) [0]=> int(10) ["content"]=> string(12) "テスト４" [1]=> string(12) "テスト４" ["create_at"]=> string(19) "2026-11-04 19:13:53" [2]=> string(19) "2026-11-04 19:13:53" ["updated_at"]=> string(19) "2026-11-04 19:13:53" [3]=> string(19) "2026-11-04 19:13:53" ["deleted_at"]=> NULL [4]=> NULL
        }
     [7]=> array(10) {
        ["id"]=> int(11) [0]=> int(11) ["content"]=> string(3) "あ" [1]=> string(3) "あ" ["create_at"]=> string(19) "2026-11-04 20:04:10" [2]=> string(19) "2026-11-04 20:04:10" ["updated_at"]=> string(19) "2026-11-04 20:04:10" [3]=> string(19) "2026-11-04 20:04:10" ["deleted_at"]=> NULL [4]=> NULL 
        }
    }
*/