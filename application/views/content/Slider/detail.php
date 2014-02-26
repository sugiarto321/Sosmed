<table>
	<tr>
		<td>ID</td>
		<td>
			<?php echo $Model->GetId() ?>
		<td>
	</tr>
	<tr>
		<td>Name</td>
		<td><?php echo $Model->GetName() ?></td>
	</tr>
	<tr>
	    <td>Image</td>
	    <td><?php
	           $img = array(
                            'src' => $Model->GetPath() . $Model->GetFullName(),
                            'width' => '60px'
                        );
	           echo img($img);
	       ?>
	   </td>
	</tr>
	<tr>
		<td colspan="2">
			<?php echo anchor('content/slider_c/edit/'.$Model->GetId() , 'Edit') ?>
			<?php echo anchor('content/slider_c', 'Close') ?>
		</td>
	</tr>
</table>