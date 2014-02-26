<?php echo form_open($Action, array('method' => 'get')); ?>
<table width="100%" id="search-table">
    <tr>
        <td>Province</td>
        <td><?php echo $ProvinceCombo ?></td>
    </tr>
    <tr>
        <td>ID</td>
        <td><?php echo form_input('city_id', $filter->GetId()) ?></td>
    </tr>
	<tr>
		<td>Name</td>
		<td><?php echo form_input('city_name', $filter->GetName()) ?></td>
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
		<td><?php echo anchor('region/city_c/create', 'Create',array('class' => 'btn-create')) ?></td>
	</tr>
</table>
<br />
<table width="100%" id="content-table">
    <thead>
	<tr>
		<td>Action</td>
		<td><?php echo $rsil_order['ID'] ?></td>
		<td><?php echo $rsil_order['Province Name'] ?></td>
		<td><?php echo $rsil_order['City Name'] ?></td>
	</tr>
    </thead>
    <tbody>
	<?php
        $i= 0;
		foreach ($Model as $item) {
	?>
	<tr class="<?php echo $i%2==0 ? 'ganjil' : 'genap'; ?>">
		<td>
			<?php echo anchor('region/city_c/edit/' . $item->GetId(), 'Edit', array('class' => 'btn-update')) ?>
			<?php echo anchor('region/city_c/delete/' . $item->GetId(), 'Delete', array('class' => 'btn-delete')) ?>
		</td>
		<td><?php echo $item->GetId() ?></td>
		<td><?php echo $item->GetProvince()->GetName() ?></td>
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
		<td><?php echo anchor('region/city_c/create', 'Create', array('class' => 'btn-create')) ?></td>
	</tr>
</table>
<br />