<?php
class Log_pameran extends CI_Controller{

	function __construct(){
		parent::__construct();
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) {

			$user = $this->session->userdata('foreign');

			$data['data'] = $this->db->query("SELECT * FROM t_log_pameran WHERE log_pameran_user = '$user' AND log_pameran_hapus = 0")->result_array();

			$data['log'] = 'display: block;';
			$data['log_pameran'] = 'class="active"';
		    $data['title'] = 'Log Book (PAMERAN)';
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('pameran/index');
		    $this->load->view('v_template_admin/admin_footer');
 
		}
		else{
			redirect(base_url('login'));
		}
	}
	function insert(){
		if ( $this->session->userdata('login') == 1) {

			$data['log_pameran'] = 'class="active"';
			$data['log'] = 'display: block;';
		    $data['title'] = 'Log Book (PAMERAN)';
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('pameran/insert');
		    $this->load->view('v_template_admin/admin_footer');
 
		}
		else{
			redirect(base_url('login'));
		}
	}
	function save_insert(){
		$user = $this->session->userdata('foreign');
		
		$d = date_create(@$_POST['log_pameran_waktu']);
		$date = date_format($d,'Y-m-d');

		$set = array(
						'log_pameran_user' => @$user,
						'log_pameran_nama' => $_POST['log_pameran_nama'],
						'log_pameran_waktu' => @$date,
						'log_pameran_lokasi' => $_POST['log_pameran_lokasi'],
						'log_pameran_penyelenggara' => $_POST['log_pameran_penyelenggara'],
						'log_pameran_peserta' => $_POST['log_pameran_peserta'],
						'log_pameran_produk' => str_replace('[]', '', json_encode(array_filter(@$_POST['log_pameran_produk'], 'strlen'))),
						'log_pameran_tanggal' => date('Y-m-d'), 
					);

		$this->db->set($set);
		$this->db->insert('t_log_pameran');

		$cek = $this->db->query("SELECT * FROM t_log_pameran WHERE log_pameran_user = '$user' ORDER BY log_pameran_id DESC LIMIT 1")->row_array();

		$id = $cek['log_pameran_id'];

		//save dokumentasi
		if (@$_FILES['log_pameran_dokumentasi']['name'][0]) {

		      // Looping all files
		      for($i=0; $i <  count(array_filter($_FILES['log_pameran_dokumentasi']['name'], 'strlen')) + 1; $i++){
		 
		          // Define new $_FILES array
		          $_FILES['file']['name'] = $id.'_'.$_FILES['log_pameran_dokumentasi']['name'][$i];
		          $_FILES['file']['type'] = $_FILES['log_pameran_dokumentasi']['type'][$i];
		          $_FILES['file']['tmp_name'] = $_FILES['log_pameran_dokumentasi']['tmp_name'][$i];
		          $_FILES['file']['error'] = $_FILES['log_pameran_dokumentasi']['error'][$i];
		          $_FILES['file']['size'] = $_FILES['log_pameran_dokumentasi']['size'][$i];

		          // Set preference
		          $config['upload_path'] = './asset/gambar/bumn/pameran'; 
		          $config['allowed_types'] = 'jpg|jpeg|png|gif';
		          $config['max_size'] = '2000'; // max_size in kb
		          $config['overwrite'] = true;
		 
		          //Load upload library
		          $this->load->library('upload',$config); 
		          $this->upload->do_upload('file');
		 
		      }

			//replace Karakter name foto

		    $name_foto = $_FILES['log_pameran_dokumentasi']['name'];
			$char = array('!', '&', '?', '/', '/\/', ':', ';', '#', '<', '>', '=', '^', '@', '~', '`', '{', '}', ' ');
		    $v = str_replace($char, '_', array_filter($name_foto, 'strlen'));

		    $foto = substr_replace($v, $id.'_', 0, $v);
		   
		    if (@$cek['log_pameran_dokumentasi'] == '') {
		    	$foto1 = json_encode($foto);
		     } else {
		     	//update string
		     	$a = json_decode($cek['log_pameran_dokumentasi'],true);
		     	$c = array_merge($a,$foto);

		     	$foto1 = json_encode($c);
		     }

	        $this->db->set('log_pameran_dokumentasi',$foto1);
	        $this->db->where('log_pameran_id',$id);
	        $this->db->update('t_log_pameran');

	    }

	    $this->session->set_flashdata('success','Data berhasil di simpan');
		redirect(base_url('log_pameran/index'));
	}
	function delete($id){

		$this->db->set('log_pameran_hapus',1);
		$this->db->where('log_pameran_id',$id);

		if ($this->db->update('t_log_pameran')) {
			$this->session->set_flashdata('success','Data berhasil di hapus');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di hapus');
		}
		
		redirect(base_url('log_pameran/index'));
	}
	function update($id){
		if ( $this->session->userdata('login') == 1) {

			$user = $this->session->userdata('foreign');

			$data['data'] = $this->db->query("SELECT * FROM t_log_pameran WHERE log_pameran_id = $id")->row_array();

			$data['log_pameran'] = 'class="active"';
			$data['log'] = 'display: block;';
		    $data['title'] = 'Log Book (PAMERAN)';
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('pameran/edit');
		    $this->load->view('v_template_admin/admin_footer');
 
		}
		else{
			redirect(base_url('login'));
		}
	} 
	function save_update($id){
		$cek = $this->db->query("SELECT * FROM t_log_pameran WHERE log_pameran_id = '$id'")->row_array();
		
		$d = date_create(@$_POST['log_pelatihan_waktu']);
		$date = date_format($d,'Y-m-d');

		$set = array(
						'log_pameran_nama' => $_POST['log_pameran_nama'],
						'log_pameran_waktu' => @$date,
						'log_pameran_lokasi' => $_POST['log_pameran_lokasi'],
						'log_pameran_penyelenggara' => $_POST['log_pameran_penyelenggara'],
						'log_pameran_peserta' => $_POST['log_pameran_peserta'],
						'log_pameran_produk' => str_replace('[]', '', json_encode(array_filter(@$_POST['log_pameran_produk'], 'strlen'))),
					);

		$this->db->set($set);
		$this->db->where('log_pameran_id',$id);
		$this->db->update('t_log_pameran');


		//save dokumentasi
		if (@$_FILES['log_pameran_dokumentasi']['name'][0]) {

		      // Looping all files
		      for($i=0; $i <  count(array_filter($_FILES['log_pameran_dokumentasi']['name'], 'strlen')) + 1; $i++){
		 
		          // Define new $_FILES array
		          $_FILES['file']['name'] = $id.'_'.$_FILES['log_pameran_dokumentasi']['name'][$i];
		          $_FILES['file']['type'] = $_FILES['log_pameran_dokumentasi']['type'][$i];
		          $_FILES['file']['tmp_name'] = $_FILES['log_pameran_dokumentasi']['tmp_name'][$i];
		          $_FILES['file']['error'] = $_FILES['log_pameran_dokumentasi']['error'][$i];
		          $_FILES['file']['size'] = $_FILES['log_pameran_dokumentasi']['size'][$i];

		          // Set preference
		          $config['upload_path'] = './asset/gambar/bumn/pameran'; 
		          $config['allowed_types'] = 'jpg|jpeg|png|gif';
		          $config['max_size'] = '2000'; // max_size in kb
		          $config['overwrite'] = true;
		 
		          //Load upload library
		          $this->load->library('upload',$config); 
		          $this->upload->do_upload('file');
		 
		      }

			//replace Karakter name foto

		    $name_foto = $_FILES['log_pameran_dokumentasi']['name'];
			$char = array('!', '&', '?', '/', '/\/', ':', ';', '#', '<', '>', '=', '^', '@', '~', '`', '{', '}', ' ');
		    $v = str_replace($char, '_', array_filter($name_foto, 'strlen'));

		    $foto = substr_replace($v, $id.'_', 0, $v);
		   
		    if (@$cek['log_pameran_dokumentasi'] == '') {
		    	$foto1 = json_encode($foto);
		     } else {
		     	//update string
		     	$a = json_decode($cek['log_pameran_dokumentasi'],true);
		     	$c = array_merge($a,$foto);

		     	$foto1 = json_encode($c);
		     }

	        $this->db->set('log_pameran_dokumentasi',$foto1);
	        $this->db->where('log_pameran_id',$id);
	        $this->db->update('t_log_pameran');

	    }

	    $this->session->set_flashdata('success','Data berhasil di simpan');
		redirect(base_url('log_pameran/index'));
	}
	function delete_image($id,$val){
		$cek = $this->db->query("SELECT * FROM t_log_pameran WHERE log_pameran_id = '$id'")->row_array();

		$array = json_decode($cek['log_pameran_dokumentasi'],true);

		$key = array_search($val, $array);
		if (false !== $key) {
		   unset($array[$key]);
		}

		$set = json_encode($array);

		$this->db->set('log_pameran_dokumentasi',$set);
	    $this->db->where('log_pameran_id',$id);
	    
	    if ($this->db->update('t_log_pameran')) {
	    	$this->session->set_flashdata('success','Gambar berhasil di hapus');

	    	//delete file
	    	unlink('./asset/gambar/bumn/pameran/'.$val);
	    } else {
	    	$this->session->set_flashdata('gagal','Gambar gagal di hapus');
	    }

	    redirect(base_url('log_pameran/update/'.$id));

	}
}
