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
								<li class="active">Jadwal Pendataan</li>
							</ol>
						</div>
					</div>
					<!-- Start Widget -->
					<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Jadwal Pendataan <span class="pull-right"><i style="cursor: pointer;" data-toggle="modal" data-target="#AddModal" class="fa fa-plus-square"> Tambah Jadwal</i></span></h3>
                                </div>
                                <div class="panel-body" style="overflow: auto">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>No Pendataan</th>
                                                        <th>Tanggal</th>
                                                        <th>Pendata</th>
                                                        <th>RT</th>
                                                        <th>RW</th>
                                                        <th>Desa/Kelurahan</th>
                                                        <th>Kecamatan</th>
                                                        <th>Kota/Kabupaten</th>
                                                        <th>Provinsi</th>
                                                        <th>Total Warga</th>
                                                        <th>Warga Terdata</th>
                                                        <th>Warga Tidak Terdata</th>
                                                        <th>Warga Tidak Terdaftar</th>
                                                        <th>Tanggal Closed</th>
                                                        <th>Status Pendataan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $no=1; foreach ($jadwal as $jadwal): ?>
                                                    <tr>
                                                        <td><?php echo $no++;?></td>
                                                        <td><?php echo date('Y/m', strtotime($jadwal->tgl_pendataan)).'/'.$jadwal->rt.'/'.$jadwal->id_pendataan;?></td>
                                                        <td><?php echo date('d/m/Y',strtotime($jadwal->tgl_pendataan));?></td>
                                                        <td><?php echo $jadwal->ketua_rt;?></td>
                                                        <td><?php echo $jadwal->rt;?></td>
                                                        <td><?php echo $jadwal->rw;?></td>
                                                        <td><?php echo $jadwal->nama_desa;?></td>
                                                        <td><?php echo $jadwal->kecamatan;?></td>
                                                        <td><?php echo $jadwal->kota;?></td>
                                                        <td><?php echo $jadwal->provinsi;?></td>
                                                        <td><?php echo $jadwal->total_warga;?></td>
                                                        <td><?php echo $jadwal->warga_terdata;?></td>
                                                        <td><?php echo $jadwal->warga_tidak_terdata;?></td>
                                                        <td><?php echo $jadwal->warga_tidak_terdaftar;?></td>
                                                        <td><?php if($jadwal->tgl_selesai!='0000-00-00'){ echo date('d/m/Y',strtotime($jadwal->tgl_selesai));} ?></td>
                                                        <td class="text-center" style="cursor: pointer">
                                                        <?php if($jadwal->status_pendataan==0 && $jadwal->status_aktifasi==0){ ?><i title='To Edit' data-toggle="modal" data-target="#EditModal" class='fa fa-pencil'onclick="javascript: 
                                                        FormEdit.tgl.value= '<?php echo date('m/d/Y',strtotime($jadwal->tgl_pendataan));?>';
                                                        FormEdit.pendata.value= '<?php echo $jadwal->ketua_rt;?>';
                                                        FormEdit.rt.value= '<?php echo $jadwal->id_rt.','.$jadwal->ketua_rt.','.$jadwal->nama_desa.','.$jadwal->kecamatan.','.$jadwal->kota.','.$jadwal->provinsi;?>';
                                                        FormEdit.id_pendataan.value= '<?php echo $jadwal->id_pendataan;?>';
                                                        document.getElementById('no_pendataan').innerHTML= '<?php echo date('Y/m', strtotime($jadwal->tgl_pendataan));?>/<?php echo $jadwal->rt;?>/<?php echo $jadwal->id_pendataan;?>';
                                                        FormEdit.desa.value= '<?php echo $jadwal->nama_desa;?>';
                                                        FormEdit.id_rt.value= '<?php echo $jadwal->id_rt;?>';
                                                        FormEdit.kecamatan.value= '<?php echo $jadwal->kecamatan;?>';
                                                        FormEdit.kota.value= '<?php echo $jadwal->kota;?>';
                                                        FormEdit.provinsi.value= '<?php echo $jadwal->provinsi;?>';
                                                        FormEdit.total_warga.value= '<?php echo $jadwal->total_warga;?>';"> Edit</i> | <i title='To Publish' data-toggle="modal" data-target="#PublModal" class="fa fa-globe" onclick="javascript:
                                                        FormPubl.id_pendataan.value= '<?php echo $jadwal->id_pendataan;?>';
                                                        "> Aktifasi</i>
                                                        <?php }else if($jadwal->status_pendataan==0 && $jadwal->status_aktifasi==1){ ?>
                                                            <i class="fa fa-check">Open</i>
                                                        <?php }else{ ?>
                                                           <i class="fa fa-check-square">Closed</i> <?php } ?>
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
                          <div id="EditModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="'disabled'">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title text-center" id="myModalLabel">No Pendataan <b id="no_pendataan"></b></h4>
                                </div>
                                <div class="modal-body">
                                  <form name="FormEdit" class="form-horizontal" action="<?php echo site_url('admin/editjadwal');?>" method="POST">
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Tgl</label>
                                      <div class="col-sm-9">
                                        <input name="tgl" type="text" id="datepicker2" class="form-control" placeholder="Tanggal Pendataan" required>
                                         <input name="id_pendataan" type="text" hidden="hidden">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">RT/RW</label>
                                      <div class="col-sm-9">
                                        <select name="rt" class="form-control" placeholder="RT/RW" onclick="javascript:
                                        var val= FormEdit.rt.value;
                                        if(val!=''){
                                            var data = val.split(',', 6);
                                            FormEdit.id_rt.value= data[0];
                                            FormEdit.pendata.value= data[1];
                                            FormEdit.desa.value= data[2];
                                            FormEdit.kecamatan.value= data[3];
                                            FormEdit.kota.value= data[4];
                                            FormEdit.provinsi.value= data[5];
                                        }else{
                                            FormEdit.id_rt.value= '';
                                            FormEdit.pendata.value= ''; 
                                            FormEdit.desa.value= '';
                                            FormEdit.kecamatan.value= '';
                                            FormEdit.kota.value= '';
                                            FormEdit.provinsi.value= '';
                                        }" required>
                                            <option value="">Pilih Wilayah RT/RW</option>
                                            <?php foreach ($wilayah as $wilayah2): ?>
                                                <option value="<?php echo $wilayah2->id_rt.','.$wilayah2->ketua_rt.','.$wilayah2->nama_desa.','.$wilayah2->kecamatan.','.$wilayah2->kota.','.$wilayah2->provinsi;?>"><?php echo $wilayah2->rt."/".$wilayah2->rw;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Pendata</label>
                                      <div class="col-sm-9">
                                        <input name="pendata" type="text" class="form-control" placeholder="Nama Pendata" disabled>
                                        <input name="id_rt" type="text" hidden="hidden">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Desa/Kelurahan</label>
                                      <div class="col-sm-9">
                                        <input name="desa" type="text" class="form-control" placeholder="Desa/Kelurahan" disabled>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Kecamatan</label>
                                      <div class="col-sm-9">
                                        <input name="kecamatan" type="text" class="form-control" placeholder="Kecamatan" disabled>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Kota/Kabupaten</label>
                                      <div class="col-sm-9">
                                        <input name="kota" type="text" class="form-control" placeholder="Kota/Kabupaten" disabled>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Provinsi</label>
                                      <div class="col-sm-9">
                                        <input name="provinsi" type="text" class="form-control" placeholder="Provinsi" disabled>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Total Warga</label>
                                      <div class="col-sm-9">
                                        <input name="total_warga" type="text" class="form-control" placeholder="Total Warga" required>
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
                          <div id="AddModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="'disabled'">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title text-center" id="myModalLabel">No Pendataan <b id="no_pendataan"></b></h4>
                                </div>
                                <div class="modal-body">
                                  <form name="FormAdd" class="form-horizontal" action="<?php echo site_url('admin/addjadwal');?>" method="POST">
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Tgl</label>
                                      <div class="col-sm-9">
                                        <input name="tgl" type="text" id="datepicker" class="form-control" placeholder="Tanggal Pendataan" required>
                                         <input name="id_pendataan" type="text" hidden="hidden">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">RT/RW</label>
                                      <div class="col-sm-9">
                                        <select name="rt" class="form-control" placeholder="RT/RW" onclick="javascript:
                                        var val= FormAdd.rt.value;
                                        if(val!=''){
                                            var data = val.split(',', 6);
                                            FormAdd.id_rt.value= data[0];
                                            FormAdd.pendata.value= data[1];
                                            FormAdd.desa.value= data[2];
                                            FormAdd.kecamatan.value= data[3];
                                            FormAdd.kota.value= data[4];
                                            FormAdd.provinsi.value= data[5];
                                        }else{
                                            FormAdd.id_rt.value= '';
                                            FormAdd.pendata.value= ''; 
                                            FormAdd.desa.value= '';
                                            FormAdd.kecamatan.value= '';
                                            FormAdd.kota.value= '';
                                            FormAdd.provinsi.value= '';
                                        }" required>
                                            <option value="">Pilih Wilayah RT/RW</option>
                                            <?php foreach ($wilayah as $wilayah): ?>
                                                <option value="<?php echo $wilayah->id_rt.','.$wilayah->ketua_rt.','.$wilayah->nama_desa.','.$wilayah->kecamatan.','.$wilayah->kota.','.$wilayah->provinsi;?>"><?php echo "RT: ".$wilayah->rt."/ RW: ".$wilayah->rw;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Pendata</label>
                                      <div class="col-sm-9">
                                        <input name="pendata" type="text" class="form-control" placeholder="Nama Pendata" disabled>
                                        <input name="id_rt" type="text" hidden="hidden">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Desa/Kelurahan</label>
                                      <div class="col-sm-9">
                                        <input name="desa" type="text" class="form-control" placeholder="Desa/Kelurahan" disabled>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Kecamatan</label>
                                      <div class="col-sm-9">
                                        <input name="kecamatan" type="text" class="form-control" placeholder="Kecamatan" disabled>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Kota/Kabupaten</label>
                                      <div class="col-sm-9">
                                        <input name="kota" type="text" class="form-control" placeholder="Kota/Kabupaten" disabled>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Provinsi</label>
                                      <div class="col-sm-9">
                                        <input name="provinsi" type="text" class="form-control" placeholder="Provinsi" disabled>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Total Warga</label>
                                      <div class="col-sm-9">
                                        <input name="total_warga" type="text" class="form-control" placeholder="Total Warga" required>
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
                      <div id="PublModal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="'disabled'">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-body text-center"">
                                  <h1><i class="fa fa-globe"></i>
                                  <h1>Are You Sure?</h1>
                                  <h3>If you activate it, you cann't change it</h3>
                                  <form name="FormPubl" class="form-horizontal" action="<?php echo site_url('admin/publishjadwal');?>" method="POST">
                                    <input type="text" name="id_pendataan" hidden="hidden">
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

    
