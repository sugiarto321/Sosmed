
					<form class="form-horizontal" action="" method="get">
                                            <div class="bs-example" style="margin: 60px;">
                                                <div class="row">
                                                    <div class="col-xs-3 col-md-3">
                                                        <a class="thumbnail">
                                                            <img alt="100%x180" data-src="holder.js/100%x180"
                                                                 style="height: 180px; width: 100%; display: block;"
                                                                 src="data:image/png;base64,iVBORw0K…WMvzjxqii3JRA2AAAAAElFTkSuQmCC"></img>
                                                        </a>
                                                    </div>
                                                    <div class="col-xs-3 col-md-6">
                                                        <h4 class="panel-info">Name  : <?php echo $Model->getUsername();?></h4>
                                                        <h4 class="panel-default">Email         : <?php echo $Model->getEmail();?></h4>
                                                       <h4 class="panel-default">Jenis Kelamin  : <?php echo $Model->getJenis_kelamin();?></h4>
                                                       <h4 class="panel-default">Tgl Lahir      : <?php echo $Model->getTgl_lahir();?></h4>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
				