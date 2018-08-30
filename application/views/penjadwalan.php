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
								<li class="active">Jadwal Pendataan</li>
							</ol>
						</div>
					</div>
					<!-- Start Widget -->
					<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Jadwal Pendataan</h3>
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
                                                        <th>RT/RW</th>
                                                        <th>Desa/Kelurahan</th>
                                                        <th>Kecamatan</th>
                                                        <th>Kota/Kabupaten</th>
                                                        <th>Provinsi</th>
                                                        <th>Total Warga</th>
                                                        <th id="WT">Warga Terdata</th>
                                                        <th id="WTT">Warga Tidak Terdata</th>
                                                        <th id="WTTD">Warga Tidak Terdaftar</th>
                                                         <th id="tgl_off">Tanggal Closed</th>
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
                                                        <td><?php echo $jadwal->rt.'/'.$jadwal->rw;?></td>
                                                        <td><?php echo $jadwal->nama_desa;?></td>
                                                        <td><?php echo $jadwal->kecamatan;?></td>
                                                        <td><?php echo $jadwal->kota;?></td>
                                                        <td><?php echo $jadwal->provinsi;?></td>
                                                        <td><?php echo $jadwal->total_warga;?></td>
                                                        <td><?php echo $jadwal->warga_terdata;?></td>
                                                        <td><?php echo $jadwal->warga_tidak_terdata;?></td>
                                                        <td><?php echo $jadwal->warga_tidak_terdaftar;?></td>
                                                        <td><?php echo date('d/m/Y',strtotime($jadwal->tgl_selesai));?></td>
                                                        <td class="text-center" style="cursor: pointer"><?php if($jadwal->status_pendataan==0){ ?>
                                                            <a title="Klik Untuk memulai pendataan" href="<?php echo base_url('welcome/pendataan/'.$jadwal->id_pendataan);?>"><i class="fa fa-check">Open</i></a>
                                                        <?php }else{ ?>
                                                            <i class="fa fa-check-square" title="Pendataan terselesaikan" disabled >Closed</i> <?php } ?>
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
				</div><!-- /container -->
			</div><!-- /contain -->
		</div><!-- End Right content here -->
    </div><!-- END wrapper -->
<?php $this->load->view('footer');?>

    
