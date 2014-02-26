<?php echo form_open($Action, array('method' => 'get')); ?>
<table width="100%" id="search-table">
    <tr>
        <td>ID</td>
        <td><?php echo form_input('province_id', $filter->GetId()) ?></td>
    </tr>
	<tr>
		<td>Name</td>
		<td><?php echo form_input('province_name', $filter->GetName()) ?></td>
	</tr>
	<tr>
		<td></td>
		<td align="left">
			<?php echo form_submit('Search', 'Search') ?>
		</td>
	</tr>
</table>
<?php echo form_close(); ?>

<br />
<table>
	<tr>
		<td><?php echo anchor('region/province_c/create', 'Create',array('class' => 'btn-create')) ?></td>
	</tr>
</table>
<br />
<table width="100%" id="content-table">
    <thead>
	<tr>
		<td>Action</td>
		<td><?php echo $rsil_order['ID'] ?></td>
		<td><?php echo $rsil_order['Name'] ?></td>
	</tr>
    </thead>
        <tbody>
	<?php
        $i = 0;
		foreach ($Model as $item) {
	?>
	<tr class="<?php echo $i%2==0 ? 'ganjil' : 'genap'; ?>" >
		<td>
			<?php echo anchor('region/province_c/edit/' . $item->GetId(), 'Edit', array('class' => 'btn-update')) ?>
			<?php echo anchor('region/province_c/delete/' . $item->GetId(),  'Delete', array('class' => 'btn-delete')) ?>
		</td>
		<td><?php echo $item->GetId() ?></td>
		<td><?php echo $item->GetName() ?></td>
	</tr>
	<?php
	$i++;	}
	?>
        </tbody>
</table>
<br />
<div id='pagination'>
    <?php echo $rsil_page; ?>
</div>

<table>
	<tr>
		<td><?php echo anchor('region/province_c/create', 'Create', array('class' => 'btn-create')) ?></td>
	</tr>
</table>
<br />