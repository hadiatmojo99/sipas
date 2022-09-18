<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_sipas extends CI_model {            
    
    public function cek_login($username, $password)
    {
        $this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		$query = $this->db->get();
		return $query;
    }

    public function cek_loginn($post)
    {
        $this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $post['username']);
		$this->db->where('password', md5($post['password']));
		$query = $this->db->get();
		return $query;
    }
    
    //tampil data user
    function TampilUser()
	{		
		$this->db->SELECT('*');
		$this->db->from('user');		
		$query = $this->db->get();
		return $query;
	}
    
    function TampilJabatan()
	{		
		$this->db->SELECT('*');
		$this->db->from('jabatan');		
		$query = $this->db->get();
		return $query;
	}    
    
    public function hapusdatauser($id)
    {
        $this->db->where('id_user',$id);
        return $this->db->delete('user'); 
    }

    function TampilKeluar()
	{		
        $this->db->SELECT('*');
		$this->db->from('surat_keluar');		
		$query = $this->db->get();
		return $query;
	}
    
    function TampilMasuk()
	{		
        $this->db->SELECT('*');
		$this->db->from('surat_masuk');					
		$query = $this->db->get();
		return $query;
	}    

    function TampilMasukWhere($where)
	{		        
        $this->db->SELECT('*');
		$this->db->from('surat_masuk');	
		$this->db->where($where);
		$this->db->join('disposisi', 'disposisi.id_masuk = surat_masuk.id_masuk');
		$query = $this->db->get();
		return $query;
	}

    public function ambil_data($table, $where){
        return $this->db->get_where($table, $where);
    }

    public function hapus_keluar($id_keluar)
    {
        $this->db->where('id_keluar',$id_keluar);
        return $this->db->delete('surat_keluar'); 
    }
    
    function hapus($table, $where)
       {
           $this->db->where($where);
           $this->db->delete($table);           
       }    

    function kosongkan($table)
    {
        $this->db->set('FOREIGN_KEY_CHECKS = 0');
        $this->db->truncate($table, 'auto_increment = 1');
        $this->db->set('FOREIGN_KEY_CHECKS = 1');
    }
    
    function edit($table, $where)
    {		
        $this->db->SELECT('*');
        $this->db->from($table);	
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
    
    function DataJoin($where)
	{		
		$this->db->SELECT('*');
		$this->db->from('surat_masuk');	
		$this->db->where($where);
		$this->db->join('disposisi', 'disposisi.id_masuk = surat_masuk.id_masuk');
		$query = $this->db->get();
		return $query;
	}

    function total_surat($table)
	{
		$this->db->count_all_results($table);		
		$this->db->from($table);
		return $this->db->count_all_results();
	}

    function total_tujuan()
	{
        $jabatan = $this->session->userdata('jabatan');
		$this->db->count_all_results('disposisi');		
		$this->db->from('disposisi');
        $this->db->where('tujuan =', $jabatan);
		return $this->db->count_all_results();
	}

    function grafik_keluar($table)
    {
        $this->db->count_all_results($table);		
		$this->db->from($table);
		$tahun = date('Y');
        $this->db->where('YEAR(tgl_keluar) = ', $tahun);
		return $this->db->count_all_results();
    }

    function grafik_masuk($table)
    {
        $this->db->count_all_results($table);	
		$this->db->from($table);
		$tahun = date('Y');
        $this->db->where('YEAR(tgl_masuk) = ', $tahun);
		return $this->db->count_all_results();
    }
    
    function laporan_masuk($tgl_awal, $tgl_akhir)
	{		
        $this->db->SELECT('*');
		$this->db->from('surat_masuk');	
        $this->db->where('tgl_masuk >=',$tgl_awal); 
        $this->db->where('tgl_masuk <=',$tgl_akhir);  
		$query = $this->db->get();
		return $query;
	}
    
    function laporan_jmlmasuk($tgl_awal, $tgl_akhir)
	{		
        $this->db->count_all_results('surat_masuk');
		$this->db->from('surat_masuk');	
        $this->db->where('tgl_masuk >=',$tgl_awal); 
        $this->db->where('tgl_masuk <=',$tgl_akhir);  
		return $this->db->count_all_results();
	}
    
    function laporan_keluar($tgl_awal, $tgl_akhir)
	{		
        $this->db->SELECT('*');
		$this->db->from('surat_keluar');	
        $this->db->where('tgl_keluar >=',$tgl_awal); 
        $this->db->where('tgl_keluar <=',$tgl_akhir);  
		$query = $this->db->get();
		return $query;
	}

    function laporan_jmlkeluar($tgl_awal, $tgl_akhir)
	{		
        $this->db->count_all_results('surat_keluar');
		$this->db->from('surat_keluar');	
        $this->db->where('tgl_keluar >=',$tgl_awal); 
        $this->db->where('tgl_keluar <=',$tgl_akhir);  
		return $this->db->count_all_results();
	}
}