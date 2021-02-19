
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
         <br/>

          <form method="post" action="<?php echo base_url('setting/update') ?>" class="form-horizontal" enctype="multipart/form-data">
            <div class="form-group">
              <div class="col-sm-offset-1 col-sm-11">
                <img src="<?php echo base_url('asset/gambar/setting/').@$data['setting_logo'] ?>" alt="" width="300" class="img-thumbnail">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-1 control-label">Logo</label>
              <div class="col-sm-11">
               <input type="file" class="form-control" name="setting_logo" accept="image/*">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-1 control-label">Footer</label>

              <div class="col-sm-11">
                <input type="text" name="setting_footer" class="form-control" value="<?php echo @$data['setting_footer'] ?>">
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-sm-offset-1 col-sm-11">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
              </div>
            </div>
          </form>

        </div>

        
      </div>
      <!-- /.box -->


       

  


    
      