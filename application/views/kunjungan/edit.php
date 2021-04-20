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

	 <div class="box">
	    <div class="box-header with-border">

    	<div align="left">
          <a href="<?php echo base_url('log_kunjungan') ?>"><button class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> Back</button></a>
        </div>

	      <div class="box-tools pull-right">
	        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	        </button>
	        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	      </div>
	    </div>
	    <div class="box-body">
		    
		    <form role="form" method="POST" action="<?php echo base_url('log_kunjungan/save_update/'.$data['log_kunjungan_id']) ?>" enctype="multipart/form-data">
		        <div class="panel panel-primary setup-content" id="step-1">
		            <div class="panel-body">

		            	<div class="form-group">
		            		<label>Kunjungan UMKM</label>
		            		<div class="input-group date">
			                  <div class="input-group-addon">
			                    <i class="fa fa-calendar"></i>
			                  </div>
			                  <input required="" name="log_kunjungan_kunjungan" type="text" class="form-control pull-right" id="datepicker" value="<?php @$d = date_create(@$data['log_kunjungan_kunjungan']); echo date_format($d, 'm/d/Y'); ?>">
			                </div>
		            	</div>

		                <div class="form-group">
		                   <label>Nama UMKM</label>
		                   <input required="" type="text" name="log_kunjungan_nama" class="form-control" value="<?php echo @$data['log_kunjungan_nama'] ?>"> 
		                </div>

		                <div class="form-group">
		                   <label>Kategori Usaha</label>
		                   <input required="" type="text" name="log_kunjungan_kategori" class="form-control" value="<?php echo @$data['log_kunjungan_kategori'] ?>"> 
		                </div>

		                <div class="form-group">
		                   <label>Lokasi Tempat</label>
		                   <input required="" type="text" name="log_kunjungan_lokasi" class="form-control" value="<?php echo @$data['log_kunjungan_lokasi'] ?>"> 
		                </div>

		                 <div class="form-group">
		                   <label>Laporan Hasil Kunjungan</label>
		                   <textarea style="height: 85px;" name="log_kunjungan_laporan" class="form-control" placeholder="Deskripsi"><?php echo @$data['log_kunjungan_laporan'] ?></textarea>
		                </div>

		                <div class="form-group">
		                   <label>Dokumentasi</label>
		                   <div class="input-group" style="margin-top: 1%;">
	                    		<input type="file" class="form-control" name="log_kunjungan_dokumentasi[]" value="">
								<span class="input-group-addon" style="background-color: #efefef;">
								<button style="border: none; outline:none;" type="button" onclick="add_input('dokumentasi_copy','dokumentasi_tampil')"><i class="fa fa-plus"></i></button>
								</span>
							</div>

		                <!--clone element-->
							<div hidden="" id="dokumentasi_copy">
								<div class="input-group" style="margin-top: 1%;">
		                    		<input type="file" class="form-control" name="log_kunjungan_dokumentasi[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button onclick="remove_input(this,'input-group')" style="border: none; outline:none;" type="button"><i class="fa fa-minus"></i></button></span>
								</div>
							</div>

						<!--tampil-->
							<div id="dokumentasi_tampil">
								
							</div>

							<div class="row">
							<br/>
		                    <?php if (@$data['log_kunjungan_dokumentasi']): ?>
		                    	<?php $i = 1; ?>
		                    	 <?php foreach (json_decode($data['log_kunjungan_dokumentasi']) as $key): ?>
		                    	 	<div class="col-md-2 col-xs-6" style="margin-top: 1%;">
			                    	 	<img src="<?php echo base_url('asset/gambar/bumn/kunjungan/'.$key) ?>" alt="" class="img-thumbnail" width="200">
			                    	 	<button data-toggle="modal" data-target="#modal_hapus<?php echo $i ?>" class="btn btn-danger btn-xs" style="position: absolute; border-radius: 100%; margin-left: -20px;" type="button"><i class="fa fa-times"></i></button>
			                    	 </div>


			                    	 <div class="modal fade" id="modal_hapus<?php echo $i ?>">
							          <div class="modal-dialog" align="center">
							            <div class="modal-content" style="max-width: 300px;">
							              
							              <div class="modal-header">
			                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                                  <span aria-hidden="true">&times;</span></button>
			                                <h4>Confirmed ?</h4>
			                              </div>
			                            <div class="modal-body" align="center">
			                               <a href="<?php echo base_url('log_kunjungan/delete_image/'.$data['log_kunjungan_id'].'/'.$key) ?>"><button class="btn btn-success" type="button" style="width: 49%;">Yes</button></a>
			                               <button class="btn btn-danger" data-dismiss="modal" style="width: 49%;">No</button>
			                            </div>

							            </div>
							          </div>
							        </div>

							      <?php $i++ ?>
		                    	 <?php endforeach ?>
		                    <?php endif ?>

		                	</div>
							
						</div>
		                
		                <button class="btn btn-success pull-right" type="submit">Save <i class="fa fa-check"></i></button>
		            </div>
		        </div>
		    </form>

	    </div>
	    <!-- /.box-body -->
	  </div>

<script type="text/javascript">
	//add input
	function add_input(id,target){

		var html = $('#'+id).children().clone(true,true);


	    $('#'+target).append(html);
	}

	//remove input
	function remove_input(id,target){
		$(id).parents('.'+target).remove();
	}
</script>