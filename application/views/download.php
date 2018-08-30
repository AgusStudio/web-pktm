<?php // Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=lap$tipe$from-$to.xls");
?>
<table border="1">
    <thead>
    	<tr>
            <th colspan="18" style="font-family: arial;font-weight: bold;font-size: 14px;">Laporan Pendataan Keluarga Miskin Periode: <?php echo $from." - ".$to;?></th>
        </tr>
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
        </tr>
    </thead>
    <tbody style="font-family: arial">
        <?php $no=1; foreach ($report as $report):
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
            <td rowspan="<?php echo $row_span;?>"><?php echo "RT:".$report->rt."/RW:".$report->rw;?></td>
            <td rowspan="<?php echo $row_span;?>"><?php echo $report->ketua_rt;?></td>
            <td rowspan="<?php echo $row_span;?>"><?php $ksm= $this->Model_pktm->data_count3('count(id_master) as ksm','view_keluarga','id_pendataan',$id_report,'status_pendataan','1','id_master','1')->row(); echo $ksm->ksm; $totalksm= $ksm->ksm+$ksm->ksm;?></td>
            <td rowspan="<?php echo $row_span;?>"><?php $km= $this->Model_pktm->data_count3('count(id_master) as km','view_keluarga','id_pendataan',$id_report,'status_pendataan','1','id_master','2')->row(); echo $km->km; $totalkm= $km->km+$km->km;?></td>
            <td rowspan="<?php echo $row_span;?>"><?php $kmm= $this->Model_pktm->data_count3('count(id_master) as kmm','view_keluarga','id_pendataan',$id_report,'status_pendataan','1','id_master','3')->row(); echo $kmm->kmm; $totalkmm= $kmm->kmm+$kmm->kmm;?></td>
            <td rowspan="<?php echo $row_span;?>"><?php $ktm= $this->Model_pktm->data_count3('count(id_master) as ktm','view_keluarga','id_pendataan',$id_report,'status_pendataan','1','id_master','4')->row(); echo $ktm->ktm; $totalktm= $ktm->ktm+$ktm->ktm;?></td>
            <td rowspan="<?php echo $row_span;?>"><?php echo $report->total_warga;?></td>   
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
                        