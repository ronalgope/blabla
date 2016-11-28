<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>
    <td>
        <?php echo $this->Form->file("images.{$key}.image"); ?>
    </td>
    <td class="actions">
        <a href="#" class="remove">Remove Image</a>
    </td>
</tr>
