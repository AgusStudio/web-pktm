<?php $this->load->view('header');?>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-md-12">
          <div class="modal-dialog modal-full">
            <div class="modal-content">
              <div class="modal-header">
                <a href="<?php echo base_url('welcome/laporan');?>"><button type="button" class="close" data-dismiss="modal">&times;</button></a>
                <h4 class="modal-title text-center" id="myModalLabel">Data Keluarga<br/><b>No. KK <?php echo $keluarga->no_kk;?></b></h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6 pull-left">
                    <table>
                      <tr><th>Nama Kepala Keluarga</th><th>&nbsp:&nbsp</th><td><b><?php echo $keluarga->kepala_keluarga;?></b></td></tr>
                      <tr><th>Alamat</th><th>&nbsp:&nbsp</th><td><b><?php echo $keluarga->kepala_keluarga;?></b></td></tr>
                      <tr><th>RT/RW</th><th>&nbsp:&nbsp</th><td><b><?php echo $pendataan->rt.'/'.$pendataan->rw;?></b></td></tr>
                      <tr><th>Desa/Kelurahan</th><th>&nbsp:&nbsp</th><td><b><?php echo $pendataan->nama_desa;?></b></td></tr>
                    </table>
                  </div>
                  <div class="col-md-6 pull-right">
                    <table class="pull-right">
                      <tr><th>Kecamatan</th><th>&nbsp:&nbsp</th><td><b><?php echo $pendataan->kecamatan;?></b></td></tr>
                      <tr><th>Kabupaten/Kota</th><th>&nbsp:&nbsp</th><td><b><?php echo $pendataan->kota;?></b></td></tr>
                      <tr><th>Kode Pos</th><th>&nbsp:&nbsp</th><td><b><?php echo $pendataan->kode_pos;?></b></td></tr>
                      <tr><th>Provinsi</th><th>&nbsp:&nbsp</th><td><b><?php echo $pendataan->provinsi;?></b></td></tr>
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
                                  <?php $no=1; foreach ($var_nas as $var_nas):
                                  $cek_var_nas= $this->Model_pktm->data_count3('count(id_variabel) as id_var','hasil_pendataan','id_keluarga',$keluarga->id_keluarga,'id_pendataan',$pendataan->id_pendataan,'id_variabel',$var_nas->id_variabel)->row(); ?>
                                <tr class="techSpecRow">
                                  <th colspan="4"><?php echo $no++.' . '.$var_nas->kategori_var;?></th>
                                </tr>
                                <tr class="techSpecRow">
                                  <th class="techSpecTD1"><?php echo $var_nas->isi_variabel;?></th>
                                  <td class="techSpecTD2">
                                    <div class="checkbox checkbox-primary pull-right">
                                      <input type="checkbox" <?php if($cek_var_nas->id_var>='1'){ echo "checked disabled"; } ?> name="<?php echo 'variabel'.$var_nas->id_variabel;?>" >
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
                                  <?php $no=1; foreach ($var_lokal as $var_lokal):
                                  $cek_var_lokal= $this->Model_pktm->data_count3('count(id_variabel) as id_var','hasil_pendataan','id_keluarga',$keluarga->id_keluarga,'id_pendataan',$pendataan->id_pendataan,'id_variabel',$var_lokal->id_variabel)->row(); ?>
                                <tr class="techSpecRow">
                                  <th colspan="4"><?php echo $no++.' . '.$var_lokal->kategori_var;?></th>
                                </tr>
                                <tr class="techSpecRow">
                                  <th class="techSpecTD1"><?php echo $var_lokal->isi_variabel;?></th>
                                  <td class="techSpecTD2">
                                    <div class="checkbox checkbox-primary pull-right">
                                      <input id="checkbox" type="checkbox" <?php if($cek_var_lokal->id_var>='1'){ echo "checked disabled"; } ?> name="<?php echo 'variabel'.$var_lokal->id_variabel;?>">
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
                    <div class="col-sm-12">
                        <a href="<?php echo base_url('welcome/laporan');?>"><button class="btn btn-info waves-effect waves-light pull-right" >Back</button></a>
                    </div>
                </div> <!-- row -->
              </div> <!-- body model-->
            </div> <!-- /.modal-content -->
          </div> <!-- /.modal-dialog -->
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<?php $this->load->view('footer');?>
