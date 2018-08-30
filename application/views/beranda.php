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
								<li class="active"><a href="#">Home</a></li>
							</ol>
						</div>
                        <!-- BAR Chart -->
                        <div class="col-lg-4">
                            <img src="<?php echo base_url('assets/images/logo DKI.png');?>" style="width:100%">     
                        </div> <!-- col -->
                        <div class="col-lg-6">
                            <div class="panel panel-color panel-info">
                                <div class="panel-heading"> 
                                    <h3 class="panel-title"><?php echo $wilayah->nama_desa;?></h3> 
                                </div> 
                                <div class="panel-body"> 
                                    <table>
                                        <tr><td><h3>RT</h3></td><td><h3> : </h3></td><td><h3> <?php echo $wilayah->rt;?></h3></td></tr>
                                        <tr><td><h3>RW</h3></td><td><h3> : </h3></td><td><h3> <?php echo $wilayah->rw;?></h3></td></tr>
                                        <tr><td><h3>KETUA RT</h3></td><td><h3> : </h3></td><td><h3> <?php echo $wilayah->ketua_rt;?></h3></td></tr>
                                        <tr><td><h3>DESA/KELURAHAN</h3></td><td><h3> : </h3></td><td><h3> <?php echo $wilayah->nama_desa;?></h3></td></tr>
                                        <tr><td><h3>KADES/KEPALA LURAH</h3></td><td><h3> : </h3></td><td><h3> <?php echo $wilayah->kepala_desa;?></h3></td></tr>
                                        <tr><td><h3>KECAMATAN</h3></td><td><h3> : </h3></td><td><h3> <?php echo $wilayah->kecamatan;?></h3></td></tr>
                                        <tr><td><h3>KOTA</h3></td><td><h3> : </h3></td><td><h3> <?php echo $wilayah->kota;?></h3></td></tr>
                                        <tr><td><h3>PROVINSI</h3></td><td><h3> : </h3></td><td><h3> <?php echo $wilayah->provinsi;?></h3></td></tr>
                                    </table>
                                </div> 
                            </div>
                        </div>
					</div>
					<!-- Start Widget -->
					<div class="row">
                        
					</div> <!-- End widget-->
				</div><!-- /container -->
			</div><!-- /contain -->
		</div><!-- End Right content here -->
    </div><!-- END wrapper -->
<?php $this->load->view('footer');?>

    
