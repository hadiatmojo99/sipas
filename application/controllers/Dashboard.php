<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('html','url','form'));
        $this->load->library('pagination','form_validation','encryption');
		$this->load->model('M_sipas');
		if ($this->session->userdata('username') == NULL) {
			redirect('auth/halaman_kosong');
		}
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['jabatan'] = $this->session->userdata('nama');
		$data['graph'] = $this->M_sipas->grafik_keluar('surat_keluar');
		$data['graphh'] = $this->M_sipas->grafik_masuk('surat_masuk');
		if ($this->session->userdata('jabatan') == 'Admin' || $this->session->userdata('jabatan') == 'Staff') {
			$data['surat_masuk'] = $this->M_sipas->total_surat('surat_masuk');			
		}else {			
			$data['surat_masuk'] = $this->M_sipas->total_tujuan();
		}
		$data['surat_keluar'] = $this->M_sipas->total_surat('surat_keluar');
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		if ($this->session->userdata('jabatan') == 'Admin' || $this->session->userdata('jabatan') == 'Staff') {
			$this->load->view('v_dashboard');
		}else {			
			$this->load->view('user_dashboard');
		}
		$this->load->view('footer');
	}

	public function user()
	{
		if ($this->session->userdata('jabatan') != 'Admin') {
			$this->load->view('errors/error_page');
		}else{
		$data['title'] = 'Data User';
		$data['data_user'] = $this->M_sipas->TampilUser()->result_array();
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('data_user', $data);
		}
	}

	public function hapus_user($id_user)
	{		
		$where = array('id_user' => $id_user);		
		$this->M_sipas->hapus('user', $where);
		$this->session->set_flashdata('flash','Dihapus');		
		redirect('dashboard/user');
	}

	function edit_user($id_user)
	{
		$data['title'] = 'Edit User';
		$where = array('id_user' => $id_user);
		$data['data_user'] = $this->M_sipas->edit('user',$where)->result_array();			
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('v_edit_user');
		$this->load->view('footer');
	}

	public function proses_edituser()
	{
		$nama     = $this->input->post('nama');
		$jabatan = $this->input->post('jabatan');
		$username = $this->input->post('username');
		$email 	  = $this->input->post('email');
		if ($this->input->post('password') == NULL)
		{
			$password =	$this->input->post('oldpassword');
		}else{

			$password = md5($this->input->post('password'));		
		}				
		$id_user  = $this->input->post('id_user');

		$data = array (
			'nama'		=> $nama,
			'jabatan'	=> $jabatan,
			'username'  => $username,
			'email'  	=> $email,
			'password'  => $password
		);

		$where = array(
			'id_user' => $id_user
		);
		$this->db->update('user', $data, $where);
		$this->session->set_flashdata('flash', 'Diubah');
		redirect('dashboard/user');
	}

	public function tambah_user()
	{
		$data['title'] = 'Tambah User';
		$data['data_pilih'] = $this->M_sipas->TampilJabatan()->result_array();
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('input_user');
		$this->load->view('footer');
	}	
	
	function proses_adduser()
	{
		$this->form_validation->set_rules('nama','Nama','required',
		array('required' => 'Nama Wajib Diisi!'));
		$this->form_validation->set_rules('jabatan','Jabatan','required',
		array('required' => 'Jabatan Wajib Dipilih!'));
		$this->form_validation->set_rules('username','Username','required|trim|is_unique[user.username]|alpha_numeric',
		array('required' => 'Username Wajib Diisi!', 'is_unique' => 'Username sudah ada !', 'alpha_numeric' => 'Hanya Huruf dan Angka Saja'));
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',
		array('valid_email' =>'Emailnya Harus Valid', 'required' => 'Email Wajib Diisi !', 'is_unique' => 'Email sudah ada !'));
		$this->form_validation->set_rules('password','Password','required',
		array('required' => 'Password Wajib Diisi!'));
		$this->form_validation->set_rules('konfirm_password', 'Konfirmasi Password', 'required|matches[password]',
		array('matches' => 'Password Tidak Cocok !', 'required' => 'Masukkan Ulang Password Wajib Diisi!'));

		if($this->form_validation->run() == true){
		$nama 	  = $this->input->post('nama');
		$jabatan 	  = $this->input->post('jabatan');
		$username = $this->input->post('username');
		$email 	  = $this->input->post('email');
		$password = $this->input->post('password');

		$data = array (
			'nama' 	   	 => $nama,
			'jabatan'    => $jabatan,
			'username'   => $username,
			'email'  	 => $email,
			'password'   => md5($password)
		);
		$this->db->insert('user', $data);
		$this->session->set_flashdata('flash', 'Disimpan');
		redirect('dashboard/user');
		}else{			
		$this->session->set_flashdata('gagal', 'gagal');
		$data['title'] = 'Tambah User';
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('input_user');
		$this->load->view('footer');
		}	
	}

	function surat_keluar()
	{
		if ($this->session->userdata('jabatan') == 'Admin' || $this->session->userdata('jabatan') == 'Staff') {			
			$data['title'] = 'Surat Keluar';
			$data['data_keluar'] = $this->M_sipas->TampilKeluar()->result_array();
			$this->load->view('header', $data);
			$this->load->view('sidebar');
			$this->load->view('v_keluar', $data);
		}else{
			$this->load->view('errors/error_page');
		}				
	}
	
	function tambah_keluar()
	{
		if ($this->session->userdata('jabatan') == 'Admin' || $this->session->userdata('jabatan') == 'Staff') {
		$data['title'] = 'Tambah Surat Kelar';
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('v_input_keluar');
		$this->load->view('footer');
		}else{
			$this->load->view('errors/error_page');
		}
	}

	function proses_addkeluar()
	{
		$this->form_validation->set_rules('tujuan','Tujuan','required',
		array('required' => 'Tujuan Wajib Diisi!'));
		$this->form_validation->set_rules('tgl_keluar','Tanggal','required|trim',
		array('required' => 'Tanggal Wajib Diisi!'));
		$this->form_validation->set_rules('nomor','Nomor Surat','required|trim',
		array('required' => 'Nomor Surat Wajib Diisi !'));
		$this->form_validation->set_rules('keterangan','Keterangan Surat','required|trim', array('required' => 'Keterangan Surat Wajib Diisi !'));
		
		if($this->form_validation->run() == TRUE){ //daripada nulis != false, lebih baik ditulis == TRUE, lebih mudah dibaca manusia
			$tujuan							= $this->input->post('tujuan');
			$tgl_keluar						= $this->input->post('tgl_keluar');
			$keterangan						= $this->input->post('keterangan');
			$nmfile 						= $tujuan.$tgl_keluar.$keterangan;
			$berkasnya 						= 'berkas';
			$config['upload_path']          = './assets/berkas/keluar';
			$config['allowed_types']        = 'pdf';	
			$config['file_name'] 			= $nmfile;
			$this->load->library('upload', $config);
			if($this->upload->do_upload('berkas') == NULL){					
				$berkas = '';
			}else{							
						if ($this->upload->do_upload($berkasnya))
						{
							$file = $this->upload->data();
							$berkas = $file['file_name'];
						}
					}
					$data = array (
					'tujuan_keluar' 	    => $this->input->post('tujuan'),
					'tgl_keluar' 			=> $this->input->post('tgl_keluar'),
					'nomor_keluar'  		=> $this->input->post('nomor'),
					'keterangan_keluar'  	=> $this->input->post('keterangan'),
					'arsip_keluar'  		=> $berkas
					);
					$this->db->insert('surat_keluar', $data);
					$this->session->set_flashdata('flash', 'Disimpan');
					redirect('dashboard/surat_keluar');
			//form upload kosong atau terisi, ini tetap dijalankan:	
							
		} else {			
			$this->session->set_flashdata('gagal', 'gagal');
			$data['title'] = 'Tambah Surat Keluar';
			$this->load->view('header', $data);
			$this->load->view('sidebar');
			$this->load->view('v_input_keluar');
			$this->load->view('footer');
		}	
	}

	
	public function hapus_keluar($id_keluar)
	{				
		$where = array('id_keluar' => $id_keluar);			
		$data = $this->M_sipas->ambil_data('surat_keluar', $where)->row();
		$lokasifile = './assets/berkas/keluar/'.$data->arsip_keluar;
		if(is_readable($lokasifile) && unlink($lokasifile)){			
			$this->M_sipas->hapus('surat_keluar', $where);
			$this->session->set_flashdata('flash','Dihapus');		
			redirect('dashboard/surat_keluar');
		}else{		
			$this->M_sipas->hapus('surat_keluar', $where);
			$this->session->set_flashdata('flash','Dihapus');
			redirect('dashboard/surat_keluar');
		}
	}

	public function bersihkan_keluar()
	{				
		$this->M_sipas->kosongkan('surat_keluar');	
		delete_files('./assets/berkas/keluar/');	
		$this->session->set_flashdata('flash','Dikosongkan');		
		redirect('dashboard/surat_keluar');
	}
	
	public function edit_keluar($id_keluar)
	{
		$data['title'] = 'Edit Surat Keluar';
		$where = array('id_keluar' => $id_keluar);
		$data['data_keluar'] = $this->M_sipas->edit('surat_keluar',$where)->result_array();				
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('v_edit_keluar');
		$this->load->view('footer');
	}
	
	function proses_editkeluar()
	{
		$this->form_validation->set_rules('tujuan','Tujuan','required',
		array('required' => 'Tujuan Wajib Diisi!'));
		$this->form_validation->set_rules('tgl_keluar','Tanggal','required|trim',
		array('required' => 'Tanggal Wajib Diisi!'));
		$this->form_validation->set_rules('nomor','Nomor Surat','required|trim',
		array('required' => 'Nomor Surat Wajib Diisi !'));
		$this->form_validation->set_rules('keterangan','Keterangan Surat','required|trim', array('required' => 'Keterangan Surat Wajib Diisi !'));
		
		if($this->form_validation->run() == TRUE){ //daripada nulis != false, lebih baik ditulis == TRUE, lebih mudah dibaca manusia			
			$tujuan							= $this->input->post('tujuan');
			$tgl_keluar						= $this->input->post('tgl_keluar');
			$keterangan						= $this->input->post('keterangan');
			$nmfile 						= $tujuan.$tgl_keluar.$keterangan;
			$id_keluar 						= $this->input->post('id_keluar');
			$config['upload_path']          = './assets/berkas/keluar';
			$config['allowed_types']        = 'pdf';
			$config['overwrite']       		= TRUE;	
			$config['file_name'] 			= $nmfile;
			$berkasnya						= 'berkas';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload($berkasnya))
			{
				$file = $this->upload->data();
				$berkas = $file['file_name'];			
			}else{
				$berkas = $this->input->post('arsip_lama');	
			}
			$id_keluar = $this->input->post('id_keluar');			
			$data = array (
				'tujuan_keluar' 	    => $this->input->post('tujuan'),
				'tgl_keluar' 			=> $this->input->post('tgl_keluar'),
				'nomor_keluar'  		=> $this->input->post('nomor'),
				'keterangan_keluar'  	=> $this->input->post('keterangan'),
				'arsip_keluar'  		=> $berkas //kalau form upload kosong maka nilainya akan kosong, kalau form upload terisi maka nilainya $berkas = $file['file_name']
			);
			$where = array(
				'id_keluar' => $id_keluar
			);			
			$this->db->update('surat_keluar', $data, $where);
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('dashboard/surat_keluar');
		} else {			
			$this->session->set_flashdata('gagal', 'gagal');
			$data['title'] = 'Tambah Surat Keluar';
			$this->load->view('header', $data);
			$this->load->view('sidebar');
			$this->load->view('v_edit_keluar');
			$this->load->view('footer');
		}	
	}			

	function surat_masuk()
	{
		if($this->session->userdata('jabatan') == 'Admin' || $this->session->userdata('jabatan') == 'Staff'){
			$data['title'] = 'Surat masuk';
			$data['data_masuk'] = $this->M_sipas->TampilMasuk()->result_array();			
			$this->load->view('header', $data);
			$this->load->view('sidebar');
			$this->load->view('v_masuk', $data);		
		}else{
			$jabatan = $this->session->userdata('jabatan');
			$data['title'] = 'Surat masuk';
			$where = array('disposisi.tujuan' => $jabatan);
			$data['data_masuk'] = $this->M_sipas->TampilMasukWhere($where)->result_array();
			$this->load->view('header', $data);
			$this->load->view('sidebar');
			$this->load->view('v_masuk', $data);
		}
	}

	public function bersihkan_masuk()
	{				
		$this->M_sipas->kosongkan('surat_masuk');	
		delete_files('./assets/berkas/masuk/');	
		$this->session->set_flashdata('flash','Dikosongkan');		
		redirect('dashboard/surat_masuk');
	}
	
	public function tambah_masuk()
	{
		$data['title'] = 'Tambah Surat Masuk';
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('v_input_masuk');
		$this->load->view('footer');
	}

	function proses_addmasuk()
	{
		$this->form_validation->set_rules('tgl_masuk','Tanggal Masuk','required',
		array('required' => 'Tanggal Masuk Wajib Diisi!'));
		$this->form_validation->set_rules('nomor','Nomor Masuk','required|trim',
		array('required' => 'Nomor Masuk Wajib Diisi!'));
		$this->form_validation->set_rules('tgl_surat','Tanggal Surat','required|trim',
		array('required' => 'Tanggal Surat Wajib Diisi !'));
		$this->form_validation->set_rules('pengirim','Nama Pengirim','required|trim',
		array('required' => 'Nama Pengirim Wajib Diisi !'));
		$this->form_validation->set_rules('perihal','Perihal Surat','required|trim',
		array('required' => 'Perihal Surat Wajib Diisi !'));
		
		if($this->form_validation->run() == TRUE){
			$pengirim						= $this->input->post('pengirim');
			$tgl_masuk						= $this->input->post('tgl_masuk');
			$perihal						= $this->input->post('perihal');
			$nmfile 						= $pengirim.$tgl_masuk.$perihal;
			$config['upload_path']          = './assets/berkas/masuk';
			$config['allowed_types']        = 'pdf';	
			$config['file_name'] 			= $nmfile;	
			$this->load->library('upload', $config);
			if($this->upload->do_upload('berkas') == NULL)
			{			
				$berkas = '';
			}else{							
				if ($this->upload->do_upload('berkas'))
				{
					$file = $this->upload->data();
					$berkas = $file['file_name'];					
				}
			}		
			$data = array (
				'tgl_masuk'	 	=> $this->input->post('tgl_masuk'),
				'nomor_masuk'  	=> $this->input->post('nomor'),
				'tgl_surat' 	=> $this->input->post('tgl_surat'),
				'pengirim'  	=> $this->input->post('pengirim'),
				'perihal'  		=> $this->input->post('perihal'),
				'keterangan'    => 'Belum Disposisi',
				'arsip_masuk'  	=> $berkas
			);
			$this->db->insert('surat_masuk', $data);
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('dashboard/surat_masuk');
		} else {			
			$this->session->set_flashdata('gagal', 'gagal');
			$data['title'] = 'Tambah Surat Keluar';
			$this->load->view('header', $data);
			$this->load->view('sidebar');
			$this->load->view('v_input_masuk');
			$this->load->view('footer');
		}	
	}

	public function edit_masuk($id_masuk)
	{
		$data['title'] = 'Edit Surat Masuk';
		$where = array('id_masuk' => $id_masuk);
		$data['data_masuk'] = $this->M_sipas->edit('surat_masuk',$where)->result_array();				
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('v_edit_masuk');
		$this->load->view('footer');
	}
	
	function proses_editmasuk()
	{
		$this->form_validation->set_rules('tgl_masuk','Tanggal Masuk','required',
		array('required' => 'Tanggal Masuk Wajib Diisi!'));
		$this->form_validation->set_rules('nomor','Nomor Masuk','required|trim',
		array('required' => 'Nomor Masuk Wajib Diisi!'));
		$this->form_validation->set_rules('tgl_surat','Tanggal Surat','required|trim',
		array('required' => 'Tanggal Surat Wajib Diisi !'));
		$this->form_validation->set_rules('pengirim','Nama Pengirim','required|trim',
		array('required' => 'Nama Pengirim Wajib Diisi !'));
		$this->form_validation->set_rules('perihal','Perihal Surat','required|trim',
		array('required' => 'Perihal Surat Wajib Diisi !'));
		
		if($this->form_validation->run() == TRUE){ //daripada nulis != false, lebih baik ditulis == TRUE, lebih mudah dibaca manusia
			$pengirim						= $this->input->post('pengirim');
			$tgl_masuk						= $this->input->post('tgl_masuk');
			$perihal						= $this->input->post('perihal');
			$nmfile 						= $pengirim.$tgl_masuk.$perihal;
			$id_masuk 						= $this->input->post('id_masuk');
			$config['upload_path']          = './assets/berkas/masuk';
			$config['allowed_types']        = 'pdf';
			$config['overwrite']       		= TRUE;	
			$config['file_name'] 			= $nmfile;
			$berkasnya						= 'berkas'	;			
			$this->load->library('upload', $config);
			
				if ($this->upload->do_upload($berkasnya))
				{
					$file = $this->upload->data();
					$berkas = $file['file_name'];			
				}else{
					$berkas = $this->input->post('arsip_lama');	
				}
				
			
			//form upload kosong atau terisi, ini tetap dijalankan:
				$id_masuk = $this->input->post('id_masuk');			
				$data = array (
					'tgl_masuk'	 	=> $this->input->post('tgl_masuk'),
					'nomor_masuk'  	=> $this->input->post('nomor'),
					'tgl_surat' 	=> $this->input->post('tgl_surat'),
					'pengirim'  	=> $this->input->post('pengirim'),
					'perihal'  		=> $this->input->post('perihal'),
					'arsip_masuk'  	=> $berkas //kalau form upload kosong maka nilainya akan kosong, kalau form upload terisi maka nilainya $berkas = $file['file_name']
				);
			$where = array(
				'id_masuk' => $id_masuk
			);			
			$this->db->update('surat_masuk', $data, $where);
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('dashboard/surat_masuk');
		} else {			
			$this->session->set_flashdata('gagal', 'gagal');
			$data['title'] = 'Tambah Surat masuk';
			$id_masuk = $this->input->post('id_masuk');					
			$where = array('id_masuk' => $id_masuk);
			$data['data_masuk'] = $this->M_sipas->edit('surat_masuk',$where)->result_array();
			$this->load->view('header', $data);
			$this->load->view('sidebar');
			$this->load->view('v_edit_masuk');
			$this->load->view('footer');
		}	
	}

	public function hapus_masuk($id_masuk)
	{				
		$where = array('id_masuk' => $id_masuk);			
		$data = $this->M_sipas->ambil_data('surat_masuk', $where)->row();
		$lokasifile = './assets/berkas/masuk/'.$data->arsip_masuk;
		if(is_readable($lokasifile) && unlink($lokasifile)){			
			$this->M_sipas->hapus('surat_masuk', $where);
			$this->M_sipas->hapus('disposisi', $where);
			$this->session->set_flashdata('flash','Dihapus');		
		redirect('dashboard/surat_masuk');
	}else{		
		$this->M_sipas->hapus('surat_masuk', $where);
		$this->M_sipas->hapus('disposisi', $where);
		$this->session->set_flashdata('flash','Dihapus');
		redirect('dashboard/surat_masuk');
		}
	}

	public function disposisi($id_masuk)
	{
		$data['title'] = 'Edit Surat disposisi';
		$where = array('id_masuk' => $id_masuk);
		$data['data_disposisi'] = $this->M_sipas->edit('surat_masuk',$where)->result_array();	
		$data['data_pilih'] = $this->M_sipas->TampilUser()->result_array();			
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('v_input_disposisi');
		$this->load->view('footer');
	}

	function proses_inputdisposisi()
	{
		$this->form_validation->set_rules('tgl_disposisi','Tanggal Disposisi','required',
		array('required' => 'Tanggal Disposisi Wajib Diisi!'));
		$this->form_validation->set_rules('tujuan','Tujuan','required|trim',
		array('required' => 'Tujuan Wajib Diisi!'));
		$this->form_validation->set_rules('isi','Isi Ringkas','required|trim',
		array('required' => 'Isi Ringkas Wajib Diisi !'));
		$this->form_validation->set_rules('sifat','Sifat','required|trim',
		array('required' => 'Sifat Wajib Diisi !'));		
		
		if($this->form_validation->run() == TRUE){
			$id_masuk						= $this->input->post('id_masuk');
			$nmfile 						= 'Dispoisi-'.$id_masuk;
			$config['upload_path']          = './assets/berkas/masuk/disposisi';
			$config['allowed_types']        = 'pdf';
			$config['overwrite']       		= TRUE;	
			$config['file_name'] 			= $nmfile;
			$berkasnya						= 'berkas'	;
			$this->load->library('upload', $config);
			if($berkasnya == NULL)
			{				
				$berkas = '';
			}else{								
				if ($this->upload->do_upload($berkasnya))
				{
					$file = $this->upload->data();
					$berkas = $file['file_name'];				
				}
			}			
			$id_masuk = $this->input->post('id_masuk');			
			$data = array (
				'id_masuk'		=> $this->input->post('id_masuk'),
				'tgl_disposisi'	=> $this->input->post('tgl_disposisi'),
				'tujuan'  		=> $this->input->post('tujuan'),
				'isi'		 	=> $this->input->post('isi'),
				'sifat'		  	=> $this->input->post('sifat'),					
				'arsip_disposisi'  	=> $berkas
				);
			$where = array(
				'id_masuk' => $id_masuk
			);			
			$d2 = ['keterangan' => 'Sudah Disposisi'];
			$this->db->insert('disposisi', $data);
			$this->db->update('surat_masuk', $d2, $where);
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('dashboard/surat_masuk');
		} else {			
			$this->session->set_flashdata('gagal', 'gagal');
			$data['title'] = 'Tambah Surat masuk';
			$id_masuk = $this->input->post('id_masuk');					
			$where = array('id_masuk' => $id_masuk);
			$data['data_disposisi'] = $this->M_sipas->edit('surat_masuk',$where)->result_array();		
			$data['data_pilih'] = $this->M_sipas->TampilUser()->result_array();		
			$this->load->view('header', $data);
			$this->load->view('sidebar');
			$this->load->view('v_input_disposisi');
			$this->load->view('footer');
		}	
	}

	function edit_disposisi($id_masuk)
	{
		$data['title'] = 'Edit Disposisi';
		$where = array('disposisi.id_masuk' => $id_masuk);
		$data['data_disposisi'] = $this->M_sipas->DataJoin($where)->result_array();	
		$data['data_pilih'] = $this->M_sipas->TampilUser()->result_array();			
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('v_edit_disposisi');
		$this->load->view('footer');
	}

	public function pdf_disposisi($id_masuk)
	{
		$where = array('id_masuk' => $id_masuk);
		$data['data_disposisi'] = $this->M_sipas->edit('disposisi',$where)->result_array();
		$this->load->view('v_pdf_disposisi', $data);
	}

	function proses_editdisposisi()
	{
		$this->form_validation->set_rules('tgl_disposisi','Tanggal Disposisi','required',
		array('required' => 'Tanggal Disposisi Wajib Diisi!'));
		$this->form_validation->set_rules('tujuan','Tujuan','required|trim',
		array('required' => 'Tujuan Wajib Diisi!'));
		$this->form_validation->set_rules('isi','Isi Ringkas','required|trim',
		array('required' => 'Isi Ringkas Wajib Diisi !'));
		$this->form_validation->set_rules('sifat','Sifat','required|trim',
		array('required' => 'Sifat Wajib Diisi !'));
		
		if($this->form_validation->run() == TRUE){
			$id_masuk						= $this->input->post('id_masuk');
			$nmfile 						= $id_masuk;
			$config['upload_path']          = './assets/berkas/masuk/disposisi';
			$config['allowed_types']        = 'pdf';
			$config['overwrite']       		= TRUE;	
			$config['file_name'] 			= $nmfile;
			$berkasnya						= 'berkas'	;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload($berkasnya))
			{
				$file = $this->upload->data();
				$berkas = $file['file_name'];			
			}else{
				$berkas = $this->input->post('arsip_lama');	
			}			
				$id_masuk = $this->input->post('id_masuk');			
				$data = array (
					'id_masuk'		=> $this->input->post('id_masuk'),
					'tgl_disposisi'	=> $this->input->post('tgl_disposisi'),
					'tujuan'  		=> $this->input->post('tujuan'),
					'isi'		 	=> $this->input->post('isi'),
					'sifat'		  	=> $this->input->post('sifat'),					
					'arsip_disposisi'  	=> $berkas
				);
			$where = array(
				'id_masuk' => $id_masuk
			);			
			$this->db->update('disposisi', $data, $where);
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('dashboard/surat_masuk');
		} else {			
			$this->session->set_flashdata('gagal', 'gagal');
			$data['title'] = 'Tambah Disposisi';
			$id_masuk = $this->input->post('id_masuk');					
			$where = array('id_masuk' => $id_masuk);
			$data['data_disposisi'] = $this->M_sipas->edit('disposisi',$where)->result_array();
			$this->load->view('header', $data);
			$this->load->view('sidebar');
			$this->load->view('v_edit_disposisi');
			$this->load->view('footer');
		}	
	}

	public function detail_masuk($id_masuk)
	{
		$data['title'] = 'Detail Surat Masuk';
		$where = array('disposisi.id_masuk' => $id_masuk);
		$data['data_disposisi'] = $this->M_sipas->DataJoin($where)->result_array();				
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('v_detail_masuk');
		$this->load->view('footer');
	}

	public function laporan_masuk()
	{
		if ($this->session->userdata('jabatan') == 'Admin' || $this->session->userdata('jabatan') == 'Staff') {
			$data['title'] = 'Laporan';		
			$this->load->view('header', $data);
			$this->load->view('sidebar');
			$this->load->view('laporan_masuk', $data);
			$this->load->view('footer');
		}else{
			$this->load->view('errors/error_page');
		}
	}

	public function proses_lapormasuk()
	{
		$tgl_awal  = $this->input->post('tgl_mulai');
		$tgl_akhir = $this->input->post('tgl_akhir');
		$submit = $this->input->post('submit');
		if ($submit == 'pdf') 
		{			
			$data['data_masuk'] = $this->M_sipas->laporan_masuk($tgl_awal, $tgl_akhir)->result_array();
			$data['jml_masuk'] = $this->M_sipas->laporan_jmlmasuk($tgl_awal, $tgl_akhir);
			$data['bulan'] = $tgl_awal;
			$this->load->view('v_proses_lapormasuk', $data);
		}
		else if ($submit == 'excel') 
		{
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=Laporan_Surat_Masuk.xls");
			$data['data_masuk'] = $this->M_sipas->laporan_masuk($tgl_awal, $tgl_akhir)->result_array();
			$data['jml_masuk'] = $this->M_sipas->laporan_jmlmasuk($tgl_awal, $tgl_akhir);
			$data['bulan'] = $tgl_awal;
			$this->load->view('v_proses_lapormasuk', $data);
		}
	}

	public function laporan_keluar()
	{
		if ($this->session->userdata('jabatan') == 'Admin' || $this->session->userdata('jabatan') == 'Staff') {
			$data['title'] = 'Laporan';		
			$this->load->view('header', $data);
			$this->load->view('sidebar');
			$this->load->view('laporan_keluar', $data);
			$this->load->view('footer');
		}else{
			$this->load->view('errors/error_page');
		}
	}

	public function proses_laporkeluar()
	{
		$tgl_awal  = $this->input->post('tgl_mulai');
		$tgl_akhir = $this->input->post('tgl_akhir');
		$submit = $this->input->post('submit');
		if ($submit == 'pdf') 
		{			
			$data['data_keluar'] = $this->M_sipas->laporan_keluar($tgl_awal, $tgl_akhir)->result_array();
			$data['jml_keluar'] = $this->M_sipas->laporan_jmlkeluar($tgl_awal, $tgl_akhir);
			$data['bulan'] = $tgl_awal;
			$this->load->view('v_proses_laporkeluar', $data);
		}
		else if ($submit == 'excel') 
		{
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=Laporan_Surat_Keluar.xls");
			$data['data_keluar'] = $this->M_sipas->laporan_keluar($tgl_awal, $tgl_akhir)->result_array();
			$data['jml_keluar'] = $this->M_sipas->laporan_jmlkeluar($tgl_awal, $tgl_akhir);
			$data['bulan'] = $tgl_awal;
			$this->load->view('v_proses_laporkeluar', $data);
		}
	}
}










	// public function pdf_masuk($nomor_masuk)
	// {
	// 	$where = array('nomor_masuk' => $nomor_masuk);
	// 	$data['data_masuk'] = $this->M_sipas->edit('surat_masuk',$where)->result_array();
	// 	$this->load->view('v_pdf_masuk', $data);
	// }

	// public function pdf_keluar($nomor_keluar)
	// {
	// 	$where = array('nomor_keluar' => $nomor_keluar);
	// 	$data['data_keluar'] = $this->M_sipas->edit('surat_keluar',$where)->result_array();
	// 	$this->load->view('v_pdf_keluar', $data);
	// }	