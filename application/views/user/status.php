<script src="<?php echo base_url('asset/js/jquery-1.10.2.min.js')?>">
</script>
<div class="container " style="margin-top: 70px">
	<div class="jumbotron">
            <h1><?php echo $this->session->userdata['user_name']?></h1>
	</div>
	<form method="post" action="<?php echo site_url('status/status_c/create') ?>" >
            <div class="status">
                <div class="panel panel-default" style="margin-left: 10%;width: 90%">
                    <div class="panel-heading">
                        <h3 class="">Status</h3>
                        <textarea name="status" class="form-control block"></textarea>
                        <div class="panel-footer">
                            <button type="submit" class="btn-primary btn-lg"> Post</button> 
                    
                        </div>
                </div>
            </div>    
	</form>
    <?php foreach ($Model as $item) {?>
            <div class="status">
                <div class="panel panel-default" style="margin-left: 10%;width: 90%">
                   
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $item->getUser()->getUserName()?></h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $item->getStatus() ?>
                    </div>
                    <div class="panel-footer">
                        <?php echo $item->getTglPost() ?>
                    </div>
                    <button type="button" class="btn-primary  btn-sm" value="i">Komentar</button>
                    <?php if ($this->session->userdata['user_name'] == $item->getUser()->getUsername()) {?>
                        <?php echo anchor('status/status_c/delete/'. $item->getId(), 'Delete', array('class' => 'btn-delete')) ?>
                    <?php } else 
                        ?>
                </div>
                </div>
      <?php }?>

	</div>
