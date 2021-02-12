<?php

include 'DB.php';

$todo = new DB('todo-tasks');

if (array_key_exists('task', $_POST)) {
    echo $_POST['task'];
}

include "view.php";