<title>Uzdevumu saraksts</title>
<link rel="stylesheet" href="style.css">

<h1>todo page</h1>


<form action="" method="post" class="new-task">
    <textarea name="task" required></textarea>
    <button type="submit">Izveidot</button>
</form>
<div class="task-list">
    <?php $todo->get(); ?>
</div>