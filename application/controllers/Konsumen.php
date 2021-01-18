<?php
class Konsumen extends CI_Controller{ 

	function __construct(){
		parent::__construct();
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) {
			$data['konsumen'] = 'class="active"';
		    $data['title'] = 'Konsumen';
		    $data['data'] = $this->db->query("SELECT * FROM t_konsumen WHERE konsumen_hapus = 0")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('konsumen/index');
		    $this->load->view('v_template_admin/admin_footer');

		}  
		else{
			redirect(base_url('login'));
		}
	} 
	function add(){ 
		$set = array(
						'konsumen_nama' => $_POST['nama'], 
						'konsumen_wa' => $_POST['wa'], 
						'konsumen_email' => $_POST['email'], 
						'konsumen_alamat' => $_POST['alamat'], 
						'konsumen_produk' => $_POST['produk'], 
						'konsumen_jumlah' => $_POST['jumlah'], 
						'konsumen_total' => $_POST['total'], 
						'konsumen_keterangan' => $_POST['keterangan'], 
						'konsumen_tanggal' => $_POST['tanggal'], 
						'konsumen_tempat' => $_POST['tempat'], 
					);
		
		$this->db->set($set);

		if ($this->db->insert('t_konsumen')) {
			$this->session->set_flashdata('success','Data Berhasil Di Simpan');
		} else {
			$this->session->set_flashdata('gagal','Data Gagal Di Simpan');
		}

		redirect(base_url('konsumen'));
	}
	function delete($id){
		$this->db->set('konsumen_hapus',1);
		$this->db->where('konsumen_id',$id);
		$this->db->update('t_konsumen');

		$this->session->set_flashdata('success','Data berhasil di hapus');
		
		redirect(base_url('konsumen'));
	}
	function update($id){
		$set = array(
						'konsumen_nama' => $_POST['nama'], 
						'konsumen_wa' => $_POST['wa'], 
						'konsumen_email' => $_POST['email'], 
						'konsumen_alamat' => $_POST['alamat'], 
						'konsumen_produk' => $_POST['produk'], 
						'konsumen_jumlah' => $_POST['jumlah'], 
						'konsumen_total' => $_POST['total'], 
						'konsumen_keterangan' => $_POST['keterangan'], 
						'konsumen_tanggal' => $_POST['tanggal'], 
						'konsumen_tempat' => $_POST['tempat'], 
					);
		
		$this->db->set($set);
		$this->db->where('konsumen_id',$id);
		if ($this->db->update('t_konsumen')) {
			$this->session->set_flashdata('success','Data Berhasil Di Simpan');
		} else {
			$this->session->set_flashdata('gagal','Data Gagal Di Simpan');
		}

		redirect(base_url('konsumen'));
	}
}