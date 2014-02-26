<?php
	echo form_open_multipart($Action);
?>

<span class='error'>
	<?php echo validation_errors(); ?>
</span>

<table>
	<tr>
		<td>ID</td>
		<td><?php echo form_input('slider_id', $Model->GetId()) ?><td>
	</tr>
	<tr>
		<td>Name</td>
		<td><?php echo form_input('slider_name', $Model->GetName()) ?></td>
	</tr>
    <tr>
        <td>File</td>
        <td><?php echo form_upload('file') ?></td>
    </tr>
	<tr>
		<td colspan="2">
			<?php echo anchor('content/slider_c', 'Close') ?>
			<?php echo form_submit('Save', 'Save') ?>
		</td>
	</tr>
</table>