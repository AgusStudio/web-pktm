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
								<li><a href="#">Home</a></li>
								<li class="active">Indeks Kemiskinan</li>
							</ol>
						</div>
					</div>
					<!-- Start Widget -->
					<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Indeks Kemiskinan <span class="pull-right" style="cursor: pointer"><i class="fa fa-plus-square" data-toggle="modal" data-target="#AddModal"> Tambah Indeks</i></span></h3>
                                </div>
                                <div class="panel-body" style="overflow: auto">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nilai Interval</th>
                                                        <th>Keterangan</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $no=1; foreach ($master_indeks as $master_indeks): ?>
                                                    <tr>
                                                        <td><?php echo $no++;?></td>
                                                        <td><?php echo $master_indeks->nilai_min_indeks.' - '.$master_indeks->nilai_maks_indeks; ?></td>
                                                        <td><?php echo $master_indeks->keterangan;?></td>
                                                        <td class="text-center" style="cursor: pointer">
                                                            <i class="fa fa-pencil" title="To Edit" data-toggle="modal" data-target="#EditModal" onclick="javascript:
                                                            FormEdit.id_indeks.value= '<?php echo $master_indeks->id_master;?>';
                                                            FormEdit.nilai_min.value= '<?php echo $master_indeks->nilai_min_indeks;?>';
                                                            FormEdit.nilai_maks.value= '<?php echo $master_indeks->nilai_maks_indeks;?>';
                                                            FormEdit.keterangan.value= '<?php echo $master_indeks->keterangan;?>';"> Edit</i> | <i class="fa fa-trash" title="To Delete" data-toggle="modal" data-target="#DelModal" onclick="javascript:
                                                            FormDel.id_indeks.value= '<?php echo $master_indeks->id_master;?>';"> Delete</i>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>       
                                </div>
                            </div>
                        </div> <!-- col -->
                    </div> <!-- row-->
                    <div class="row">
                        <div class="col-md-12">
                          <div id="AddModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="'disabled'">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title text-center" id="myModalLabel">Tambah Indeks Kemismikan <b id="no_pendataan"></b></h4>
                                </div>
                                <div class="modal-body">
                                  <form name="FormAdd" class="form-horizontal" action="<?php echo site_url('admin/addindeks');?>" method="POST">
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Nilai Minimum</label>
                                      <div class="col-sm-9">
                                        <input name="nilai_min" type="text" class="form-control" placeholder="Nilai Minimum">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Nilai Maksimum</label>
                                      <div class="col-sm-9">
                                        <input name="nilai_maks" type="text" class="form-control" placeholder="Nilai Maksimum">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Keterangan</label>
                                      <div class="col-sm-9">
                                        <textarea name="keterangan" type="text" class="form-control" placeholder="Keterangan"></textarea>
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
                          <div id="EditModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="'disabled'">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title text-center" id="myModalLabel">Edit Indeks Kemismikan <b id="no_pendataan"></b></h4>
                                </div>
                                <div class="modal-body">
                                  <form name="FormEdit" class="form-horizontal" action="<?php echo site_url('admin/editindeks');?>" method="POST">
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Nilai Minimum</label>
                                      <div class="col-sm-9">
                                        <input name="nilai_min" type="text" class="form-control" placeholder="Nilai Minimum">
                                        <input name="id_indeks" type="text" hidden='hidden'>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Nilai Maksimum</label>
                                      <div class="col-sm-9">
                                        <input name="nilai_maks" type="text" class="form-control" placeholder="Nilai Maksimum">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Keterangan</label>
                                      <div class="col-sm-9">
                                        <textarea name="keterangan" type="text" class="form-control" placeholder="Keterangan"></textarea>
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
                          <div id="DelModal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="'disabled'">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-body text-center"">
                                      <h1><i class="fa fa-trash"></i>
                                      <h1>Are You Sure?</h1>
                                      <h3>You will delete it</h3>
                                      <form name="FormDel" class="form-horizontal" action="<?php echo site_url('admin/delindeks');?>" method="POST">
                                        <input type="text" name="id_indeks" hidden="hidden">
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

    
