<?php

include 'DB.php';

$todo = new DB('todo-tasks');

if (array_key_exists('task', $_POST)) {
    if (is_string($_POST['task'])) {
        $todo->setData($_POST['task'], 0);
    }
}

if (array_key_exists('remove', $_REQUEST)) {
    if (is_numeric($_REQUEST['remove'])) {
        $todo->delete($_REQUEST['remove']);
    }
}

include "view.php";