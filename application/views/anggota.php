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
                        <div class="col-md-12">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title text-center" id="myModalLabel">Anggota Keluarga</h4>
                                </div>
                                <div class="modal-body">
                                  <form name="formReg" class="form-horizontal" action="<?php echo site_url('welcome/addkeluarga');?>" method="POST">
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">No KK</label>
                                      <div class="col-sm-9">
                                        <input name="no_kk2" value="<?php echo $kk;?>" type="text" class="form-control" disabled>
                                        <input name="no_kk" value="<?php echo $kk;?>" type="text" hidden="hidden">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Kepala Keluarga</label>
                                      <div class="col-sm-9">
                                        <input name="kepala_keluarga2" value="<?php echo $kepala_keluarga;?>" type="text" class="form-control" disabled>
                                        <input name="kepala_keluarga" value="<?php echo $kepala_keluarga;?>" type="text" hidden="hidden">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Alamat</label>
                                      <div class="col-sm-9">
                                        <textarea name="alamat2" type="text" class="form-control" disabled><?php echo $alamat;?></textarea>
                                        <textarea name="alamat" type="text" hidden="hidden"><?php echo $alamat;?></textarea>
                                      </div>
                                      <div class="col-sm-9 col-sm-offset-3 m-t-5">                                     
                                        <input name="rt2" value="<?php echo 'RT/RW : '.$wilayah->rt.'/'.$wilayah->rw.', Desa: '.$wilayah->nama_desa.', '.$wilayah->kecamatan.', '.$wilayah->kota;?>" type="text" class="form-control" disabled>
                                        <input name="rt" value="<?php echo $wilayah->id_rt;?>" type="text" hidden="hidden">
                                        <input name="jml_anggota" value="<?php echo $jml_anggota;?>" type="text" hidden="hidden">
                                        <input name="id_keluarga" value="<?php echo $inc->Auto_increment;?>" type="text" hidden="hidden">
                                      </div>
                                    </div>
                                    <div class="dotted"></div>
                                <?php for($i=1; $i<=$jml_anggota; $i++){ ?>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">NIK</label>
                                      <div class="col-sm-9">
                                        <input name="<?php echo 'nik'.$i;?>" type="text" class="form-control" placeholder="No NIK" required>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Nama Anggota</label>
                                      <div class="col-sm-9">
                                        <input name="<?php echo 'nama'.$i;?>" type="text" class="form-control" placeholder="Nama Anggota" required>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Jenis Kelamin</label>
                                      <div class="col-sm-9">
                                        <input name="<?php echo 'jk'.$i;?>" type="radio" style="margin-left: 20px" value="L" required>L
                                        <input name="<?php echo 'jk'.$i;?>" type="radio" style="margin-left: 10px" value="P" required>P
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Tempat, Tanggal Lahir</label>
                                      <div class="col-sm-4">
                                        <input name="<?php echo 'tempat'.$i;?>" type="text" class="form-control" placeholder="Tempat Lahir" required>
                                      </div>
                                      <div class="col-sm-4">
                                        <input name="<?php echo 'tgl'.$i;?>" id="datepicker" type="text" class="form-control" placeholder="Tanggal Lahir" required>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Agama</label>
                                      <div class="col-sm-9">
                                        <input name="<?php echo 'agama'.$i;?>" type="text" class="form-control" placeholder="Agama" required>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Pekerjaan</label>
                                      <div class="col-sm-9">
                                        <input name="<?php echo 'pekerjaan'.$i;?>" type="text" class="form-control" placeholder="Pekerjaan" required>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Status Pernikahan</label>
                                      <div class="col-sm-9">
                                        <input name="<?php echo 'status_nikah'.$i;?>" type="radio" style="margin-left: 20px" value="Belum Nikah" required>Belum Nikah
                                        <input name="<?php echo 'status_nikah'.$i;?>" type="radio" style="margin-left: 10px" value="Nikah" required>Nikah
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Hubungan Keluarga</label>
                                      <div class="col-sm-9">
                                        <select name="<?php echo 'hub'.$i;?>" class="form-control" required>
                                            <option value="">Pilih Hubungan Keluarga</option>
                                            <option value="Kepala Keluarga">Kepala Keluarga</option>
                                            <option value="Istri">Istri</option>
                                            <option value="Anak">Anak</option>
                                            <option value="Saudara">Saudara</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Kewarganegaraan</label>
                                      <div class="col-sm-9">
                                        <input name="<?php echo 'kewarganegaraan'.$i;?>" type="text" class="form-control" placeholder="Kewarganegaraan" required>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Dokumen Imigrasi</label>
                                      <div class="col-sm-4">
                                        <input name="<?php echo 'paspor'.$i;?>" type="text" class="form-control" placeholder="No Paspor">
                                      </div>
                                      <div class="col-sm-4">
                                        <input name="<?php echo 'kitas'.$i;?>" type="text" class="form-control" placeholder="No KITAS/KITAP">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Nama Ayah</label>
                                      <div class="col-sm-9">
                                        <input name="<?php echo 'ayah'.$i;?>" type="text" class="form-control" placeholder="Nama Ayah" required>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Nama Ibu</label>
                                      <div class="col-sm-9">
                                        <input name="<?php echo 'ibu'.$i;?>" type="text" class="form-control" placeholder="Nama Ibu" required>
                                      </div>
                                    </div>
                                    <div class="dotted"></div>
                                <?php } ?>
                                    <div class="form-group m-b-0">
                                      <div class="col-sm-12">
                                        <button type="submit" class="btn btn-info waves-effect waves-light pull-right" >Kirim</button>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                              </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                    </div> <!-- End widget-->
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
    
