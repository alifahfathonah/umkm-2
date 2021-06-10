<?php
class Setting extends CI_Controller{ 

	function __construct(){
		parent::__construct();
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) {
			$data['data_setting'] = 'class="active"';
		    $data['title'] = 'Setting';
		    $data['data'] = $this->db->query("SELECT * FROM t_setting")->row_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('setting/index');
		    $this->load->view('v_template_admin/admin_footer');

		}  
		else{
			redirect(base_url('login'));
		}
	}
	function update(){
		$data = $this->input->post();

		// Looping all files
      	for($i=1; $i <  6; $i++){

	         //config uplod foto
			  $config = array(
			  'upload_path' 	=> './asset/gambar/setting',
			  'allowed_types' 	=> "gif|jpg|png|jpeg",
			  'overwrite' 		=> TRUE,
			  'max_size' 		=> "2048000",
			  );

			//upload foto
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('setting_slide_'.$i)) {
				
				//replace Karakter name foto
				$name_foto = $_FILES['setting_slide_'.$i]['name'];
				$char = array('!', '&', '?', '/', '/\/', ':', ';', '#', '<', '>', '=', '^', '@', '~', '`', '{', '}', ' ');
		        $foto = str_replace($char, '_', $name_foto);
		        $char1 = array('[',']');
		        $foto1 = str_replace($char1, '', $foto);

		        $this->db->set('setting_slide_'.$i, $foto1);
		        $this->db->update('t_setting');
			}
	 
      	}

      	$set = array(
						'setting_footer' => $data['setting_footer'],
						'setting_tanggal'=> date('Y-m-d'),
					);
		$this->db->set($set);
		$this->db->update('t_setting');

		$this->session->set_flashdata('success','Data berhasil di perbaharui');

		redirect(base_url('setting'));
	}
}