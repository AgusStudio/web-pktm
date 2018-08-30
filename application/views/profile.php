<?php $this->load->view('header');?>
<body> 
<!-- Begin page -->
<div id="wrapper"> 
    <!-- Top Bar Start -->
    <?php $this->load->view('top_menu');?>
    <!-- Top Bar End -->
    <!-- ========== Left Sidebar Start ========== -->
    <?php $this->load->view('sidebar');?>
    <!-- Left Sidebar End --> 
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="bg-picture text-center" style="background-image:url('<?php echo base_url('assets/images/background.jpg');?>');">
                            <div class="bg-picture-overlay"></div>
                            <div class="profile-info-name">
                                <img src="<?php if($user->foto==''){ echo base_url('assets/users/userdefault.png');}else{ echo base_url('assets/users/'.$user->foto); } ?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                <h3 class="text-white"><?php echo $user->ketua_rt; ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="modal-dialog modal-full">
                          <div class="modal-content">
                            <div class="modal-header" style="background-color: #29b6f6">
                              <h4 class="modal-title text-center text-white" id="myModalLabel">Profile's <?php echo $user->ketua_rt;?> <span class="pull-right"><i data-toggle="modal" style="cursor:pointer" data-target="#PassModal" class="fa fa-lock text-white"> Ubah Password</i></span></h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">NIP</label>
                                          <div class="col-sm-7">
                                            <label class="control-label">: <?php echo $user->nip;?></label>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">Tempat, Tgl Lahir</label>
                                          <div class="col-sm-7">
                                            <label class="control-label">: <?php echo $user->tempat_lahir_rt.','.date('d/m/Y',strtotime($user->tgl_lahir_rt));?></label>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">Jenis Kelamin</label>
                                          <div class="col-sm-7">
                                            <label class="control-label">: <?php echo $user->jenis_kelamin_rt;?></label>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">Agama</label>
                                          <div class="col-sm-7">
                                            <label class="control-label">: <?php echo $user->agama_rt;?></label>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">Tanggal Menjabat</label>
                                          <div class="col-sm-7">
                                            <label class="control-label">: <?php echo date('d/m/Y', strtotime($user->tgl_menjabat));?></label>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <div id="PassModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="'disabled'">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title text-center" id="myModalLabel">Ubah Password</h4>
                            </div>
                            <div class="modal-body">
                              <form name="FormEdit" class="form-horizontal" action="<?PHP echo base_url('welcome/ubahpassword');?>" method="POST" onSubmit="return validasi_form($this)">
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Current Password</label>
                                  <div class="col-sm-9">
                                    <input name="current" type="password" class="form-control" placeholder="Current Password" required>
                                    <input name="id" id="current" type="text" value="<?php echo $user->id_ketua_rt;?>" hidden="hidden">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">New Password</label>
                                  <div class="col-sm-9">
                                    <input name="new" id="new_pass" type="password" class="form-control" placeholder="New Password" required>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Confirm Password</label>
                                  <div class="col-sm-9">
                                    <input name="confirm" id="confirm" type="password" class="form-control" placeholder="Confirm Password" required>
                                  </div>
                                </div>
                                <div class="form-group m-b-0">
                                  <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-info waves-effect waves-light pull-right" >Kirim</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->
                    </div>
                </div>
                
            </div>
        </div>
    </div> 
</div><!-- END wrapper -->
<?php $this->load->view('footer');?>