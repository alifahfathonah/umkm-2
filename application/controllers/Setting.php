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

		if (@$_FILES['setting_logo']['name']) {
			
			if($_FILES['setting_logo']['size'] <= 0){
				$this->session->set_flashdata('gagal','Foto tidak boleh lebih dari 2 MB');
			}
			else{

				//config uplod foto
				  $config = array(
				  'upload_path' 	=> './asset/gambar/setting',
				  'allowed_types' 	=> "gif|jpg|png|jpeg",
				  'overwrite' 		=> TRUE,
				  'max_size' 		=> "2048000",
				  );

				//upload foto
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('setting_logo')) {
					//replace Karakter name foto
					$name_foto = $_FILES['setting_logo']['name'];
					$char = array('!', '&', '?', '/', '/\/', ':', ';', '#', '<', '>', '=', '^', '@', '~', '`', '{', '}', ' ');
			        $foto = str_replace($char, '_', $name_foto);
			        $char1 = array('[',']');
			        $foto1 = str_replace($char1, '', $foto);

					$set = array(
									'setting_footer' => $data['setting_footer'],
									'setting_tanggal'=> date('Y-m-d'),
									'setting_logo' => $foto1
								);
					$this->db->set($set);
					$this->db->update('t_setting');

				    $this->session->set_flashdata('success','Data berhasil di perbaharui');
				} else {
					$this->session->set_flashdata('gagal','Foto gagal di upload');
				}
				
			}

		}else{
			//tanpa foto

			$set = array(
								'setting_footer' => $data['setting_footer'],
								'setting_tanggal'=> date('Y-m-d'),
							);

			$this->db->set($set);
			$this->db->update('t_setting');


			$this->session->set_flashdata('success','Data berhasil di perbaharui');
		}

		redirect(base_url('setting'));
	}
}