<?php

include 'DB.php';

$todo = new DB('todo-tasks');

echo $todo->last_message;
echo "todo-php";



include "view.php";