<?php
	echo form_open_multipart();
?>

<span class='error' >
	<?php echo validation_errors(); ?>
</span>

<table style="margin-top: 100px;">
    <?php foreach ($Model as $item) {?>
        <tr>
		<td>ID</td>
		<td><?php echo form_input('id_foto', $Model->getId()) ?><td>
	</tr>
	<tr>
		<td>Name</td>
		<td><?php echo form_input('user_name', $Model->getUser()->getUsername); ?></td>
	</tr>
        <?php }?>
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