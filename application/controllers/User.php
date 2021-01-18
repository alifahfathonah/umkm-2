<?php
class User extends CI_Controller{ 

	function __construct(){
		parent::__construct();
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) {
			$data['user'] = 'class="active"';
		    $data['title'] = 'User Control';
		    $data['data'] = $this->db->query("SELECT * FROM t_user WHERE user_level = '0' AND user_hapus = 0")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('user/index');
		    $this->load->view('v_template_admin/admin_footer');

		}  
		else{
			redirect(base_url('login'));
		}
	} 
	function add(){ 
		$x = $_POST['user_email'];
		$cek = $this->query_builder->view_where_num_rows('t_user','user_email = "'.$x.'"');

		if ($cek > 0) {
			$this->session->set_flashdata('gagal','Email sudah di gunakan !!');
			redirect(base_url('user'));
		}else{
			$cek = $this->db->query("SELECT * FROM t_user order by user_id desc limit 1")->row_array();
			$id = $cek['user_id']+1;
			$set = array(
							'user_id' => $id,
							'user_name' => $_POST['user_name'], 
							'user_email' => $x, 
							'user_password' => md5($_POST['user_password']),
							'user_tanggal'	=> date('Y-m-d'),
							'user_level'	=> '0', 
						);
			$this->query_builder->add('t_user',$set);

			$set1 = array('detail_id_user' => $id);
			$this->query_builder->add('t_detail_user',$set1);

			$this->session->set_flashdata('success','Data berhasil di tambah');
			redirect(base_url('user'));
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
		
		redirect(base_url('user'));
	}
	function update($id){
		$x = $_POST['user_email'];
		$set = array(
						'user_name' => $_POST['user_name'], 
						'user_email' => $x, 
						'user_tanggal'	=> date('Y-m-d'),
						'user_level'	=> '0', 
					);
		$this->query_builder->update('t_user',$set,'user_id ='.$id);
		$this->session->set_flashdata('success','Data berhasil di rubah');
		redirect(base_url('user'));
	}
}