<?php $this->load->view('header');?>
<body> 
<!-- Begin page -->
<div id="wrapper"> 
    <!-- Top Bar Start -->
    <?php $this->load->view('admin/top_menu');?>
    <!-- Top Bar End -->
    <!-- ========== Left Sidebar Start ========== -->
    <?php $this->load->view('admin/sidebar');?>
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
                                <h3 class="text-white"><?php echo $user->nama_admin; ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="modal-dialog modal-full">
                          <div class="modal-content">
                            <div class="modal-header" style="background-color: #29b6f6">
                              <h4 class="modal-title text-center text-white" id="myModalLabel">
                                <span class="pull-left"><i data-toggle="modal" style="cursor:pointer" data-target="#ProfModal" class="fa fa-lock text-white"> Ubah Profile</i></span>
                                Profile's <?php echo $user->nama_admin;?>
                                <span class="pull-right"><i data-toggle="modal" style="cursor:pointer" data-target="#PassModal" class="fa fa-lock text-white"> Ubah Password</i></span>
                              </h4>
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
                                            <label class="control-label">: <?php echo $user->tempat_lahir.','.date('d/m/Y',strtotime($user->tgl_lahir));?></label>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">Jenis Kelamin</label>
                                          <div class="col-sm-7">
                                            <label class="control-label">: <?php echo $user->jenis_kelamin;?></label>
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
                              <form name="FormEdit" class="form-horizontal" action="<?PHP echo base_url('admin/ubahpassword');?>" method="POST" >
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Current Password</label>
                                  <div class="col-sm-9">
                                    <input name="current" type="password" class="form-control" placeholder="Current Password" required>
                                    <input name="id" id="current" type="text" value="<?php echo $user->id_admin;?>" hidden="hidden">
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
                <div class="row">
                    <div class="col-md-12">
                      <div id="ProfModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="'disabled'">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title text-center" id="myModalLabel">Ubah Profile</h4>
                            </div>
                            <?php echo form_open_multipart(site_url('admin/ubahprofile')); ?>
                            <div class="panel-body">
                                <div class="form-group">
                                  <label control-label">NIP</label>
                                    <input type="text" value="<?php echo $user->nip;?>" name="nip" class="form-control" placeholder="No NIP" disabled>
                                    <input type="text" value="<?php echo $user->id_admin;?>"  name="id_admin" hidden='hidden'>
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Nama</label>
                                    <input name="nama" value="<?php echo $user->nama_admin;?>"  type="text" class="form-control" placeholder="Nama" required>
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Tempat, Tanggal Lahir</label>
                                  <div class="row">
                                  <div class="col-sm-5">
                                    <input name="tempat" value="<?php echo $user->tempat_lahir;?>"  type="text" class="form-control" placeholder="Tempat Lahir" required>
                                  </div>
                                  <div class="col-sm-4">
                                    <input name="tgl" id="datepicker" value="<?php echo date('m/d/Y', strtotime($user->tgl_lahir));?>" type="text" class="form-control" placeholder="Tanggal Lahir" required>
                                  </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Jenis Kelamin</label>
                                  <div>
                                    <input <?php if($user->jenis_kelamin=="L"){ echo "checked"; } ?> name="jk" type="radio" style="margin-left: 20px" value="L" required> L
                                    <input <?php if($user->jenis_kelamin=="P"){ echo "checked"; } ?> name="jk" type="radio" style="margin-left: 10px" value="P" required> P
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label for="Username" class="control-label">Foto</label>
                                    <div>
                                    <input type="file" name="userfile" class="btn btn-primary waves-effect waves-light w-md">
                                    </div>
                                </div>
                                <div class="form-group m-b-0">
                                  <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-info waves-effect waves-light pull-right" >Kirim</button>
                                  </div>
                                </div>
                            </div>
                          </div><!-- /.modal-content -->
                              <?php echo form_close(); ?>
                        </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->
                    </div>
                </div>                
            </div>
        </div>
    </div> 
</div><!-- END wrapper -->
<?php $this->load->view('footer');?>