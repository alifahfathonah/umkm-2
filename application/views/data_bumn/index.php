
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
         
          <table id="example" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nama Rumah BUMN</th>
                  <th>Berdiri sejak </th>
                  <th>Status Gedung Rumah BUMN</th>
                  <th>Foto gedung Rumah BUMN</th>
                  <th>Nama pengelolah Rumah BUMN</th>
                  <th>No Telepon/HP</th>
                  <th>Kantor Cabang pengelolah</th>
                  <th>Nama PIC Kantor Cabang</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($data as $key): ?>
                                  
                  <tr>
                    <td><?php echo $key['bumn_rumah'] ?></td>
                    <td><?php echo $key['bumn_berdiri'] ?></td>
                    <td><?php echo $key['bumn_status'] ?></td>
                    <td><a target="_BLANK" href="<?php echo base_url('asset/gambar/bumn/'.$key['bumn_foto']) ?>"><img width="50" src="<?php echo base_url('asset/gambar/bumn/'.$key['bumn_foto']) ?>"></a></td>
                    <td><?php echo $key['bumn_pengelola'] ?></td>
                    <td><?php echo $key['bumn_no'] ?></td>
                    <td><?php echo $key['bumn_cabang'] ?></td>
                    <td><?php echo $key['bumn_pic'] ?></td>
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

  


    
      