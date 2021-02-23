<?php
class Log_pelatihan extends CI_Controller{

	function __construct(){
		parent::__construct();
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) {

			$user = $this->session->userdata('foreign');

			$data['data'] = $this->db->query("SELECT * FROM t_log_pelatihan WHERE log_pelatihan_user = '$user' AND log_pelatihan_hapus = 0")->result_array();

			$data['log'] = 'display: block;';
			$data['log_pelatihan'] = 'class="active"';
		    $data['title'] = 'Log Book (PELATIHAN)';
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('pelatihan/index');
		    $this->load->view('v_template_admin/admin_footer');
 
		}
		else{
			redirect(base_url('login'));
		}
	}
	function insert(){
		if ( $this->session->userdata('login') == 1) {

			$data['log_pelatihan'] = 'class="active"';
			$data['log'] = 'display: block;';
		    $data['title'] = 'Log Book (PELATIHAN)';
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('pelatihan/insert');
		    $this->load->view('v_template_admin/admin_footer');
 
		}
		else{
			redirect(base_url('login'));
		}
	}
	function save_insert(){
		$user = $this->session->userdata('foreign');
		
		$d = date_create(@$_POST['log_pelatihan_waktu']);
		$date = date_format($d,'Y-m-d');

		$set = array(
						'log_pelatihan_user' => @$user,
						'log_pelatihan_pelatihan' => $_POST['log_pelatihan_pelatihan'],
						'log_pelatihan_pelatihan_lainya' => $_POST['log_pelatihan_pelatihan_lainya'],
						'log_pelatihan_nama' => $_POST['log_pelatihan_nama'],
						'log_pelatihan_waktu' => @$date,
						'log_pelatihan_lokasi' => $_POST['log_pelatihan_lokasi'],
						'log_pelatihan_narasumber' => $_POST['log_pelatihan_narasumber'],
						'log_pelatihan_jumlah' => $_POST['log_pelatihan_jumlah'],
						'log_pelatihan_tanggal' => date('Y-m-d'), 
					);

		$this->db->set($set);
		$this->db->insert('t_log_pelatihan');

		$cek = $this->db->query("SELECT * FROM t_log_pelatihan WHERE log_pelatihan_user = '$user' ORDER BY log_pelatihan_id DESC LIMIT 1")->row_array();

		$id = $cek['log_pelatihan_id'];

		//save dokumentasi
		if (@$_FILES['log_pelatihan_dokumentasi']['name'][0]) {

		      // Looping all files
		      for($i=0; $i <  count(array_filter($_FILES['log_pelatihan_dokumentasi']['name'], 'strlen')) + 1; $i++){
		 
		          // Define new $_FILES array
		          $_FILES['file']['name'] = $id.'_'.$_FILES['log_pelatihan_dokumentasi']['name'][$i];
		          $_FILES['file']['type'] = $_FILES['log_pelatihan_dokumentasi']['type'][$i];
		          $_FILES['file']['tmp_name'] = $_FILES['log_pelatihan_dokumentasi']['tmp_name'][$i];
		          $_FILES['file']['error'] = $_FILES['log_pelatihan_dokumentasi']['error'][$i];
		          $_FILES['file']['size'] = $_FILES['log_pelatihan_dokumentasi']['size'][$i];

		          // Set preference
		          $config['upload_path'] = './asset/gambar/bumn/pelatihan'; 
		          $config['allowed_types'] = 'jpg|jpeg|png|gif';
		          $config['max_size'] = '2000'; // max_size in kb
		          $config['overwrite'] = true;
		 
		          //Load upload library
		          $this->load->library('upload',$config); 
		          $this->upload->do_upload('file');
		 
		      }

			//replace Karakter name foto

		    $name_foto = $_FILES['log_pelatihan_dokumentasi']['name'];
			$char = array('!', '&', '?', '/', '/\/', ':', ';', '#', '<', '>', '=', '^', '@', '~', '`', '{', '}', ' ');
		    $v = str_replace($char, '_', array_filter($name_foto, 'strlen'));

		    $foto = substr_replace($v, $id.'_', 0, $v);
		   
		    if (@$cek['log_pelatihan_dokumentasi'] == '') {
		    	$foto1 = json_encode($foto);
		     } else {
		     	//update string
		     	$a = json_decode($cek['log_pelatihan_dokumentasi'],true);
		     	$c = array_merge($a,$foto);

		     	$foto1 = json_encode($c);
		     }

	        $this->db->set('log_pelatihan_dokumentasi',$foto1);
	        $this->db->where('log_pelatihan_id',$id);
	        $this->db->update('t_log_pelatihan');

	    }

	    $this->session->set_flashdata('success','Data berhasil di simpan');
		redirect(base_url('log_pelatihan/index'));
	}
	function delete($id){

		$this->db->set('log_pelatihan_hapus',1);
		$this->db->where('log_pelatihan_id',$id);

		if ($this->db->update('t_log_pelatihan')) {
			$this->session->set_flashdata('success','Data berhasil di hapus');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di hapus');
		}
		
		redirect(base_url('log_pelatihan/index'));
	}
	function update($id){
		if ( $this->session->userdata('login') == 1) {

			$user = $this->session->userdata('foreign');

			$data['data'] = $this->db->query("SELECT * FROM t_log_pelatihan WHERE log_pelatihan_id = $id")->row_array();

			$data['log_pelatihan'] = 'class="active"';
			$data['log'] = 'display: block;';
		    $data['title'] = 'Log Book (PELATIHAN)';
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('pelatihan/edit');
		    $this->load->view('v_template_admin/admin_footer');
 
		}
		else{
			redirect(base_url('login'));
		}
	} 
	function save_update($id){
		$cek = $this->db->query("SELECT * FROM t_log_pelatihan WHERE log_pelatihan_id = '$id'")->row_array();
		
		$d = date_create(@$_POST['log_pelatihan_waktu']);
		$date = date_format($d,'Y-m-d');

		$set = array(
						'log_pelatihan_pelatihan' => $_POST['log_pelatihan_pelatihan'],
						'log_pelatihan_pelatihan_lainya' => $_POST['log_pelatihan_pelatihan_lainya'],
						'log_pelatihan_nama' => $_POST['log_pelatihan_nama'],
						'log_pelatihan_waktu' => @$date,
						'log_pelatihan_lokasi' => $_POST['log_pelatihan_lokasi'],
						'log_pelatihan_narasumber' => $_POST['log_pelatihan_narasumber'],
						'log_pelatihan_jumlah' => $_POST['log_pelatihan_jumlah'],
					);

		$this->db->set($set);
		$this->db->where('log_pelatihan_id',$id);
		$this->db->update('t_log_pelatihan');


		//save dokumentasi
		if (@$_FILES['log_pelatihan_dokumentasi']['name'][0]) {

		      // Looping all files
		      for($i=0; $i <  count(array_filter($_FILES['log_pelatihan_dokumentasi']['name'], 'strlen')) + 1; $i++){
		 
		          // Define new $_FILES array
		          $_FILES['file']['name'] = $id.'_'.$_FILES['log_pelatihan_dokumentasi']['name'][$i];
		          $_FILES['file']['type'] = $_FILES['log_pelatihan_dokumentasi']['type'][$i];
		          $_FILES['file']['tmp_name'] = $_FILES['log_pelatihan_dokumentasi']['tmp_name'][$i];
		          $_FILES['file']['error'] = $_FILES['log_pelatihan_dokumentasi']['error'][$i];
		          $_FILES['file']['size'] = $_FILES['log_pelatihan_dokumentasi']['size'][$i];

		          // Set preference
		          $config['upload_path'] = './asset/gambar/bumn/pelatihan'; 
		          $config['allowed_types'] = 'jpg|jpeg|png|gif';
		          $config['max_size'] = '2000'; // max_size in kb
		          $config['overwrite'] = true;
		 
		          //Load upload library
		          $this->load->library('upload',$config); 
		          $this->upload->do_upload('file');
		 
		      }

			//replace Karakter name foto

		    $name_foto = $_FILES['log_pelatihan_dokumentasi']['name'];
			$char = array('!', '&', '?', '/', '/\/', ':', ';', '#', '<', '>', '=', '^', '@', '~', '`', '{', '}', ' ');
		    $v = str_replace($char, '_', array_filter($name_foto, 'strlen'));

		    $foto = substr_replace($v, $id.'_', 0, $v);
		   
		    if (@$cek['log_pelatihan_dokumentasi'] == '') {
		    	$foto1 = json_encode($foto);
		     } else {
		     	//update string
		     	$a = json_decode($cek['log_pelatihan_dokumentasi'],true);
		     	$c = array_merge($a,$foto);

		     	$foto1 = json_encode($c);
		     }

	        $this->db->set('log_pelatihan_dokumentasi',$foto1);
	        $this->db->where('log_pelatihan_id',$id);
	        $this->db->update('t_log_pelatihan');

	    }

	    $this->session->set_flashdata('success','Data berhasil di simpan');
		redirect(base_url('log_pelatihan/index'));
	}
	function delete_image($id,$val){
		$cek = $this->db->query("SELECT * FROM t_log_pelatihan WHERE log_pelatihan_id = '$id'")->row_array();

		$array = json_decode($cek['log_pelatihan_dokumentasi'],true);

		$key = array_search($val, $array);
		if (false !== $key) {
		   unset($array[$key]);
		}

		$set = json_encode($array);

		$this->db->set('log_pelatihan_dokumentasi',$set);
	    $this->db->where('log_pelatihan_id',$id);
	    
	    if ($this->db->update('t_log_pelatihan')) {
	    	$this->session->set_flashdata('success','Gambar berhasil di hapus');

	    	//delete file
	    	unlink('./asset/gambar/bumn/pelatihan/'.$val);
	    } else {
	    	$this->session->set_flashdata('gagal','Gambar gagal di hapus');
	    }

	    redirect(base_url('log_pelatihan/update/'.$id));

	}
}
