<html>
	 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
	"http://www.w3.org/TR/html4/strict.dtd">
	<head>
		<title>Coba Tampilan</title>
                <?php
                    echo link_tag('asset/css/bootstrap.css');
                   
                ?>
	</head>
	<body>
            
		<div class="navbar navbar-default navbar-fixed-top">
			<div class="container">	
				<div class="navbar-header">
                                    <button class="navbar-toggle" data-target=".bs-navbar-collapse" data-toggle="collapse" type="button">
                                            <span class="sr-only">Toogle Navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand" href="<?php echo base_url();?>">
                                            Keles
                                        </a>
					
				</div>
				<div id="navbar-main" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
                                            <li<?PHP if($this->uri->segment(2) == "" || $this->uri->segment(2) == "status_c") { echo ' class="active"'; } ?>>
                                                    <a href="<?PHP echo site_url('/status/status_c'); ?>">Home</a>
                                            </li>
                                            <li<?PHP if($this->uri->segment(2) == "" || $this->uri->segment(2) == "foto_c") { echo ' class="active"'; } ?>>
                                                    <a href="<?PHP echo site_url('/status/foto_c'); ?>">Foto</a>
                                            </li>
                                            <li<?PHP if($this->uri->segment(2) == "" || $this->uri->segment(2) == "message_c") { echo ' class="active"'; } ?>>
                                                    <a href="<?PHP echo site_url('/message/message_c'); ?>">Message</a>
                                            </li>
                                            <li<?PHP if($this->uri->segment(2) == "" || $this->uri->segment(2) == "profile_c") { echo ' class="active"'; } ?>>
                                                    <a href="<?PHP echo site_url('/user/profile_c/lihat/'.$this->session->userdata['id_user']); ?>">Profile</a>
                                            </li>
                                            <li<?PHP if($this->uri->segment(2) == "" || $this->uri->segment(2) == "friend_c") { echo ' class="active"'; } ?>>
                                                    <a href="<?PHP echo site_url('/user/friend_c'); ?>">Friend</a>
                                            </li>
                                            
                                        </ul> 
                                    <ul class="nav navbar-nav navbar-right ">

                                        <li class="inline">
                                            <?php $a = $this->session->userdata['user_name'];?>
                                                 <?php echo anchor('Home/Logout',$a ,array('class' =>'glyphicon glyphicon-log-out','style' =>'padding-left:30px'));?>
                                                 
                                        </li>
                                    </ul>
                                    
				</div>
                                
			</div>
		</div>

                <script src="<?php echo base_url('/asset/js/bootstrap.js')?>" type="text/javascript">
                </script>
                <script src="<?php echo base_url('/asset/js/jquery-1.10.2.min.js')?>" type="text/javascript">
                </script>
                <script src="<?php echo base_url('/asset/js/widgets.js')?>" type="text/javascript">
                </script>
                <script src="<?php echo base_url('/asset/js/application.js')?>" type="text/javascript">
                </script>
                <script src="<?php echo base_url('/asset/js/holder.js')?>" type="text/javascript">
                </script>
                
                <script src="<?php echo base_url('/asset/js/bootstrap-datepicker.js')?>" type="text/javascript">
                </script>
                <style type="text/css" id="holderjs-style"></style>