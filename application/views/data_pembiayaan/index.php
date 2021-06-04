
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
 
      <!-- Default box --> 
      <div class="box"> 
        <div class="box-header with-border">

          <form action="" method="POST" style="display: grid;">
            <div class="form-group" style="margin-bottom: 0px;">
              <div class="row">
                <div class="col-md-3 col-xs-10">
                  <input placeholder="Filter Bulan" autocomplete="off" required="" name="filter" type="text" class="form-control pull-right" id="reservation" value="">
                </div>
                <div class="col-md-3 col-xs-2 row">
                  <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </form>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
         
          <table id="example" class="table table-bordered">
                <thead>
                <tr>
                  <!-- <th>Rumah BUMN</th> -->
                  <th>SKM</th>
                  <th>SKC</th>
                  <th>Cabang</th>
                  <th>Kantor Wilayah</th>
                  <th>Nama Brand/Merk</th>
                  <th>Nama Usaha</th>
                  <th>Kategori</th>
                  <th>Jenis Usaha</th>
                  <th>Jenis Lain-lain</th>
                  <th>Provinsi</th>
                  <th>Delete</th>
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
                  <th>Deskripsi produk pembiayaan</th>
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

                <?php foreach ($data as $key): ?>
                                  
                  <tr>
                    <!-- <td><?php echo @$key['rumah_bumn_nama'] ?></td> -->
                    <td><?php echo @$key['skm_nama'] ?></td>
                    <td><?php echo @$key['skc_nama'] ?></td>
                    <td><?php echo @$key['rumah_bumn_cabang_nama'] ?></td>
                    <td><?php echo @$key['wilayah_baru_nama'] ?></td>
                    <td><?php echo @$key['pembiayaan_brand'] ?></td>
                    <td><?php echo @$key['pembiayaan_usaha'] ?></td>
                    <td><?php echo @$key['pembiayaan_kategori'] ?></td>
                    <td><?php echo @$key['pembiayaan_jenis'] ?></td>
                    <td><?php echo @$key['pembiayaan_jenis_lain'] ?></td>
                    <td><?php echo @$key['pembiayaan_provinsi_text'] ?></td>
                    <td style="width: 50px;">
                      <div>

                      <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalHapus<?php echo @$key['user_id'] ?>"><i class="fa fa-trash"></i></button>

                      </div>
                    </td>
                    <td><?php echo @$key['pembiayaan_kota_text'] ?></td>
                    <td><?php echo @$key['pembiayaan_kecamatan_text'] ?></td>
                    <td><?php echo @$key['pembiayaan_pos'] ?></td>
                    <td><?php echo @$key['pembiayaan_alamat'] ?></td>
                    <td><?php echo @$key['pembiayaan_pemilik'] ?></td>
                    <td><?php echo @$key['pembiayaan_no'] ?></td>
                    <td><?php echo @$key['pembiayaan_pic'] ?></td>
                    <td><?php echo @$key['pembiayaan_no_pic'] ?></td>
                    <td><?php echo @$key['pembiayaan_ig'] ?></td>
                    <td><?php echo @$key['pembiayaan_fb'] ?></td>
                    <td><?php echo @$key['pembiayaan_email'] ?></td>
                    <td><?php echo @$key['pembiayaan_shopee'] ?></td>
                    <td><?php echo @$key['pembiayaan_tokopedia'] ?></td>
                    <td><?php echo @$key['pembiayaan_lazada'] ?></td>
                    <td><?php echo @$key['pembiayaan_bukalapak'] ?></td>
                    <td><?php echo @$key['pembiayaan_jdid'] ?></td>
                    <td><?php echo @$key['pembiayaan_blibli'] ?></td>
                    <td><?php echo @$key['pembiayaan_padi'] ?></td>
                    <td><?php echo @$key['pembiayaan_website'] ?></td>
                    <td><?php echo @implode(', ', json_decode(@$key['pembiayaan_pameran_dalam'],true)); ?></td>
                    <td><?php echo @implode(', ', json_decode(@$key['pembiayaan_pameran_luar'],true)); ?></td>
                    <td><?php echo @implode(', ', json_decode(@$key['pembiayaan_penghargaan'],true)); ?></td>
                    <td><?php echo @implode(', ', json_decode(@$key['pembiayaan_deskripsi'],true)); ?></td>
                    <td><?php echo @$key['pembiayaan_berdiri'] ?></td>
                    <td><?php echo @$key['pembiayaan_skala'] ?></td>
                    <td><?php echo @$key['pembiayaan_karyawan'] ?></td>
                    <td><?php echo @$key['pembiayaan_omset'] ?></td>
                    <td><?php echo @$key['pembiayaan_jenis_biaya_bni'] ?></td>
                    <td><?php echo @$key['pembiayaan_kredit'] ?></td>
                    
                    <td>
                        
                        <?php if (@$key['pembiayaan_produk']): ?>
                           <?php foreach (json_decode(@$key['pembiayaan_produk'],true) as $i): ?>
                            <a href="<?php echo base_url('asset/gambar/pembiayaan/'.$i) ?>" target="_BLANK"><img src="<?php echo base_url('asset/gambar/pembiayaan/'.$i) ?>" alt="" class="img-thumbnail" width="100"></a>
                           <?php endforeach ?>
                        <?php endif ?>

                    </td>
                    <td><a href="<?php echo base_url('asset/gambar/pembiayaan/'.@$key['pembiayaan_logo']) ?>" target="_BLANK"><img src="<?php echo base_url('asset/gambar/pembiayaan/'.@$key['pembiayaan_logo']) ?>" alt="" class="img-thumbnail" width="100"></a></td>

                    <td><?php echo @$key['pembiayaan_bpom'] ?></td>
                    <td><?php echo @implode(', ', json_decode(@$key['pembiayaan_izinusaha'],true)); ?></td>
                    <td><?php echo @$key['pembiayaan_tanggal'] ?></td>
                  </tr>

                   <!--modal hapus-->
                      <div class="modal fade" id="modalHapus<?php echo @$key['user_id'] ?>">
                        <div class="modal-dialog" align="center">
                          <div class="modal-content" style="max-width: 300px;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4>Confirmed ?</h4>
                              </div>
                            <div class="modal-body" align="center">
                               <a href="<?php echo base_url() ?>data_pembiayaan/delete/<?php echo @$key['user_id'] ?>"><button class="btn btn-success" style="width: 49%;">Yes</button></a>
                               <button class="btn btn-danger" data-dismiss="modal" style="width: 49%;">No</button>
                            </div>
                          </div>
                        </div>
                       </div> 


                  
                <?php endforeach ?>

                </tfoot>
              </table>

        </div>

        
      </div>
      <!-- /.box -->


<script type="text/javascript">
  $(document).ready(function (){
    var table = $('#example').DataTable({
        'responsive': true,
        dom: 'Blfrtip',
       lengthMenu: [[10, 25, 50,100,200,300,400], [10, 25, 50,100,200,300,400]],
       buttons: [
           'copy', 'excel', 'pdf', 'print'
       ],
       'lengthChange': false,
       'autoWidth'   : false,
    });
})

</script>