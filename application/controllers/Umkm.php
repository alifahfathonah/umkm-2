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

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('umkm/index');
		    $this->load->view('v_template_admin/admin_footer',$data);
		}
		else{
			redirect(base_url('login'));
		}
	} 
	function save(){
		$user = $this->session->userdata('foreign');

		if (@$_FILES['umkm_produk']['name']) {

			//config uplod foto
			  $config = array(
			  'upload_path' 	=> './asset/gambar/umkm',
			  'allowed_types' 	=> "gif|jpg|png|jpeg",
			  'overwrite' 		=> TRUE,
			  // 'max_size' 		=> "2048000",
			  // 'max_height' 		=> "10000",
			  // 'max_width' 		=> "20000"
			  );

			//upload foto
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('umkm_produk')) {
				//replace Karakter name foto
				$name_foto = $_FILES['umkm_produk']['name'];
				$char = array('!', '&', '?', '/', '/\/', ':', ';', '#', '<', '>', '=', '^', '@', '~', '`', '{', '}', ' ');
		        $foto = str_replace($char, '_', $name_foto);
		        $char1 = array('[',']');
		        $foto1 = str_replace($char1, '', $foto);

		        $this->db->set('umkm_produk',$foto1);
		        $this->db->where('umkm_user',$user);
		        $this->db->update('t_umkm');
			} 
		}

		// save data ////////////////////////////////////////////////

		$set = array(
						'umkm_rumah' => @$_POST['umkm_rumah'],
						'umkm_skc' => @$_POST['umkm_skc'],
						'umkm_brand' => @$_POST['umkm_brand'],
						'umkm_usaha' => @$_POST['umkm_usaha'],
						'umkm_jenis' => @$_POST['umkm_jenis'],
						'umkm_jenis_lain' => @$_POST['umkm_jenis_lain'],
						'umkm_provinsi' => @$_POST['umkm_provinsi'],
						'umkm_kota' => @$_POST['umkm_kota'],
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
						'umkm_website' => @$_POST['umkm_website'],
						'umkm_pameran_dalam' => @$_POST['umkm_pameran_dalam'],
						'umkm_pameran_luar' => @$_POST['umkm_pameran_luar'],
						'umkm_penghargaan' => @$_POST['umkm_penghargaan'],
						'umkm_cerita' => @$_POST['umkm_cerita'],
						'umkm_berdiri' => @$_POST['umkm_berdiri'],
						'umkm_skala' => @$_POST['umkm_skala'],
						'umkm_karyawan' => @$_POST['umkm_karyawan'],
						'umkm_omset' => @$_POST['umkm_omset'],
						'umkm_jenis_biaya_bni' => @$_POST['umkm_jenis_biaya_bni'],
						'umkm_kredit' => @$_POST['umkm_kredit'],
						'umkm_produk_deskripsi' => @$_POST['umkm_produk_deskripsi'],
						'umkm_bpom' => @$_POST['umkm_bpom'],
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
}