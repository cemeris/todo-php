<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'DB.php';

$todo = new DB('todo-tasks');

if (array_key_exists('task', $_POST)) {
    if (is_string($_POST['task'])) {
        $id = $todo->setData($_POST['task'], 0);
        if ($id) {
            echo $id;
            header('Location: /');
        }
    }
}

if (array_key_exists('remove', $_REQUEST)) {
    $id = $_REQUEST['remove'];
    if ((int) $id == $id && $id > 0) {
        $todo->delete($_REQUEST['remove']);
    }
}

if (
    array_key_exists('update', $_REQUEST) &&
    array_key_exists('task-description', $_REQUEST)
) {
    $id = $_REQUEST['update'];
    $text = $_REQUEST['task-description'];
    if ((int) $id == $id && $id > 0) {
        $todo->update($id, ['text' => $text]);
    }
}

include "view.php";