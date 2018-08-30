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
								<li class="active"> Administrator </li>
							</ol>
						</div>
					</div>
					<!-- Start Widget -->
					<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title text-center">Daftar Administrator <span><i class="fa fa-plus-square pull-right" data-toggle="modal" data-target="#AddModal" style="cursor: pointer"> Tambah Administrator</i></span></h3>
                                </div>
                                <div class="panel-body" style="overflow: auto">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIP</th>
                                                        <th>Username</th>
                                                        <th>Nama</th>
                                                        <th>Jenis Kelamin</th> 
                                                        <th>Tempat & Tgl Lahir</th>
                                                        <th>Foto</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $no=1; foreach ($kategori as $kategori): ?>
                                                    <tr>
                                                        <td><?php echo $no++;?></td>
                                                        <td><?php echo $kategori->kategori_var;?></td>
                                                        <td class="text-center" style="cursor: pointer"><i title="To Edit Kategori" class="fa fa-pencil" data-toggle="modal" data-target="#EditModal" onclick="javascript:
                                                        FormEdit.kategori.value= '<?php echo $kategori->kategori_var;?>';
                                                        FormEdit.id_kategori.value= '<?php echo $kategori->id_kat_variabel;?>';"> Edit </i></td>
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
                                            <h3 class="panel-title text-center"> Tambah Kategori Variabel </h3>
                                        </div>
                                        <div class="modal-body"> 
                                            <div class="row">
                                                <form name="FormAdd" class="form-horizontal" action="<?php echo site_url('admin/addkategori');?>" method="POST">
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> Nama Kategori</label>
                                                      <div class="col-sm-9">
                                                        <input name="kategori" type="text" class="form-control" placeholder="Nama Kategori Variabel">
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
                                            <h3 class="panel-title text-center"> Edit Kategori Variabel </h3>
                                        </div>
                                        <div class="modal-body"> 
                                            <div class="row">
                                                <form name="FormEdit" class="form-horizontal" action="<?php echo site_url('admin/editkategori');?>" method="POST">
                                                    <div class="form-group">
                                                      <label class="col-sm-3 control-label"> Nama Kategori</label>
                                                      <div class="col-sm-9">
                                                        <input name="kategori" type="text" class="form-control" placeholder="Nama Kategori">
                                                        <input name="id_kategori" type="text" hidden='hidden' >
                                                      </div>
                                                    </div>
                                                    <div class="form-group pull-right">
                                                        <button class="btn btn-primary waves-effect waves-light w-md">Kirim</button>
                                                    </div>
                                                </form>
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

    
