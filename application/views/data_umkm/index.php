
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
                  <th>Rumah BUMN</th>
                  <th>SKC</th>
                  <th>Nama Brand/Merk</th>
                  <th>Nama Usaha</th>
                  <th>Jenisi Usaha</th>
                  <th>Jenis Lain-lain</th>
                  <th>Provinsi</th>
                  <th>Kab/Kota</th>
                  <th>Kode Pos</th>
                  <th>Alamat lengkap</th>
                  <th>Nama Pemilik </th>
                  <th>No Tlp/Hp pemilik</th>
                  <th>Nama PIC selain pemilik</th>
                  <th>No Tlp/HP PIC</th>
                  <th>Nama IG Usaha</th>
                  <th>Nama FB Usaha</th>
                  <th>Alamat Email</th>
                  <th>Shopee</th>
                  <th>Tokopedia</th>
                  <th>Lazada</th>
                  <th>Bukalapak</th>
                  <th>JD.ID</th>
                  <th>Nama Website</th>
                  <th>Pameran yang pernah di ikuti di dalam negeri</th>
                  <th>Pameran yang pernah di ikuti di luar negeri :</th>
                  <th>Penghargaan yang pernah di terima </th>
                  <th>Ceritakan mengenai Brand Anda</th>
                  <th>Berdiri sejak tahun</th>
                  <th>Skala Usaha</th>
                  <th>Jumlah Karyawan</th>
                  <th>Omset rata-rata per bulan :</th>
                  <th>Jenis pembiayaan BNI</th>
                  <th>Nilai Kredit</th>
                  <th>Foto Produk</th>
                  <th>Deskripsi Foto</th>
                  <th>Izin BPOM</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($data as $key): ?>
                                  
                  <tr>
                    <td><?php echo $key['umkm_rumah'] ?></td>
                    <td><?php echo $key['umkm_skc'] ?></td>
                    <td><?php echo $key['umkm_brand'] ?></td>
                    <td><?php echo $key['umkm_usaha'] ?></td>
                    <td><?php echo $key['umkm_jenis'] ?></td>
                    <td><?php echo $key['umkm_jenis_lain'] ?></td>
                    <td><?php echo $key['umkm_provinsi'] ?></td>
                    <td><?php echo $key['umkm_kota'] ?></td>
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
                    <td><?php echo $key['umkm_website'] ?></td>
                    <td><?php echo $key['umkm_pameran_dalam'] ?></td>
                    <td><?php echo $key['umkm_pameran_luar'] ?></td>
                    <td><?php echo $key['umkm_penghargaan'] ?></td>
                    <td><?php echo $key['umkm_cerita'] ?></td>
                    <td><?php echo $key['umkm_berdiri'] ?></td>
                    <td><?php echo $key['umkm_skala'] ?></td>
                    <td><?php echo $key['umkm_karyawan'] ?></td>
                    <td><?php echo $key['umkm_omset'] ?></td>
                    <td><?php echo $key['umkm_jenis_biaya_bni'] ?></td>
                    <td><?php echo $key['umkm_kredit'] ?></td>
                    <td><a href="<?php echo base_url('asset/gambar/umkm/'.$key['umkm_produk']) ?>" taget="_BLANK"><img width="100" src="<?php echo base_url('asset/gambar/umkm/'.$key['umkm_produk']) ?>"></a></td>
                    <td><?php echo $key['umkm_produk_deskripsi'] ?></td>
                    <td><?php echo $key['umkm_bpom'] ?></td>
                    <td style="width: 50px;">
                      <div>

                      <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalHapus<?php echo $key['user_id'] ?>"><i class="fa fa-trash"></i></button>

                      </div>
                    </td>
                  </tr>

                   <!--modal hapus-->
                      <div class="modal fade" id="modalHapus<?php echo $key['user_id'] ?>">
                        <div class="modal-dialog" align="center">
                          <div class="modal-content" style="max-width: 300px;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4>Confirmed ?</h4>
                              </div>
                            <div class="modal-body" align="center">
                               <a href="<?php echo base_url() ?>data_umkm/delete/<?php echo $key['user_id'] ?>"><button class="btn btn-success" style="width: 49%;">Yes</button></a>
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