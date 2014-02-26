                                        <?echo form_validation_erros();?>
					<form class="form-horizontal" action="<?php echo site_url('user/register_c/register')?>" method="post">
                                        
                                            <legend>Register</legend>
						<fieldset>
							<div class="form-group">
								<label for="inputName" class="col-lg-3 control-label">User Name</label>
								<div class="col-lg-5">
									<input type="text" class="form-control"  placeholder="username" required="" name="user" />
								</div>
							</div>
							<div class="form-group">
								<label for="password" class="col-lg-3 control-label">Password</label>
								<div class="col-lg-5">
									<input type="password" class="form-control"  placeholder="password" name="pass" required=""/>
								</div>
							</div>
                                                    	<div class="form-group">
								<label for="password" class="col-lg-3 control-label">Password Confirmation</label>
								<div class="col-lg-5">
									<input type="password" class="form-control"  placeholder="password" name="passconf" required=""/>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail" class="col-lg-3 control-label">Email</label>
								<div class="col-lg-5">
									<input type="text" class="form-control"  placeholder="email" name="email" />
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail" class="col-lg-3 control-label">Tanggal Lahir</label>
								<div class="col-lg-5">
									<input type="text" id="tgl" class="form-control"  placeholder="Tanggal Lahir" name="tgl"/>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail" class="col-lg-3 control-label">No Handphone</label>
								<div class="col-lg-5">
									<input type="text" class="form-control"  placeholder="No hp" name="nohp"/>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail" class="col-lg-3 control-label">Jenis Kelamin</label>
								<div class="col-lg-5">
									<div class="radio">
										<input id="optionRadios1" type="radio" value="Pria"  name="Pria" /> Pria</input>
										
									</div>
									<div class="radio">
										<input id="optionRadios1" type="radio" value="Wanita"  name="Pria" /> Wanita</input>
										
									</div>
									
								</div>
							</div>
							<div class="form-group col-lg-12">
								<div class="col-lg-6 pull-right">
									<a>
										<button class="btn btn-lg btn-primary btn-block">Register</button>	
									</a>
									
								</div>	
							
							
						</fieldset>
					</form>
<script type="text/javascript">
    $(document).ready(function(e) {
        $("#tgl").datepicker({
           dateFormat: "yy-mm-dd"
        });
    });
    </script>