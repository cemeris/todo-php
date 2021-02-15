<title>Uzdevumu saraksts</title>
<link rel="stylesheet" href="style.css">

<h1>todo page</h1>


<form action="" method="post" class="new-task">
    <textarea name="task" required></textarea>
    <button type="submit">Izveidot</button>
</form>
<form action="" method="post" class="update">
    <textarea name="task-description" required></textarea>
    <input type="hidden" name="update" value="">
    <button type="submit">Atjaunot</button>
</form>
<div class="task-list">
    <?php $todo->get(); ?>
</div>

<script>
    function startUpdate(e) {
        e.preventDefault();
        let task = this.parentElement.parentElement;
        let pre = task.querySelector('pre');
        let update = document.querySelector('.update');
        let textarea = update.querySelector('textarea');
        let input = update.querySelector('[name="update"]');

        input.value = task.getAttribute('data-id');

        textarea.value = pre.textContent;
    }
</script>
