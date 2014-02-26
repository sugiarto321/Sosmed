<!DOCTYPE HTML>
<html>
    <head>
    	<?php
    		echo link_tag('asset/css/content.css');
    		echo link_tag('asset/css/detail.css');
			echo link_tag('asset/css/prom.css');
			echo link_tag('asset/css/bootstrap.css');
			//echo link_tag('asset/css/admin/master.css');
            echo link_tag('asset/css/base/jquery-ui.css');
            echo link_tag('asset/css/base/jquery.ui.dialog.css');
            echo link_tag('asset/css/slider/jquery.bxslider.css');
    	?>
    	<script type="text/javascript" src="<?php echo base_url() ?>asset/js/jquery-1.10.2.min.js"></script>
    	<script type="text/javascript" src="<?php echo base_url() ?>asset/js/ui/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>asset/js/ui/jquery.ui.dialog.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>asset/js/slider/jquery.bxslider.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>asset/js/accounting/accounting.min.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url() ?>asset/js/rsil.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url() ?>asset/js/form/jquery.form.min.js"></script>
        <script type="text/javascript">
        	function IDR(value){
        		document.write(accounting.formatMoney(value, "IDR  ", 2, ".", ","));
        	}
        </script>
    </head>
    <body>
		
        <div id='wrapper'>
            <div id='menu'>
                <ul>
                    <li><?php echo anchor('content/slider_c', 'Slider', array('style' => 'border-right: 2px solid white')) ?></li>
                    <li><?php echo anchor('admin/x_admin/Logout', 'Logout', array('style' => 'border-right: 2px solid white')) ?></li>
                    <li><?php echo anchor('region/city_c', 'Slider', array('style' => 'border-right: 2px solid white')) ?></li>
                    <li><?php echo anchor('region/province_c', 'Slider', array('style' => 'border-right: 2px solid white')) ?></li>
                    
                </ul>
            </div>
            
            <div id="content">