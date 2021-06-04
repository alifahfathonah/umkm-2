<?php
class Pembiayaan extends CI_Controller{ 

	function __construct(){
		parent::__construct();
	} 
	function index(){  
		if ( $this->session->userdata('login') == 1) {

			$data['pembiayaan'] = 'class="active"'; 
		    $data['title'] = 'pembiayaan';
 
		    $user = $this->session->userdata('foreign');

		    $data['data'] = $this->db->query("SELECT * FROM t_pembiayaan where pembiayaan_user = '$user'")->row_array();

		    $data['jenis_usaha'] = $this->db->query("SELECT * FROM t_jenis_usaha")->result_array();

		    $data['rumah_bumn'] = $this->db->query("SELECT * FROM t_rumah_bumn")->result_array();

		    $data['cabang'] = $this->db->query("SELECT * FROM t_rumah_bumn_cabang")->result_array();

		    $data['skc'] = $this->db->query("SELECT * FROM t_skc")->result_array();

		    $data['wilayah'] = $this->db->query("SELECT * FROM t_wilayah_baru")->result_array();
		    $data['skm'] = $this->db->query("SELECT * FROM t_skm")->result_array();


		    /////////// API ////////////////////////////

		    $arrContextOptions=array( 
			    "ssl"=>array(
			        "verify_peer"=>false,
			        "verify_peer_name"=>false,
			    ),
			);  

	 		//provinsi
			@$api_provinsi = file_get_contents($this->api_kota->provinsi_all(), false, stream_context_create($arrContextOptions));

			$json_provinsi = json_decode($api_provinsi,true);
			if (count($json_provinsi) > 0) {
				$data['provinsi'] = $json_provinsi;
			} else {
				$data['provinsi'] = '';
			}

			/////////////// END API ///////////////////////

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('pembiayaan/index');
		    $this->load->view('v_template_admin/admin_footer',$data);
		}
		else{
			redirect(base_url('login'));
		}
	} 
	function save(){

		//// foto produk upload /////
		$user = $this->session->userdata('foreign');
	 
	 	$cek = $this->db->query("SELECT * FROM t_pembiayaan WHERE pembiayaan_user = '$user'")->row_array();

		$count = count(array_filter($_FILES['pembiayaan_produk']['name'], 'strlen'));

		if ($count > 0) {

			//replace Karakter name foto
		    $name_foto = $_FILES['pembiayaan_produk']['name'];
			$char = array('!', '&', '?', '/', '/\/', ':', ';', '#', '<', '>', '=', '^', '@', '~', '`', '{', '}', ' ');
		    $v = str_replace($char, '_', array_filter($name_foto, 'strlen'));
		    $foto = substr_replace($v, $user.'_', 0, $v);
		    $a = json_decode($cek['pembiayaan_produk'],true);
	     	$c = array_merge($a,$foto);
	     	$foto1 = json_encode($c);

	     	//simpan foto kurang dari 5
	     	if (count(json_decode($foto1,true)) < 5) {
	     		
	     		$this->db->set('pembiayaan_produk',$foto1);
		        $this->db->where('pembiayaan_user',$user);
		        $this->db->update('t_pembiayaan');

		        // Looping all files
		      	for($i=0; $i <  $count + 1; $i++){
		 
			          // Define new $_FILES array
			          $_FILES['file']['name'] = $user.'_'.$_FILES['pembiayaan_produk']['name'][$i];
			          $_FILES['file']['type'] = $_FILES['pembiayaan_produk']['type'][$i];
			          $_FILES['file']['tmp_name'] = $_FILES['pembiayaan_produk']['tmp_name'][$i];
			          $_FILES['file']['error'] = $_FILES['pembiayaan_produk']['error'][$i];
			          $_FILES['file']['size'] = $_FILES['pembiayaan_produk']['size'][$i];

			          // Set preference
			          $config['upload_path'] = './asset/gambar/pembiayaan'; 
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

        if (@$_FILES['pembiayaan_logo']['name']) {
			
		$config = array(
		  'upload_path' 	=> './asset/gambar/pembiayaan',
		  'allowed_types' 	=> "jpg|png|jpeg",
		  'overwrite' 		=> TRUE,
		  'max_size' 		=> "2000",
		  );

			//upload foto
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('pembiayaan_logo')) {
				//replace Karakter name foto
				$name_foto = $_FILES['pembiayaan_logo']['name'];
				$char = array('!', '&', '?', '/', '/\/', ':', ';', '#', '<', '>', '=', '^', '@', '~', '`', '{', '}', ' ');
		        $foto = str_replace($char, '_', $name_foto);
		        $char1 = array('[',']');
		        $foto1 = str_replace($char1, '', $foto);

		        $this->db->set('pembiayaan_logo',$foto1);
		        $this->db->where('pembiayaan_user',$user);
		        $this->db->update('t_pembiayaan');

		    }
		}

		////////// save data ////////////////////////////////////////////////

		$set = array(
						// 'pembiayaan_rumah' => @$_POST['pembiayaan_rumah'],
						'pembiayaan_skm' => @$_POST['pembiayaan_skm'],
						'pembiayaan_skc' => @$_POST['pembiayaan_skc'],
						'pembiayaan_cabang' => @$_POST['pembiayaan_cabang'],
						'pembiayaan_wilayah' => @$_POST['pembiayaan_wilayah'],
						'pembiayaan_brand' => @$_POST['pembiayaan_brand'],
						'pembiayaan_usaha' => @$_POST['pembiayaan_usaha'],
						'pembiayaan_kategori' => @$_POST['pembiayaan_kategori'],
						'pembiayaan_jenis' => @$_POST['pembiayaan_jenis'],
						'pembiayaan_jenis_lain' => @$_POST['pembiayaan_jenis_lain'],
						'pembiayaan_provinsi' => @$_POST['pembiayaan_provinsi'],
						'pembiayaan_provinsi_text' => $_POST['pembiayaan_provinsi_text'],
						'pembiayaan_kota' => @$_POST['pembiayaan_kota'],
						'pembiayaan_kota_text' => $_POST['pembiayaan_kota_text'],
						'pembiayaan_kecamatan' => @$_POST['pembiayaan_kecamatan'],
						'pembiayaan_kecamatan_text' => $_POST['pembiayaan_kecamatan_text'],
						'pembiayaan_pos' => @$_POST['pembiayaan_pos'],
						'pembiayaan_alamat' => @$_POST['pembiayaan_alamat'],
						'pembiayaan_pemilik' => @$_POST['pembiayaan_pemilik'],
						'pembiayaan_no' => @$_POST['pembiayaan_no'],
						'pembiayaan_pic' => @$_POST['pembiayaan_pic'],
						'pembiayaan_no_pic' => @$_POST['pembiayaan_no_pic'],
						'pembiayaan_ig' => @$_POST['pembiayaan_ig'],
						'pembiayaan_fb' => @$_POST['pembiayaan_fb'],
						'pembiayaan_email' => @$_POST['pembiayaan_email'],
						'pembiayaan_shopee' => @$_POST['pembiayaan_shopee'],
						'pembiayaan_tokopedia' => @$_POST['pembiayaan_tokopedia'],
						'pembiayaan_lazada' => @$_POST['pembiayaan_lazada'],
						'pembiayaan_bukalapak' => @$_POST['pembiayaan_bukalapak'],
						'pembiayaan_jdid' => @$_POST['pembiayaan_jdid'],
						'pembiayaan_blibli' => @$_POST['pembiayaan_blibli'],
						'pembiayaan_padi' => @$_POST['pembiayaan_padi'],
						'pembiayaan_website' => @$_POST['pembiayaan_website'],

						'pembiayaan_pameran_dalam' => str_replace('[]', '', json_encode(array_filter(@$_POST['pembiayaan_pameran_dalam'], 'strlen'))),
						'pembiayaan_pameran_luar' => str_replace('[]', '', json_encode(array_filter(@$_POST['pembiayaan_pameran_luar'], 'strlen'))),
						'pembiayaan_penghargaan' => str_replace('[]', '', json_encode(array_filter(@$_POST['pembiayaan_penghargaan'], 'strlen'))),
						'pembiayaan_deskripsi' => str_replace('[]', '', json_encode(array_filter(@$_POST['pembiayaan_deskripsi'], 'strlen'))),

						'pembiayaan_berdiri' => @$_POST['pembiayaan_berdiri'],
						'pembiayaan_skala' => @$_POST['pembiayaan_skala'],
						'pembiayaan_karyawan' => @$_POST['pembiayaan_karyawan'],
						'pembiayaan_omset' => @$_POST['pembiayaan_omset'],
						'pembiayaan_jenis_biaya_bni' => @$_POST['pembiayaan_jenis_biaya_bni'],
						'pembiayaan_kredit' => @$_POST['pembiayaan_kredit'],
						'pembiayaan_bpom' => @$_POST['pembiayaan_bpom'],

						'pembiayaan_izinusaha' => str_replace('[]', '', json_encode(array_filter(@$_POST['pembiayaan_izinusaha'], 'strlen'))),
						
						'pembiayaan_tanggal' => date('Y-m-d'), 
					);
		$this->db->set($set);
		$this->db->where('pembiayaan_user',$user);

		if ($this->db->update('t_pembiayaan')) {
			$this->session->set_flashdata('success','Data berhasil di simpan');
		} else {
			$this->session->set_flashdata('gagal','Periksa kembali inputan');
		}

		redirect(base_url('pembiayaan'));
	}

	function delete($val){
		$user = $this->session->userdata('foreign');
		$cek = $this->db->query("SELECT * FROM t_pembiayaan WHERE pembiayaan_user = '$user'")->row_array();

		$array = json_decode($cek['pembiayaan_produk'],true);

		$key = array_search($val, $array);
		if (false !== $key) {
		   unset($array[$key]);
		}

		$set = json_encode($array);

		$this->db->set('pembiayaan_produk',$set);
	    $this->db->where('pembiayaan_user',$user);
	    
	    if ($this->db->update('t_pembiayaan')) {
	    	$this->session->set_flashdata('success','Data berhasil di simpan');

	    	//delete file
	    	unlink('./asset/gambar/pembiayaan/'.$val);
	    } else {
	    	$this->session->set_flashdata('gagal','Data gagal di simpan');
	    }

	    redirect(base_url('pembiayaan'));
	}
}