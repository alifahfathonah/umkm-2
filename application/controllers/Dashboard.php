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

			
			if (@$x) {
				
				switch ($x) {
					case 'kunjungan':

						$data['peringkat'] = $this->db->query("SELECT log_kunjungan_lokasi AS lokasi , COUNT(log_kunjungan_lokasi) AS jumlah FROM t_log_kunjungan WHERE log_kunjungan_hapus = 0 GROUP BY lokasi ORDER BY jumlah DESC limit 10")->result_array();

						$data['btn_kunjungan'] = 1;
						$data['btn_name'] = 'Kunjungan';
						$data['modal'] = 'kunjungan';

						$data['download'] = $this->db->query("SELECT * FROM t_log_kunjungan AS a JOIN t_user AS b ON a.log_kunjungan_user = b.user_foreignkey WHERE a.log_kunjungan_hapus = 0")->result_array();

						break;

					case 'pelatihan':

						$data['peringkat'] = $this->db->query("SELECT log_pelatihan_lokasi AS lokasi , COUNT(log_pelatihan_lokasi) AS jumlah FROM t_log_pelatihan WHERE log_pelatihan_hapus = 0 GROUP BY lokasi ORDER BY jumlah DESC limit 10")->result_array();

						$data['btn_pelatihan'] = 1;
						$data['btn_name'] = 'Pelatihan';
						$data['modal'] = 'pelatihan';

						$data['download'] = $this->db->query("SELECT * FROM t_log_pelatihan AS a JOIN t_user AS b ON a.log_pelatihan_user = b.user_foreignkey WHERE a.log_pelatihan_hapus = 0")->result_array();

						break;

					case 'umkm':

						$data['peringkat'] = $this->db->query("SELECT c.rumah_bumn_nama AS lokasi, COUNT(a.umkm_rumah) AS jumlah FROM t_umkm AS a JOIN t_bumn AS b ON a.umkm_rumah = b.bumn_rumah JOIN t_rumah_bumn AS c ON a.umkm_rumah = c.rumah_bumn_id GROUP BY lokasi ORDER BY jumlah DESC limit 10")->result_array();

						$data['btn_terbaru'] = 1;
						$data['btn_name'] = 'UMKM';
						$data['modal'] = 'umkm';

						$data['download'] =  $this->db->query("SELECT * FROM t_user AS a JOIN t_umkm AS b ON a.user_foreignkey = b.umkm_user JOIN t_rumah_bumn as c ON b.umkm_rumah = c.rumah_bumn_id JOIN t_skc as d ON b.umkm_skc = d.skc_id JOIN t_rumah_bumn_cabang as e ON b.umkm_cabang = e.rumah_bumn_cabang_id")->result_array(); 

						break;
				}

			} else {
				$data['peringkat'] = $this->db->query("SELECT log_kunjungan_lokasi AS lokasi , COUNT(log_kunjungan_lokasi) AS jumlah FROM t_log_kunjungan WHERE log_kunjungan_hapus = 0 GROUP BY lokasi ORDER BY jumlah DESC limit 10")->result_array();

				$data['btn_kunjungan'] = 1;
				$data['btn_name'] = 'Kunjungan';
				$data['modal'] = 'kunjungan';

				$data['download'] = $this->db->query("SELECT * FROM t_log_kunjungan AS a JOIN t_user AS b ON a.log_kunjungan_user = b.user_foreignkey WHERE a.log_kunjungan_hapus = 0")->result_array();
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
	function get_date(){

		@$filter = explode(' - ', @$_POST['val']);

		switch (@$_POST['type']) {
			case 'umkm':
				$v = $this->db->query("SELECT umkm_tanggal as tanggal FROM t_umkm WHERE DATE_FORMAT(umkm_tanggal, '%m/%d/%Y') BETWEEN '$filter[0]' AND '$filter[1]'")->result_array();
				break;
			case 'kunjungan':
				$v = $this->db->query("SELECT log_kunjungan_kunjungan as tanggal FROM t_log_kunjungan AS a JOIN t_user AS b ON a.log_kunjungan_user = b.user_foreignkey WHERE a.log_kunjungan_hapus = 0 AND DATE_FORMAT(a.log_kunjungan_kunjungan, '%m/%d/%Y') BETWEEN '$filter[0]' AND '$filter[1]'")->result_array();
				break;
			case 'pelatihan':
				$v = $this->db->query("SELECT log_pelatihan_tanggal as tanggal FROM t_log_pelatihan AS a JOIN t_user AS b ON a.log_pelatihan_user = b.user_foreignkey WHERE a.log_pelatihan_hapus = 0 AND DATE_FORMAT(a.log_pelatihan_tanggal, '%m/%d/%Y') BETWEEN '$filter[0]' AND '$filter[1]'")->result_array();
				break;
		}
		
		echo json_encode($v);
	}
}