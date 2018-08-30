<?php
defined('BASEPATH') OR EXIT('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('download');
		$log_admin = $this->session->userdata('log_admin');
		if(empty($log_admin)){
			redirect('login/admin');
		}
	}
	
	function index()
	{
		$data['user']= $this->Model_pktm->data_admin();
		$this->load->view('admin/beranda.php',$data);
	}

	function kategori()
	{
		$data['user']= $this->Model_pktm->data_admin();
		$data['kategori']= $this->Model_pktm->get_data('kategori_variabel');
		$this->load->view('admin/kategori',$data);
	}

	function addkategori()
	{
		$kategori= $this->input->post('kategori',true);
		$data= array('kategori_var'=>$kategori);
		$this->Model_pktm->insert_data('kategori_variabel',$data);
		$data['text'] = "Data berhasil di simpan.";
		$data['link'] = "admin/kategori";
		$this->load->view('alert',$data);
	}

	function editkategori()
	{
		$kategori= $this->input->post('kategori',true);
		$id= $this->input->post('id_kategori',true);
		$data= array('kategori_var'=>$kategori);
		$this->Model_pktm->update_data('kategori_variabel','id_kat_variabel',$id,$data);
		$data['text'] = "Data berhasil di simpan.";
		$data['link'] = "admin/kategori";
		$this->load->view('alert',$data);
	}

	function variabel($var)
	{		
		if($var=="Nasional" || $var=="Lokal"){
		$data['var']= $var;
		$data['user']= $this->Model_pktm->data_admin();
		$data['variabel']= $this->Model_pktm->data_view2('view_variabel','type_variabel',$var,'id_desa','1')->result();
		$data['kategori']= $this->Model_pktm->get_data('kategori_variabel');
		$data['inc_table']= $this->Model_pktm->inc_table('variabel');
		$this->load->view('admin/variabel',$data);
		}else{
			redirect('admin');
		}
	}

	function addvariabel($var)
	{
		$id_kategori= $this->input->post('kategori',true);
		$id_variabel= $this->input->post('id_variabel',true);
		$id_desa= $this->input->post('id_desa',true);
		$tipe= $var;
		$variabel= $this->input->post('variabel',true);
		$bobot= $this->input->post('bobot',true);
		$data= array(
			'id_variabel'=>$id_variabel,
			'id_kat_variabel'=>$id_kategori,
			'type_variabel'=>$tipe,
			'isi_variabel'=>$variabel,
			'status_variabel'=>'Aktif',
			'tgl_on'=>date('Y-m-d'),
			);
		$data2= array(
			'id_variabel'=>$id_variabel,
			'id_desa'=>$id_desa,
			'bobot_variabel'=>$bobot,
		);
		$this->Model_pktm->insert_data('variabel',$data);
		$this->Model_pktm->insert_data('bobot_variabel',$data2);
		$data['text'] = "Data berhasil di simpan.";
		$data['link'] = "admin/variabel/".$var;
		$this->load->view('alert',$data);
	}

	function editvariabel($var)
	{
		$id_kategori= $this->input->post('kategori',true);
		$id_variabel= $this->input->post('id_variabel',true);
		$id_desa= $this->input->post('id_desa',true);
		$status= $this->input->post('status',true);
		$tipe= $var;
		$variabel= $this->input->post('variabel',true);
		$bobot= $this->input->post('bobot',true);
		if($status=="Aktif"){
			$data= array(
			'id_kat_variabel'=>$id_kategori,
			'type_variabel'=>$tipe,
			'isi_variabel'=>$variabel,
			'tgl_on'=>date('Y-m-d'),
			'tgl_off'=>'0000-00-00',
			);
		}else{
			$data= array(
			'id_kat_variabel'=>$id_kategori,
			'type_variabel'=>$tipe,
			'isi_variabel'=>$variabel,
			'status_variabel'=>'No Aktif',
			'tgl_off'=>date('Y-m-d'),
			);
		}
		$data2= array(
			'bobot_variabel'=>$bobot,
		);
		$this->Model_pktm->update_data('variabel','id_variabel',$id_variabel,$data);
		$this->Model_pktm->update_data2('bobot_variabel','id_variabel',$id_variabel,'id_desa',$id_desa,$data2);
		$data['text'] = "Data berhasil di simpan.";
		$data['link'] = "admin/variabel/".$var;
		$this->load->view('alert',$data);
	}

	function rt()
	{		
		$data['user']= $this->Model_pktm->data_admin();
		$data['rt']= $this->Model_pktm->join1('*','ketua_rt m1','rt m2','m2.id_rt=m1.id_rt','m2.id_desa','1','status_tugas','1')->result();
		$data['daftar_rt']= $this->Model_pktm->get_data('rt');
		$this->load->view('admin/rt',$data);
	}

	function addrt()
	{
		$rt= $this->input->post('rt',true);
		$rw= $this->input->post('rw',true);
		$nip= $this->input->post('nip',true);
		$ketua_rt= $this->input->post('ketua_rt',true);
		$username= $this->input->post('username',true);
		$password= MD5($this->input->post('password',true));
		$tempat_lahir= $this->input->post('tempat_lahir',true);
		$tgl_lahir= date('Y-m-d',strtotime($this->input->post('tgl_lahir',true)));
		$jk= $this->input->post('jk',true);
		$agama= $this->input->post('agama',true);
		$tgl_tugas= date('Y-m-d',strtotime($this->input->post('tgl_tugas',true)));
		$auto_rt= $this->Model_pktm->inc_table('rt');
		$id_rt= $auto_rt->Auto_increment;
		$cek= $this->Model_pktm->data_count3('*','view_wilayah','rt',$rt,'rw',$rw,'status_tugas','1')->result();
		if(count($cek)>=1){
			$data['text'] = "RT.".$rt."/RW.".$rw." masih terdapat Ketua RT yang bertugas.<br/> Pastikan satu RT hanya ada satu Ketua RT";
			$data['link'] = "admin/rt";
			$this->load->view('alert',$data);
		}else{
			$data= array(
				'id_rt'=>$id_rt,
				'nip'=>$nip,
				'ketua_rt'=>$ketua_rt,
				'username'=>$username,
				'password'=>$password,
				'tempat_lahir_rt'=>$tempat_lahir,
				'tgl_lahir_rt'=>$tgl_lahir,
				'jenis_kelamin_rt'=>$jk,
				'agama_rt'=>$agama,
				'tgl_menjabat'=>$tgl_tugas,
				'status_tugas'=>'1'
				);
			$data2= array(
				'id_rt'=>$id_rt,
				'rt'=>$rt,
				'rw'=>$rw,
				'id_desa'=>'1',
			);
			$this->Model_pktm->insert_data('ketua_rt',$data);
			$this->Model_pktm->insert_data('rt',$data2);
			$data['text'] = "Data berhasil di simpan.";
			$data['link'] = "admin/rt";
			$this->load->view('alert',$data);
		}
	}

	function editrt()
	{
		$rt= $this->input->post('rt',true);
		$rw= $this->input->post('rw',true);
		$id_rt= $this->input->post('id_rt',true);
		$nip= $this->input->post('nip',true);
		$ketua_rt= $this->input->post('ketua_rt',true);
		$id_ketua_rt= $this->input->post('id_ketua_rt',true);
		$username= $this->input->post('username',true);
		$password= MD5($this->input->post('password',true));
		$tempat_lahir= $this->input->post('tempat_lahir',true);
		$tgl_lahir= date('Y-m-d',strtotime($this->input->post('tgl_lahir',true)));
		$jk= $this->input->post('jk',true);
		$agama= $this->input->post('agama',true);
		$tgl_tugas= date('Y-m-d',strtotime($this->input->post('tgl_tugas',true)));
		$cek= $this->Model_pktm->data_count3('*','view_wilayah','id_rt',$rt,'id_ketua_rt !=',$id_ketua_rt,'status_tugas','1')->result();
		if(count($cek)>=1){
			$data['text'] = "RT.".$rt."/RW.".$rw." masih terdapat Ketua RT yang bertugas.<br/> Pastikan satu RT hanya ada satu Ketua RT";
			$data['link'] = "admin/rt";
			$this->load->view('alert',$data);
		}else{
			$data= array(
				'id_rt'=>$id_rt,
				'nip'=>$nip,
				'ketua_rt'=>$ketua_rt,
				'username'=>$username,
				'password'=>$password,
				'tempat_lahir_rt'=>$tempat_lahir,
				'tgl_lahir_rt'=>$tgl_lahir,
				'jenis_kelamin_rt'=>$jk,
				'agama_rt'=>$agama,
				'tgl_menjabat'=>$tgl_tugas,
				'status_tugas'=>'1'
				);
			$this->Model_pktm->update_data('ketua_rt','id_ketua_rt',$id_ketua_rt,$data);
			$data['text'] = "Data berhasil di simpan.";
			$data['link'] = "admin/rt";
			$this->load->view('alert',$data);
		}
	}

	function aktifasi_rt(){
		$id_ketua_rt= $this->input->post('id_ketua_rt',true);
		$data=array('status_aktifasi'=>'1');
		$this->Model_pktm->update_data('ketua_rt','id_ketua_rt',$id_ketua_rt,$data);
		$data['text'] = "Data berhasil di aktifasi.";
		$data['link'] = "admin/rt";
		$this->load->view('alert',$data);
	}

	function delrt(){
		$id_ketua_rt= $this->input->post('id_ketua_rt',true);
		$data=array('status_tugas'=>'0');
		$this->Model_pktm->update_data('ketua_rt','id_ketua_rt',$id_ketua_rt,$data);
		$data['text'] = "Data berhasil di hapus.";
		$data['link'] = "admin/rt";
		$this->load->view('alert',$data);
	}

	function jadwal()
	{
		$data['user']= $this->Model_pktm->data_admin();
		$data['wilayah']= $this->Model_pktm->data_count3('*','view_wilayah','id_desa','1','status_aktifasi','1','status_tugas','1')->result();
		$data['jadwal']= $this->Model_pktm->data_view('view_pendataan','id_desa','1')->result();
		$this->load->view('admin/jadwal',$data);
	}

	function addjadwal()
	{
		$tgl= date('Y-m-d', strtotime($this->input->post('tgl',true)));
		$total_warga= $this->input->post('total_warga',true);
		$rt= $this->input->post('id_rt',true);
		$data= array(
			'id_rt'=>$rt,
			'tgl_pendataan'=>$tgl,
			'total_warga'=>$total_warga
		);
		$this->Model_pktm->insert_data('pendataan',$data);
		$data['text'] = "Data berhasil di simpan.";
		$data['link'] = "admin/jadwal";
		$this->load->view('alert',$data);
	}

	function editjadwal()
	{
		$id= $this->input->post('id_pendataan',true);
		$tgl= date('Y-m-d', strtotime($this->input->post('tgl',true)));
		$total_warga= $this->input->post('total_warga',true);
		$rt= $this->input->post('id_rt',true);
		$data= array(
			'id_rt'=>$rt,
			'tgl_pendataan'=>$tgl,
			'total_warga'=>$total_warga
		);
		$this->Model_pktm->update_data('pendataan','id_pendataan',$id,$data);
		$data['text'] = "Data berhasil di simpan.";
		$data['link'] = "admin/jadwal";
		$this->load->view('alert',$data);
	}

	function publishjadwal()
	{
		$id= $this->input->post('id_pendataan',true);
		$data= array('status_aktifasi'=>'1');
		$this->Model_pktm->update_data('pendataan','id_pendataan',$id,$data);
		$data['text'] = "Jadwal berhasil diaktifasi.";
		$data['link'] = "admin/jadwal";
		$this->load->view('alert',$data);
	}

	function view_pendataan($id,$id2)
	{
		$user= $this->Model_pktm->data_admin();
		$data['user']= $user;
		$desa= $user->id_desa;
		$data['pendataan']= $this->Model_pktm->data_view('view_pendataan','id_pendataan',$id)->row();
		$data['keluarga']= $this->Model_pktm->data_view('keluarga','id_keluarga',$id2)->row();
		$data['anggota']= $this->Model_pktm->data_view('anggota_keluarga','id_keluarga',$id2)->result();
		$data['var_nas']= $this->Model_pktm->data_view2('view_variabel','id_desa',$desa,'type_variabel','Nasional')->result();
		$data['var_lokal']= $this->Model_pktm->data_view2('view_variabel','id_desa',$desa,'type_variabel','Lokal')->result();
		$this->load->view('admin/view_pendataan',$data);
	}

	function view_keluarga($rt,$id)
	{
		$data['user']= $this->Model_pktm->data_admin();
		$data['pendataan']= $this->Model_pktm->data_view('view_pendataan','id_pendataan',$id)->row();
		$data['keluarga']= $this->Model_pktm->data_view2('view_keluarga','id_rt',$rt,'id_pendataan',$id)->result();
		$this->load->view('admin/pendataan',$data);
	}

	function indeks()
	{
		$data['user']= $this->Model_pktm->data_admin();
		$data['master_indeks']= $this->Model_pktm->get_data('master_indeks');
		$this->load->view('admin/master_indeks',$data);
	}

	function addindeks()
	{
		$nilai_min= $this->input->post('nilai_min',true);
		$nilai_maks= $this->input->post('nilai_maks',true);
		$keterangan= $this->input->post('keterangan',true);
		$master= $this->Model_pktm->get_data('master_indeks');
		$data= array(
			'nilai_min_indeks'=>$nilai_min,
			'nilai_maks_indeks'=>$nilai_maks,
			'keterangan'=>$keterangan
		);
		$this->Model_pktm->insert_data('master_indeks',$data);
		$data['text'] = "Data berhasil disimpan.";
		$data['link'] = "admin/indeks";
		$this->load->view('alert',$data);
	}

	function editindeks()
	{
		$nilai_min= $this->input->post('nilai_min',true);
		$nilai_maks= $this->input->post('nilai_maks',true);
		$keterangan= $this->input->post('keterangan',true);
		$id_indeks= $this->input->post('id_indeks',true);
		$data= array(
			'nilai_min_indeks'=>$nilai_min,
			'nilai_maks_indeks'=>$nilai_maks,
			'keterangan'=>$keterangan
		);
		$this->Model_pktm->update_data('master_indeks','id_master',$id_indeks,$data);
		$data['text'] = "Data berhasil disimpan.";
		$data['link'] = "admin/indeks";
		$this->load->view('alert',$data);
	}

	function delindeks()
	{
		$id_indeks= $this->input->post('id_indeks',true);
		$this->Model_pktm->delete_data('master_indeks','id_master',$id_indeks);
		$data['text'] = "Data berhasil dihapus.";
		$data['link'] = "admin/indeks";
		$this->load->view('alert',$data);
	}

	function profile()
	{
		$data['user']= $this->Model_pktm->data_admin();
		$this->load->view('admin/profile',$data);
	}

	function ubahpassword()
	{
		$user= $this->Model_pktm->data_admin();
		$id= $this->input->post('id',true);
		$current= MD5($this->input->post('current',true));
		$confirm= MD5($this->input->post('confirm',true));
		$new= MD5($this->input->post('new',true));
		$now_pass= $user->password;
		if($current!=$now_pass && $new!=$confirm){
			$data['text'] = "Current Password & Confirm Password salah.";
			$data['link'] = "admin/profile";
			$this->load->view('alert',$data);
		}else if($current!=$now_pass){
			$data['text'] = "Current Password salah.";
			$data['link'] = "admin/profile";
			$this->load->view('alert',$data);
		}else if($new!=$confirm){
			$data['text'] = "Confirm Password salah.";
			$data['link'] = "admin/profile";
			$this->load->view('alert',$data);		
		}else{
			$data= array('password'=>$new);
			$this->Model_pktm->update_data('admin','id_admin',$id,$data);
			$data['text'] = "Data berhasil diubah.";
			$data['link'] = "admin/logout";
			$this->load->view('alert',$data);
		}
	}

	function ubahprofile()
	{
		$nama= $this->input->post('nama',true);
		$file= $_FILES['userfile']['name'];
		$tgl= date('Y-m-d', strtotime($this->input->post('tgl',true)));
		$tempat= $this->input->post('tempat',true);
		$jk= $this->input->post('jk',true);
		$id_admin= $this->input->post('id_admin',true);
		if($file!=""){
			$nmfile = "admin_".$id_admin;
			$config['upload_path'] = './assets/users/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 300;
			$config['max_height'] = 1024;
			$config['max_width'] = 768;
			$config['file_name'] = $nmfile;
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('userfile')){
				$data['text'] = "Gambar gagal upload.";
				$data['link'] = "admin/profile";
				$this->load->view('alert',$data);
			}else{
				$img = $this->upload->data();
				$data= array(
				'nama_admin'=>$nama,
				'tgl_lahir'=>$tgl,
				'tempat_lahir'=>$tempat,
				'jenis_kelamin'=>$jk,
				'foto'=>$img['file_name'],
				);
				$this->Model_pktm->update_data('admin','id_admin',$id_admin,$data);
				$data['text'] = "Data berhasil diubah.";
				$data['link'] = "admin/profile";
				$this->load->view('alert',$data);
			}
		}else{
			$data= array(
			'nama_admin'=>$nama,
			'tgl_lahir'=>$tgl,
			'tempat_lahir'=>$tempat,
			'jenis_kelamin'=>$jk,
			);
		$this->Model_pktm->update_data('admin','id_admin',$id_admin,$data);
		$data['text'] = "Data berhasil diubah.";
		$data['link'] = "admin/profile";
		$this->load->view('alert',$data);
		}
	}

	function laporan()
	{
		$data['user']= $this->Model_pktm->data_admin();
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
		
		$this->load->view('admin/laporan',$data);
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

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('admin'));
	}
}