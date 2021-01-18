
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

            <div align="left">
              <button class="btn btn-success" data-toggle="modal" data-target="#modal-album"><i class="fa fa-plus"></i> Tambah Data</button>
            </div>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
         
          <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Whatsapp</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Produk</th>
                  <th>Jumlah</th>
                  <th>Total</th>
                  <th>Keterangan</th>
                  <th>Tanggal</th>
                  <th>Tempat</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($data as $key): ?>
                                  
                  <tr>
                    <td><?php echo $key['konsumen_nama'] ?></td>
                    <td><?php echo $key['konsumen_wa'] ?></td> 
                    <td><?php echo $key['konsumen_email'] ?></td>
                    <td><?php echo $key['konsumen_alamat'] ?></td>
                    <td><?php echo $key['konsumen_produk'] ?></td>
                    <td><?php echo $key['konsumen_jumlah'] ?></td>
                    <td><?php echo $key['konsumen_total'] ?></td>
                    <td><?php echo $key['konsumen_keterangan'] ?></td>
                    <td><?php echo $key['konsumen_tanggal'] ?></td>
                    <td><?php echo $key['konsumen_tempat'] ?></td>
                    <td style="width: 50px;">
                      <div>
                      <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-edit<?php echo $key['konsumen_id'] ?>"><i class="fa fa-edit"></i></button>
                      <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalHapus<?php echo $key['konsumen_id'] ?>"><i class="fa fa-trash"></i></button>

                      </div>
                    </td>
                  </tr>

                   <!--modal hapus-->
                      <div class="modal fade" id="modalHapus<?php echo $key['konsumen_id'] ?>">
                        <div class="modal-dialog" align="center">
                          <div class="modal-content" style="max-width: 300px;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4>Confirmed ?</h4>
                              </div>
                            <div class="modal-body" align="center">
                               <a href="<?php echo base_url() ?>konsumen/delete/<?php echo $key['konsumen_id'] ?>"><button class="btn btn-success" style="width: 49%;">Yes</button></a>
                               <button class="btn btn-danger" data-dismiss="modal" style="width: 49%;">No</button>
                            </div>
                          </div>
                        </div>
                       </div> 


                  <div class="modal fade" id="modal-edit<?php echo $key['konsumen_id'] ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Edit Data</h4>
                        </div>
                        <div class="modal-body">
                          <form role="form" method="post" action="<?php echo base_url() ?>konsumen/update/<?php echo $key['konsumen_id'] ?>" enctype="multipart/form-data">
                            <div class="box-body">
                              <div class="form-group">
                            <label>Nama</label>
                            <input required="" type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $key['konsumen_nama'] ?>">
                          </div>

                          <div class="form-group">
                            <label>No Whatsapp</label>
                            <input required="" type="number" name="wa" class="form-control" placeholder="Wa" value="<?php echo $key['konsumen_wa'] ?>">
                          </div>

                          <div class="form-group">
                            <label>Email</label>
                            <input required="" type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $key['konsumen_email'] ?>">
                          </div>

                          <div class="form-group">
                            <label>Alamat</label>
                            <input required="" type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $key['konsumen_alamat'] ?>">
                          </div>

                          <div class="form-group">
                            <label>Produk</label>
                            <input required="" type="text" name="produk" class="form-control" placeholder="Produk Yang Di Beli" value="<?php echo $key['konsumen_produk'] ?>">
                          </div>

                          <div class="form-group">
                            <label>Jumlah</label>
                            <input required="" type="number" name="jumlah" class="form-control" placeholder="Jumlah Yang Di Beli" value="<?php echo $key['konsumen_jumlah'] ?>">
                          </div>

                          <div class="form-group">
                            <label>Total</label>
                            <input required="" type="number" name="total" class="form-control" placeholder="Total" value="<?php echo $key['konsumen_total'] ?>">
                          </div>

                          <div class="form-group">
                            <label>Keterangan</label>
                            <input required="" type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="<?php echo $key['konsumen_keterangan'] ?>">
                          </div>

                          <div class="form-group">
                            <label>Tanggal</label>
                            <input required="" type="date" name="tanggal" class="form-control" placeholder="Tanggal" value="<?php echo $key['konsumen_tanggal'] ?>">
                          </div>

                          <div class="form-group">
                            <label>Tempat</label>
                            <input required="" type="text" name="tempat" class="form-control" placeholder="Tempat Pembelian" value="<?php echo $key['konsumen_tempat'] ?>">
                          </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                               <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                          </form>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                <?php endforeach ?>

                </tfoot>
              </table>

        </div>

        
      </div>
      <!-- /.box -->


  <div class="modal fade" id="modal-album">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data</h4>
              </div>
              <div class="modal-body">
                <form role="form" method="post" action="<?php echo base_url() ?>konsumen/add" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label>Nama</label>
                      <input required="" type="text" name="nama" class="form-control" placeholder="Nama">
                    </div>

                    <div class="form-group">
                      <label>No Whatsapp</label>
                      <input required="" type="number" name="wa" class="form-control" placeholder="Wa">
                    </div>

                    <div class="form-group">
                      <label>Email</label>
                      <input required="" type="text" name="email" class="form-control" placeholder="Email">
                    </div>

                    <div class="form-group">
                      <label>Alamat</label>
                      <input required="" type="text" name="alamat" class="form-control" placeholder="Alamat">
                    </div>

                    <div class="form-group">
                      <label>Produk</label>
                      <input required="" type="text" name="produk" class="form-control" placeholder="Produk Yang Di Beli">
                    </div>

                    <div class="form-group">
                      <label>Jumlah</label>
                      <input required="" type="number" name="jumlah" class="form-control" placeholder="Jumlah Yang Di Beli">
                    </div>

                    <div class="form-group">
                      <label>Total</label>
                      <input required="" type="number" name="total" class="form-control" placeholder="Total">
                    </div>

                    <div class="form-group">
                      <label>Keterangan</label>
                      <input required="" type="text" name="keterangan" class="form-control" placeholder="Keterangan">
                    </div>

                    <div class="form-group">
                      <label>Tanggal</label>
                      <input required="" type="date" name="tanggal" class="form-control" placeholder="Tanggal">
                    </div>

                    <div class="form-group">
                      <label>Tempat</label>
                      <input required="" type="text" name="tempat" class="form-control" placeholder="Tempat Pembelian">
                    </div>

                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                     <button type="reset" class="btn btn-danger">Reset</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


       

  


    
      