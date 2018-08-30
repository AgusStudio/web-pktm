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
                                <li class="active">Pendataan</li>
                            </ol>
                        </div>
                    </div>
                    <!-- Start Widget -->
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
                                                <th>Ratio Index</th>
                                                <th>Status Kemiskinan</th>
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
                                                <td><?php echo number_format($keluarga->indeks,2,",","");?></td>
                                                <td><?php echo number_format($keluarga->ratio_indeks,2,",","");?></td>
                                                <td><?php echo $keluarga->status_kemiskinan;?></td>
                                                <td><a href="<?php echo base_url('admin/view_pendataan/'.$pendataan->id_pendataan.'/'.$keluarga->id_keluarga);?>" title="To View Detail"  ><i class="fa fa-file">View</i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>      
                                </div>
                            </div>
                        </div> <!-- col -->
                    </div> <!-- End widget-->
                </div><!-- /container -->
            </div><!-- /contain -->
        </div><!-- End Right content here -->
    </div><!-- END wrapper -->
<?php $this->load->view('footer');?>