<?php
class Umkm extends CI_Controller{ 

	function __construct(){
		parent::__construct();
	} 
	function index(){ 
		if ( $this->session->userdata('login') == 1) {

			$data['umkm'] = 'class="active"'; 
		    $data['title'] = 'UMKM';

		    $user = $this->session->userdata('foreign');

		    $data['data'] = $this->db->query("SELECT * FROM t_umkm where umkm_user = '$user'")->row_array();

		    $data['jenis_usaha'] = $this->db->query("SELECT * FROM t_jenis_usaha")->result_array();


		    /////////// API ////////////////////////////

		    $arrContextOptions=array( 
			    "ssl"=>array(
			        "verify_peer"=>false,
			        "verify_peer_name"=>false,
			    ),
			);  

	 		//kota
			@$api_kota = file_get_contents('http://127.0.0.1/api_indonesia/request/kota?id=all', false, stream_context_create($arrContextOptions));

			$json_kota = json_decode($api_kota,true);
			if (count($json_kota) > 0) {
				$data['kota'] = $json_kota;
			} else {
				$data['kota'] = '';
			}

			//provinsi
			@$api_provinsi = file_get_contents('http://127.0.0.1/api_indonesia/request/provinsi?id=all', false, stream_context_create($arrContextOptions));

			$json_provinsi = json_decode($api_provinsi,true);
			if (count($json_provinsi) > 0) {
				$data['provinsi'] = $json_provinsi;
			} else {
				$data['provinsi'] = '';
			}

			/////////////// END API ///////////////////////

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('umkm/index');
		    $this->load->view('v_template_admin/admin_footer',$data);
		}
		else{
			redirect(base_url('login'));
		}
	} 
	function save(){

		//// foto produk upload /////
		$user = $this->session->userdata('foreign');
	 
	 	$cek = $this->db->query("SELECT * FROM t_umkm WHERE umkm_user = '$user'")->row_array();

		$count = count(array_filter($_FILES['umkm_produk']['name'], 'strlen'));

		if ($count > 0) {

			//replace Karakter name foto
		    $name_foto = $_FILES['umkm_produk']['name'];
			$char = array('!', '&', '?', '/', '/\/', ':', ';', '#', '<', '>', '=', '^', '@', '~', '`', '{', '}', ' ');
		    $v = str_replace($char, '_', array_filter($name_foto, 'strlen'));
		    $foto = substr_replace($v, $user.'_', 0, $v);
		    $a = json_decode($cek['umkm_produk'],true);
	     	$c = array_merge($a,$foto);
	     	$foto1 = json_encode($c);

	     	//simpan foto kurang dari 5
	     	if (count(json_decode($foto1,true)) < 5) {
	     		
	     		$this->db->set('umkm_produk',$foto1);
		        $this->db->where('umkm_user',$user);
		        $this->db->update('t_umkm');

		        // Looping all files
		      	for($i=0; $i <  $count + 1; $i++){
		 
			          // Define new $_FILES array
			          $_FILES['file']['name'] = $user.'_'.$_FILES['umkm_produk']['name'][$i];
			          $_FILES['file']['type'] = $_FILES['umkm_produk']['type'][$i];
			          $_FILES['file']['tmp_name'] = $_FILES['umkm_produk']['tmp_name'][$i];
			          $_FILES['file']['error'] = $_FILES['umkm_produk']['error'][$i];
			          $_FILES['file']['size'] = $_FILES['umkm_produk']['size'][$i];

			          // Set preference
			          $config['upload_path'] = './asset/gambar/umkm'; 
			          $config['allowed_types'] = 'jpg|jpeg|png|gif';
			          $config['max_size'] = '2000'; // max_size in kb
			          $config['overwrite'] = true;
			 
			          //Load upload library
			          $this->load->library('upload',$config); 
			          $this->upload->do_upload('file');
			 
		      	}
	     	}

	    }

        ////////// logo upload ////////////////////////////////////////////

        if (@$_FILES['umkm_logo']['name']) {
			
		$config = array(
		  'upload_path' 	=> './asset/gambar/umkm',
		  'allowed_types' 	=> "jpg|png|jpeg",
		  'overwrite' 		=> TRUE,
		  'max_size' 		=> "2000",
		  );

			//upload foto
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('umkm_logo')) {
				//replace Karakter name foto
				$name_foto = $_FILES['umkm_logo']['name'];
				$char = array('!', '&', '?', '/', '/\/', ':', ';', '#', '<', '>', '=', '^', '@', '~', '`', '{', '}', ' ');
		        $foto = str_replace($char, '_', $name_foto);
		        $char1 = array('[',']');
		        $foto1 = str_replace($char1, '', $foto);

		        $this->db->set('umkm_logo',$foto1);
		        $this->db->where('umkm_user',$user);
		        $this->db->update('t_umkm');

		    }
		}

