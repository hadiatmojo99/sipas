<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('M_sipas');		
    }

	public function index()
	{		
		if ($this->session->userdata('username') == NULL) {
		$this->load->view('login');
		}else{
			redirect('dashboard');
		}
	}

	public function proses_login()
	{
        //load model M_user
		$this->load->model('m_sipas');
		
		$this->load->library('session');

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //cek login via model
        $cek = $this->M_sipas->cek_login($username, $password);
		$row = $cek -> row();
		$data = array(
			'username' => $row->username,
			'nama' => $row->nama,
			'jabatan' => $row->jabatan
		);

		if($cek)
		{
			$this->session->set_userdata('jabatan',$data['jabatan']);
			$this->session->set_userdata('username',$data['username']);
			$this->session->set_userdata('nama',$data['nama']);
			// $this->session->set_userdata('status_login', $login);
			echo "Berhasil";
		}
		else{
			echo "Gagal";
		}

    }

	public function logout()
	{	
		$this->load->library('session');
		$data = array('jabatan', 'username', 'nama');
		$this->session->unset_userdata($data);		
		// $this->session->unset_userdata('status_login');
		redirect('auth');
	}

	public function buat_akun()
	{
		$data['title'] = 'Buat Akun PPDB';
		$this->load->view('buat_akun', $data);
	}

	public function halaman_kosong()
	{
		$this->load->view('errors/error_page');
	}
}
