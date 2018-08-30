<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$logged_in=$this->session->userdata('logged_in');
		if(empty($logged_in)){
			redirect('login');
		}
	}
	
	public function index()
	{
		$user= $this->Model_pktm->data_user();
		$data['user']= $user;
		$data['wilayah']= $this->Model_pktm->data_view('view_wilayah','id_rt',$user->id_rt)->row();
		$this->load->view('beranda',$data);
	}

	function keluarga()
	{
		$user= $this->Model_pktm->data_user();
		$data['user']= $user;
		$data['keluarga']= $this->Model_pktm->keluarga($user->id_rt);
		$data['wilayah']= $this->Model_pktm->get_data('view_wilayah');
		$this->load->view('keluarga',$data);
	}

	function anggota()
	{
		$data['user']= $this->Model_pktm->data_user();
		$data['kk']= $this->input->post('no_kk',true);
		$data['kepala_keluarga']= $this->input->post('kepala_keluarga',true);
		$data['alamat']= $this->input->post('alamat',true);
		$rt= $this->input->post('rt',true);
		if(empty($rt)){
			redirect ('welcome/keluarga');
		}
		$data['wilayah']= $this->Model_pktm->data_view('view_wilayah','id_rt',$rt)->result();
		$data['jml_anggota']= $this->input->post('jml_anggota',true);
		$data['inc']= $this->Model_pktm->inc_table('keluarga');
		$this->load->view('anggota',$data);
	}

	function addanggota()
	{
		$idd_keluarga= $this->input->post('id_keluarga',true);
		$kk= $this->input->post('no_kk',true);
		$kepala_keluarga= $this->input->post('kepala_keluarga',true);
		$alamat= $this->input->post('alamat',true);
		$rt= $this->input->post('rt',true);
		$jml= $this->input->post('jml_anggota',true);
		$data= array(
			'id_keluarga'=>$idd_keluarga,
			'no_kk'=>$kk,
			'kepala_keluarga'=>$kepala_keluarga,
			'alamat'=>$alamat,
			'id_rt'=>$rt,
			);
		$keluarga= $this->Model_pktm->insert_data('keluarga',$data);
		for ($i=1; $i<=$jml; $i++){
			$nik[$i]= $this->input->post('nik',true);
			$nama[$i]= $this->input->post('nama',true);
			$jk[$i]= $this->input->post('jk',true);
			$tempat[$i]= $this->input->post('tempat',true);
			$tgl[$i]= $this->input->post('tgl',true);
			$agama[$i]= $this->input->post('agama',true);
			$pekerjaan[$i]= $this->input->post('pekerjaan',true);
			$status_nikah[$i]= $this->input->post('status_nikah',true);
			$hub[$i]= $this->input->post('hub',true);
			$kewarganegaraan[$i]= $this->input->post('kewarganegaraan',true);
			$paspor[$i]= $this->input->post('paspor',true);
			$kitas[$i]= $this->input->post('kitas',true);
			$ayah[$i]= $this->input->post('ayah',true);
			$ibu[$i]= $this->input->post('ibu',true);
			$anggota[$i]= array(
				'nik'=>$nik[$i],
				'id_keluarga'=>$id_keluarga,
				'nama_anggota'=>$nama[$i],
				'jenis_kelamin'=>$jk[$i],
				'tempat_lahir'=>$tempat[$i],
				'tgl_lahir'=>$tgl[$i],
				'agama'=>$agama[$i],
				'pendidikan'=>$pendidikan[$i],
				'pekerjaan'=>$pekerjaan[$i],
				'status_nikah'=>$status_nikah[$i],
				'hubungan'=>$hub[$i],
				'kewarganegaraan'=>$kewarganegaraan[$i],
				'no_paspor'=>$paspor[$i],
				'no_kitas'=>$kitas[$i],
				'nama_ayah'=>$ayah[$i],
				'nama_ibu'=>$ibu[$i],
				);
			$anggota_keluarga= $this->Model_pktm->insert_data('anggota_keluarga',$anggota[$i]);
			redirect ('welcome/keluarga');
		}
	}

	function editkeluarga()
	{
		$id_keluarga= $this->input->post('id_keluarga',true);
		$kepala_keluarga= $this->input->post('kepala_keluarga',true);
		$alamat= $this->input->post('alamat',true);
		$rt= $this->input->post('rt',true);
		$data= array(
			'kepala_keluarga'=>$kepala_keluarga,
			'alamat'=>$alamat,
			'id_rt'=>$rt,
			);
		$this->Model_pktm->update_data('keluarga','id_keluarga',$id_keluarga,$data);
		redirect ('welcome/anggotakeluarga/'.$id_keluarga);
	}

	function anggotakeluarga($id)
	{
		$data['user']= $this->Model_pktm->data_user();
		$data['keluarga']= $this->Model_pktm->data_view('keluarga','id_keluarga',$id)->row();
		$data['anggota']= $this->Model_pktm->data_view('anggota_keluarga','id_keluarga',$id)->result();
		$this->load->view('anggotakeluarga',$data);
	}

	function editanggota()
	{	
		$id_keluarga= $this->input->post('id_keluarga',true);
		$id_anggota= $this->input->post('id_anggota',true);
		$nama= $this->input->post('nama',true);
		$jk= $this->input->post('jk',true);
		$tempat= $this->input->post('tempat',true);
		$tgl= date('Y-m-d', strtotime($this->input->post('tgl',true)));
		$agama= $this->input->post('agama',true);
		$pekerjaan= $this->input->post('pekerjaan',true);
		$pendidikan= $this->input->post('pendidikan',true);
		$status_nikah= $this->input->post('status_nikah',true);
		$hubungan= $this->input->post('hubungan',true);
		$kewarganegaraan= $this->input->post('kewarganegaraan',true);
		$paspor= $this->input->post('paspor',true);
		$kitas= $this->input->post('kitas',true);
		$ayah= $this->input->post('ayah',true);
		$ibu= $this->input->post('ibu',true);
		$data= array(
			'nama_anggota'=>$nama,
			'jenis_kelamin'=>$jk,
			'tempat_lahir'=>$tempat,
			'tgl_lahir'=>$tgl,
			'agama'=>$agama,
			'pendidikan'=>$pendidikan,
			'pekerjaan'=>$pekerjaan,
			'status_nikah'=>$status_nikah,
			'hubungan'=>$hubungan,
			'kewarganegaraan'=>$kewarganegaraan,
			'no_paspor'=>$paspor,
			'no_kitas'=>$kitas,
			'nama_ayah'=>$ayah,
			'nama_ibu'=>$ibu,
			);
		$this->Model_pktm->update_data('anggota_keluarga','id_anggota',$id_anggota,$data);
		$data['text'] = "Data berhasil di simpan.";
		$data['link'] = "welcome/anggotakeluarga/".$id_keluarga;
		$this->load->view('alert',$data);
	}

	function delanggota()
	{
		$id= $this->input->post('anggota',true);
		$this->Model_pktm->delete_data('anggota_keluarga','id_anggota',$id);
		$data['text'] = "Data berhasil dihapus.";
		$data['link'] = "welcome/keluarga/";
		$this->load->view('alert',$data);
	}

	function penjadwalan()
	{
		$wilayah= $this->session->userdata('wilayah');
		$data['user']= $this->Model_pktm->data_user();
		$data['jadwal']= $this->Model_pktm->data_view2('view_pendataan','id_rt',$wilayah,'status_aktifasi','1')->result();
		$this->load->view('penjadwalan',$data);
	}

	function endpendataan()
	{
		$id= $this->input->post('id_pendataan',true);
		$total_warga= $this->input->post('total_warga',true);
		$terdata= $this->input->post('terdata',true);
		$tidak_terdata= $this->input->post('tidak_terdata',true);
		$tidak_terdaftar= $this->input->post('tidak_terdaftar',true);
		$data= array(
			'tgl_selesai'=>date('Y-m-d'),
			'warga_terdata'=>$terdata,
			'warga_tidak_terdata'=>$tidak_terdata,
			'warga_tidak_terdaftar'=>$tidak_terdaftar,
			'status_pendataan'=>'1',
		);
		$this->Model_pktm->update_data('pendataan','id_pendataan',$id,$data);
		$data['text'] = "Data berhasil disimpan.";
		$data['link'] = "welcome/penjadwalan";
		$this->load->view('alert',$data);
	}

	function pendataan($id)
	{
		$user= $this->Model_pktm->data_user();
		$data['user']= $user;
		$rt= $user->id_rt; $desa= $user->id_desa;
		$data['pendataan']= $this->Model_pktm->data_view('view_pendataan','id_pendataan',$id)->row();
		$keluarga= $this->Model_pktm->data_view('keluarga','id_rt',$rt)->result();
		$data['keluarga']= $keluarga;
		$data['count_keluarga']= count($keluarga);
		$data['var_nas']= $this->Model_pktm->data_view2('view_variabel','id_desa',$desa,'type_variabel','Nasional')->result();
		$data['var_lokal']= $this->Model_pktm->data_view2('view_variabel','id_desa',$desa,'type_variabel','Lokal')->result();
		$this->load->view('pendataan',$data);
	}

	function view_keluarga($rt,$id)
	{
		$data['user']= $this->Model_pktm->data_user();
		$data['pendataan']= $this->Model_pktm->data_view('view_pendataan','id_pendataan',$id)->row();
		$data['keluarga']= $this->Model_pktm->data_view2('view_keluarga','id_rt',$rt,'id_pendataan',$id)->result();
		$this->load->view('pendataan',$data);
	}

	function variable()
	{
		$id_pendataan= $this->input->post('id_pendataan',true);
		$id_keluarga= $this->input->post('id_keluarga',true);
		$desa= $this->input->post('desa',true);
		$var_nas= $this->Model_pktm->data_view2('view_variabel','id_desa',$desa,'type_variabel','Nasional')->result();
		$var_lokal= $this->Model_pktm->data_view2('view_variabel','id_desa',$desa,'type_variabel','Lokal')->result();
		foreach ($var_nas as $var_nas) {
			$id_variabel= $var_nas->id_variabel;
			$var= $this->input->post('variabel'.$id_variabel,true);
			$bobot= $this->input->post('bobot'.$id_variabel,true);
			$data= array(
				'id_pendataan'=>$id_pendataan,
				'id_keluarga'=>$id_keluarga,
				'id_variabel'=>$var,
				'nilai'=>$bobot,
				'status'=>'1',
			);
			if($id_variabel!="" && $var!="" && $bobot!="" && $id_pendataan!="" && $id_keluarga!=""){
				$this->Model_pktm->insert_data('hasil_pendataan',$data);
			} 
		}
		foreach ($var_lokal as $var_lokal) {
			$id_variabel2= $var_lokal->id_variabel;
			$var2= $this->input->post('variabel'.$id_variabel,true);
			$bobot2= $this->input->post('bobot'.$id_variabel,true);
			$data2= array(
				'id_pendataan'=>$id_pendataan,
				'id_keluarga'=>$id_keluarga,
				'id_variabel'=>$var,
				'nilai'=>$bobot,
				'status'=>'1',
			);
			if($id_variabel2!="" && $var2!="" && $bobot2!="" && $id_pendataan!="" && $id_keluarga!=""){
				$this->Model_pktm->insert_data('hasil_pendataan',$data2);
			}
		}
		$data['text'] = "Data berhasil disimpan.";
		$data['link'] = "welcome/pendataan/".$id_pendataan;
		$this->load->view('alert',$data);
	}

	function profile()
	{
		$data['user']= $this->Model_pktm->data_user();
		$this->load->view('profile',$data);
	}

	function ubahpassword()
	{
		$user= $this->Model_pktm->data_user();
		$id= $this->input->post('id',true);
		$current= MD5($this->input->post('current',true));
		$confirm= MD5($this->input->post('confirm',true));
		$new= MD5($this->input->post('new',true));
		$now_pass= $user->password;
		if($current!=$now_pass && $new!=$confirm){
			$data['text'] = "Current Password & Confirm Password salah.";
			$data['link'] = "welcome/profile";
			$this->load->view('alert',$data);
		}else if($current!=$now_pass){
			$data['text'] = "Current Password salah.";
			$data['link'] = "welcome/profile";
			$this->load->view('alert',$data);
		}else if($new!=$confirm){
			$data['text'] = "Confirm Password salah.";
			$data['link'] = "welcome/profile";
			$this->load->view('alert',$data);		
		}else{
			$data= array('password'=>$new);
			$this->Model_pktm->update_data('ketua_rt','id_ketua_rt',$id,$data);
			$data['text'] = "Data berhasil diubah.";
			$data['link'] = "welcome/logout";
			$this->load->view('alert',$data);
		}
	}

	function laporan()
	{
		$data['user']= $this->Model_pktm->data_user();
		$data['data_rt']= $this->Model_pktm->get_data('rt');
		$data['daftar_desa']= $this->Model_pktm->get_data('desa');
		if($this->input->post('cari',true)==1){
			$desa= $this->input->post('desa',true);
			$rt= $this->input->post('rt',true);
			$from= $this->input->post('from',true);
			$to= $this->input->post('to',true);
			if($from > $to){
				$data['err1']= "*Time Range tidak tepat, Tahun pada Form To tidak boleh kurang dari tahun pada Form From.";
				$data['count_report']="0"; $data['from']= ""; $data['to']= ""; $data['desa']= ""; $data['rt']= ""; $data['tipe']= "";
			}else if($rt=="All"){
				$report2= $this->Model_pktm->laporan2($desa,$from,$to);
				$data['report']= $report2; $data['count_report']= count($report2);
				$data['err1']= ""; $data['from']= $from; $data['to']= $to; $data['desa']= $desa; $data['rt']= ""; $data['tipe']= "All";
			}else{
				$report= $this->Model_pktm->laporan($desa,$rt,$from,$to);
				$data['report']= $report; $data['count_report']= count($report);
				$data['err1']= ""; $data['from']= $from; $data['to']= $to; $data['desa']= $desa; $data['rt']= $rt; $data['tipe']= "";
			}
		}else{
			$data['err1']= ""; $data['count_report']="0"; $data['from']= ""; $data['to']= ""; $data['desa']= ""; $data['rt']= ""; $data['tipe']= "";
		}
		
		$this->load->view('laporan',$data);
	}

	function download()
	{
		$desa= $this->input->post('desa',true);
		$tipe= $this->input->post('tipe',true);
		$from= $this->input->post('from',true);
		$to= $this->input->post('to',true);
		$rt= $this->input->post('rt',true);
		if($tipe=="All"){
			$data['report']= $this->Model_pktm->laporan2($desa,$from,$to); $data['from']= $from; $data['to']= $to; $data['desa']= $desa; $data['rt']= ""; $data['tipe']= "All";
		}else{
			$data['report']= $this->Model_pktm->laporan($desa,$rt,$from,$to); $data['from']= $from; $data['to']= $to; $data['desa']= $desa; $data['rt']= $rt; $data['tipe']= "";
		}
		$this->load->view('download',$data);
	}

	function view_pendataan($id,$id2)
	{
		$user= $this->Model_pktm->data_user();
		$data['user']= $user;
		$desa= $user->id_desa;
		$data['pendataan']= $this->Model_pktm->data_view('view_pendataan','id_pendataan',$id)->row();
		$data['keluarga']= $this->Model_pktm->data_view('keluarga','id_keluarga',$id2)->row();
		$data['anggota']= $this->Model_pktm->data_view('anggota_keluarga','id_keluarga',$id2)->result();
		$data['var_nas']= $this->Model_pktm->data_view2('view_variabel','id_desa',$desa,'type_variabel','Nasional')->result();
		$data['var_lokal']= $this->Model_pktm->data_view2('view_variabel','id_desa',$desa,'type_variabel','Lokal')->result();
		$this->load->view('view_pendataan',$data);
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
