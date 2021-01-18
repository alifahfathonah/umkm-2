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

		if (@$_FILES['bumn_foto']['name']) {

			//config uplod foto
			  $config = array(
			  'upload_path' 	=> './asset/gambar/bumn',
			  'allowed_types' 	=> "gif|jpg|png|jpeg",
			  'overwrite' 		=> TRUE,
			  // 'max_size' 		=> "2048000",
			  // 'max_height' 		=> "10000",
			  // 'max_width' 		=> "20000"
			  );

			//upload foto
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('bumn_foto')) {
				//replace Karakter name foto
				$name_foto = $_FILES['bumn_foto']['name'];
				$char = array('!', '&', '?', '/', '/\/', ':', ';', '#', '<', '>', '=', '^', '@', '~', '`', '{', '}', ' ');
		        $foto = str_replace($char, '_', $name_foto);
		        $char1 = array('[',']');
		        $foto1 = str_replace($char1, '', $foto);

		        $this->db->set('bumn_foto',$foto1);
		        $this->db->where('bumn_user',$user);
		        $this->db->update('t_bumn');
			} 
		}

		// save data ////////////////////////////////////////////////

		$set = array(
						'bumn_rumah' => @$_POST['bumn_rumah'],
						'bumn_berdiri' => @$_POST['bumn_berdiri'],
						'bumn_status' => @$_POST['bumn_status'],
						'bumn_pengelola' => @$_POST['bumn_pengelola'],
						'bumn_no' => @$_POST['bumn_no'],
						'bumn_cabang' => @$_POST['bumn_cabang'],
						'bumn_pic' => @$_POST['bumn_pic'],
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
}