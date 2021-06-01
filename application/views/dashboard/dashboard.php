
    <!-- Main content -->    
    <section class="content"> 

      <?php if ($this->session->flashdata('gagal')): ?>
        <div class="alert alert-danger alert-dismissible">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-close"></i>
          <?php echo $this->session->flashdata('gagal'); ?>  
        </div>
      <?php endif ?> 
    
      <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-check"></i>
          <?php echo $this->session->flashdata('success'); ?>
        </div>
      <?php endif ?> 

      <!-- Small boxes (Stat box) -->
      <div class="row"> 
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
           <a href="<?php echo base_url() ?>data_umkm">
            <div class="small-box bg-red img-thumbnail" style="border-width: 3px; border-color: #ffffff;">
              <div class="inner">
                <h3><?php echo $umkm ?></h3>

                <p>DATA UMKM</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6"> 
          <!-- small box -->
         <a href="<?php echo base_url() ?>data_bumn">
          <div class="small-box bg-green img-thumbnail" style="border-width: 3px; border-color: #ffffff;">
            <div class="inner">
              <h3><?php echo $bumn ?></h3>

              <p>RUMAH BUMN</p>
            </div>
            <div class="icon">
              <i class="fa fa-home"></i>
            </div>
          </div>
        </a>
        </div>
 
      </div>

      <div class="row">
        <div class="col-lg-4 col-xs46">
          <!-- small box -->
         <a href="<?php echo base_url('data_log/kunjungan') ?>">
          <div class="small-box bg-blue img-thumbnail" style="border-width: 3px; border-color: #ffffff;">
            <div class="inner">
              <h3><?php echo $kunjungan ?></h3>

              <p>KUNJUNGAN RUMAH BUMN KE UMKM</p>
            </div>
            <div class="icon">
              <i class="fa fa-folder"></i>
            </div>
          </div>
        </a>
        </div>

         <div class="col-lg-4 col-xs46">
          <!-- small box -->
         <a href="<?php echo base_url('data_log/pelatihan') ?>">
          <div class="small-box bg-yellow img-thumbnail" style="border-width: 3px; border-color: #ffffff;">
            <div class="inner">
              <h3><?php echo $pelatihan ?></h3>

              <p>PELATIHAN UNTUK UMKM</p>
            </div>
            <div class="icon">
              <i class="fa fa-folder"></i>
            </div>
          </div>
        </a>
        </div>

         <div class="col-lg-4 col-xs46">
          <!-- small box -->
         <a href="<?php echo base_url('data_log/pameran') ?>">
          <div class="small-box bg-aqua img-thumbnail" style="border-width: 3px; border-color: #ffffff;">
            <div class="inner">
              <h3><?php echo $pameran ?></h3>

              <p>PAMERAN UNTUK UMKM</p>
            </div>
            <div class="icon">
              <i class="fa fa-folder"></i>
            </div>
          </div>
        </a>
        </div>
      </div>

       <!-- AREA CHART -->
          <div class="box">
            <div class="box-header with-border">
              <a href="<?php echo base_url('dashboard/index/kunjungan') ?>"><button class="<?= (@$btn_kunjungan)? 'btn btn-primary' : 'btn btn-default' ?>" type="button">Kunjungan UMKM terbanyak</button></a>
              <a href="<?php echo base_url('dashboard/index/pelatihan') ?>"><button class="<?= (@$btn_pelatihan)? 'btn btn-primary' : 'btn btn-default' ?>" type="button">Pelatihan terbanyak</button></a>
              <a href="<?php echo base_url('dashboard/index/umkm') ?>"><button class="<?= (@$btn_terbaru)? 'btn btn-primary' : 'btn btn-default' ?>" type="button">Jumlah UMKM terbaru terbanyak</button></a>

              <button class="btn btn-success" data-toggle="modal" data-target="#download_<?php echo $modal ?>" type="button"><i class="fa fa-download"></i> Download <?php echo @$btn_name ?></button>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              
              <div class="col-md-6">
                <div id="bar-chart" style="height: 300px;"></div>
              </div>
              <div class="col-md-6">
                <div id="donut-chart" style="height: 300px;"></div>
              </div>

            </div>
            <!-- /.box-body -->
          </div>

      <div class="box">
        <div class="box-header with-border">

          <h3 class="box-title">Pendaftar terbaru</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
          <table id="example1" class="table table-bordered table-responsive">
            <thead>
              <tr>
                <td>No</td>
                <td>Username</td>
                <td>Sebagai</td>
                <td>Validasi</td>
                <td>Tanggal</td>
                <td width="150">Aksi</td>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
                <?php foreach ($data as $key): ?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $key['user_name'] ?></td>
                    <td><?=($key['user_level'] == 1)?'BUMN':'UMKM' ?></td>
                    <td><?=($key['user_status'] == 1)?'<small><span style="background-color: #008D4C; color: white; padding: 1.5%; border-radius: 15px;">Sudah</span></small>':'<small><span style="background-color: #D73925; color: white; padding: 1.5%; border-radius: 15px;">Belum</span></small>' ?></td>
                    <td><?php echo $key['user_tanggal'] ?></td>
                    <td width="150">
                      <a href="<?php echo base_url('validasi/konfirm/'.$key['user_id'].'/0') ?>"><button class="btn btn-xs btn-success" type="button">Validasi <i class="fa fa-check"></i></button></a>
                      <button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#modal_delete<?php echo $key['user_id'] ?>">Delete <i class="fa fa-times"></i></button>
                    </td>
                  </tr>
               <?php $i++ ?>

               <!--modal hapus-->
                <div class="modal fade" id="modal_delete<?php echo $key['user_id'] ?>">
                  <div class="modal-dialog" align="center">
                    <div class="modal-content" style="max-width: 300px;">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4>Confirmed ?</h4>
                        </div>
                      <div class="modal-body" align="center">
                         <a href="<?php echo base_url('validasi/delete/'.$key['user_id'].'/0') ?>"><button class="btn btn-success" style="width: 49%;">Yes</button></a>
                         <button class="btn btn-danger" data-dismiss="modal" style="width: 49%;">No</button>
                      </div>
                    </div>
                  </div>
                 </div> 

              <?php endforeach ?>
            </tbody>
          </table>

        </div>
        <!-- /.box-body -->
      </div>



      <!-- MODAL UMKM -->
      <div class="modal fade" id="download_umkm">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">

                <div class="form-group">
                  <input placeholder="Filter Bulan" autocomplete="off" required="" name="filter" type="text" value="" class="form-control reservation" id="filter2">
                </div>

                <button onclick="download('umkm',2)" class="btn btn-success" type="button"><i class="fa fa-download"> Download</i></button>

                <div hidden="">
                      
                    <table id="example2" class="table table-bordered table-responsive">
                    <thead>
                    <tr>
                      <th>Rumah BUMN</th>
                      <th>SKC</th>
                      <th>Cabang</th>
                      <th>Nama Brand/Merk</th>
                      <th>Nama Usaha</th>
                      <th>Kategori</th>
                      <th>Jenis Usaha</th>
                      <th>Jenis Lain-lain</th>
                      <th>Provinsi</th>
                      <th>Kab/Kota</th>
                      <th>Kecamatan</th>
                      <th>Kode Pos</th>
                      <th>Alamat lengkap</th>
                      <th>Nama Pemilik </th>
                      <th>No Tlp/Hp pemilik</th>
                      <th>Nama PIC selain pemilik</th>
                      <th>No Tlp/HP PIC</th>
                      <th>Nama IG Usaha</th>
                      <th>Nama FB Usaha</th>
                      <th>Alamat Email (Aktif)</th>
                      <th>Shopee</th>
                      <th>Tokopedia</th>
                      <th>Lazada</th>
                      <th>Bukalapak</th>
                      <th>JD.ID</th>
                      <th>PADI</th>
                      <th>Blibli</th>
                      <th>Nama Website Usaha</th>
                      <th>Pameran yang pernah di ikuti di dalam negeri</th>
                      <th>Pameran yang pernah di ikuti di luar negeri :</th>
                      <th>Penghargaan yang pernah di terima </th>
                      <th>Deskripsi produk UMKM</th>
                      <th>Berdiri sejak tahun</th>
                      <th>Skala Usaha</th>
                      <th>Jumlah Karyawan</th>
                      <th>Omset rata-rata per bulan :</th>
                      <th>Jenis pembiayaan BNI</th>
                      <th>Nilai Kredit</th>
                      <th>Foto Produk</th>
                      <th>Logo</th>
                      <th>Izin BPOM</th>
                      <th>Izin Usaha yang dimiliki</th>
                      <th>Tanggal Input</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($download as $key): ?>
                                      
                      <tr>
                        <td><?php echo $key['rumah_bumn_nama'] ?></td>
                        <td><?php echo $key['skc_nama'] ?></td>
                        <td><?php echo $key['rumah_bumn_cabang_nama'] ?></td>
                        <td><?php echo $key['umkm_brand'] ?></td>
                        <td><?php echo $key['umkm_usaha'] ?></td>
                        <td><?php echo $key['umkm_kategori'] ?></td>
                        <td><?php echo $key['umkm_jenis'] ?></td>
                        <td><?php echo $key['umkm_jenis_lain'] ?></td>
                        <td><?php echo $key['umkm_provinsi_text'] ?></td>
                        <td><?php echo $key['umkm_kota_text'] ?></td>
                        <td><?php echo $key['umkm_kecamatan_text'] ?></td>
                        <td><?php echo $key['umkm_pos'] ?></td>
                        <td><?php echo $key['umkm_alamat'] ?></td>
                        <td><?php echo $key['umkm_pemilik'] ?></td>
                        <td><?php echo $key['umkm_no'] ?></td>
                        <td><?php echo $key['umkm_pic'] ?></td>
                        <td><?php echo $key['umkm_no_pic'] ?></td>
                        <td><?php echo $key['umkm_ig'] ?></td>
                        <td><?php echo $key['umkm_fb'] ?></td>
                        <td><?php echo $key['umkm_email'] ?></td>
                        <td><?php echo $key['umkm_shopee'] ?></td>
                        <td><?php echo $key['umkm_tokopedia'] ?></td>
                        <td><?php echo $key['umkm_lazada'] ?></td>
                        <td><?php echo $key['umkm_bukalapak'] ?></td>
                        <td><?php echo $key['umkm_jdid'] ?></td>
                        <td><?php echo $key['umkm_blibli'] ?></td>
                        <td><?php echo $key['umkm_padi'] ?></td>
                        <td><?php echo $key['umkm_website'] ?></td>
                        <td><?php echo implode(', ', json_decode($key['umkm_pameran_dalam'],true)); ?></td>
                        <td><?php echo implode(', ', json_decode($key['umkm_pameran_luar'],true)); ?></td>
                        <td><?php echo implode(', ', json_decode($key['umkm_penghargaan'],true)); ?></td>
                        <td><?php echo implode(', ', json_decode($key['umkm_deskripsi'],true)); ?></td>
                        <td><?php echo $key['umkm_berdiri'] ?></td>
                        <td><?php echo $key['umkm_skala'] ?></td>
                        <td><?php echo $key['umkm_karyawan'] ?></td>
                        <td><?php echo $key['umkm_omset'] ?></td>
                        <td><?php echo $key['umkm_jenis_biaya_bni'] ?></td>
                        <td><?php echo $key['umkm_kredit'] ?></td>
                        
                        <td>
                            
                            <?php if (@$key['umkm_produk']): ?>
                               <?php foreach (json_decode($key['umkm_produk'],true) as $i): ?>
                                <a href="<?php echo base_url('asset/gambar/umkm/'.$i) ?>" target="_BLANK"><img src="<?php echo base_url('asset/gambar/umkm/'.$i) ?>" alt="" class="img-thumbnail" width="100"></a>
                               <?php endforeach ?>
                            <?php endif ?>

                        </td>
                        <td><a href="<?php echo base_url('asset/gambar/umkm/'.$key['umkm_logo']) ?>" target="_BLANK"><img src="<?php echo base_url('asset/gambar/umkm/'.$key['umkm_logo']) ?>" alt="" class="img-thumbnail" width="100"></a></td>

                        <td><?php echo $key['umkm_bpom'] ?></td>
                        <td><?php echo implode(', ', json_decode($key['umkm_izinusaha'],true)); ?></td>
                        <td>
                          <?php echo $key['umkm_tanggal']; ?>       
                        </td>
                      </tr>
                      
                    <?php endforeach ?>

                  </table>

                </div>
              
              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


      <!-- MODAL UMKM -->
      <div class="modal fade" id="download_kunjungan">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">

                <div class="form-group">
                  <input placeholder="Filter Bulan" autocomplete="off" required="" name="filter" type="text" value="" class="form-control reservation" id="filter3">
                </div>

                <button onclick="download('kunjungan','3')" class="btn btn-success" type="button"><i class="fa fa-download"> Download</i></button>

                <div hidden="">
                      
                    <table id="example3" class="table table-bordered table-responsive">
                    <thead>
                    <tr>
                      <th>User</th>
                      <th>Kunjungan UMKM</th>
                      <th>Nama UMKM</th>
                      <th>Kategori</th>
                      <th>Lokasi</th> 
                      <th>Laporan</th>
                    </tr>
                    </thead>
                    <tbody>
                      
                      <?php foreach ($download as $key): ?>            
                        <tr>
                          <td><?php echo $key['user_name'] ?></td>
                          <td><?php echo $key['log_kunjungan_kunjungan'] ?></td>
                          <td><?php echo $key['log_kunjungan_nama'] ?></td>
                          <td><?php echo $key['log_kunjungan_kategori'] ?></td>
                          <td><?php echo $key['log_kunjungan_lokasi'] ?></td>
                          <td><?php echo $key['log_kunjungan_laporan'] ?></td>
                        </tr>
                      <?php endforeach ?>

                  </table>

                </div>
              
              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <!-- MODAL Pelatihan -->
      <div class="modal fade" id="download_pelatihan">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">

                <div class="form-group">
                  <input placeholder="Filter Bulan" autocomplete="off" required="" name="filter" type="text" value="" class="form-control reservation" id="filter4">
                </div>

                <button onclick="download('pelatihan','4')" class="btn btn-success" type="button"><i class="fa fa-download"> Download</i></button>

                <div hidden="">
                      
                    <table id="example4" class="table table-bordered table-responsive">
                    <thead>
                    <tr>
                      <th>User</th>
                      <th>Pelatihan</th>
                      <th>Nama Pelatihan</th>
                      <th>Waktu pelatihan</th>
                      <th>Lokasi</th>
                      <th>Narasumber/pemateri</th>
                      <th>Asal Pemateri / narasumber</th>
                      <th>Jumlah Peserta</th>
                      <th>Log Pelatihan Tanggal</th>
                    </tr>
                    </thead>
                    <tbody>
                      
                      <?php foreach ($download as $key): ?>            
                        <tr>
                          <td><?php echo $key['user_name'] ?></td>
                          <td><?= ($key['log_pelatihan_pelatihan'] == 'lainya')? $key['log_pelatihan_pelatihan_lainya'] : $key['log_pelatihan_pelatihan'] ?></td>
                          <td><?php echo $key['log_pelatihan_nama'] ?></td>
                          <td><?php echo $key['log_pelatihan_waktu'] ?></td>
                          <td><?php echo $key['log_pelatihan_lokasi'] ?></td>
                          <td><?php echo implode(', ', json_decode($key['log_pelatihan_narasumber'],true)); ?></td>
                          <td><?php echo implode(', ', json_decode($key['log_pelatihan_narasumber_asal'],true)); ?></td>
                          <td><?php echo $key['log_pelatihan_jumlah'] ?></td>
                          <td><?php echo $key['log_pelatihan_tanggal'] ?></td>
                        </tr>
                      <?php endforeach ?>

                  </table>

                </div>
              
              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


