<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'DB.php';

$todo = new DB('todo-tasks');
echo $todo->last_message;

if (array_key_exists('task', $_POST)) {
    $text = $_POST['task'];
    if (testText($text)) {
        $id = $todo->setData($text, 0);
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
    if ((int) $id == $id && $id > 0 && testText($text)) {
        $todo->update($id, ['text' => $text]);
    }
}

include "view.php";


function testText($text) {
    if (!is_string($text)) {
        return false;
    }
    return true;
}







$search_array = [
    'level1' => [
        'first' => 5
    ],
    'second' => 4
];
if (array_key_exists('first', $search_array)) {
    echo "The 'first' element is in the array";
}
else {
    echo "The 'first' element is not in the array";
}

?>

<pre><?php echo print_r($_REQUEST, true); ?></pre>