<?php
class Dashboard extends CI_Controller{

	function __construct(){
		parent::__construct();
	} 
	function index($x = ''){
		if ( $this->session->userdata('login') == 1) {
			
			$data['umkm'] = $this->db->query("SELECT * FROM t_user where user_level = 2 AND user_hapus = 0")->num_rows();

			$data['bumn'] = $this->db->query("SELECT * FROM t_user where user_level = 1 AND user_hapus = 0")->num_rows();

			$data['kunjungan'] = $this->db->query("SELECT * FROM t_log_kunjungan WHERE log_kunjungan_hapus = 0")->num_rows();

			$data['pelatihan'] = $this->db->query("SELECT * FROM t_log_pelatihan WHERE log_pelatihan_hapus = 0")->num_rows();

			$data['pameran'] = $this->db->query("SELECT * FROM t_log_pameran WHERE log_pameran_hapus = 0")->num_rows();

			$data['download'] =  $this->db->query("SELECT c.rumah_bumn_nama AS bumn, DATE_FORMAT(a.umkm_tanggal, '%Y-%m') AS tanggal, COUNT(a.umkm_rumah) AS jumlah FROM t_umkm AS a JOIN t_bumn AS b ON a.umkm_rumah = b.bumn_rumah JOIN t_rumah_bumn AS c ON a.umkm_rumah = c.rumah_bumn_id GROUP BY tanggal")->result_array();

			$data['table_umkm'] = $this->db->query("SELECT * FROM t_user AS a JOIN t_umkm AS b ON a.user_foreignkey = b.umkm_user JOIN t_rumah_bumn as c ON b.umkm_rumah = c.rumah_bumn_id JOIN t_skc as d ON b.umkm_skc = d.skc_id JOIN t_rumah_bumn_cabang as e ON b.umkm_cabang = e.rumah_bumn_cabang_id")->result_array(); 

			if (@$x) {
				
				switch ($x) {
					case 'kunjungan':

						$data['peringkat'] = $this->db->query("SELECT log_kunjungan_lokasi AS lokasi , COUNT(log_kunjungan_lokasi) AS jumlah FROM t_log_kunjungan WHERE log_kunjungan_hapus = 0 GROUP BY lokasi ORDER BY jumlah DESC limit 10")->result_array();

						$data['btn_kunjungan'] = 1;

						break;

					case 'pelatihan':

						$data['peringkat'] = $this->db->query("SELECT log_pelatihan_lokasi AS lokasi , COUNT(log_pelatihan_lokasi) AS jumlah FROM t_log_pelatihan WHERE log_pelatihan_hapus = 0 GROUP BY lokasi ORDER BY jumlah DESC limit 10")->result_array();

						$data['btn_pelatihan'] = 1;

						break;

					case 'terbaru':

						$data['peringkat'] = $this->db->query("SELECT c.rumah_bumn_nama AS lokasi, COUNT(a.umkm_rumah) AS jumlah FROM t_umkm AS a JOIN t_bumn AS b ON a.umkm_rumah = b.bumn_rumah JOIN t_rumah_bumn AS c ON a.umkm_rumah = c.rumah_bumn_id GROUP BY lokasi ORDER BY jumlah DESC limit 10")->result_array();

						$data['btn_terbaru'] = 1;

						break;
				}

			} else {
				$data['peringkat'] = $this->db->query("SELECT log_kunjungan_lokasi AS lokasi , COUNT(log_kunjungan_lokasi) AS jumlah FROM t_log_kunjungan WHERE log_kunjungan_hapus = 0 GROUP BY lokasi ORDER BY jumlah DESC limit 10")->result_array();

				$data['btn_kunjungan'] = 1;
			}

			//data
			$data['data'] = $this->db->query("SELECT * FROM t_user where user_level IN('1') AND user_hapus = 0 ORDER BY user_id DESC")->result_array(); 

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