</div>
<!-- /.content-wrapper -->
  <footer class="main-footer">
   
    <strong>Copyright &copy; 2020-<?php echo date('Y'); ?> <?php echo $this->session->userdata('footer'); ?>.</strong> All rights
    reserved.
  </footer>



  <!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>adminLTE/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>adminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url() ?>adminLTE/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url() ?>adminLTE/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>adminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url() ?>adminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>adminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>adminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>adminLTE/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>adminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>adminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>adminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>adminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>adminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>adminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>adminLTE/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>adminLTE/dist/js/demo.js"></script>

<!-- ChartJS -->
<script src="<?php echo base_url() ?>adminLTE/bower_components/chart/Chart.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url() ?>adminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>adminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- FLOT CHARTS -->
<script src="<?php echo base_url() ?>adminLTE/bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?php echo base_url() ?>adminLTE/bower_components/Flot/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?php echo base_url() ?>adminLTE/bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?php echo base_url() ?>adminLTE/bower_components/Flot/jquery.flot.categories.js"></script>
<!-- Page script -->

<!-- Select2 -->
<script src="<?php echo base_url() ?>adminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>

<script src="<?php echo base_url() ?>adminLTE/bower_components/ckeditor/ckeditor.js"></script>

<!--button datatable-->
<script type="text/javascript" src="<?php echo base_url() ?>adminLTE/bower_components/button/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>adminLTE/bower_components/button/jszip.min.js"></script>

