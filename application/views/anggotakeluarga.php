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
		<div class="content-page"><!-- Start content -->
            <div class="content">
                <div class="container">
					<div class="row">
						<div class="col-sm-12">
							<ol class="breadcrumb pull-right">
								<li><a href="#">Home</a></li>
								<li class="active">Data Keluarga</li>
							</ol>
						</div>
					</div>
					<!-- Start Widget -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Data Anggota Keluarga <?php echo $keluarga->kepala_keluarga;?> <span class="pull-right"><a class="text-white" href="<?php echo site_url('welcome/datapasien');?>" data-toggle="modal" data-target="#AddModal"><i class="fa fa-plus-square"></i> Tambah Anggota </a></span></h3>
                    </div>
                    <div class="panel-body table-rep-plugin" style="overflow: auto;"> 
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Anggota</th>
                                    <th>NIK</th>
                                    <th>Jenis Kelamin</th>
                                    <th>TTL</th>
                                    <th>Agama</th>
                                    <th>Pendidikan</th>
                                    <th>Pekerjaan</th>
                                    <th>Status Nikah</th>
                                    <th>Hubungan</th>
                                    <th>Kewarganegaraan</th>
                                    <th>No Paspor</th>
                                    <th>No KITAS</th>
                                    <th>Ayah</th>
                                    <th>Ibu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach ($anggota as $anggota): ?>
                                <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $anggota->nama_anggota;?>
                                    <td><?php echo $anggota->nik;?></td>
                                    <td><?php echo $anggota->jenis_kelamin;?></td>
                                    <td><?php echo $anggota->tempat_lahir.', '.date('d/m/Y', strtotime($anggota->tgl_lahir));?></td>
                                    <td><?php echo $anggota->agama;?></td>
                                    <td><?php echo $anggota->pendidikan;?></td>
                                    <td><?php echo $anggota->pekerjaan;?></td>
                                    <td><?php echo $anggota->status_nikah;?></td>
                                    <td><?php echo $anggota->hubungan;?></td>
                                    <td><?php echo $anggota->kewarganegaraan;?></td>
                                    <td><?php echo $anggota->no_paspor;?></td>
                                    <td><?php echo $anggota->no_kitas;?></td>
                                    <td><?php echo $anggota->nama_ayah;?></td>
                                    <td><?php echo $anggota->nama_ibu;?></td>
                                    <td style="cursor: pointer;"><i title="To Edit" class="fa fa-pencil" data-toggle="modal" data-target="#EditModal" onclick="javascript:
                                    FormEdit.id_anggota.value= '<?php echo $anggota->id_anggota;?>';
                                    FormEdit.nik.value= '<?php echo $anggota->nik;?>';
                                    FormEdit.nama.value= '<?php echo $anggota->nama_anggota;?>';
                                    FormEdit.jk.value= '<?php echo $anggota->jenis_kelamin;?>';
                                    FormEdit.tempat.value= '<?php echo $anggota->tempat_lahir;?>';
                                    FormEdit.tgl.value= '<?php echo date('m/d/Y', strtotime($anggota->tgl_lahir));?>';
                                    FormEdit.agama.value= '<?php echo $anggota->agama;?>';
                                    FormEdit.pekerjaan.value= '<?php echo $anggota->pekerjaan;?>';
                                    FormEdit.pendidikan.value= '<?php echo $anggota->pendidikan;?>';
                                    FormEdit.status_nikah.value= '<?php echo $anggota->status_nikah;?>';
                                    FormEdit.hubungan.value= '<?php echo $anggota->hubungan;?>';
                                    FormEdit.kewarganegaraan.value= '<?php echo $anggota->kewarganegaraan;?>';
                                    FormEdit.paspor.value= '<?php echo $anggota->no_paspor;?>';
                                    FormEdit.kitas.value= '<?php echo $anggota->no_kitas;?>';
                                    FormEdit.ayah.value= '<?php echo $anggota->nama_ayah;?>';
                                    FormEdit.ibu.value= '<?php echo $anggota->nama_ibu;?>';
                                    "></i> | <i title="To Delete" data-toggle="modal" data-target="#DelModal" onclick="javascript:
                                    FormDel.anggota. value= '<?php echo $anggota->id_anggota;?>'"><i class="fa fa-trash"></i></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>      
                    </div>
                </div>
            </div> <!-- col -->
        </div> <!-- End widget-->
					<div class="row">
            <div class="col-md-12">
              <div id="EditModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="'disabled'">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title text-center" id="myModalLabel">Anggota Keluarga </h4>
                    </div>
                    <div class="modal-body">
                      <form name="FormEdit" class="form-horizontal" action="<?php echo site_url('welcome/editanggota');?>" method="POST">
                        <div class="form-group">
                          <label class="col-sm-3 control-label">NIK</label>
                          <div class="col-sm-9">
                            <input name="nik" type="text" class="form-control" placeholder="No NIK" disabled>
                            <input name="id_anggota" type="text" hidden="hidden">
                            <input name="id_keluarga" value="<?php echo $keluarga->id_keluarga;?>" type="text" hidden="hidden">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Nama Anggota</label>
                          <div class="col-sm-9">
                            <input name="nama" type="text" class="form-control" placeholder="Nama Anggota" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Jenis Kelamin</label>
                          <div class="col-sm-9">
                            <input name="jk" type="radio" style="margin-left: 20px" value="L" required>L
                            <input name="jk" type="radio" style="margin-left: 10px" value="P" required>P
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Tempat, Tanggal Lahir</label>
                          <div class="col-sm-4">
                            <input name="tempat" type="text" class="form-control" placeholder="Tempat Lahir" required>
                          </div>
                          <div class="col-sm-4">
                            <input name="tgl" id="datepicker" type="text" class="form-control" placeholder="Tanggal Lahir" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Agama</label>
                          <div class="col-sm-9">
                            <input name="agama" type="text" class="form-control" placeholder="Agama" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Pekerjaan</label>
                          <div class="col-sm-9">
                            <input name="pekerjaan" type="text" class="form-control" placeholder="Pekerjaan" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Pekerjaan</label>
                          <div class="col-sm-9">
                            <input name="pendidikan" type="text" class="form-control" placeholder="Pendidikan" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Status Pernikahan</label>
                          <div class="col-sm-9">
                            <input name="status_nikah" type="radio" style="margin-left: 20px" value="Belum Nikah" required>Belum Nikah
                            <input name="status_nikah" type="radio" style="margin-left: 10px" value="Nikah" required>Nikah
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Hubungan Keluarga</label>
                          <div class="col-sm-9">
                            <select name="hubungan" class="form-control" required>
                                <option value="">Pilih Hubungan Keluarga</option>
                                <option value="Ketua Keluarga">Kepala Keluarga</option>
                                <option value="Istri">Istri</option>
                                <option value="Anak">Anak</option>
                                <option value="Saudara">Saudara</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Kewarganegaraan</label>
                          <div class="col-sm-9">
                            <input name="kewarganegaraan" type="text" class="form-control" placeholder="Kewarganegaraan" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Dokumen Imigrasi</label>
                          <div class="col-sm-4">
                            <input name="paspor" type="text" class="form-control" placeholder="No Paspor">
                          </div>
                          <div class="col-sm-4">
                            <input name="kitas" type="text" class="form-control" placeholder="No KITAS/KITAP">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Nama Ayah</label>
                          <div class="col-sm-9">
                            <input name="ayah" type="text" class="form-control" placeholder="Nama Ayah" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Nama Ibu</label>
                          <div class="col-sm-9">
                            <input name="ibu" type="text" class="form-control" placeholder="Nama Ibu" required>
                          </div>
                        </div>
                        <div class="form-group m-b-0">
                          <div class="col-sm-12">
                            <button type="submit" name="kirim" value="1" class="btn btn-info waves-effect waves-light pull-right" >Kirim</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
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
                          <form name="FormDel" class="form-horizontal" action="<?php echo site_url('welcome/delanggota');?>" method="POST">
                            <input type="text" name="anggota" hidden="hidden">
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