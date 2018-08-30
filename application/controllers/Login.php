<?php
defined('BASEPATH') OR EXIT('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['message'] = '';
		$data['action'] = site_url('login/login');
		$data['view_wilayah'] = $this->Model_pktm->get_data('view_wilayah');
		$this->load->view('login',$data);
	}
	
	function admin()
	{
		$data['message'] = '';
		$data['action'] = site_url('login/login_admin');
		$this->load->view('admin/login',$data);
	}

	function login()
	{
		$username = $this->input->post('username',true);
		$password = $this->input->post('password',true);
		$wilayah = $this->input->post('wilayah',true);
		$hast = MD5($password);
		$data['view_wilayah'] = $this->Model_pktm->get_data('view_wilayah');
		$akun = $this->Model_pktm->cek_login_rt($username,$hast,$wilayah);
		$temp_akun = count($akun);	
		if($temp_akun > 0)
		{
			$data = array(
				'log_rt'=>$username,
				'wilayah'=>$wilayah,
				'logged_in'=>true
			);	
			$this->session->set_userdata($data);
			redirect('welcome');
		}
		else
		{
			$data['message'] = '*Login gagal, pastikan username, Password & Wilayah benar!';
			$data['action'] = site_url('login/login');
			$this->load->view('login',$data);
		}
	}

	function login_admin()
	{
		$username = $this->input->post('username',true);
		$password = $this->input->post('password',true);
		$hast = MD5($password);
		$akun = $this->Model_pktm->cek_login_admin($username,$hast);
		$temp_akun = count($akun);
		if ($temp_akun > 0)
		{
			$data = array(
				'log_admin'=>$username,
				'logged_admin'=>true
			);	
			$this->session->set_userdata($data);
			redirect('admin');
		}
		else
		{
			$data['message'] = '*Login gagal, pastikan username dan Password!';
			$data['action'] = site_url('login/login_admin');
			$this->load->view('admin/login',$data);
		}
	}
}