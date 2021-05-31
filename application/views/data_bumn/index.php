
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
         
          <table id="example" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nama Rumah BUMN</th> 
                  <th>Kantor Wilayah</th>
                  <th>Kantor Cabang Pengelola</th>
                  <th>Berdiri sejak </th>
                  <th>Status Gedung Rumah BUMN</th>
                  <th>Foto gedung Rumah BUMN</th>
                  <th>Nama pengelolah Rumah BUMN</th>
                  <th>No Telepon/HP</th>
                  <th>Nama PIC Kantor Cabang</th>
                  <th>Delete</th>
                  <th>Tanggal Input</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($data as $key): ?>
                                  
                  <tr>
                    <td><?php echo $key['rumah_bumn_nama'] ?></td> 
                    <td><?php echo $key['wilayah_baru_nama'] ?></td>
                    <td><?php echo $key['rumah_bumn_cabang_nama'] ?></td>
                    <td><?php echo $key['bumn_berdiri'] ?></td>
                    <td><?= ( $key['bumn_status'] == 'milik dinas')? $key['bumn_status'].' ( '.$key['bumn_status_dinas'].' )' : $key['bumn_status'] ?></td>
                    <td>
                      
                      <?php if (@$key['bumn_foto']): ?>
                         <?php foreach (json_decode($key['bumn_foto'],true) as $i): ?>
                          <a href="<?php echo base_url('asset/gambar/bumn/'.$i) ?>" target="_BLANK"><img src="<?php echo base_url('asset/gambar/bumn/'.$i) ?>" alt="" class="img-thumbnail" width="40"></a>
                         <?php endforeach ?>
                      <?php endif ?>

                    </td>
                    <td><?php echo @implode(', ', json_decode($key['bumn_pengelola'],true)); ?></td>
                    <td><?php echo @implode(', ', json_decode($key['bumn_no'],true)); ?></td>
                    <td><?php echo @implode(', ', json_decode($key['bumn_pic'],true)); ?></td>
                    <td style="width: 50px;">
                      <div>

                      <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalHapus<?php echo $key['user_id'] ?>"><i class="fa fa-trash"></i></button>

                      </div>
                    </td>
                    <td><?php echo $key['bumn_tanggal'] ?></td>
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
                               <a href="<?php echo base_url() ?>data_bumn/delete/<?php echo $key['user_id'] ?>"><button class="btn btn-success" style="width: 49%;">Yes</button></a>
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

  


    
      