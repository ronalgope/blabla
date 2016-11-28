<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>
    <td>
        <?php echo $this->Form->text("units.{$key}.name"); ?>
    </td>
    <td>
        <?php echo $this->Form->textarea("units.{$key}.spec"); ?>
    </td>
    <td>
        <?php echo $this->Form->textarea("units.{$key}.facility"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("units.{$key}.price"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("units.{$key}.bookingfee"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("units.{$key}.downpayment"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("units.{$key}.available"); ?>
    </td>
    <td class="actions">
        <a href="#" class="remove">Remove Units</a>
    </td>
</tr>
