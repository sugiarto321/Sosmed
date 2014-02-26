<!DOCTYPE HTML>
<html>
    <head>
    	<?php
    		echo link_tag ('asset/css/bootstrap.css');
    		echo link_tag('asset/css/content.css');
    		echo link_tag('asset/css/detail.css');
		
            echo link_tag('asset/css/base/jquery-ui.css');
            echo link_tag('asset/css/base/jquery.ui.dialog.css');
            echo link_tag('asset/css/slider/jquery.bxslider.css');
    	?>
    	<script type="text/javascript" src="<?php echo base_url() ?>asset/js/jquery-1.10.2.min.js"></script>
    	<script type="text/javascript" src="<?php echo base_url() ?>asset/js/ui/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>asset/js/ui/jquery.ui.dialog.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>asset/js/slider/jquery.bxslider.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>asset/js/accounting/accounting.min.js"></script>
       <!-- <script type="text/javascript">
        	function IDR(value){
        		document.write(accounting.formatMoney(value, "IDR  ", 2, ".", ","));
        	}
                function IDR_V(value){
        		return accounting.formatMoney(value, "IDR  ", 2, ".", ",");
        	}
                
       </script>-->
    </head>
    <body>
		<!-- <div id="top">
			<div id="menu-top">
				<div id="form">
					<form>
						<input type="text" placeholder="User Name" />
						<input type="password" placeholder="Password" />
						<input type="submit" value="Login" />
					</form>
				</div>
				<!--<div id="cart-colection">
					<?php echo anchor('x_cloth/viewcart', "View Cart") ?>
				</div>
			</div>
		</div>-->
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Keles Aja</a>
        </div>
        <div class="navbar-collapse collapse">
          <form method="POST" class="navbar-form navbar-right" action="<?php echo site_url('home/login')?>">
            <div class="form-group">
              <input type="text" placeholder="User Name" class="form-control" name="user">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" name="pass">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Sign in</button>
            <a class="btn btn-success btn-sm" href="<?php echo site_url('user/register_c')?>">
            	Sign up
            </a>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
    <!--
        <div id='wrapper'>
            <div id='header'><center><?php echo img('asset/image/logo.png'); ?></center></div>
            <div id='menu'>
                <ul>
                    <li><?php echo anchor('x_cloth', 'Home', array('style' => 'border-right: 2px solid white')) ?></li>
                    <li><?php echo anchor('x_cloth/about', 'About', array('style' => 'border-right: 2px solid white')) ?></li>
                    <li><?php echo anchor('x_cloth/catalog', 'Product', array('style' => 'border-right: 2px solid white')) ?></li>
                    <li><?php echo anchor('x_cloth/contact', 'Contact', array('style' => 'border-right: 2px solid white')) ?></li>
                    <li><?php echo anchor('x_cloth/register', 'Register') ?></li>
                    <!-- <li><a href="#" style="border-right: 2px solid white">Testimoni</a></li>
                    <li><a href="#">Distro</a></li> 
                </ul>
                <div id='search'>
                    <div id='search-place'>
                        <form>
                        <input type="text" id='search-box' />
                        <input type='submit' value='' id='submit-search' />
                        </form>
                    </div>
                </div>
            </div>-->
            <div id="content" class="container" style="padding-top: 50px">