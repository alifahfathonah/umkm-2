<?php
class Data_umkm extends CI_Controller{ 

	function __construct(){
		parent::__construct();
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) {
			$data['data_umkm'] = 'class="active"';
		    $data['title'] = 'Data UMKM';
		    $data['data'] = $this->db->query("SELECT * FROM t_user AS a JOIN t_umkm AS b ON a.user_foreignkey = b.umkm_user WHERE a.user_level = '2' AND a.user_hapus = 0")->result_array(); 

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('data_umkm/index');
		    $this->load->view('v_template_admin/admin_footer');

		}  
		else{
			redirect(base_url('login'));
		}
	}
	function delete($id){
		if ($id == $this->session->userdata('id')) {

			$this->session->set_flashdata('gagal','Tidak bisa menghapus data sendiri');
		} else {
			$this->db->set('user_hapus',1);
			$this->db->where('user_id',$id);
			$this->db->update('t_user');

			$this->session->set_flashdata('success','Data berhasil di hapus');
		}
		
		redirect(base_url('data_umkm'));
	}
}