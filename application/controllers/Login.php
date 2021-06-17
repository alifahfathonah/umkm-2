<?php
class Login extends CI_Controller{

  function __construct(){
    parent::__construct();
  }
  function index(){ 
    $data['setting'] = $this->db->query("SELECT * FROM t_setting")->row_array();

    $data['title'] = 'LOGIN';
    $this->load->view('login.php',$data); 
  }   
  function auth(){  
    $email = $this->input->post('email');  
    $pass = md5($this->input->post('password'));

    $cek = $this->db->query("SELECT * FROM t_user WHERE user_email = '$email' AND user_password = '$pass' AND user_status = 1")->result_array();
   
        if (@$cek[0]['user_email']) {

              $setting = $this->db->query("SELECT * FROM t_setting")->row_array();
          
              //ciptakan sesi
              $this->session->set_userdata('pass',$cek[0]['user_password']);
              $this->session->set_userdata('foto',$cek[0]['user_foto']);

              $this->session->set_userdata('id',$cek[0]['user_id']);
              $this->session->set_userdata('login','1');
              $this->session->set_userdata('level',$cek[0]['user_level']);
              $this->session->set_userdata('foreign',$cek[0]['user_foreignkey']);

              $this->session->set_userdata('footer',$setting['setting_footer']);

              switch ($cek[0]['user_level']) {
                case '0':
                  $this->session->set_userdata('name',$cek[0]['user_name']);
                  redirect(base_url('dashboard'));
                  break;
                case '1':

                  $idfor = $cek[0]['user_foreignkey'];
                  $xx = $this->db->query("SELECT * FROM t_bumn AS a JOIN t_rumah_bumn AS b ON a.bumn_rumah = b.rumah_bumn_id WHERE a.bumn_user = '$idfor'")->row_array();

                  $this->session->set_userdata('name','RUMAH BUMN '.strtoupper($xx['rumah_bumn_nama']));

                  redirect(base_url('bumn'));
                  break;
                case '2':

                  $this->session->set_userdata('name',$cek[0]['user_name']);
                  redirect(base_url('umkm'));
                  break;
              }
      }
      else{

          if ($cek[0]['user_status'] == 0) {
            $this->session->set_flashdata('gagal','Akun anda belum di validasi "Admin"');
          } else {
            $this->session->set_flashdata('gagal','Email / Password salah');
          }
          
         redirect(base_url('login'));
      }
  }
  function logout(){
    session_destroy();
    redirect(base_url('login')); 
  }
  function register(){
    $data['setting'] = $this->db->query("SELECT * FROM t_setting")->row_array();
    $data['title'] = 'REGISTER';
    $this->load->view('register.php',$data);
  }
  function save(){

    $captcha = $_POST['g-recaptcha-response'];
    if (!$captcha) {
      echo 'Please check the captcha form.';
    } else {
      $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcDajAaAAAAAMtEtbZEhk_nXXItlKU_7kHWAIdY&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
      $responseKeys = json_decode($response,true);

      if (intval($responseKeys["success"]) == 1) {
        
        //ambil POST
        $pass = $_POST['user_password'];
        $re = $_POST['re_password'];
        $email = $_POST['user_email'];
        $name = $_POST['user_name'];
        $level = $_POST['user_level'];

        //cek password
        if ($pass == $re) {
              
            $cek = $this->db->query("SELECT * FROM t_user WHERE user_email = '$email'")->num_rows();

            //cek email
            if ($cek == 0) {

              //save sesuai level
              if ($level == 1) {
                //BUMN

                $x = $this->db->query("SELECT * FROM t_user order by user_id desc limit 1")->row_array();
                $count = $x['user_foreignkey']+1;

                $set = array(
                              'user_foreignkey' => $count,
                              'user_name' => $name, 
                              'user_email' => $email, 
                              'user_password' => md5($pass), 
                              'user_level' => $level, 
                              'user_tanggal' => date('Y-m-d'), 
                            );

                $this->db->set($set);
                $this->db->insert('t_user');

                //save detail
                $detail = array(
                            'detail_id_user' => $count, 
                          );

                $this->db->set($detail);
                $this->db->insert('t_detail_user');

                $a = array(
                            'bumn_user' => $count,
                            'bumn_tanggal' => date('Y-m-d'), 
                          );

                $this->db->set($a);
                $this->db->insert('t_bumn');

                $this->session->set_flashdata('sukses','registrasi berhasil, tunggu akun anda di validasi admin');
                redirect(base_url('login'));

              } else {
                //UMKM

                $x = $this->db->query("SELECT * FROM t_user order by user_id desc limit 1")->row_array();
                $count = $x['user_foreignkey']+1;

                $set = array(
                              'user_foreignkey' => $count,
                              'user_name' => $name, 
                              'user_email' => $email, 
                              'user_password' => md5($pass), 
                              'user_level' => $level, 
                              'user_status' => 1,
                              'user_tanggal' => date('Y-m-d'), 
                            );

                $this->db->set($set);
                $this->db->insert('t_user');

                //save detail
                $detail = array(
                            'detail_id_user' => $count, 
                          );

                $this->db->set($detail);
                $this->db->insert('t_detail_user')
                ;
                $b = array(
                            'umkm_user' => $count,
                            'umkm_tanggal' => date('Y-m-d'), 
                          );

                $this->db->set($b);
                $this->db->insert('t_umkm');

                $c = array(
                            'pembiayaan_user' => $count,
                            'pembiayaan_tanggal' => date('Y-m-d'), 
                          );

                $this->db->set($c);
                $this->db->insert('t_pembiayaan');

                $this->session->set_flashdata('sukses','registrasi berhasil, silahkan login kembali');
                redirect(base_url('login'));

              }
              
            
            } else {
              $this->session->set_flashdata('gagal','email sudah ada');
              redirect(base_url('login/register'));
            }
            
        //password tidak sama
        } else {
         $this->session->set_flashdata('gagal','Pasword tidak sama');
         redirect(base_url('login/register'));
        }
        

      } else {
        $this->session->set_flashdata('gagal','Periksa kembali inputan');
        redirect(base_url('login/register'));
      }
    }

  }
  function forgot(){
    $data['setting'] = $this->db->query("SELECT * FROM t_setting")->row_array();

    $data['title'] = 'Forgot Password';
    $this->load->view('forgot.php',$data);
  }
  function forgot_save(){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cek = $this->db->query("SELECT * FROM t_user WHERE user_email = '$email'")->num_rows(); 

    if ($cek > 0) {

      if ($_POST['password'] == $_POST['con_password']) {
        
         $this->db->set('user_password',$password);
         $this->db->where('user_email',$email);
         $this->db->update('t_user');

         $this->session->set_flashdata('sukses','Password berhasil di ganti, silahkan login kembali');
         redirect(base_url('login'));

      } else {
        
         $this->session->set_flashdata('gagal','Periksa kembali password');
         redirect(base_url('login/forgot'));
      }
      
    } else {
      
      $this->session->set_flashdata('gagal','Email belum terdaftar');
      redirect(base_url('login/forgot'));
    }
    
  }
}