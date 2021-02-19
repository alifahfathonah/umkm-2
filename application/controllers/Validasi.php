<?php
class Validasi extends CI_Controller{ 

	function __construct(){
		parent::__construct();
	} 
	function umkm(){
		if ( $this->session->userdata('login') == 1) {
			$data['tree'] = 'display: block;';
		    $data['title'] = 'VALIDASI UMKM';
		    $data['data'] = $this->db->query("SELECT * FROM t_user where user_level = '1' AND user_hapus = 0")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('validasi/umkm');
		    $this->load->view('v_template_admin/admin_footer');

		}  
		else{
			redirect(base_url('login'));
		}
	}
	function bumn(){
		if ( $this->session->userdata('login') == 1) {
			$data['tree'] = 'display: block;';
		    $data['title'] = 'VALIDASI BUMN';
		    $data['data'] = $this->db->query("SELECT * FROM t_user where user_level = '2' AND user_hapus = 0")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('validasi/bumn');
		    $this->load->view('v_template_admin/admin_footer');

		}  
		else{
			redirect(base_url('login'));
		}
	}
	function konfirm($id,$url){
		$this->db->set('user_status',1);
		$this->db->where('user_id',$id);
		$this->db->update('t_user');

		$this->session->set_flashdata('success','User telah di validasi');

		switch ($url) {
			case '0':
				redirect(base_url('dashboard'));

			case '1':
				redirect(base_url('validasi/umkm'));

			case '2':
				redirect(base_url('validasi/bumn'));
		}
	}
	function delete($id,$url){
		$this->db->set('user_hapus',1);
		$this->db->where('user_id',$id);
		$this->db->update('t_user');

		$this->session->set_flashdata('success','User telah di hapus');

		switch ($url) {
			case '0':
				redirect(base_url('dashboard'));

			case '1':
				redirect(base_url('validasi/umkm'));

			case '2':
				redirect(base_url('validasi/bumn'));
		}
	}
}