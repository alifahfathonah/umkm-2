<?php
class Bumn extends CI_Controller{

	function __construct(){
		parent::__construct();
	} 
	function index(){ 
		if ( $this->session->userdata('login') == 1) {

			$data['bumn'] = 'class="active"';
		    $data['title'] = 'BUMN';

		    $user = $this->session->userdata('foreign');

		    $data['data'] = $this->db->query("SELECT * FROM t_bumn where bumn_user = '$user'")->row_array();

		    $data['rumah_bumn'] = $this->db->query("SELECT * FROM t_rumah_bumn")->result_array();

		    $data['cabang'] = $this->db->query("SELECT * FROM t_rumah_bumn_cabang")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('bumn/index');
		    $this->load->view('v_template_admin/admin_footer',$data);
		}
		else{
			redirect(base_url('login'));
		}
	} 
	function save(){
		$user = $this->session->userdata('foreign');

		$cek = $this->db->query("SELECT * FROM t_bumn WHERE bumn_user = '$user'")->row_array();

		$count = count(array_filter($_FILES['bumn_foto']['name'], 'strlen'));

		if ($count > 0) {

			//replace Karakter name foto
		    $name_foto = $_FILES['bumn_foto']['name'];
			$char = array('!', '&', '?', '/', '/\/', ':', ';', '#', '<', '>', '=', '^', '@', '~', '`', '{', '}', ' ');
		    $v = str_replace($char, '_', array_filter($name_foto, 'strlen'));
		    $foto = substr_replace($v, $user.'_', 0, $v);
		    $a = json_decode($cek['bumn_foto'],true);
	     	$c = array_merge($a,$foto);
	     	$foto1 = json_encode($c);

	     	//simpan foto kurang dari 5
	     	if (count(json_decode($foto1,true)) < 5) {
	     		
	     		$this->db->set('bumn_foto',$foto1);
		        $this->db->where('bumn_user',$user);
		        $this->db->update('t_bumn');

		        // Looping all files
		      	for($i=0; $i <  $count + 1; $i++){
		 
			          // Define new $_FILES array
			          $_FILES['file']['name'] = $user.'_'.$_FILES['bumn_foto']['name'][$i];
			          $_FILES['file']['type'] = $_FILES['bumn_foto']['type'][$i];
			          $_FILES['file']['tmp_name'] = $_FILES['bumn_foto']['tmp_name'][$i];
			          $_FILES['file']['error'] = $_FILES['bumn_foto']['error'][$i];
			          $_FILES['file']['size'] = $_FILES['bumn_foto']['size'][$i];

			          // Set preference
			          $config['upload_path'] = './asset/gambar/bumn'; 
			          $config['allowed_types'] = 'jpg|jpeg|png|gif';
			          $config['max_size'] = '2000'; // max_size in kb
			          $config['overwrite'] = true;
			 
			          //Load upload library
			          $this->load->library('upload',$config); 
			          $this->upload->do_upload('file');
			 
		      	}
	     	}

	    }
		
		// save data ////////////////////////////////////////////////

		$set = array(
						'bumn_rumah' => @$_POST['bumn_rumah'],
						'bumn_kantor_cabang' => @$_POST['bumn_kantor_cabang'],
						'bumn_berdiri' => @$_POST['bumn_berdiri'],
						'bumn_status' => @$_POST['bumn_status'],
						'bumn_status_dinas' => @$_POST['bumn_status_dinas'],
						'bumn_pengelola' => str_replace('[]', '', json_encode(array_filter(@$_POST['bumn_pengelola'], 'strlen'))),
						'bumn_no' => str_replace('[]', '', json_encode(array_filter(@$_POST['bumn_no'], 'strlen'))),
						'bumn_pic' => str_replace('[]', '', json_encode(array_filter(@$_POST['bumn_pic'], 'strlen'))),
						'bumn_tanggal' => date('Y-m-d'), 
					);
		$this->db->set($set);
		$this->db->where('bumn_user',$user);

		if ($this->db->update('t_bumn')) {
			$this->session->set_flashdata('success','Data berhasil di simpan');
		} else {
			$this->session->set_flashdata('gagal','Periksa kembali inputan');
		}

		redirect(base_url('bumn'));
	}

	function delete($val){
		$user = $this->session->userdata('foreign');
		$cek = $this->db->query("SELECT * FROM t_bumn WHERE bumn_user = '$user'")->row_array();

		$array = json_decode($cek['bumn_foto'],true);

		$key = array_search($val, $array);
		if (false !== $key) {
		   unset($array[$key]);
		}

		$set = json_encode($array);

		$this->db->set('bumn_foto',$set);
	    $this->db->where('bumn_user',$user);
	    
	    if ($this->db->update('t_bumn')) {
	    	$this->session->set_flashdata('success','Data berhasil di simpan');

	    	//delete file
	    	unlink('./asset/gambar/bumn/'.$val);
	    } else {
	    	$this->session->set_flashdata('gagal','Data gagal di simpan');
	    }

	    redirect(base_url('bumn'));
	}
}