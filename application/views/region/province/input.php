<?php
	echo form_open($Action);
?>

<span class='error'>
	<?php echo validation_errors(); ?>
</span>

<table>
	<tr>
		<td>ID</td>
		<td><?php echo form_input('province_id', $Model->GetId()) ?><td>
	</tr>
	<tr>
		<td>Name</td>
		<td><?php echo form_input('province_name', $Model->GetName()) ?></td>
	</tr>
	<tr>
		<td colspan="2">
			<?php echo anchor('region/province_c', 'Close') ?>
			<?php echo form_submit('Save', 'Save') ?>
		</td>
	</tr>
</table>