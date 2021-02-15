<?php 
 function template($id, $text, $status) {
?>
<div class="<?=$status == 1 ? 'done' : '';?>" data-id="<?=$id;?>">
    <pre><?=$text;?></pre>

    <div>
        <a href="/?remove=<?=$id;?>" class="remove">x</a>
        <a href="#update" class="update-link" onclick="startUpdate.bind(this)(event)">U</a>
    </div>
</div>
<?php
 }
?>