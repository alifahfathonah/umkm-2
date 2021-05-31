<?php
class Data_umkm extends CI_Controller{  

	function __construct(){
		parent::__construct();
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) {
			$data['tree_umkm'] = 'display: block;';
			$data['data_umkm'] = 'class="active"';
		    $data['title'] = 'Data UMKM';

		    $id = $this->session->userdata('foreign');
		    $level = $this->session->userdata('level');

		    @$filter = explode(' - ', @$_POST['filter']);

		    switch ($level) {
		    	case '0':
		    		
		    		if (@$_POST['filter']) {
				    	$data['data'] = $this->db->query("SELECT * FROM t_user AS a JOIN t_umkm AS b ON a.user_foreignkey = b.umkm_user JOIN t_rumah_bumn as c ON b.umkm_rumah = c.rumah_bumn_id JOIN t_skc as d ON b.umkm_skc = d.skc_id JOIN t_rumah_bumn_cabang as e ON b.umkm_cabang = e.rumah_bumn_cabang_id JOIN t_wilayah_baru as f ON f.wilayah_baru_kode = b.umkm_wilayah WHERE a.user_level = '2' AND a.user_hapus = 0 AND DATE_FORMAT(b.umkm_tanggal, '%m/%d/%Y') BETWEEN '$filter[0]' AND '$filter[1]'")->result_array();
				    }else{
				    	$data['data'] = $this->db->query("SELECT * FROM t_user AS a JOIN t_umkm AS b ON a.user_foreignkey = b.umkm_user JOIN t_rumah_bumn as c ON b.umkm_rumah = c.rumah_bumn_id JOIN t_skc as d ON b.umkm_skc = d.skc_id JOIN t_rumah_bumn_cabang as e ON b.umkm_cabang = e.rumah_bumn_cabang_id JOIN t_wilayah_baru as f ON f.wilayah_baru_kode = b.umkm_wilayah WHERE a.user_level = '2' AND a.user_hapus = 0")->result_array(); 
				    }
		    		break;
		    	
		    	case '1':
		    		$get = $this->db->query("SELECT * FROM t_bumn WHERE bumn_user = '$id'")->row_array();
		    		$rumah_bumn = $get['bumn_rumah'];

		    		if (@$_POST['filter']) {
				    	$data['data'] = $this->db->query("SELECT * FROM t_user AS a JOIN t_umkm AS b ON a.user_foreignkey = b.umkm_user JOIN t_rumah_bumn as c ON b.umkm_rumah = c.rumah_bumn_id JOIN t_skc as d ON b.umkm_skc = d.skc_id JOIN t_rumah_bumn_cabang as e ON b.umkm_cabang = e.rumah_bumn_cabang_id JOIN t_wilayah_baru as f ON f.wilayah_baru_kode = b.umkm_wilayah WHERE a.user_level = '2' AND a.user_hapus = 0 b.umkm_rumah = '$rumah_bumn' AND DATE_FORMAT(b.umkm_tanggal, '%m/%d/%Y') BETWEEN '$filter[0]' AND '$filter[1]' ")->result_array();
				    }else{
				    	$data['data'] = $this->db->query("SELECT * FROM t_user AS a JOIN t_umkm AS b ON a.user_foreignkey = b.umkm_user JOIN t_rumah_bumn as c ON b.umkm_rumah = c.rumah_bumn_id JOIN t_skc as d ON b.umkm_skc = d.skc_id JOIN t_rumah_bumn_cabang as e ON b.umkm_cabang = e.rumah_bumn_cabang_id JOIN t_wilayah_baru as f ON f.wilayah_baru_kode = b.umkm_wilayah WHERE a.user_level = '2' AND a.user_hapus = 0 AND b.umkm_rumah = '$rumah_bumn'")->result_array(); 
				    }
		    		break;
		    	
		    }
		    
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