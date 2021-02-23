<?php
class Dashboard extends CI_Controller{

	function __construct(){
		parent::__construct();
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) {
			
			$data['umkm'] = $this->db->query("SELECT * FROM t_user where user_level = 2 AND user_hapus = 0")->num_rows();

			$data['bumn'] = $this->db->query("SELECT * FROM t_user where user_level = 1 AND user_hapus = 0")->num_rows();

			$data['kunjungan'] = $this->db->query("SELECT * FROM t_log_kunjungan WHERE log_kunjungan_hapus = 0")->num_rows();

			$data['pelatihan'] = $this->db->query("SELECT * FROM t_log_pelatihan WHERE log_pelatihan_hapus = 0")->num_rows();

			$data['pameran'] = $this->db->query("SELECT * FROM t_log_pameran WHERE log_pameran_hapus = 0")->num_rows();


			//data
			$data['data'] = $this->db->query("SELECT * FROM t_user where user_level IN('1','2') AND user_hapus = 0 ORDER BY user_id DESC")->result_array(); 

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