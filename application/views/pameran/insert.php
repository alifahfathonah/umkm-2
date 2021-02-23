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
	        <a href="<?php echo base_url('log_pameran') ?>"><button class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> Back</button></a>
	      </div>

	      <div class="box-tools pull-right">
	        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	        </button>
	        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	      </div>
	    </div>
	    <div class="box-body">
		    
		    <form role="form" method="POST" action="<?php echo base_url('log_pameran/save_insert') ?>" enctype="multipart/form-data">
		        <div class="panel panel-primary setup-content" id="step-1">
		            <div class="panel-body">

		            	<div class="form-group">
		                   <label>Nama Pameran</label>
		                   <input required="" type="text" name="log_pameran_nama" class="form-control" value=""> 
		                </div>

		            	<div class="form-group">
		            		<label>Waktu Kegiatan pameran</label>
		            		<div class="input-group date">
			                  <div class="input-group-addon">
			                    <i class="fa fa-calendar"></i>
			                  </div>
			                  <input required="" name="log_pameran_waktu" type="text" class="form-control pull-right" id="datepicker" value="">
			                </div>
		            	</div>

		                <div class="form-group">
		                   <label>Lokasi/tempat pameran</label>
		                   <input required="" type="text" name="log_pameran_lokasi" class="form-control" value=""> 
		                </div>

		                <div class="form-group">
		                   <label>Nama Penyelenggara/panitia pameran</label>
		                   <input required="" type="text" name="log_pameran_penyelenggara" class="form-control" value=""> 
		                </div>

		                <div class="form-group">
		                   <label>Jumlah Peserta (UMKM) yang ikut pameran</label>
		                   <input required="" type="number" name="log_pameran_peserta" class="form-control" value=""> 
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Deskripsi produk peserta pameran</label>

		                    <?php if (@$data['log_pameran_produk']): ?>

								<?php $i = 0; ?>
								<?php foreach (json_decode($data['log_pameran_produk']) as $key): ?>

									<div class="input-group" style="margin-top: 1%;">
			                    		<input type="text" class="form-control" name="log_pameran_produk[]" value="<?php echo $key ?>">
										<span class="input-group-addon" style="background-color: #efefef;">

											<?php if ($i < 1): ?>
												<button style="border: none; outline:none;" type="button" onclick="add_input('log_pameran_produk_copy','log_pameran_produk_tampil')"><i class="fa fa-plus"></i></button>
											<?php else: ?>	
												<button style="border: none; outline:none;" type="button" <button onclick="remove_input(this,'input-group')" style="border: none; outline:none;"><i class="fa fa-minus"></i></button>
											<?php endif ?>

										</span>
									</div>
								
								<?php $i++; ?>
								<?php endforeach ?>
							
							<?php else: ?>
								
								<div class="input-group">
		                    		<input type="text" class="form-control" name="log_pameran_produk[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button style="border: none; outline:none;" type="button" onclick="add_input('log_pameran_produk_copy','log_pameran_produk_tampil')"><i class="fa fa-plus"></i></button></span>
								</div>

							<?php endif ?>

							<!--clone element-->
							<div hidden="" id="log_pameran_produk_copy">
								<div class="input-group" style="margin-top: 1%;">
		                    		<input  type="text" class="form-control" name="log_pameran_produk[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button onclick="remove_input(this,'input-group')" style="border: none; outline:none;" type="button"><i class="fa fa-minus"></i></button></span>
								</div>
							</div>

							<!--tampil-->
							<div id="log_pameran_produk_tampil">
								
							</div>
		                </div>

		                <div class="form-group">
		                   <label>Dokumentasi</label>
		                   <div class="input-group" style="margin-top: 1%;">
	                    		<input type="file" class="form-control" name="log_pameran_dokumentasi[]" value="">
								<span class="input-group-addon" style="background-color: #efefef;">
								<button style="border: none; outline:none;" type="button" onclick="add_input('dokumentasi_copy','dokumentasi_tampil')"><i class="fa fa-plus"></i></button>
								</span>
							</div>

		                <!--clone element-->
							<div hidden="" id="dokumentasi_copy">
								<div class="input-group" style="margin-top: 1%;">
		                    		<input type="file" class="form-control" name="log_pameran_dokumentasi[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button onclick="remove_input(this,'input-group')" style="border: none; outline:none;" type="button"><i class="fa fa-minus"></i></button></span>
								</div>
							</div>

						<!--tampil-->
							<div id="dokumentasi_tampil">
								
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
	//log_pelatihan_pelatihan_lainya
	$('#log_pelatihan_pelatihan').on('change', function (e) {
	    if ($(this).val() == 'lainya') {
	    	$('#log_pelatihan_pelatihan_lainya').attr('type','text');
	    }else{
	    	$('#log_pelatihan_pelatihan_lainya').attr('type','hidden');
	    }
	});

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