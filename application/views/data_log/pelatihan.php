
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
                  <input placeholder="Filter Bulan" autocomplete="off" required="" name="filter" type="text" class="form-control pull-right" id="monthpicker" value="">
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
         
          <table id="example" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>User</th>
                  <th>Pelatihan</th>
                  <th>Nama Pelatihan</th>
                  <th>Waktu pelatihan</th>
                  <th>Lokasi</th>
                  <th>Narasumber/pemateri</th>
                  <th>Jumlah Peserta</th>
                  <th>Dokumentasi</th>
                  <th width="1">Delete</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($data as $key): ?>
                                  
                  <tr>
                    <td><?php echo $key['user_name'] ?></td>
                    <td><?= ($key['log_pelatihan_pelatihan'] == 'lainya')? $key['log_pelatihan_pelatihan_lainya'] : $key['log_pelatihan_pelatihan'] ?></td>
                    <td><?php echo $key['log_pelatihan_nama'] ?></td>
                    <td><?php echo $key['log_pelatihan_waktu'] ?></td>
                    <td><?php echo $key['log_pelatihan_lokasi'] ?></td>
                    <td><?php echo $key['log_pelatihan_narasumber'] ?></td>
                    <td><?php echo $key['log_pelatihan_jumlah'] ?></td>
                    <td>
                      <button data-toggle="modal" data-target="#view_image<?php echo $key['log_pelatihan_id'] ?>">View Image</button>
                    </td>
                    <td width="1">
                      <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalHapus<?php echo $key['log_pelatihan_id'] ?>"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>

                   <!--modal hapus-->
                    <div class="modal fade" id="modalHapus<?php echo $key['log_pelatihan_id'] ?>">
                      <div class="modal-dialog" align="center">
                        <div class="modal-content" style="max-width: 300px;">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4>Confirmed ?</h4>
                            </div>
                          <div class="modal-body" align="center">
                             <a href="<?php echo base_url() ?>data_log/delete_pelatihan/<?php echo $key['log_pelatihan_id'] ?>"><button class="btn btn-success" style="width: 49%;">Yes</button></a>
                             <button class="btn btn-danger" data-dismiss="modal" style="width: 49%;">No</button>
                          </div>
                        </div>
                      </div>
                     </div> 


                     <!--view image-->
                    <div class="modal fade" id="view_image<?php echo $key['log_pelatihan_id'] ?>">
                      <div class="modal-dialog" align="center">
                        <div class="modal-content">
                          <div class="modal-body" align="center">
                             
                            <div class="row">
                              <?php if (@$key['log_pelatihan_dokumentasi']): ?>
                                <?php foreach (json_decode($key['log_pelatihan_dokumentasi']) as $i): ?>

                                  <div class="col-md-3 col-xs-6" style="margin-top: 1%;">
                                    <a href="<?php echo base_url('asset/gambar/bumn/pelatihan/'.$i) ?>" target="_BLANK"><img src="<?php echo base_url('asset/gambar/bumn/pelatihan/'.$i) ?>" alt="" class="img-thumbnail" width="200"></a>
                                  </div>

                                <?php endforeach ?>
                              <?php endif ?>
                            </div>

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