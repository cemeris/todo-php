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

if (array_key_exists('update', $_REQUEST)) {
    $id = $_REQUEST['update'];
    if ((int) $id == $id && $id > 0) {
        $todo->update($_REQUEST['update'], ['text' => 'test new value']);
    }
}

include "view.php";