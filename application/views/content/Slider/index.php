<?php echo form_open($Action, array('method' => 'get')); ?>
<table width="100%" id="search-table">
    <tr>
        <td>ID</td>
        <td><?php echo form_input('slider_id', $filter->GetId()) ?></td>
    </tr>
	<tr>
		<td>Name</td>
		<td><?php echo form_input('slider_name', $filter->GetName()) ?></td>
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

</table>
<br />
<table width="100%" id="content-table">
    <thead>
	<tr>
		
		<td><?php echo $rsil_order['ID'] ?></td>
		<td><?php echo $rsil_order['Slider Name'] ?></td>
                <td >Action</td>
	</tr>
    </thead>
    <tbody>
	<?php
        $i = 0;
		foreach ($Model as $item) {
	?>
	<tr class="<?php echo $i%2==0 ? 'ganjil' : 'genap'; ?>">

                <td class="text-center"><?php echo $item->GetId() ?></td>
		<td class="text-center"><?php echo $item->GetName() ?></td>
                <td>
			<?php echo anchor('content/slider_c/edit/' . $item->GetId(), 'Edit', array('class' => 'glyphicon glyphicon-edit')) ?>
			<?php echo anchor('content/slider_c/delete/' . $item->GetId(), ' ', array('class' => 'glyphicon glyphicon-remove')) ?>
		</td>
	</tr>
	<?php
		$i++; }
	?>
    </tbody>
</table>
<br />
<div id='pagination'>
    <?php echo $rsil_page; ?>
</div>


<table>
	<tr>
		<td><?php echo anchor('content/slider_c/create', 'Create',array('class' => 'btn-create')) ?></td>
	</tr>
</table>
<br />