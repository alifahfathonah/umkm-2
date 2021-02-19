<?php
class Bumn_log extends CI_Controller{

	function __construct(){
		parent::__construct();
	} 
	function kunjungan(){
		if ( $this->session->userdata('login') == 1) {

			$user = $this->session->userdata('foreign');

			$data['data'] = $this->db->query("SELECT * FROM t_log_kunjungan WHERE log_kunjungan_user = '$user'")->row_array();

			$data['log'] = 'display: block;';
		    $data['title'] = 'Log Book (Kunjungan UMKM)';
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('bumn_log/kunjungan');
		    $this->load->view('v_template_admin/admin_footer');
 
		}
		else{
			redirect(base_url('login'));
		}
	} 
	function kunjungan_save(){
		$user = $this->session->userdata('foreign');
		
		$d = date_create(@$_POST['log_kunjungan_kunjungan']);
		$date = date_format($d,'Y-m-d');

		$set = array(
						'log_kunjungan_user' => @$user,
						'log_kunjungan_kunjungan' => @$date,
						'log_kunjungan_nama' => @$_POST['log_kunjungan_nama'],
						'log_kunjungan_kategori' => @$_POST['log_kunjungan_kategori'],
						'log_kunjungan_lokasi' => @$_POST['log_kunjungan_lokasi'],
						'log_kunjungan_tanggal' => date('Y-m-d'), 
					);

		$cek = $this->db->query("SELECT * FROM t_log_kunjungan WHERE log_kunjungan_user = '$user'")->row_array();

		$this->db->set($set);

		if (@$cek) {
			$this->db->where('log_kunjungan_user',$user);
			$this->db->update('t_log_kunjungan');
		} else {
			$this->db->insert('t_log_kunjungan');
		}


		//save dokumentasi
		if (@$_FILES['log_kunjungan_dokumentasi']['name'][0]) {

		      // Looping all files
		      for($i=0; $i <  count(array_filter($_FILES['log_kunjungan_dokumentasi']['name'], 'strlen')) + 1; $i++){
		 
		          // Define new $_FILES array
		          $_FILES['file']['name'] = $user.'_'.$_FILES['log_kunjungan_dokumentasi']['name'][$i];
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

		    $foto = substr_replace($v, $user.'_', 0, $v);
		   
		    if (@$cek['log_kunjungan_dokumentasi'] == '') {
		    	$foto1 = json_encode($foto);
		     } else {
		     	//update string
		     	$a = json_decode($cek['log_kunjungan_dokumentasi'],true);
		     	$c = array_merge($a,$foto);

		     	$foto1 = json_encode($c);
		     }

	        $this->db->set('log_kunjungan_dokumentasi',$foto1);
	        $this->db->where('log_kunjungan_user',$user);
	        $this->db->update('t_log_kunjungan');

	    }

	    $this->session->set_flashdata('success','Data berhasil di simpan');
		redirect(base_url('bumn_log/kunjungan'));
	}
	function delete_kunjungan($val){
		$user = $this->session->userdata('foreign');
		$cek = $this->db->query("SELECT * FROM t_log_kunjungan WHERE log_kunjungan_user = '$user'")->row_array();

		$array = json_decode($cek['log_kunjungan_dokumentasi'],true);

		$key = array_search($val, $array);
		if (false !== $key) {
		   unset($array[$key]);
		}

		$set = json_encode($array);

		$this->db->set('log_kunjungan_dokumentasi',$set);
	    $this->db->where('log_kunjungan_user',$user);
	    
	    if ($this->db->update('t_log_kunjungan')) {
	    	$this->session->set_flashdata('success','Data berhasil di simpan');

	    	//delete file
	    	unlink('./asset/gambar/bumn/kunjungan/'.$val);
	    } else {
	    	$this->session->set_flashdata('gagal','Data gagal di simpan');
	    }

	    redirect(base_url('bumn_log/kunjungan'));

	}

	///////////////////////// pelatihan ///////////////////////////////////

	function pelatihan(){
		if ( $this->session->userdata('login') == 1) {

			$user = $this->session->userdata('foreign');

			$data['data'] = $this->db->query("SELECT * FROM t_log_pelatihan WHERE log_pelatihan_user = '$user'")->row_array();

			$data['log'] = 'display: block;';
		    $data['title'] = 'Log Book (Pelatihan)';
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('bumn_log/pelatihan');
		    $this->load->view('v_template_admin/admin_footer');
 
		}
		else{
			redirect(base_url('login'));
		}
	} 
	function pelatihan_save(){
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

		$cek = $this->db->query("SELECT * FROM t_log_pelatihan WHERE log_pelatihan_user = '$user'")->row_array();

		$this->db->set($set);

		if (@$cek) {
			$this->db->where('log_pelatihan_user',$user);
			$this->db->update('t_log_pelatihan');
		} else {
			$this->db->insert('t_log_pelatihan');
		}


		//save dokumentasi
		if (@$_FILES['log_pelatihan_dokumentasi']['name'][0]) {

		      // Looping all files
		      for($i=0; $i <  count(array_filter($_FILES['log_pelatihan_dokumentasi']['name'], 'strlen')) + 1; $i++){
		 
		          // Define new $_FILES array
		          $_FILES['file']['name'] = $user.'_'.$_FILES['log_pelatihan_dokumentasi']['name'][$i];
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

		    $foto = substr_replace($v, $user.'_', 0, $v);
		   
		    if (@$cek['log_pelatihan_dokumentasi'] == '') {
		    	$foto1 = json_encode($foto);
		     } else {
		     	//update string
		     	$a = json_decode($cek['log_pelatihan_dokumentasi'],true);
		     	$c = array_merge($a,$foto);

		     	$foto1 = json_encode($c);
		     }

	        $this->db->set('log_pelatihan_dokumentasi',$foto1);
	        $this->db->where('log_pelatihan_user',$user);
	        $this->db->update('t_log_pelatihan');

	    }

	    $this->session->set_flashdata('success','Data berhasil di simpan');
		redirect(base_url('bumn_log/pelatihan'));
	}
	function delete_pelatihan($val){
		$user = $this->session->userdata('foreign');
		$cek = $this->db->query("SELECT * FROM t_log_pelatihan WHERE log_pelatihan_user = '$user'")->row_array();

		$array = json_decode($cek['log_pelatihan_dokumentasi'],true);

		$key = array_search($val, $array);
		if (false !== $key) {
		   unset($array[$key]);
		}

		$set = json_encode($array);

		$this->db->set('log_pelatihan_dokumentasi',$set);
	    $this->db->where('log_pelatihan_user',$user);
	    
	    if ($this->db->update('t_log_pelatihan')) {
	    	$this->session->set_flashdata('success','Data berhasil di simpan');

	    	//delete file
	    	unlink('./asset/gambar/bumn/pelatihan/'.$val);
	    } else {
	    	$this->session->set_flashdata('gagal','Data gagal di simpan');
	    }

	    redirect(base_url('bumn_log/pelatihan'));

	}
}
