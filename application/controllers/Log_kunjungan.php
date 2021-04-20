<?php
class Log_kunjungan extends CI_Controller{

	function __construct(){
		parent::__construct();
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) {

			$user = $this->session->userdata('foreign');

			$data['data'] = $this->db->query("SELECT * FROM t_log_kunjungan WHERE log_kunjungan_user = '$user' AND log_kunjungan_hapus = 0")->result_array();

			$data['log'] = 'display: block;';
			$data['log_kunjungan'] = 'class="active"';
		    $data['title'] = 'Log Book (Kunjungan UMKM)';
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('kunjungan/index');
		    $this->load->view('v_template_admin/admin_footer');
 
		} 
		else{
			redirect(base_url('login'));
		}
	}
	function insert(){
		if ( $this->session->userdata('login') == 1) {

			$data['log_kunjungan'] = 'class="active"';
			$data['log'] = 'display: block;';
		    $data['title'] = 'Log Book (Kunjungan UMKM)';
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('kunjungan/insert');
		    $this->load->view('v_template_admin/admin_footer');
 
		}
		else{
			redirect(base_url('login'));
		}
	}
	function save_insert(){
		$user = $this->session->userdata('foreign');
		
		$d = date_create(@$_POST['log_kunjungan_kunjungan']);
		$date = date_format($d,'Y-m-d');

		$set = array(
						'log_kunjungan_user' => @$user,
						'log_kunjungan_kunjungan' => @$date,
						'log_kunjungan_nama' => @$_POST['log_kunjungan_nama'],
						'log_kunjungan_kategori' => @$_POST['log_kunjungan_kategori'],
						'log_kunjungan_lokasi' => @$_POST['log_kunjungan_lokasi'],
						'log_kunjungan_laporan' => @$_POST['log_kunjungan_laporan'],
						'log_kunjungan_tanggal' => date('Y-m-d'), 
					);

		$this->db->set($set);
		$this->db->insert('t_log_kunjungan');

		$cek = $this->db->query("SELECT * FROM t_log_kunjungan WHERE log_kunjungan_user = '$user' ORDER BY log_kunjungan_id DESC LIMIT 1")->row_array();

		$id = $cek['log_kunjungan_id'];

		//save dokumentasi
		if (@$_FILES['log_kunjungan_dokumentasi']['name'][0]) {

		      // Looping all files
		      for($i=0; $i <  count(array_filter($_FILES['log_kunjungan_dokumentasi']['name'], 'strlen')) + 1; $i++){
		 
		          // Define new $_FILES array
		          $_FILES['file']['name'] = $id.'_'.$_FILES['log_kunjungan_dokumentasi']['name'][$i];
		          $_FILES['file']['type'] = $_FILES['log_kunjungan_dokumentasi']['type'][$i];
		          $_FILES['file']['tmp_name'] = $_FILES['log_kunjungan_dokumentasi']['tmp_name'][$i];
		          $_FILES['file']['error'] = $_FILES['log_kunjungan_dokumentasi']['error'][$i];
		          $_FILES['file']['size'] = $_FILES['log_kunjungan_dokumentasi']['size'][$i];

		          // Set preference
		          $config['upload_path'] = './asset/gambar/bumn/kunjungan'; 
		          $config['allowed_types'] = 'jpg|jpeg|png|gif';
		          $config['max_size'] = '2000'; // max_size in kb
		          $config['overwrite'] = true;
		 
		          //Load upload library
		          $this->load->library('upload',$config); 
		          $this->upload->do_upload('file');
		 
		      }

			//replace Karakter name foto

		    $name_foto = $_FILES['log_kunjungan_dokumentasi']['name'];
			$char = array('!', '&', '?', '/', '/\/', ':', ';', '#', '<', '>', '=', '^', '@', '~', '`', '{', '}', ' ');
		    $v = str_replace($char, '_', array_filter($name_foto, 'strlen'));

		    $foto = substr_replace($v, $id.'_', 0, $v);
		   
		    if (@$cek['log_kunjungan_dokumentasi'] == '') {
		    	$foto1 = json_encode($foto);
		     } else {
		     	//update string
		     	$a = json_decode($cek['log_kunjungan_dokumentasi'],true);
		     	$c = array_merge($a,$foto);

		     	$foto1 = json_encode($c);
		     }

	        $this->db->set('log_kunjungan_dokumentasi',$foto1);
	        $this->db->where('log_kunjungan_id',$id);
	        $this->db->update('t_log_kunjungan');

	    }

	    $this->session->set_flashdata('success','Data berhasil di simpan');
		redirect(base_url('log_kunjungan/index'));
	}
	function delete($id){

		$this->db->set('log_kunjungan_hapus',1);
		$this->db->where('log_kunjungan_id',$id);

		if ($this->db->update('t_log_kunjungan')) {
			$this->session->set_flashdata('success','Data berhasil di hapus');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di hapus');
		}
		
		redirect(base_url('log_kunjungan/index'));
	}
	function update($id){
		if ( $this->session->userdata('login') == 1) {

			$user = $this->session->userdata('foreign');

			$data['data'] = $this->db->query("SELECT * FROM t_log_kunjungan WHERE log_kunjungan_id = $id")->row_array();

			$data['log_kunjungan'] = 'class="active"';
			$data['log'] = 'display: block;';
		    $data['title'] = 'Log Book (Kunjungan UMKM)';
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('kunjungan/edit');
		    $this->load->view('v_template_admin/admin_footer');
 
		}
		else{
			redirect(base_url('login'));
		}
	} 
	function save_update($id){
		$cek = $this->db->query("SELECT * FROM t_log_kunjungan WHERE log_kunjungan_id = '$id'")->row_array();
		
		$d = date_create(@$_POST['log_kunjungan_kunjungan']);
		$date = date_format($d,'Y-m-d');

		$set = array(
						'log_kunjungan_kunjungan' => @$date,
						'log_kunjungan_nama' => @$_POST['log_kunjungan_nama'],
						'log_kunjungan_kategori' => @$_POST['log_kunjungan_kategori'],
						'log_kunjungan_lokasi' => @$_POST['log_kunjungan_lokasi'],
						'log_kunjungan_laporan' => @$_POST['log_kunjungan_laporan'],
					);

		$this->db->set($set);
		$this->db->where('log_kunjungan_id',$id);
		$this->db->update('t_log_kunjungan');


		//save dokumentasi
		if (@$_FILES['log_kunjungan_dokumentasi']['name'][0]) {

		      // Looping all files
		      for($i=0; $i <  count(array_filter($_FILES['log_kunjungan_dokumentasi']['name'], 'strlen')) + 1; $i++){
		 
		          // Define new $_FILES array
		          $_FILES['file']['name'] = $id.'_'.$_FILES['log_kunjungan_dokumentasi']['name'][$i];
		          $_FILES['file']['type'] = $_FILES['log_kunjungan_dokumentasi']['type'][$i];
		          $_FILES['file']['tmp_name'] = $_FILES['log_kunjungan_dokumentasi']['tmp_name'][$i];
		          $_FILES['file']['error'] = $_FILES['log_kunjungan_dokumentasi']['error'][$i];
		          $_FILES['file']['size'] = $_FILES['log_kunjungan_dokumentasi']['size'][$i];

		          // Set preference
		          $config['upload_path'] = './asset/gambar/bumn/kunjungan'; 
		          $config['allowed_types'] = 'jpg|jpeg|png|gif';
		          $config['max_size'] = '2000'; // max_size in kb
		          $config['overwrite'] = true;
		 
		          //Load upload library
		          $this->load->library('upload',$config); 
		          $this->upload->do_upload('file');
		 
		      }

			//replace Karakter name foto

		    $name_foto = $_FILES['log_kunjungan_dokumentasi']['name'];
			$char = array('!', '&', '?', '/', '/\/', ':', ';', '#', '<', '>', '=', '^', '@', '~', '`', '{', '}', ' ');
		    $v = str_replace($char, '_', array_filter($name_foto, 'strlen'));

		    $foto = substr_replace($v, $id.'_', 0, $v);
		   
		    if (@$cek['log_kunjungan_dokumentasi'] == '') {
		    	$foto1 = json_encode($foto);
		     } else {
		     	//update string
		     	$a = json_decode($cek['log_kunjungan_dokumentasi'],true);
		     	$c = array_merge($a,$foto);

		     	$foto1 = json_encode($c);
		     }

	        $this->db->set('log_kunjungan_dokumentasi',$foto1);
	        $this->db->where('log_kunjungan_id',$id);
	        $this->db->update('t_log_kunjungan');

	    }

	    $this->session->set_flashdata('success','Data berhasil di simpan');
		redirect(base_url('log_kunjungan/index'));
	}
	function delete_image($id,$val){
		$cek = $this->db->query("SELECT * FROM t_log_kunjungan WHERE log_kunjungan_id = '$id'")->row_array();

		$array = json_decode($cek['log_kunjungan_dokumentasi'],true);

		$key = array_search($val, $array);
		if (false !== $key) {
		   unset($array[$key]);
		}

		$set = json_encode($array);

		$this->db->set('log_kunjungan_dokumentasi',$set);
	    $this->db->where('log_kunjungan_id',$id);
	    
	    if ($this->db->update('t_log_kunjungan')) {
	    	$this->session->set_flashdata('success','Gambar berhasil di hapus');

	    	//delete file
	    	unlink('./asset/gambar/bumn/kunjungan/'.$val);
	    } else {
	    	$this->session->set_flashdata('gagal','Gambar gagal di hapus');
	    }

	    redirect(base_url('log_kunjungan/update/'.$id));

	}
}
