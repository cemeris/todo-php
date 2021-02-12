<?php

include 'DB.php';

$todo = new DB('todo-tasks');

if (array_key_exists('task', $_POST)) {
    echo $_POST['task'];
    echo $todo->last_message;
    $todo->setData($_POST['task'], 0);
}

include "view.php";