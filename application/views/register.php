
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

    <script src="https://www.google.com/recaptcha/api.js"></script>
    
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
                    <h1>DATA UMKM</h1>

                    <br/>
                    <br/>
                    <img style="width: 90%;" src="<?php echo base_url() ?>asset/gambar/umkm.png">

                  </div>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">

                  <form action="<?php echo base_url() ?>login/save" method="POST">
                    <div class="form-group">
                      <input type="text" name="user_name" required="" class="input-material">
                      <label class="label-material">User Name</label>
                    </div>
                    <div class="form-group">
                      <input type="email" name="user_email" required="" class="input-material">
                      <label class="label-material">Email</label>
                    </div>
                    <div class="form-group">
                      <input id="pass1" type="password" name="user_password" required="" class="input-material">
                      <label class="label-material">Password</label>
                    </div>
                    <div class="form-group">
                      <input id="pass2" type="password" required="" name="re_password" class="input-material">
                      <label for="login-password" class="label-material">Masukan Password Lagi</label>
                    </div>
                    <div class="form-group">
                        <select name="user_level" class="form-control" required="">
                            <option value="" hidden="">Daftar Sebagai</option>
                            <option value="2">UMKM</option>
                            <option value="1">Rumah BUMN</option>
                        </select>
                    </div>

                    <div class="form-group">
                      <div class="g-recaptcha" data-sitekey="6LcDajAaAAAAAB1rqVtQgd2prSVncJElnMTiPPam"></div> 
                    </div>

                    <button type="submit" class="btn btn-primary">Register <i class="fa fa-check"></i></button>
                  </form>

                  <br/><br/>
                  <p class="text-muted text-center"><small>Already have an account?</small>
                  <a href="<?php echo base_url('login') ?>">Sign in</a></p>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

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