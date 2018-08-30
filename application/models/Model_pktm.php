<?php
defined('BASEPATH') OR EXIT('No direct access allowed');

class Model_pktm extends CI_Model
{
	public	function __construct()
	{
		parent::__construct();
	}
	
	public function get_data($tabel)
	{
		return $this->db->get($tabel)->result();
	}

	public function keluarga($rt)
	{
		$this->db->select('m1.*,m2.rt,m2.rw,m2.nama_desa,m2.kode_pos,m2.kecamatan,m2.kota,m2.provinsi');
		$this->db->join('view_wilayah m2','m2.id_rt=m1.id_rt');
		$this->db->where('m2.id_rt',$rt);
		return $this->db->get('keluarga m1')->result();
	}

	function cek_login_rt($username,$hast,$wilayah)
	{
		$this->db->where('username',$username);
		$this->db->where('password',$hast);
		$this->db->where('id_rt',$wilayah);
		return $this->db->get('ketua_rt')->row();
	}

	function cek_login_admin($username,$hast)
	{
		$this->db->join('hak_akses m2', 'm2.id_admin = m1.id_admin');
		$this->db->where('m1.username',$username);
		$this->db->where('m1.password',$hast);
		$this->db->where('m2.id_desa','1');
		return $this->db->get('admin m1')->row();
	}

	function insert_data($tabel,$data)
	{
		return $this->db->insert($tabel,$data);
	}

	function update_data($table,$field,$con,$data)
	{
		$this->db->where($field,$con);
		$this->db->update($table,$data);
	}

	function update_data2($table,$field,$con,$f2,$v2,$data)
	{
		$this->db->where($f2,$v2);
		$this->db->where($field,$con);
		$this->db->update($table,$data);
	}

	function data_view($tabel,$f,$v)
	{
		$this->db->where($f,$v);
		return $this->db->get($tabel);	
	}

	function data_view2($tabel,$f,$v,$f1,$v1)
	{
		$this->db->where($f,$v);
		$this->db->where($f1,$v1);
		return $this->db->get($tabel);	
	}

	function data_count3($count,$tabel,$f,$v,$f1,$v1,$f2,$v2)
	{
		$this->db->select($count);
		$this->db->where($f,$v);
		$this->db->where($f1,$v1);
		$this->db->where($f2,$v2);
		return $this->db->get($tabel);	
	}

	function join1($pilih,$tabel,$j,$jv,$f,$v,$f1,$v1)
	{
		$this->db->select($pilih);
		$this->db->join($j,$jv);
		$this->db->where($f,$v);
		$this->db->where($f1,$v1);
		return $this->db->get($tabel);
	}

	function delete_data($tabel,$f,$v)
	{
		$this->db->where($f,$v);
		$this->db->delete($tabel);
	}

	function data_count2($count,$tabel,$f,$v,$f1,$v1)
	{
		$this->db->select($count);
		$this->db->where($f,$v);
		$this->db->where($f1,$v1);
		return $this->db->get($tabel);	
	}

	function data_user()
	{
		$username = $this->session->userdata('log_rt');
		$this->db->select('m1.*,m2.rt,m2.rw,m2.nama_desa,m2.id_desa');
		$this->db->join('view_wilayah m2','m2.id_rt = m1.id_rt');
		$this->db->where('m1.username',$username);
		return $this->db->get('ketua_rt m1')->row();
	}

	function data_admin()
	{
		$username = $this->session->userdata('log_admin');
		$this->db->select('m1.*,m3.*,m4.kecamatan,m5.kota,m5.provinsi');
		$this->db->join('hak_akses m2','m2.id_admin = m1.id_admin');
		$this->db->join('desa m3','m3.id_desa = m2.id_desa');
		$this->db->join('kecamatan m4','m4.id_kecamatan = m3.id_kecamatan');
		$this->db->join('kota m5','m5.id_kota = m4.id_kota');
		$this->db->where('m1.username',$username);
		$this->db->where('m3.id_desa','1');
		return $this->db->get('admin m1')->row();
	}

	function pendataan($log,$f)
	{
		
		$this->db->join('ketua_rt m2','m2.id_rt = m1.id_rt');
		$this->db->join('view_wilayah m3','m3.id_rt = m1.id_rt');
		$this->db->where($f,$username);
		$this->db->order_by('m1.tgl_pendataan','asc');
		return $this->db->get('pendataan m1')->result();
	}

	function laporan($v,$v1,$from,$to)
	{
		$this->db->select("*");
		$this->db->from('view_pendataan');
		$this->db->where('id_desa',$v);
		$this->db->where('id_rt',$v1);
		$this->db->where('status_pendataan','1');
		$this->db->where("(DATE_FORMAT(tgl_pendataan,('%Y')) between '$from' and '$to')");
		return $this->db->get()->result();	
	}

	function laporan2($v,$from,$to)
	{
		$this->db->select("*");
		$this->db->from('view_pendataan');
		$this->db->where('id_desa',$v);
		$this->db->where('status_pendataan','1');
		$this->db->where("(DATE_FORMAT(tgl_pendataan,('%Y')) between '$from' and '$to')");
		return $this->db->get()->result();	
	}

	function inc_table($table){
		$query = $this->db->query("show table status like '$table'");
		return $query->row();
	}

}