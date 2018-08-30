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
                                <li class="active"> Variabel <?php echo $var;?></li>
                            </ol>
                        </div>
                    </div>
                    <!-- Start Widget -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title text-center">Daftar Variabel <?php echo $var;?> <span><i class="fa fa-plus-square pull-right" data-toggle="modal" data-target="#AddModal" style="cursor: pointer"> Tambah Variabel</i></span></h3>
                                </div>
                                <div class="panel-body" style="overflow: auto">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kategori</th>
                                                        <th>Tipe Variabel</th>
                                                        <th>Variabel</th>
                                                        <th>Bobot Variabel</th>
                                                        <th>Status Aktifasi</th>
                                                        <th>Tgl Aktifasi</th>
                                                        <th id="tgl_off">Tgl Dis Aktifasi</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $no=1; foreach ($variabel as $variabel): 
                                                if($variabel->status_variabel=='Aktif'){ ?>
                                                    <script type="text/javascript">document.getElementById('tgl_off').hidden = "hidden"; </script>
                                                <?php $hid= "hidden='hidden'"; } ?>
                                                    <tr>
                                                        <td><?php echo $no++;?></td>
                                                        <td><?php echo $variabel->kategori_var;?></td>
                                                        <td><?php echo $variabel->type_variabel;?></td>
                                                        <td><?php echo $variabel->isi_variabel;?></td>
                                                        <td><?php echo $variabel->bobot_variabel;?></td>
                                                        <td><?php echo $variabel->status_variabel;?></td>
                                                        <td><?php echo date('d/m/Y', strtotime($variabel->tgl_on));?></td>
                                                        <td <?php echo $hid;?> ><?php echo date('d/m/Y', strtotime($variabel->tgl_off));?></td>
                                                        <td class="text-center" style="cursor: pointer"><i title="To Edit Kategori" class="fa fa-pencil" data-toggle="modal" data-target="#EditModal" onclick="javascript:
                                                        FormEdit.kategori.value= '<?php echo $variabel->id_kat_variabel;?>';
                                                        FormEdit.variabel.value= '<?php echo $variabel->isi_variabel;?>';
                                                        FormEdit.id_variabel.value= '<?php echo $variabel->id_variabel;?>';
                                                        FormEdit.bobot.value= '<?php echo $variabel->bobot_variabel;?>';
                                                        FormEdit.status.value= '<?php echo $variabel->status_variabel;?>';"> Edit </i></td>
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
                                            <h3 class="panel-title text-center"> Tambah Variabel Kemiskinan Tipe <?php echo $var;?> </h3>
                                        </div>
                                        <div class="modal-body"> 
                                            <div class="row">
                                                <form name="FormAdd" class="form-horizontal" action="<?php echo site_url('admin/addvariabel/'.$var);?>" method="POST">
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> Kategori</label>
                                                      <div class="col-sm-9">
                                                        <select name="kategori" class="form-control" required>
                                                        <option value="">Pilih Kategori Variabel</option>
                                                        <?php foreach ($kategori as $kategori2): ?>
                                                            <option value="<?php echo $kategori2->id_kat_variabel;?>"><?php echo $kategori2->kategori_var;?></option>
                                                        <?php endforeach;?>
                                                        </select>
                                                        <input type="text" name="id_variabel" hidden='hidden' value="<?php echo $inc_table->Auto_increment;?>">
                                                        <input type="text" name="id_desa" value="<?php echo $user->id_desa;?>" hidden='hidden'>
                                                      </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> Variabel</label>
                                                      <div class="col-sm-9">
                                                        <textarea type="text" name="variabel" class="form-control" placeholder="Isi Variabel" required></textarea>
                                                      </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> Bobot Variabel</label>
                                                      <div class="col-sm-9">
                                                        <select name="bobot" class="form-control" required>
                                                            <?php for($i=1; $i<=10; $i++){ ?>
                                                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                            <?php } ?>
                                                        </select>
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
                                            <h3 class="panel-title text-center"> Tambah Variabel Kemiskinan Tipe <?php echo $var;?> </h3>
                                        </div>
                                        <div class="modal-body"> 
                                            <div class="row">
                                                <form name="FormEdit" class="form-horizontal" action="<?php echo site_url('admin/editvariabel/'.$var);?>" method="POST">
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> Kategori</label>
                                                      <div class="col-sm-9">
                                                        <select name="kategori" class="form-control" required>
                                                        <option value="">Pilih Kategori Variabel</option>
                                                        <?php foreach ($kategori as $kategori): ?>
                                                            <option value="<?php echo $kategori->id_kat_variabel;?>"><?php echo $kategori->kategori_var;?></option>
                                                        <?php endforeach;?>
                                                        </select>
                                                        <input type="text" name="id_variabel" hidden='hidden'>
                                                        <input type="text" name="id_desa" value="<?php echo $user->id_desa;?>" hidden='hidden'>
                                                      </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> Variabel</label>
                                                      <div class="col-sm-9">
                                                        <textarea type="text" name="variabel" class="form-control" placeholder="Isi Variabel" required></textarea>
                                                      </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> Bobot Variabel </label>
                                                      <div class="col-sm-9">
                                                        <select name="bobot" class="form-control" required>
                                                            <?php for($i=1; $i<=10; $i++){ ?>
                                                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                            <?php } ?>
                                                        </select>
                                                      </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> Status Variabel </label>
                                                    <div class="col-sm-9 radio">
                                                        <span class="col-md-3">
                                                            <input type="radio" value="Aktif" name="status" required>
                                                            <label>
                                                                Aktif
                                                            </label>
                                                        </span>
                                                        <span class="col-md-9">
                                                            <input type="radio" value="No Aktif" name="status" required>
                                                            <label>
                                                                No Aktif
                                                            </label>
                                                        </span>
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
                    </div>
                </div><!-- /container -->
            </div><!-- /contain -->
        </div><!-- End Right content here -->
    </div><!-- END wrapper -->
<?php $this->load->view('footer');?>

    
