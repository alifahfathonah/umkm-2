<?php
class Insert extends CI_Controller{

	function __construct(){
		parent::__construct();
	} 
	function index(){
			
			$data['title'] = 'Insert Data Konsumen';
		    $this->load->view('page.php',$data);
 
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
			$this->session->set_flashdata('sukses','Data Berhasil Di Simpan');
		} else {
			$this->session->set_flashdata('gagal','Data Gagal Di Simpan');
		}

		redirect(base_url());
	}
}