<?php 
 function template($id, $text, $status) {
?>
<div class="<?=$status == 1 ? 'done' : '';?>" data-id="<?=$id;?>">
    <pre><?=$text;?></pre>

    <a href="/?remove=<?=$id;?>" class="remove">x</a>
</div>
<?php
 }
?>