<?php
class Dashboard extends CI_Controller{

	function __construct(){
		parent::__construct();
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) {
			
			$data['umkm'] = $this->db->query("SELECT * FROM t_user where user_level = 2 AND user_hapus = 0")->num_rows();

			$data['bumn'] = $this->db->query("SELECT * FROM t_user where user_level = 1 AND user_hapus = 0")->num_rows();

			$data['data'] = $this->db->query("SELECT * FROM t_user where user_level IN('1','2') AND user_hapus = 0 ORDER BY user_id DESC LIMIT 10")->result_array();

			$data['dashboard'] = 'class="active"';
		    $data['title'] = 'Dashboard';
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('dashboard/dashboard');
 
		}
		else{
			redirect(base_url('login'));
		}
	} 
}