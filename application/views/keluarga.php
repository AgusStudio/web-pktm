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
                                    <h3 class="panel-title">Data Keluarga <span class="pull-right"><i data-toggle="modal" style="cursor:pointer" data-target="#AddModal" class="fa fa-plus-square text-white"> Tambah Keluarga </i></span></h3>
                                </div>
                                <div class="panel-body table-rep-plugin"> 
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th data-priority="1">No</th>
                                                <th data-priority="3">No. KK</th>
                                                <th data-priority="1">Kepala Keluarga</th>
                                                <th data-priority="3">Alamat</th>
                                                <th data-priority="6">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($keluarga as $keluarga): ?>
                                            <tr>
                                                <td><?php echo $no++;?></td>
                                                <td><?php echo $keluarga->no_kk;?>
                                                <td><?php echo $keluarga->kepala_keluarga;?></td>
                                                <td><?php echo $keluarga->alamat.', RT/RW: '.$keluarga->rt.'/'.$keluarga->rw.', Desa: '.$keluarga->nama_desa.', Kec: '.$keluarga->kecamatan.', '.$keluarga->kota.', '.$keluarga->provinsi;?></td>
                                                <td style="cursor: pointer;"><i title="To Edit" class="fa fa-pencil" data-toggle="modal" data-target="#EditModal" onclick="javascript:
                                                FormEdit.no_kk.value= '<?php echo $keluarga->no_kk;?>';
                                                FormEdit.kepala_keluarga.value= '<?php echo $keluarga->kepala_keluarga;?>';
                                                FormEdit.alamat.value= '<?php echo $keluarga->alamat;?>';
                                                FormEdit.rt.value= '<?php echo $keluarga->id_rt;?>';
                                                FormEdit.id_keluarga.value= '<?php echo $keluarga->id_keluarga;?>';
                                                FormEdit.lihat_anggota.onclick= window.location=(<?php echo 'welcome/anggotakeluarga/'.$keluarga->id_keluarga;?>);
                                                "></i> | <a href="<?php echo site_url('welcome/kartupasien/'.$keluarga->id_keluarga); ?>" title="To View Detail" data-toggle="modal" data-target="#ViewModal"><i class="fa fa-file" onclick="<?php $anggota= $this->Model_pktm->data_view('anggota_keluarga','id_keluarga',$keluarga->id_keluarga)->result();?> javascript:
                                                document.getElementById('kk').innerHTML= 'No. KK <?php echo $keluarga->no_kk;?>';
                                                document.getElementById('kepala_keluarga').innerHTML= '<?php echo $keluarga->kepala_keluarga;?>';
                                                document.getElementById('rt').innerHTML= '<?php echo $keluarga->rt;?>/<?php echo $keluarga->rw;?>';
                                                document.getElementById('desa').innerHTML= '<?php echo $keluarga->nama_desa;?>';
                                                document.getElementById('kecamatan').innerHTML= '<?php echo $keluarga->kecamatan;?>';
                                                document.getElementById('kota').innerHTML= '<?php echo $keluarga->kota;?>';
                                                document.getElementById('kode_pos').innerHTML= '<?php echo $keluarga->kode_pos;?>';
                                                document.getElementById('provinsi').innerHTML= '<?php echo $keluarga->provinsi;?>';
                                                document.getElementById('alamat').innerHTML= '<?php echo $keluarga->alamat;?>'"></i></a></td>
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
                          <div id="AddModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="'disabled'">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title text-center" id="myModalLabel">Tambah Keluarga</h4>
                                </div>
                                <div class="modal-body">
                                  <form name="formAdd" class="form-horizontal" action="<?php echo site_url('welcome/anggota');?>" method="POST">
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">No KK</label>
                                      <div class="col-sm-9">
                                        <input name="no_kk" type="text" class="form-control" placeholder="No Kartu Keluarga" required>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Kepala Keluarga</label>
                                      <div class="col-sm-9">
                                        <input name="kepala_keluarga" type="text" class="form-control" placeholder="Kepala Keluarga" required>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Alamat</label>
                                      <div class="col-sm-9">
                                        <textarea name="alamat" type="text" class="form-control" placeholder="Alamat / Nama Jalan" required></textarea>
                                      </div>
                                      <div class="col-sm-9 col-sm-offset-3 m-t-5">
                                        <select name="rt" class="form-control" required >
                                          <option value="">Pilih Wilayah RT/RW</option>
                                          <?php foreach ($wilayah as $wilayah2): ?>
                                            <option value="<?php echo $wilayah2->id_rt;?>"><?php echo "RT/RW : ".$wilayah2->rt."/".$wilayah2->rw.', Desa: '.$wilayah2->nama_desa.', '.$wilayah2->kecamatan.', '.$wilayah2->kota;?></option>
                                          <?php endforeach;?>
                                         </select>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Jumlah Anggota Keluarga</label>
                                      <div class="col-sm-9">
                                        <select name="jml_anggota" class="form-control" required>
                                          <option value=""> Pilih Jumlah Anggota Keluarga </option>
                                          <?php for ($i=1; $i<=50; $i++) { ?>
                                          <option value="<?php echo $i;?>"> <?php echo $i;?></option>
                                          <?php } ?>
                                        </select>
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
                                  <h4 class="modal-title text-center" id="myModalLabel">Edit Keluarga</h4>
                                </div>
                                <div class="modal-body">
                                  <form name="FormEdit" class="form-horizontal" action="<?php echo site_url('welcome/editkeluarga');?>" method="POST">
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">No KK</label>
                                      <div class="col-sm-9">
                                        <input name="no_kk" type="text" class="form-control" placeholder="No Kartu Keluarga" disabled>
                                        <input name="id_keluarga" type="text" hidden="hidden">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Kepala Keluarga</label>
                                      <div class="col-sm-9">
                                        <input name="kepala_keluarga" type="text" class="form-control" placeholder="Kepala Keluarga" required>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Alamat</label>
                                      <div class="col-sm-9">
                                        <textarea name="alamat" type="text" class="form-control" placeholder="Alamat / Nama Jalan" required></textarea>
                                      </div>
                                      <div class="col-sm-9 col-sm-offset-3 m-t-5">
                                        <select name="rt" class="form-control" required >
                                          <option value="">Pilih Wilayah RT/RW</option>
                                          <?php foreach ($wilayah as $wilayah2): ?>
                                            <option value="<?php echo $wilayah2->id_rt;?>"><?php echo "RT/RW : ".$wilayah2->rt."/".$wilayah2->rw.', Desa: '.$wilayah2->nama_desa.', '.$wilayah2->kecamatan.', '.$wilayah2->kota;?></option>
                                          <?php endforeach;?>
                                         </select>
                                      </div>
                                    </div>
                                    <div class="form-group m-b-0">
                                      <div class="col-sm-12">
                                        <button type="submit" class="btn btn-info waves-effect waves-light pull-right" >Kirim</button>
                                        <button type="submit" name="lihat_anggota" class="btn btn-info waves-effect waves-light pull-left" >Lihat Anggota</button>
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
                          <div id="ViewModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-full">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title text-center" id="myModalLabel">Data Keluarga<br><b id="kk"></b></h4>
                                </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-md-6 pull-left">
                                      <table>
                                        <tr><th>Nama Kepala Keluarga</th><th>&nbsp:&nbsp</th><td><b id="kepala_keluarga"></b></td></tr>
                                        <tr><th>Alamat</th><th>&nbsp:&nbsp</th><td><b id="alamat"></b></td></tr>
                                        <tr><th>RT/RW</th><th>&nbsp:&nbsp</th><td><b id="rt"></b></td></tr>
                                        <tr><th>Desa/Kelurahan</th><th>&nbsp:&nbsp</th><td><b id="desa"></b></td></tr>
                                      </table>
                                    </div>
                                    <div class="col-md-6 pull-right">
                                      <table class="pull-right">
                                        <tr><th>Kecamatan</th><th>&nbsp:&nbsp</th><td><b id="kecamatan"></b></td></tr>
                                        <tr><th>Kabupaten/Kota</th><th>&nbsp:&nbsp</th><td><b id="kota"></b></td></tr>
                                        <tr><th>Kode Pos</th><th>&nbsp:&nbsp</th><td><b id="kode_pos"></b></td></tr>
                                        <tr><th>Provinsi</th><th>&nbsp:&nbsp</th><td><b id="provinsi"></b></td></tr>
                                      </table>
                                    </div>
                                  </div>
                                  <div class="dotted m-t-15"></div>
                                  <table class="table table-striped" style="overflow: auto">
                                    <thead>
                                      <tr>
                                        <th class="small-text" rowspan="2">No</th>
                                        <th class="small-text" rowspan="2">Nama Anggota</th>
                                        <th class="small-text" rowspan="2">NIK</th>
                                        <th class="small-text" rowspan="2">Jenis Kelamin</th>
                                        <th class="small-text" rowspan="2">TTL</th>
                                        <th class="small-text" rowspan="2">Agama</th>
                                        <th class="small-text" rowspan="2">Pendidikan</th>
                                        <th class="small-text" rowspan="2">Pekerjaan</th>
                                        <th class="small-text" rowspan="2">Status Nikah</th>
                                        <th class="small-text" rowspan="2">Hubungan</th>
                                        <th class="small-text" rowspan="2">Kewarganegaraan</th>
                                        <th class="small-text text-center" colspan="2">Dokumen Imigrasi</th>
                                        <th class="small-text" rowspan="2">Ayah</th>
                                        <th class="small-text" rowspan="2">Ibu</th>
                                      </tr>
                                      <tr>
                                        <th class="small-text">No Paspor</th>
                                        <th class="small-text">No Kitas/Kitap</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=1; foreach ($anggota as $anggota): ?>
                                        <tr>
                                            <td class="small-text"><?php echo $no++;?></td>
                                            <td class="small-text"><?php echo $anggota->nama_anggota;?>
                                            <td class="small-text"><?php echo $anggota->nik;?></td>
                                            <td class="small-text"><?php echo $anggota->jenis_kelamin;?></td>
                                            <td class="small-text"><?php echo $anggota->tempat_lahir.', '.date('d/m/Y', strtotime($anggota->tgl_lahir));?></td>
                                            <td class="small-text"><?php echo $anggota->agama;?></td>
                                            <td class="small-text"><?php echo $anggota->pendidikan;?></td>
                                            <td class="small-text"><?php echo $anggota->pekerjaan;?></td>
                                            <td class="small-text"><?php echo $anggota->status_nikah;?></td>
                                            <td class="small-text"><?php echo $anggota->hubungan;?></td>
                                            <td class="small-text"><?php echo $anggota->kewarganegaraan;?></td>
                                            <td class="small-text"><?php echo $anggota->no_paspor;?></td>
                                            <td class="small-text"><?php echo $anggota->no_kitas;?></td>
                                            <td class="small-text"><?php echo $anggota->nama_ayah;?></td>
                                            <td class="small-text"><?php echo $anggota->nama_ibu;?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                  </table>
                                </div>
                              </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->
                        </div>
                    </div>

                </div><!-- /container -->
            </div><!-- /contain -->
        </div><!-- End Right content here -->
    </div><!-- END wrapper -->
<?php $this->load->view('footer');?>
<script type="text/javascript">
    function displayRS() {
    document.getElementById("rs_rujukan").innerHTML ="<label>Rumah Sakit Asal</label><input type='text' class='form-control' name='rs_asal' placeholder='Rumah Sakit Rujukan bila ada'>" 
    }
    function hideRS() {
    document.getElementById("rs_rujukan").innerHTML ="";
    }
</script>
    