		////////// save data ////////////////////////////////////////////////

		$set = array(
						'umkm_rumah' => @$_POST['umkm_rumah'],
						'umkm_skc' => @$_POST['umkm_skc'],
						'umkm_cabang' => @$_POST['umkm_cabang'],
						'umkm_brand' => @$_POST['umkm_brand'],
						'umkm_usaha' => @$_POST['umkm_usaha'],
						'umkm_jenis' => @$_POST['umkm_jenis'],
						'umkm_jenis_lain' => @$_POST['umkm_jenis_lain'],
						'umkm_provinsi' => @$_POST['umkm_provinsi'],
						'umkm_kota' => @$_POST['umkm_kota'],
						'umkm_kecamatan' => @$_POST['umkm_kecamatan'],
						'umkm_pos' => @$_POST['umkm_pos'],
						'umkm_alamat' => @$_POST['umkm_alamat'],
						'umkm_pemilik' => @$_POST['umkm_pemilik'],
						'umkm_no' => @$_POST['umkm_no'],
						'umkm_pic' => @$_POST['umkm_pic'],
						'umkm_no_pic' => @$_POST['umkm_no_pic'],
						'umkm_ig' => @$_POST['umkm_ig'],
						'umkm_fb' => @$_POST['umkm_fb'],
						'umkm_email' => @$_POST['umkm_email'],
						'umkm_shopee' => @$_POST['umkm_shopee'],
						'umkm_tokopedia' => @$_POST['umkm_tokopedia'],
						'umkm_lazada' => @$_POST['umkm_lazada'],
						'umkm_bukalapak' => @$_POST['umkm_bukalapak'],
						'umkm_jdid' => @$_POST['umkm_jdid'],
						'umkm_blibli' => @$_POST['umkm_blibli'],
						'umkm_padi' => @$_POST['umkm_padi'],
						'umkm_website' => @$_POST['umkm_website'],

						'umkm_pameran_dalam' => str_replace('[]', '', json_encode(array_filter(@$_POST['umkm_pameran_dalam'], 'strlen'))),
						'umkm_pameran_luar' => str_replace('[]', '', json_encode(array_filter(@$_POST['umkm_pameran_luar'], 'strlen'))),
						'umkm_penghargaan' => str_replace('[]', '', json_encode(array_filter(@$_POST['umkm_penghargaan'], 'strlen'))),
						'umkm_deskripsi' => str_replace('[]', '', json_encode(array_filter(@$_POST['umkm_deskripsi'], 'strlen'))),

						'umkm_berdiri' => @$_POST['umkm_berdiri'],
						'umkm_skala' => @$_POST['umkm_skala'],
						'umkm_karyawan' => @$_POST['umkm_karyawan'],
						'umkm_omset' => @$_POST['umkm_omset'],
						'umkm_jenis_biaya_bni' => @$_POST['umkm_jenis_biaya_bni'],
						'umkm_kredit' => @$_POST['umkm_kredit'],
						'umkm_bpom' => @$_POST['umkm_bpom'],

						'umkm_izinusaha' => str_replace('[]', '', json_encode(array_filter(@$_POST['umkm_izinusaha'], 'strlen'))),
						
						'umkm_tanggal' => date('Y-m-d'), 
					);
		$this->db->set($set);
		$this->db->where('umkm_user',$user);

		if ($this->db->update('t_umkm')) {
			$this->session->set_flashdata('success','Data berhasil di simpan');
		} else {
			$this->session->set_flashdata('gagal','Periksa kembali inputan');
		}

		redirect(base_url('umkm'));
	}

	function delete($val){
		$user = $this->session->userdata('foreign');
		$cek = $this->db->query("SELECT * FROM t_umkm WHERE umkm_user = '$user'")->row_array();

		$array = json_decode($cek['umkm_produk'],true);

		$key = array_search($val, $array);
		if (false !== $key) {
		   unset($array[$key]);
		}

		$set = json_encode($array);

		$this->db->set('umkm_produk',$set);
	    $this->db->where('umkm_user',$user);
	    
	    if ($this->db->update('t_umkm')) {
	    	$this->session->set_flashdata('success','Data berhasil di simpan');

	    	//delete file
	    	unlink('./asset/gambar/umkm/'.$val);
	    } else {
	    	$this->session->set_flashdata('gagal','Data gagal di simpan');
	    }

	    redirect(base_url('umkm'));
	}
}