
<!DOCTYPE html> 
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo @$title ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->

    <link rel="shortcut icon" href="<?php echo base_url() ?>asset/gambar/icon.png" />
    <link rel="stylesheet" href="<?php echo base_url('asset/theme') ?>/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo base_url('asset/theme') ?>/vendor/font-awesome/css/all.min.css"> 
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?php echo base_url('asset/theme') ?>/css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url('asset/theme') ?>/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url('asset/theme') ?>/css/custom.css">

    
  </head>
  <body>
    <div class="page login-page" style="background-image: url('<?php echo base_url() ?>asset/gambar/hexagon.png');">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow" style="box-shadow: 0 1px 5px 0 rgba(0, 0, 0, 0.2), 0 3px 17px 0 rgba(0, 0, 0, 0.19);">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info align-items-center">
                <div class="content" align="center">
                  <div class="logo">
                    
                    <br/>
                    <br/>
                    <!-- <img style="width: 90%;" src="<?php echo base_url('asset/gambar/setting/').@$setting['setting_logo'] ?>"> -->

                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img class="d-block w-100" src="<?php echo base_url('asset/gambar/setting/').@$setting['setting_slide_1'] ?>" alt="First slide">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="<?php echo base_url('asset/gambar/setting/').@$setting['setting_slide_2'] ?>" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="<?php echo base_url('asset/gambar/setting/').@$setting['setting_slide_3'] ?>" alt="Third slide">
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">

                  <form action="<?php echo base_url() ?>login/auth" method="POST">
                    <div class="form-group">
                      <input autocomplete="off" type="text" name="email" required="" class="input-material">
                      <label for="login-username" class="label-material">Email</label>
                    </div>
                    <div class="form-group">
                      <input autocomplete="off" type="password" name="password" required="" class="input-material">
                      <label for="login-password" class="label-material">Password</label>
                    </div>
                    <div class="form-group">
                        <select name="level" class="form-control" required="">
                            <option value="" hidden="">Login Sebagai</option>
                            <option value="2">UMKM</option>
                            <option value="1">RUMAH BUMN</option>
                            <option value="0">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                  </form>

                  <br/><br/>

                  <div class="row" style="margin-right: 0; margin-left: 0;">
                    <div class="col-md-6">
                      <a href="<?php echo base_url('login/forgot') ?>">Forgot password ( <i class="fa fa-key"></i> )</a>
                    </div>
                    <div class="col-md-6">
                      <span class="text-muted text-center"><small>Do not have an account?</small>
                      <a href="<?php echo base_url('login/register') ?>">Sign up</a></span>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <footer style="bottom: 0; width: 100%; padding: 20px 10px; text-align: center;">
   <span>Copyright &copy; 2020-<?php echo date('Y'); ?> <?php echo @$setting['setting_footer'] ?>.</span>
  </footer>

        <!-- JavaScript files-->
    <script src="<?php echo base_url('asset/theme') ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('asset/theme') ?>/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?php echo base_url('asset/theme') ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('asset/theme') ?>/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?php echo base_url('asset/theme') ?>/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url('asset/theme') ?>/vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="<?php echo base_url('asset/theme') ?>/js/front.js"></script>
    <script src="<?php echo base_url('asset/') ?>js/alert.js"></script>
  </body>
</html>

<script type="text/javascript">
  <?php if ($this->session->flashdata("sukses")): ?>
    
    Swal.fire(
      '',
      '<?php echo $this->session->flashdata("sukses"); ?>',
      'success'
    ) 

<?php endif ?>

<?php if ($this->session->flashdata("gagal")): ?>

    Swal.fire({
      icon: 'error',
      title: '',
      text: '<?php echo $this->session->flashdata("gagal"); ?>'
    })

<?php endif ?>
</script>