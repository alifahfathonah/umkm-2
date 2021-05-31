<?php
class Data_bumn extends CI_Controller{ 

	function __construct(){
		parent::__construct(); 
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) {
			$data['data_bumn'] = 'class="active"';
		    $data['title'] = 'RUMAH BUMN';

		    @$filter = explode(' - ', @$_POST['filter']);

		    if (@$_POST['filter']) {
		    	$data['data'] = $this->db->query("SELECT * FROM t_user AS a JOIN t_bumn AS b ON a.user_foreignkey = b.bumn_user JOIN t_rumah_bumn as c ON b.bumn_rumah = c.rumah_bumn_id JOIN t_rumah_bumn_cabang as d ON b.bumn_kantor_cabang = d.rumah_bumn_cabang_id JOIN t_wilayah_baru as e ON b.bumn_kantor_wilayah = e.wilayah_baru_kode WHERE a.user_level = '1' AND a.user_hapus = 0 AND a.user_status = 1 AND DATE_FORMAT(b.bumn_tanggal, '%m/%d/%Y') BETWEEN '$filter[0]' AND '$filter[1]'")->result_array();
		    } else {
		    	$data['data'] = $this->db->query("SELECT * FROM t_user AS a JOIN t_bumn AS b ON a.user_foreignkey = b.bumn_user JOIN t_rumah_bumn as c ON b.bumn_rumah = c.rumah_bumn_id JOIN t_rumah_bumn_cabang as d ON b.bumn_kantor_cabang = d.rumah_bumn_cabang_id JOIN t_wilayah_baru as e ON b.bumn_kantor_wilayah = e.wilayah_baru_kode WHERE a.user_level = '1' AND a.user_hapus = 0 AND a.user_status = 1")->result_array();
		    }

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