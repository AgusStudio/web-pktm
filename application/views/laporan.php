<?php $this->load->view('header');?>
<body> 
    <div id="wrapper"> 
		<!-- Top Bar Start -->
		<?php $this->load->view('top_menu');?>
		<!-- Top Bar End -->
		<!-- ========== Left Sidebar Start ========== -->
		<?php $this->load->view('sidebar');?>
		<!-- Left Sidebar End --> 
		<div class="content-page">
			<!-- Start content -->
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<ol class="breadcrumb pull-right">
								<li><a href="#">Home</a></li>
								<li class="active">Laporan</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-info">
								<div class="panel-heading">
									<h3 class="panel-title text-white"> Laporan Hasil Pendataam Keluarga Tidak Mampu</h3>
								</div>
								<div class="panel-body">
									<form name="FormEdit" class="form-horizontal" action="<?php echo site_url('welcome/laporan');?>" method="POST">
									<div class="row">
										<div class="col-sm-4">
											<div class="row">
												<div class="form-group"> 
					                                <label class="control-label col-sm-4">Nama Desa*</label>
					                                <div class="col-md-8">
					                                    <select name="desa" class="form-control" required>
					                                    	<?php foreach ($daftar_desa as $daftar_desa): ?>
					                                    	<option value="<?php echo $daftar_desa->id_desa;?>"><?php echo $daftar_desa->nama_desa;?></option>
					                                    	<?php endforeach;?>
					                                    </select>
					                                </div><!-- input-group -->
					                            </div>
						                        <div class="form-group">
						                        	<label class="control-label col-sm-4">RT/RW*</label>
					                                <div class="col-sm-8">
					                                    <select name="rt" class="form-control" required>
					                                    	<option value="All"> All </option>
					                                    	<?php foreach ($data_rt as $data_rt): ?>
					                                    	<option value="<?php echo $data_rt->id_rt;?>"><?php echo $data_rt->rt."/".$data_rt->rw;?></option>
					                                    	<?php endforeach;?>
					                                    </select>
					                                </div>
						                        </div>
						                    </div>
					                    </div>
					                    <div class="col-sm-4">
					                    	<div class="row">
												<div class="form-group"> 
					                                <label class="control-label col-sm-4">Time Range*</label>
					                                <div class="col-md-8">
					                                    <?php $now= date('Y'); echo "<Select name='from' class='form-control' required>";
					                                    echo "<option value=''> From </option>";
					                                    for($a=$now; $a>='2000';$a--){
					                                    	echo "<option value='".$a."'>".$a."</option>";
					                                    } echo "</select>";
					                                    ?>
					                                </div>
					                            </div>
					                            <div class="form-group"> 
					                                <div class="col-md-8 col-sm-offset-4">
					                                	<?php 
					                                    echo "<Select name='to' class='form-control' required>";
					                                    echo "<option value=''> To </option>";
					                                    for($b=$now; $b>='2000';$b--){
					                                    	echo "<option value='".$b."'>".$b."</option>";
					                                    } echo "</select>";
					                                    ?>
					                                </div><!-- input-group -->
					                            </div>
						                    </div>
					                    </div>
					                    <div class="text-danger col-sm-4"><?php echo $err1;?></div>
					                </div>
				                    <div class="row">
				                    	<div class="col-sm-8">
						                    <div class="form-group pull-right">
		                                        <button type="submit" value="1" name="cari" class="btn btn-primary waves-effect waves-light w-md">Show</button>
		                                    </div>
		                                </div>
	                                </div>
				                    </form>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
			            <div class="col-md-12">
			                <div class="panel">
			                    <div class="panel-body table-rep-plugin" style="overflow: auto;"> 
                        			<table class="table table-striped table-bordered">
			                            <thead>
			                                <tr>
			                                    <th>No</th>
			                                    <th>No Pendataan</th>
			                                    <th>Provinsi</th>
			                                    <th>Kota</th>
			                                    <th>Kecamatan</th>
			                                    <th>Desa</th>
			                                    <th>Kepala Desa</th>
			                                    <th>RT/RW</th>
			                                    <th>Ketua RT</th>
			                                    <th>Keluarga Sangat Miskin</th>
			                                    <th>Keluarga Miskin</th>
			                                    <th>Keluarga Mendekati Miskin</th>
			                                    <th>Keluarga Keluar dari Kemiskinana</th>
			                                    <th>Total Warga</th>
			                                    <th>Action</th>
			                                </tr>
			                            </thead>
			                            <tbody>
			                            	<?php if($count_report>=1){ $no=1; foreach ($report as $report):
			                            	$id_report= $report->id_pendataan; 
			                            	$query= $this->Model_pktm->data_view2('view_keluarga','id_pendataan',$id_report,'status_pendataan','1')->result();
			                                $keluarga= "kel_".$report->id_pendataan; $row_span= count($query);?>
			                                <tr>
			                                    <td rowspan="<?php echo $row_span;?>"><?php echo $no++;?></td>
			                                    <td rowspan="<?php echo $row_span;?>"> <?php echo date('Y/m', strtotime($report->tgl_pendataan)).'/'.$report->rt.'/'.$report->id_pendataan;?></td>
			                                    <td rowspan="<?php echo $row_span;?>"><?php echo $report->provinsi;?></td>
			                                    <td rowspan="<?php echo $row_span;?>"><?php echo $report->kota;?></td>
			                                    <td rowspan="<?php echo $row_span;?>"><?php echo $report->kecamatan;?></td>
			                                    <td rowspan="<?php echo $row_span;?>"><?php echo $report->nama_desa;?></td>
			                                    <td rowspan="<?php echo $row_span;?>"><?php echo $report->kepala_desa;?></td>
			                                    <td rowspan="<?php echo $row_span;?>"><?php echo $report->rt."/".$report->rw;?></td>
			                                    <td rowspan="<?php echo $row_span;?>"><?php echo $report->ketua_rt;?></td>
			                                    <td rowspan="<?php echo $row_span;?>"><?php $ksm= $this->Model_pktm->data_count3('count(id_master) as ksm','view_keluarga','id_pendataan',$id_report,'status_pendataan','1','id_master','1')->row(); echo $ksm->ksm;?></td>
			                                    <td rowspan="<?php echo $row_span;?>"><?php $km= $this->Model_pktm->data_count3('count(id_master) as km','view_keluarga','id_pendataan',$id_report,'status_pendataan','1','id_master','2')->row(); echo $km->km;?></td>
			                                    <td rowspan="<?php echo $row_span;?>"><?php $kmm= $this->Model_pktm->data_count3('count(id_master) as kmm','view_keluarga','id_pendataan',$id_report,'status_pendataan','1','id_master','3')->row(); echo $kmm->kmm;?></td>
			                                    <td rowspan="<?php echo $row_span;?>"><?php $ktm= $this->Model_pktm->data_count3('count(id_master) as ktm','view_keluarga','id_pendataan',$id_report,'status_pendataan','1','id_master','4')->row(); echo $ktm->ktm;?></td>
			                                    <td rowspan="<?php echo $row_span;?>"><?php echo $report->total_warga;?></td>
			                                    <td><a href="<?php echo base_url('admin/view_keluarga/'.$report->id_rt.'/'.$report->id_pendataan);?>"> View Keluarga</a></td>
			                                </tr>
			                            <?php endforeach;
			                        }else{
			                        	echo "<td colspan='18'> Data Kosong </td>";
			                        }?>
			                            </tbody>
			                        </table>      
			                    </div>
			                
			                </div><!-- /.modal-dialog -->
			             </div>
			         </div>
					<div class="row">
						<div class="col-md-12">
							<div class="hidden-print">
                                <div class="pull-right">
                                    <form name="download" action="<?php echo site_url('welcome/download');?>" method="POST">
                                    <input type="text" name="from" value="<?php echo $from;?>" hidden='hidden'>
                                    <input type="text" name="to" value="<?php echo $to;?>" hidden='hidden'>
                                    <input type="text" name="rt" value="<?php echo $rt;?>" hidden='hidden'>
                                    <input type="text" name="desa" value="<?php echo $desa;?>" hidden='hidden'>
                                    <input type="text" name="tipe" value="<?php echo $tipe;?>" hidden='hidden'>
                                    <button type="submit" <?php if($count_report==0){ echo "disabled";} ?> class="btn btn-inverse waves-effect waves-light"><i class="fa  fa-download"></i></button>
                                    </form>
                                </div>
                            </div> 
						</div>
					</div>								
				</div>
			</div>
		</div>
	</div>
<?php $this->load->view('footer');?>