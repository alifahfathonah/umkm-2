<?php
class Data_log extends CI_Controller{ 

	function __construct(){
		parent::__construct();
	} 
	function kunjungan(){
		if ( $this->session->userdata('login') == 1) {

		    $filter = @$_POST['filter'];
		    if ($filter) {
		    	$data['data'] = $this->db->query("SELECT * FROM t_log_kunjungan AS a JOIN t_user AS b ON a.log_kunjungan_user = b.user_foreignkey WHERE a.log_kunjungan_hapus = 0 AND DATE_FORMAT(a.log_kunjungan_tanggal, '%m/%Y') = '$filter'")->result_array();
		    } else {
		    	$data['data'] = $this->db->query("SELECT * FROM t_log_kunjungan AS a JOIN t_user AS b ON a.log_kunjungan_user = b.user_foreignkey WHERE a.log_kunjungan_hapus = 0")->result_array();
		    }

		    $data['title'] = 'Log Book (Kunjungan UMKM)';
		    $data['log'] = 'display: block;';
			$data['log_kunjungan'] = 'class="active"';
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('data_log/kunjungan');
		    $this->load->view('v_template_admin/admin_footer');

		}  
		else{
			redirect(base_url('login'));
		}
	}
	function delete_kunjungan($id){
		$this->db->set('log_kunjungan_hapus',1);
		$this->db->where('log_kunjungan_id',$id);

		if ($this->db->update('t_log_kunjungan')) {
			$this->session->set_flashdata('success','Data berhasil di hapus');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di hapus');
		}
		
		redirect(base_url('data_log/kunjungan'));
	}

	//////////////////////// pelatihan ///////////////////////

	function pelatihan(){
		if ( $this->session->userdata('login') == 1) {

		    $filter = @$_POST['filter'];
		    if ($filter) {
		    	$data['data'] = $this->db->query("SELECT * FROM t_log_pelatihan AS a JOIN t_user AS b ON a.log_pelatihan_user = b.user_foreignkey WHERE a.log_pelatihan_hapus = 0 AND DATE_FORMAT(a.log_pelatihan_tanggal, '%m/%Y') = '$filter'")->result_array();
		    } else {
		    	$data['data'] = $this->db->query("SELECT * FROM t_log_pelatihan AS a JOIN t_user AS b ON a.log_pelatihan_user = b.user_foreignkey WHERE a.log_pelatihan_hapus = 0")->result_array();
		    }

		    $data['log'] = 'display: block;';
			$data['log_pelatihan'] = 'class="active"';
		    $data['title'] = 'Log Book (PELATIHAN)';
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('data_log/pelatihan');
		    $this->load->view('v_template_admin/admin_footer');

		}  
		else{
			redirect(base_url('login'));
		}
	}
	function delete_pelatihan($id){
		$this->db->set('log_pelatihan_hapus',1);
		$this->db->where('log_pelatihan_id',$id);

		if ($this->db->update('t_log_pelatihan')) {
			$this->session->set_flashdata('success','Data berhasil di hapus');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di hapus');
		}
		
		redirect(base_url('data_log/pelatihan'));
	}

	//////////////////////// pameran ///////////////////////

	function pameran(){
		if ( $this->session->userdata('login') == 1) {

		    $filter = @$_POST['filter'];
		    if ($filter) {
		    	$data['data'] = $this->db->query("SELECT * FROM t_log_pameran AS a JOIN t_user AS b ON a.log_pameran_user = b.user_foreignkey WHERE a.log_pameran_hapus = 0 AND DATE_FORMAT(a.log_pameran_tanggal, '%m/%Y') = '$filter'")->result_array();
		    } else {
		    	$data['data'] = $this->db->query("SELECT * FROM t_log_pameran AS a JOIN t_user AS b ON a.log_pameran_user = b.user_foreignkey WHERE a.log_pameran_hapus = 0")->result_array();
		    }

		   	$data['log'] = 'display: block;';
			$data['log_pameran'] = 'class="active"';
		    $data['title'] = 'Log Book (PAMERAN)';
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('data_log/pameran');
		    $this->load->view('v_template_admin/admin_footer');

		}  
		else{
			redirect(base_url('login'));
		}
	}
	function delete_pameran($id){
		$this->db->set('log_pameran_hapus',1);
		$this->db->where('log_pameran_id',$id);

		if ($this->db->update('t_log_pameran')) {
			$this->session->set_flashdata('success','Data berhasil di hapus');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di hapus');
		}
		
		redirect(base_url('data_log/pameran'));
	}
}