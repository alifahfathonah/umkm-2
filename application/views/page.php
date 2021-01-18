<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo base_url('asset/') ?>fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url('asset/') ?>css/style.css">
</head>
<body style="background-image: url(<?php echo base_url('asset/images/bg.png') ?>);
    min-height: 489.75px;
}">

    

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Data Konsumen</h2>
                        <form method="POST" class="register-form" id="register-form" action="<?php echo base_url('insert/add') ?>">
                            <div class="form-group">
                                <label><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" required="" name="nama" placeholder="Nama"/>
                            </div>

                            <div class="form-group">
                                <label><i class="zmdi zmdi-whatsapp material-icons-name"></i></label>
                                <input type="number" required="" name="wa" placeholder="No Whatsapp"/>
                            </div>

                            <div class="form-group">
                                <label><i class="zmdi zmdi-email material-icons-name"></i></label>
                                <input type="email" required="" name="email" placeholder="Email"/>
                            </div>

                            <div class="form-group">
                                <label><i class="zmdi zmdi-google-maps material-icons-name"></i></label>
                                <input type="text" required="" name="alamat" placeholder="Alamat"/>
                            </div>

                            <div class="form-group">
                                <label><i class="zmdi zmdi-label material-icons-name"></i></label>
                                <input type="text" required="" name="produk" placeholder="Produk Yang Di Beli"/>
                            </div>

                            <div class="form-group">
                                <label><i class="zmdi zmdi-widgets material-icons-name"></i></label>
                                <input type="number" required="" name="jumlah" placeholder="Jumlah Yang Di Beli"/>
                            </div>

                            <div class="form-group">
                                <label><i class="zmdi zmdi-money material-icons-name"></i></label>
                                <input type="number" required="" name="total" placeholder="Total"/>
                            </div>

                            <div class="form-group">
                                <label><i class="zmdi zmdi-wrap-text material-icons-name"></i></label>
                                <input type="text" required="" name="keterangan" placeholder="Keterangan"/>
                            </div>

                            <div class="form-group">
                                <label><i class="zmdi zmdi-calendar-alt material-icons-name"></i></label>
                                <input type="date" required="" name="tanggal" placeholder="Tanggal Pembelian"/>
                            </div>

                            <div class="form-group">
                                <label><i class="zmdi zmdi-pin material-icons-name"></i></label>
                                <input type="text" required="" name="tempat" placeholder="Tempat Pembelian"/>
                            </div>
                            
                            <div class="form-group form-button">
                                <input type="submit" class="form-submit" value="Insert"/>
                                <input style="background-color: #ff6d6d;" type="reset" class="form-submit" value="Reset"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="<?php echo base_url('asset/') ?>images/images.png" alt="sing up image"></figure>
                        <a href="<?php echo base_url('login') ?>" class="signup-image-link"><button style="background-color: #4eb54e; border: none; color: white; padding: 3%; border-radius: 5px; font-family: Poppins;" type="button"><i class="zmdi zmdi-shield-check material-icons-name"></i> Login Admin</button></a>
                    </div>
                </div>
            </div>
        </section>

    

    <!-- JS -->
    <script src="<?php echo base_url('asset/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('asset/') ?>js/main.js"></script>
    <script src="<?php echo base_url('asset/') ?>js/alert.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
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