<?php
class Data_bumn extends CI_Controller{ 

	function __construct(){
		parent::__construct();
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) {
			$data['data_bumn'] = 'class="active"';
		    $data['title'] = 'RUMAH BUMN';
		    $data['data'] = $this->db->query("SELECT * FROM t_user AS a JOIN t_bumn AS b ON a.user_foreignkey = b.bumn_user WHERE a.user_level = '1' AND a.user_hapus = 0 AND a.user_status = 1")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('data_bumn/index');
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
		
		redirect(base_url('data_bumn'));
	}
}