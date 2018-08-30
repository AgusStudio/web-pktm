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
        <div class="content-page"><!-- Start content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <ol class="breadcrumb pull-right">
                                <li><a href="#"> Home </a></li>
                                <li class="active"> Data RT</li>
                            </ol>
                        </div>
                    </div>
                    <!-- Start Widget -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title text-center">Data RT Desa <?php echo $user->nama_desa;?> <span><i class="fa fa-plus-square pull-right" data-toggle="modal" data-target="#AddModal" style="cursor: pointer"> Tambah RT</i></span></h3>
                                </div>
                                <div class="panel-body" style="overflow: auto">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>RT</th>
                                                        <th>RW</th>
                                                        <th>NIP</th>
                                                        <th>Nama Ketua RT</th>
                                                        <th>Username</th>
                                                        <th>Password</th>
                                                        <th>Tempat & Tanggal Lahir</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Agama</th>
                                                        <th>Tanggal Tugas</th>
                                                        <th>Foto</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $no=1; foreach ($rt as $rt): ?>
                                                    <tr>
                                                        <td><?php echo $no++;?></td>
                                                        <td><?php echo $rt->rt;?></td>
                                                        <td><?php echo $rt->rw;?></td>
                                                        <td><?php echo $rt->nip;?></td>
                                                        <td><?php echo $rt->ketua_rt;?></td>
                                                        <td><?php echo $rt->username;?></td>
                                                        <td><input style="border: 0" type="password" disabled value="<?php echo $rt->password;?>"></td>
                                                        <td><?php echo $rt->tempat_lahir_rt.','.$rt->tgl_lahir_rt;?></td>
                                                        <td><?php echo $rt->jenis_kelamin_rt;?></td>
                                                        <td><?php echo $rt->agama_rt;?></td>
                                                        <td><?php echo date('d/m/Y', strtotime($rt->tgl_menjabat));?></td>
                                                        <td><img class="thumb-md img-circle" src=<?php if($rt->foto!=""){ echo base_url('assets/users/'.$rt->foto); }else{  echo base_url('assets/users/userdefault.png'); }?> ></td>
                                                        <td class="text-center" style="cursor: pointer">
                                                        <?php if($rt->status_aktifasi!=1){ ?><i title="To Edit" class="fa fa-pencil" data-toggle="modal" data-target="#EditModal" onclick="javascript:
                                                        FormEdit.id_ketua_rt.value= '<?php echo $rt->id_ketua_rt;?>';
                                                        FormEdit.daftar_rt.value= '<?php echo $rt->id_rt.'/'.$rt->rt.'/'.$rt->rw;?>';
                                                        FormEdit.nip.value= '<?php echo $rt->nip;?>';
                                                        FormEdit.id_rt.value= '<?php echo $rt->id_rt;?>';
                                                        FormEdit.rt.value= '<?php echo $rt->rt;?>';
                                                        FormEdit.rw.value= '<?php echo $rt->rw;?>';
                                                        FormEdit.ketua_rt.value= '<?php echo $rt->ketua_rt;?>';
                                                        FormEdit.jk.value= '<?php echo $rt->jenis_kelamin_rt;?>';
                                                        FormEdit.agama.value= '<?php echo $rt->agama_rt;?>';
                                                        FormEdit.username.value= '<?php echo $rt->username;?>';
                                                        FormEdit.tgl_lahir.value= '<?php echo date('m/d/Y',strtotime($rt->tgl_lahir_rt));?>';
                                                        FormEdit.tgl_tugas.value= '<?php echo date('m/d/Y',strtotime($rt->tgl_menjabat));?>';
                                                        FormEdit.tempat_lahir.value= '<?php echo $rt->tempat_lahir_rt;?>';"></i> | <i title="To Aktifasi" class="fa fa-check" data-toggle="modal" data-target="#AktModal" onclick="javascript: FormAkt.id_ketua_rt.value= '<?php echo $rt->id_ketua_rt;?>'"></i> <?php }else{ ?><i title="To delete" class="fa fa-trash" data-toggle="modal" data-target="#DelModal" onclick="javascript: FormDel.id_ketua_rt.value= '<?php echo $rt->id_ketua_rt;?>'"> Hapus </i> <?php } ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>       
                                </div>
                            </div>
                        </div> <!-- col -->
                    </div> <!-- End widget-->
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="AddModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="'disabled'">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h3 class="panel-title text-center"> Tambah Data RT (Rukun Tetangga) </h3>
                                        </div>
                                        <div class="modal-body"> 
                                            <div class="row">
                                                <form name="FormAdd" class="form-horizontal" action="<?php echo site_url('admin/addrt');?>" method="POST">
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> RT</label>
                                                      <div class="col-sm-3">
                                                        <input type="text" name="rt" class="form-control" placeholder="RT" required>
                                                      </div>
                                                      <label class="col-sm-3 control-label"> RW</label>
                                                      <div class="col-sm-3">
                                                        <input type="text" name="rw" class="form-control" placeholder="RW" required>
                                                      </div>
                                                    </div>
                                                     <div class="form-group">
                                                      <label class="col-sm-3 control-label"> NIP Ketua Rt</label>
                                                      <div class="col-sm-9">
                                                        <input type="text" name="nip" class="form-control" placeholder="NIP Ketua RT" required>
                                                      </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> Nama Ketua Rt</label>
                                                      <div class="col-sm-9">
                                                        <input type="text" name="ketua_rt" class="form-control" placeholder="Ketua RT" required>
                                                      </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> Username</label>
                                                      <div class="col-sm-9">
                                                        <input type="text" name="username" class="form-control" placeholder="username" required>
                                                      </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> Password</label>
                                                      <div class="col-sm-9">
                                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                                      </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> Tempat & Tanggal Lahir</label>
                                                      <div class="col-sm-5">
                                                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
                                                      </div>
                                                      <div class="col-sm-4">
                                                        <input type="text" id="datepicker" name="tgl_lahir" class="form-control" placeholder="Mm/Dd/Yyyy" required>
                                                      </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> Jenis Kelamin</label>
                                                      <div class="col-sm-9">
                                                        <input name="jk" type="radio" style="margin-left: 20px" value="L" required>L
                                                        <input name="jk" type="radio" style="margin-left: 10px" value="P" required>P
                                                      </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> Agama</label>
                                                      <div class="col-sm-9">
                                                        <input type="text" name="agama" class="form-control" placeholder="Agama" required>
                                                      </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> Tanggal Tugas</label>
                                                      <div class="col-sm-9">
                                                        <input type="text" name="tgl_tugas" id="datepicker2" class="form-control" placeholder="Mm/Dd/Yyyy" required>
                                                      </div>
                                                    </div>
                                                    <div class="form-group pull-right">
                                                        <button class="btn btn-success waves-effect waves-light w-md">Kirim</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="EditModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="'disabled'">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h3 class="panel-title text-center"> Edit Data RT (Rukun Tetangga) </h3>
                                        </div>
                                        <div class="modal-body"> 
                                            <div class="row">
                                                <form name="FormEdit" class="form-horizontal" action="<?php echo site_url('admin/editrt/');?>" method="POST">
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> RT/RW</label>
                                                      <div class="col-sm-9">
                                                         <select name="daftar_rt" class="form-control" placeholder="RT/RW" onclick="javascript:
                                                          var val= FormEdit.daftar_rt.value;
                                                          if(val!=''){
                                                              var data = val.split('/', 3);
                                                              FormEdit.id_rt.value= data[0];
                                                              FormEdit.rt.value= data[1];
                                                              FormEdit.rw.value= data[2];
                                                          }else{
                                                              FormEdit.id_rt.value= '';
                                                              FormEdit.rt.value= ''; 
                                                              FormEdit.rw.value= '';
                                                          }" required>
                                                            <?php foreach ($daftar_rt as $daftar_rt): ?>
                                                                <option value="<?php echo $daftar_rt->id_rt.'/'.$daftar_rt->rt.'/'.$daftar_rt->rw;?>"><?php echo "RT: ".$daftar_rt->rt."/RW: ".$daftar_rt->rw;?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                        <input type="text" name="id_rt" hidden="hidden">
                                                        <input type="text" name="rt" hidden="hidden">
                                                        <input type="text" name="rw" hidden="hidden">
                                                      </div>
                                                    </div>
                                                     <div class="form-group">
                                                      <label class="col-sm-3 control-label"> NIP Ketua Rt</label>
                                                      <div class="col-sm-9">
                                                        <input type="text" name="nip" class="form-control" placeholder="NIP Ketua RT" required>
                                                        <input type="text" name="id_ketua_rt" hidden='hidden'>
                                                      </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> Nama Ketua Rt</label>
                                                      <div class="col-sm-9">
                                                        <input type="text" name="ketua_rt" class="form-control" placeholder="Ketua RT" required>
                                                      </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> Username</label>
                                                      <div class="col-sm-9">
                                                        <input type="text" name="username" class="form-control" placeholder="username" required>
                                                      </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> Password</label>
                                                      <div class="col-sm-9">
                                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                                      </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> Tempat & Tanggal Lahir</label>
                                                      <div class="col-sm-5">
                                                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
                                                      </div>
                                                      <div class="col-sm-4">
                                                        <input type="text" id="datepicker3" name="tgl_lahir" class="form-control" placeholder="Mm/Dd/Yyyy" required>
                                                      </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> Jenis Kelamin</label>
                                                      <div class="col-sm-9">
                                                        <input name="jk" type="radio" style="margin-left: 20px" value="L" required>L
                                                        <input name="jk" type="radio" style="margin-left: 10px" value="P" required>P
                                                      </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> Agama</label>
                                                      <div class="col-sm-9">
                                                        <input type="text" name="agama" class="form-control" placeholder="Agama" required>
                                                      </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> Tanggal Tugas</label>
                                                      <div class="col-sm-9">
                                                        <input type="text" name="tgl_tugas" id="datepicker4" class="form-control" placeholder="Mm/Dd/Yyyy" required>
                                                      </div>
                                                    </div>
                                                    <div class="form-group pull-right">
                                                        <button class="btn btn-success waves-effect waves-light w-md">Kirim</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div id="DelModal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="'disabled'">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-body text-center"">
                                      <h1><i class="fa fa-trash"></i>
                                      <h1>Are You Sure?</h1>
                                      <h3>You will delete it</h3>
                                      <form name="FormDel" class="form-horizontal" action="<?php echo site_url('admin/delrt');?>" method="POST">
                                        <input type="text" name="id_ketua_rt" hidden="hidden">
                                        <button type="button" class="btn btn-large btn-info m-r-15" data-dismiss="modal" aria-hidden="true">Cancel</button> 
                                        <button type="submit" class="btn btn-large btn-danger m-l-15" type="button">Yes</button>
                                      </form>
                                    </div>             
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div id="AktModal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="'disabled'">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-body text-center"">
                                      <h1><i class="fa fa-trash"></i>
                                      <h1>Are You Sure?</h1>
                                      <h3>If You activate it, you cann't change It</h3>
                                      <form name="FormAkt" class="form-horizontal" action="<?php echo site_url('admin/aktifasi_rt');?>" method="POST">
                                        <input type="text" name="id_ketua_rt" hidden="hidden">
                                        <button type="button" class="btn btn-large btn-info m-r-15" data-dismiss="modal" aria-hidden="true">Cancel</button> 
                                        <button type="submit" class="btn btn-large btn-danger m-l-15" type="button">Yes</button>
                                      </form>
                                    </div>             
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div><!-- /container -->
            </div><!-- /contain -->
        </div><!-- End Right content here -->
    </div><!-- END wrapper -->
<?php $this->load->view('footer');?>

    
