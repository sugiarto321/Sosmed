<table>
    <tr>
        <td>Province</td>
        <td>
            <?php echo $Model->GetProvince()->GetName() ?>
        </td>
    </tr>
	<tr>
		<td>ID</td>
		<td>
			<?php echo $Model->GetId(); ?>
		<td>
	</tr>
	<tr>
		<td>Name</td>
		<td><?php echo $Model->GetName() ?></td>
	</tr>
	<tr>
		<td colspan="2">
			<?php echo anchor('region/city_c/edit/'.$Model->GetId() , 'Edit') ?>
			<?php echo anchor('region/city_c', 'Close') ?>
		</td>
	</tr>
</table>