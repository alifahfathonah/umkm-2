<?php
class Login extends CI_Controller{

  function __construct(){
    parent::__construct();
  }
  function index(){ 
    $data['title'] = 'LOGIN';
    $this->load->view('login.php',$data);
  }  
  function auth(){  
    $email = $this->input->post('email'); 
    $pass = md5($this->input->post('password'));

    $cek = $this->query_builder->login('t_user',$email,$pass);
   
        if (count($cek[0]['user_email']) > 0) {
          
              //ciptakan sesi
              $this->session->set_userdata('name',$cek[0]['user_name']);
              $this->session->set_userdata('pass',$cek[0]['user_password']);
              $this->session->set_userdata('foto',$cek[0]['user_foto']);

              $this->session->set_userdata('id',$cek[0]['user_id']);
              $this->session->set_userdata('login','1');
              $this->session->set_userdata('level',$cek[0]['user_level']);
              $this->session->set_userdata('foreign',$cek[0]['user_foreignkey']);


              switch ($cek[0]['user_level']) {
                case '0':
                  redirect(base_url('dashboard'));
                  break;
                case '1':
                  redirect(base_url('bumn'));
                  break;
                case '2':
                  redirect(base_url('umkm'));
                  break;
              }
      }
      else{
         $this->session->set_flashdata('gagal','Email / Password salah');
         redirect(base_url('login'));
      }
  }
  function logout(){
    session_destroy();
    redirect(base_url('login')); 
  }
  function register(){
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
              
              // save user
              $x = $this->db->query("SELECT * FROM t_user")->num_rows();
              $count = $x+1;

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

              //save sesuai level
              if ($level == 1) {
                //BUMN

                $a = array(
                            'bumn_user' => $count,
                            'bumn_tanggal' => date('Y-m-d'), 
                          );

                $this->db->set($a);
                $this->db->insert('t_bumn');

                redirect(base_url('bumn'));

              } else {
                //UMKM

                $b = array(
                            'umkm_user' => $count,
                            'umkm_tanggal' => date('Y-m-d'), 
                          );

                $this->db->set($b);
                $this->db->insert('t_umkm');

                redirect(base_url('umkm'));

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
}