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
                                <li class="active">Pendataan</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                  <h3 class="panel-title text-center text-white">Pendataan Keluarga Tidak Mampu No. <?php echo date('Y/m', strtotime($pendataan->tgl_pendataan)).'/'.$pendataan->rt.'/'.$pendataan->id_pendataan;?></h3>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <table class="pull-left">
                                        <tr class="panel-title text-white"><td>Tanggal</td><td>&nbsp:&nbsp</td><td><b><?php echo $pendataan->tgl_pendataan;?></b></td></tr>
                                        <tr class="panel-title text-white"><td>Nama Pendata</td><td>&nbsp:&nbsp</td><td><b><?php echo $pendataan->ketua_rt;?></b></td></tr>
                                        <tr class="panel-title text-white"><td>RT/RW</td><td>&nbsp:&nbsp</td><td><b><?php echo $pendataan->rt.'/'.$pendataan->rw;?></b></td></tr>
                                        <tr class="panel-title text-white"><td>Desa/Kelurahan</td><td>&nbsp:&nbsp</td><td><?php echo $pendataan->nama_desa;?></td></tr>
                                      </table>
                                    </div>
                                    <div class="col-md-6">
                                      <table class="pull-right">
                                        <tr class="panel-title text-white"><td>Kecamatan</td><td>&nbsp:&nbsp</td><td><?php echo $pendataan->kecamatan;?></td></tr>
                                        <tr class="panel-title text-white"><td>Kabupaten/Kota</td><td>&nbsp:&nbsp</td><td><?php echo $pendataan->kota;?></td></tr>
                                        <tr class="panel-title text-white"><td>Kode Pos</td><td>&nbsp:&nbsp</td><td><?php echo $pendataan->kode_pos;?></td></tr>
                                        <tr class="panel-title text-white"><td>Provinsi</td><td>&nbsp:&nbsp</td><td><?php echo $pendataan->provinsi;?></td></tr>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                                <div class="panel-body table-rep-plugin"> 
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No. KK</th>
                                                <th>Kepala Keluarga</th>
                                                <th>Alamat</th>
                                                <th>Nilai Index</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($keluarga as $keluarga): ?>
                                            <tr>
                                                <td><?php echo $no++;?></td>
                                                <td><?php echo $keluarga->no_kk;?></td>
                                                <td><?php echo $keluarga->kepala_keluarga;?></td>
                                                <td><?php echo $keluarga->alamat.', RT/RW: '.$pendataan->rt.'/'.$pendataan->rw.', Desa: '.$pendataan->nama_desa.', Kec: '.$pendataan->kecamatan.', '.$pendataan->kota.', '.$pendataan->provinsi;?></td>
                                                <td><?php echo $cek_indeks->indeks;?></td>
                                                <td style="cursor: pointer">
                                                <?php if($cek_status->count_id==0){ ?>
                                                    <i title="To View Detail" data-toggle="modal" data-target="#ViewModal" class="fa fa-file" onclick="<?php $anggota= $this->Model_pktm->data_view('anggota_keluarga','id_keluarga',$keluarga->id_keluarga)->result();?>
                                                    javascript:
                                                    document.getElementById('kk').innerHTML= 'No. KK <?php echo $keluarga->no_kk;?>';
                                                    document.getElementById('kepala_keluarga').innerHTML= '<?php echo $keluarga->kepala_keluarga;?>';
                                                    document.getElementById('rt').innerHTML= '<?php echo $pendataan->rt;?>/<?php echo $pendataan->rw;?>';
                                                    document.getElementById('desa').innerHTML= '<?php echo $pendataan->nama_desa;?>';
                                                    document.getElementById('kecamatan').innerHTML= '<?php echo $pendataan->kecamatan;?>';
                                                    document.getElementById('kota').innerHTML= '<?php echo $pendataan->kota;?>';
                                                    document.getElementById('kode_pos').innerHTML= '<?php echo $pendataan->kode_pos;?>';
                                                    document.getElementById('provinsi').innerHTML= '<?php echo $pendataan->provinsi;?>';
                                                    document.getElementById('alamat').innerHTML= '<?php echo $keluarga->alamat;?>'">View</i>
                                                <?php }else{ ?>
                                                    <i class="fa fa-check-square" title="Data sudah upload">Finished</i><?php } ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $cek_warga= $this->Model_pktm->join1('count(DISTINCT m1.id_keluarga) as count_warga','hasil_pendataan m1','keluarga m2','m2.id_keluarga = m1.id_keluarga','m1.id_pendataan',$id2,'m1.status','1')->row(); $finish= $cek_warga->count_warga-$count_keluarga;?>
                                        </tbody>
                                    </table>      
                                </div>
                            </div>
                            <div class="form-group m-b-0">
                              <div class="col-sm-12">
                                <button <?php if($finish==0 && $pendataan->status_pendataan==0){ ?> title="Klik untuk closing pendataan" data-toggle="modal" data-target="#EndModal" onclick="javascript:
                                FormEnd.tgl.value= '<?php echo date('m/d/Y',strtotime($pendataan->tgl_pendataan));?>';
                                FormEnd.pendata.value= '<?php echo $pendataan->ketua_rt;?>';
                                FormEnd.rt.value= '<?php echo $pendataan->rt;?>/<?php echo $pendataan->rw;?>';
                                FormEnd.id_pendataan.value= '<?php echo $pendataan->id_pendataan;?>';
                                document.getElementById('no_pendataan').innerHTML= '<?php echo date('Y/m', strtotime($pendataan->tgl_pendataan));?>/<?php echo $pendataan->rt;?>/<?php echo $pendataan->id_pendataan;?>';
                                FormEnd.desa.value= '<?php echo $pendataan->nama_desa;?>';
                                FormEnd.kecamatan.value= '<?php echo $pendataan->kecamatan;?>';
                                FormEnd.kota.value= '<?php echo $pendataan->kota;?>';
                                FormEnd.provinsi.value= '<?php echo $pendataan->provinsi;?>';
                                FormEnd.total_warga.value= '<?php echo $pendataan->total_warga;?>';
                                " <?php }else{ echo 'disabled'; } ?> type="submit" class="btn btn-info waves-effect waves-light pull-right" >Closing</button>
                              </div>
                            </div>
                        </div> <!-- col -->
                    </div> <!-- End widget-->
                    <div class="row">
                        <div class="col-md-12">
                          <div id="EndModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="'disabled'">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title text-center" id="myModalLabel">No Pendataan <b id="no_pendataan"></b></h4>
                                </div>
                                <div class="modal-body">
                                  <form name="FormEnd" class="form-horizontal" action="<?php echo site_url('welcome/endpendataan');?>" method="POST">
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Tgl</label>
                                      <div class="col-sm-9">
                                        <input name="tgl" type="text" class="form-control" placeholder="Tanggal Pendataan" disabled>
                                         <input name="id_pendataan" type="text" hidden="hidden">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Pendata</label>
                                      <div class="col-sm-9">
                                        <input name="pendata" type="text" class="form-control" placeholder="Nama Pendata" disabled>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">RT/RW</label>
                                      <div class="col-sm-9">
                                        <input name="rt" type="text" class="form-control" placeholder="RT/RW" disabled>
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
                                        <input name="total_warga" type="text" class="form-control" placeholder="Total Warga" disabled>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Warga Terdata</label>
                                      <div class="col-sm-9">
                                        <input name="terdata" type="text" class="form-control" placeholder="Total Warga yang sudah terdaftar dan tersurvei" required>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Warga Tidak Terdata</label>
                                      <div class="col-sm-9">
                                        <input name="tidak_terdata" type="text" class="form-control" placeholder="Total Warga yang sudah  terdaftar dan tidak tersurvei" required>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Warga Tidak Terdaftar</label>
                                      <div class="col-sm-9">
                                        <input name="tidak_terdaftar" type="text" class="form-control" placeholder="Total Warga yang tidak terdaftar" required>
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
                        <div id="ViewModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-full">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title text-center" id="myModalLabel">Data Keluarga<br/><b id="kk"></b></h4>
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
                                <div class="row">
                                  <form name="FormVariable" action="<?php echo base_url('welcome/variable');?>" class="form-horizontal" method="post" class="">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                      <div class="panel panel-primary">
                                        <div class="panel-heading">
                                          <h3 class="panel-title text-center"> Wawancara Variabel Nasional Kemiskinan</h3>
                                          <input type="text" name="id_keluarga" value="<?php echo $keluarga->id_keluarga;?>" hidden='hidden'>
                                          <input type="text" name="id_pendataan" value="<?php echo $pendataan->id_pendataan;?>" hidden='hidden'>
                                          <input type="text" name="desa" value="<?php echo $pendataan->id_desa;?>" hidden='hidden'>
                                        </div>
                                        <div class="panel-body"> 
                                            <div class="table-responsive">
                                              <table class="table table-striped">
                                                <tbody>
                                                  <?php $no=1; foreach ($var_nas as $var_nas): ?>
                                                <tr class="techSpecRow">
                                                  <th colspan="4"><?php echo $no++.' . '.$var_nas->kategori_var;?></th>
                                                </tr>
                                                <tr class="techSpecRow">
                                                  <th class="techSpecTD1"><?php echo $var_nas->isi_variabel;?></th>
                                                  <td class="techSpecTD2">
                                                    <div class="checkbox checkbox-primary pull-right">
                                                      <input type="text" name="<?php echo 'bobot'.$var_nas->id_variabel;?>" value="<?php echo $var_nas->bobot_variabel;?>" hidden='hidden'>
                                                      <input type="checkbox" value="<?php echo $var_nas->id_variabel;?>" name="<?php echo 'variabel'.$var_nas->id_variabel;?>">
                                                      <label>Ya</label>
                                                    </div>
                                                  </td>
                                                </tr>
                                                  <?php endforeach;?>
                                                </tbody>
                                              </table>
                                              <br/>
                                            </div>
                                          </div>
                                        </div>
                                      </div> <!-- col -->
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="panel panel-primary">
                                          <div class="panel-heading">
                                            <h3 class="panel-title text-center"> Wawancara Variabel Lokal Kemiskinan</h3>
                                          </div>
                                          <div class="panel-body"> 
                                            <div class="table-responsive">
                                              <table class="table table-striped">
                                                <tbody>
                                                  <?php $no=1; foreach ($var_lokal as $var_lokal): ?>
                                                <tr class="techSpecRow">
                                                  <th colspan="4"><?php echo $no++.' . '.$var_lokal->kategori_var;?></th>
                                                </tr>
                                                <tr class="techSpecRow">
                                                  <th class="techSpecTD1"><?php echo $var_lokal->isi_variabel;?></th>
                                                  <td class="techSpecTD2">
                                                    <div class="checkbox checkbox-primary pull-right">
                                                      <input type="text" name="<?php echo 'bobot'.$var_lokal->id_variabel;?>" value="<?php echo $var_lokal->bobot_variabel;?>" hidden='hidden'>
                                                      <input id="checkbox" type="checkbox" value="<?php echo $var_lokal->id_variabel;?>" name="<?php echo 'variabel'.$var_lokal->id_variabel;?>">
                                                      <label>Ya</label>
                                                    </div>
                                                  </td>
                                                </tr>
                                                  <?php endforeach;?>
                                                </tbody>
                                              </table>
                                              <br/>
                                            </div>
                                          </div>
                                      </div>
                                    </div> <!-- col -->
                                    <div class="form-group m-b-0">
                                      <div class="col-sm-12">
                                        <button type="submit" class="btn btn-info waves-effect waves-light pull-right" >Kirim</button>
                                      </div>
                                    </div>
                                  </form>
                                </div> <!-- row -->
                              </div> <!-- body model-->
                            </div> <!-- /.modal-content -->
                          </div> <!-- /.modal-dialog -->
                        </div> <!-- /.modal -->
                      </div>
                    </div>
                </div><!-- /container -->
            </div><!-- /contain -->
        </div><!-- End Right content here -->
    </div><!-- END wrapper -->
<?php $this->load->view('footer');?>