<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>adminLTE/bower_components/button/vfs_fonts.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>adminLTE/bower_components/button/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>adminLTE/bower_components/button/buttons.print.min.js"></script>


  <script type="text/javascript">

    var bar_data = {
      data : [
                <?php foreach ($peringkat as $key): ?>
                ['<?php echo $key['lokasi'] ?>', <?php echo $key['jumlah'] ?>],
                <?php endforeach ?>
             ],
      color: '#117A8B'
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#c1bdbd',
        tickColor  : '#c1bdbd'
      },
      series: {
        bars: {
          show    : true,
          barWidth: 0.5,
          align   : 'center'
        }
      },
      xaxis : {
        mode      : 'categories',
        tickLength: 0
      }
    })
    /* END BAR CHART */

    /*
     * DONUT CHART
     * -----------
     */

    var donutData = [

       <?php foreach ($peringkat as $key): ?>
      
      { label: '<?php echo $key['lokasi'] ?>', data: <?php echo $key['jumlah'] ?> },

      <?php endforeach ?>
    ]
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    })

    function labelFormatter(label, series) {
      return '<div style="font-size:12px; text-align:center; padding:2px;">'
        + label
        + '<br>'
        + Math.round(series.percent) + '%</div>'
    }

    /*
     * END DONUT CHART
     */
    

    <!--
    function showTime() {
        var a_p = "";
        var today = new Date();
        var curr_hour = today.getHours();
        var curr_minute = today.getMinutes();
        var curr_second = today.getSeconds();
        if (curr_hour < 12) {
            a_p = "AM";
        } else {
            a_p = "PM";
        }
        if (curr_hour == 0) {
            curr_hour = 12;
        }
        if (curr_hour > 12) {
            curr_hour = curr_hour - 12;
        }
        curr_hour = checkTime(curr_hour);
        curr_minute = checkTime(curr_minute);
        curr_second = checkTime(curr_second);
     document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
        }
 
    function checkTime(i) {
        if (i < 0) {
            i = "0" + i;
        }
        return i;
    }
    setInterval(showTime, 500);
    //-->
    </script>
 
    <!-- Menampilkan Hari, Bulan dan Tahun -->
    
    <script type='text/javascript'>

      var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
      var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
      var date = new Date();
      var day = date.getDate();
      var month = date.getMonth();
      var thisDay = date.getDay(),
          thisDay = myDays[thisDay];
      var yy = date.getYear();
      var year = (yy < 000) ? yy + 1900 : yy;
      document.getElementById('date').innerHTML=thisDay + ', ' + day + ' ' + months[month] + ' ' + year;

    //Date range picker
  $('.reservation').daterangepicker()

      //data table
    $(function () {

      //data table
      $('#example1').DataTable()

      //data table modal
       for (var i = 2; i < 5; i++) {
         $('#example'+i).DataTable({
            dom: 'Blfrtip',
             lengthMenu: [[10, 25, 50,100,200,300,400], [10, 25, 50,100,200,300,400]],
             buttons: [
                 'copy', 'excel', 'pdf', 'print'
             ],
             'lengthChange': false,
             'autoWidth'   : false,
             'scrollX'     : true
          })
       }

    })


    //download
    function download(type,i){

      var val = $('#filter'+i).val();

       $.ajax({
         url: '<?php echo base_url('dashboard/get_date/') ?>',
         type: 'POST',
         dataType: 'json',
         data: {val: val,type: type},
       })
       .done(function(data) {

          if (data == '') {
            alert('Data kosong !!');
          }else{
            
            var whatsSelected = [];
             $.each(data, function (index) {
                 whatsSelected.push('(?=.*' + data[index].tanggal + ')');
             });

             if ($('#example'+i).DataTable().search(whatsSelected.join('|'), true, false, true).draw()) {

                $('#example'+i+'_wrapper > div.dt-buttons > button.dt-button.buttons-excel.buttons-html5').click();
             }
          }
       
       });
    }

    </script>