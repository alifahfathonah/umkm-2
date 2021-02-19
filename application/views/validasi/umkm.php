
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
          
          <table id="example1" class="table table-bordered table-responsive">
            <thead>
              <tr>
                <td>No</td>
                <td>Username</td>
                <td>Validasi</td>
                <td>Tanggal</td>
                <td width="110">Aksi</td>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
                <?php foreach ($data as $key): ?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $key['user_name'] ?></td>
                    <td><?=($key['user_status'] == 1)?'<small><span style="background-color: #008D4C; color: white; padding: 1.5%; border-radius: 15px;">Sudah</span></small>':'<small><span style="background-color: #D73925; color: white; padding: 1.5%; border-radius: 15px;">Belum</span></small>' ?></td>
                    <td><?php echo $key['user_tanggal'] ?></td>
                    <td width="110">
                      <a href="<?php echo base_url('validasi/konfirm/'.$key['user_id'].'/1') ?>"><button class="btn btn-xs btn-success" type="button">Validasi <i class="fa fa-check"></i></button></a>
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
                         <a href="<?php echo base_url('validasi/delete/'.$key['user_id'].'/1') ?>"><button class="btn btn-success" style="width: 49%;">Yes</button></a>
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

  


    
      