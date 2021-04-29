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
	      <h3 class="box-title"><?php echo $title ?></h3>

	      <div class="box-tools pull-right">
	        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	        </button>
	        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	      </div>
	    </div>
	    <div class="box-body">
	      
	       <div class="stepwizard">
		        <div class="stepwizard-row setup-panel">
		            <div class="stepwizard-step col-xs-6"> 
		                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
		                <p><small>Step 1</small></p>
		            </div>
		            <div class="stepwizard-step col-xs-6"> 
		                <a href="#step-2" type="button" class="btn btn-default btn-circle" >2</a>
		                <p><small>Step 2</small></p>
		            </div>
		        </div>
		    </div>
		    
		    <form role="form" method="POST" action="<?php echo base_url('bumn/save') ?>" enctype="multipart/form-data">
		        <div class="panel panel-primary setup-content" id="step-1">
		            <div class="panel-body">
		                <div class="form-group">
		                    <label class="control-label">Nama Rumah BUMN</label>
		                    <select id="bumn_rumah" name="bumn_rumah" class="form-control">
		                    	<option value="" hidden="">-- Pilih --</option>
		                    	<?php foreach ($rumah_bumn as $key): ?>
		                    		<option value="<?php echo $key['rumah_bumn_id'] ?>"><?php echo $key['rumah_bumn_nama'] ?></option>
		                    	<?php endforeach ?>
		                    </select>
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Kantor Wilayah</label>
		                    <select id="bumn_kantor_wilayah" name="bumn_kantor_wilayah" class="form-control">
		                    	<option value="" hidden="">-- Pilih --</option>
		                    	<?php foreach ($wilayah as $key): ?>
		                    		<option value="<?php echo $key['wilayah_baru_kode'] ?>"><?php echo $key['wilayah_baru_nama'] ?></option>
		                    	<?php endforeach ?>
		                    </select>
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Kantor Cabang Pengelola</label>
		                    <select name="bumn_kantor_cabang" id="bumn_kantor_cabang" class="form-control">
		                    	<option value="" hidden="">-- Pilih --</option>
		                    	<?php foreach ($cabang as $key): ?>
		                    		<option value="<?php echo $key['rumah_bumn_cabang_id'] ?>"><?php echo $key['rumah_bumn_cabang_nama'] ?></option>
		                    	<?php endforeach ?>
		                    </select>
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Berdiri sejak</label>
		                    <input name="bumn_berdiri" type="text" value="<?php echo $data['bumn_berdiri'] ?>" class="form-control" placeholder="Sejak" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Status Gedung Rumah BUMN</label>
		                    <select id="bumn_status" onchange="status($(this).val())" class="form-control" name="bumn_status">
		                    	<option value="sewa">Sewa</option>
		                    	<option value="milik sendiri">Milik Sendiri</option>
		                    	<option value="milik dinas">Milik Dinas</option>
		                    </select>
		                    <br/>
							<input id="dinas" name="bumn_status_dinas" type="hidden" value="<?php echo $data['bumn_status_dinas'] ?>" class="form-control" placeholder="Dinas ......" />		                   

		                </div>
		                <div class="form-group">
		                    <label class="control-label">Foto gedung Rumah BUMN <small class="text-danger">* Maksimal 4 lebih dari 4 foto tidak akan di simpan</small></label>
		                    <div class="row">
		                    	<div class="col-md-3">
		                    		<input name="bumn_foto[]" type="file" value="" class="form-control" />
		                    	</div>
		                    	<div class="col-md-3">
		                    		<input name="bumn_foto[]" type="file" value="" class="form-control" />
		                    	</div>
		                    	<div class="col-md-3">
		                    		<input name="bumn_foto[]" type="file" value="" class="form-control" />
		                    	</div>
		                    	<div class="col-md-3">
		                    		<input name="bumn_foto[]" type="file" value="" class="form-control" />
		                    	</div>
		                    </div>
		                </div>

		                <div class="form-group">

		                	<div class="row">
		                
		                	<?php if (@$data['bumn_foto']): ?>
		                    	<?php $i = 1; ?>
		                    	 <?php foreach (json_decode($data['bumn_foto']) as $key): ?>
		                    	 	<div class="col-md-2 col-xs-6">
			                    	 	<img src="<?php echo base_url('asset/gambar/bumn/'.$key) ?>" alt="" class="img-thumbnail" width="200">
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
			                               <a href="<?php echo base_url('bumn/delete/'.$key) ?>"><button class="btn btn-success" type="button" style="width: 49%;">Yes</button></a>
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
		                
		                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
		            </div>
		        </div>
		        
		        <div class="panel panel-primary setup-content" id="step-2">
		            <div class="panel-body">

		                <div class="form-group">
		                    <label class="control-label">Nama pengelola Rumah BUMN</label>

							<?php if (@$data['bumn_pengelola']): ?>

								<?php $i = 0; ?>
								<?php foreach (json_decode(@$data['bumn_pengelola']) as $key): ?>

									<div class="input-group" style="margin-top: 1%;">
			                    		<input type="text" class="form-control" name="bumn_pengelola[]" value="<?php echo $key ?>">
										<span class="input-group-addon" style="background-color: #efefef;">

											<?php if ($i < 1): ?>
												<button style="border: none; outline:none;" type="button" onclick="add_input('bumn_pengelola_copy','bumn_pengelola_tampil')"><i class="fa fa-plus"></i></button>
											<?php else: ?>	
												<button style="border: none; outline:none;" type="button" <button onclick="remove_input(this,'input-group')" style="border: none; outline:none;"><i class="fa fa-minus"></i></button>
											<?php endif ?>

										</span>
									</div>
								
								<?php $i++; ?>
								<?php endforeach ?>
							
							<?php else: ?>
								
								<div class="input-group">
		                    		<input type="text" class="form-control" name="bumn_pengelola[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button style="border: none; outline:none;" type="button" onclick="add_input('bumn_pengelola_copy','bumn_pengelola_tampil')"><i class="fa fa-plus"></i></button></span>
								</div>

							<?php endif ?>

							<!--clone element-->
							<div hidden="" id="bumn_pengelola_copy">
								<div class="input-group" style="margin-top: 1%;">
		                    		<input type="text" class="form-control" name="bumn_pengelola[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button onclick="remove_input(this,'input-group')" style="border: none; outline:none;" type="button"><i class="fa fa-minus"></i></button></span>
								</div>
							</div>

							<!--tampil-->
							<div id="bumn_pengelola_tampil">
								
							</div>

		                </div>

		                <div class="form-group">
		                    <label class="control-label">No Telepon/HP</label>

							<?php if (@$data['bumn_no']): ?>

								<?php $i = 0; ?>
								<?php foreach (json_decode($data['bumn_no']) as $key): ?>

									<div class="input-group" style="margin-top: 1%;">
			                    		<input type="text" class="form-control" name="bumn_no[]" value="<?php echo $key ?>">
										<span class="input-group-addon" style="background-color: #efefef;">

											<?php if ($i < 1): ?>
												<button style="border: none; outline:none;" type="button" onclick="add_input('bumn_no_copy','bumn_no_tampil')"><i class="fa fa-plus"></i></button>
											<?php else: ?>	
												<button style="border: none; outline:none;" type="button" <button onclick="remove_input(this,'input-group')" style="border: none; outline:none;"><i class="fa fa-minus"></i></button>
											<?php endif ?>

										</span>
									</div>
								
								<?php $i++; ?>
								<?php endforeach ?>
							
							<?php else: ?>
								
								<div class="input-group">
		                    		<input type="text" class="form-control" name="bumn_no[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button style="border: none; outline:none;" type="button" onclick="add_input('bumn_no_copy','bumn_no_tampil')"><i class="fa fa-plus"></i></button></span>
								</div>

							<?php endif ?>

							<!--clone element-->
							<div hidden="" id="bumn_no_copy">
								<div class="input-group" style="margin-top: 1%;">
		                    		<input type="text" class="form-control" name="bumn_no[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button onclick="remove_input(this,'input-group')" style="border: none; outline:none;" type="button"><i class="fa fa-minus"></i></button></span>
								</div>
							</div>

							<!--tampil-->
							<div id="bumn_no_tampil">
								
							</div>

		                </div>

		                <div class="form-group">
		                    <label class="control-label">Nama PIC Kantor Cabang</label>

							<?php if (@$data['bumn_pic']): ?>

								<?php $i = 0; ?>
								<?php foreach (json_decode($data['bumn_pic']) as $key): ?>

									<div class="input-group" style="margin-top: 1%;">
			                    		<input type="text" class="form-control" name="bumn_pic[]" value="<?php echo $key ?>">
										<span class="input-group-addon" style="background-color: #efefef;">

											<?php if ($i < 1): ?>
												<button style="border: none; outline:none;" type="button" onclick="add_input('bumn_pic_copy','bumn_pic_tampil')"><i class="fa fa-plus"></i></button>
											<?php else: ?>	
												<button style="border: none; outline:none;" type="button" <button onclick="remove_input(this,'input-group')" style="border: none; outline:none;"><i class="fa fa-minus"></i></button>
											<?php endif ?>

										</span>
									</div>
								
								<?php $i++; ?>
								<?php endforeach ?>
							
							<?php else: ?>
								
								<div class="input-group">
		                    		<input type="text" class="form-control" name="bumn_pic[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button style="border: none; outline:none;" type="button" onclick="add_input('bumn_pic_copy','bumn_pic_tampil')"><i class="fa fa-plus"></i></button></span>
								</div>

							<?php endif ?>

							<!--clone element-->
							<div hidden="" id="bumn_pic_copy">
								<div class="input-group" style="margin-top: 1%;">
		                    		<input type="text" class="form-control" name="bumn_pic[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button onclick="remove_input(this,'input-group')" style="border: none; outline:none;" type="button"><i class="fa fa-minus"></i></button></span>
								</div>
							</div>

							<!--tampil-->
							<div id="bumn_pic_tampil">
								
							</div>

		                </div>
		                
		                <button class="btn btn-primary pull-right" type="submit">Finish!</button>
		            </div>
		        </div>

		    </form>

	    </div>
	    <!-- /.box-body -->
	  </div>

<script type="text/javascript">

	$(document).ready(function () {

	    var navListItems = $('div.setup-panel div a'),
	        allWells = $('.setup-content'),
	        allNextBtn = $('.nextBtn');

	    allWells.hide();

	    navListItems.click(function (e) {
	        e.preventDefault();
	        var $target = $($(this).attr('href')),
	            $item = $(this);

	        if (!$item.hasClass('disabled')) {
	            navListItems.removeClass('btn-primary').addClass('btn-default');
	            $item.addClass('btn-primary');
	            allWells.hide();
	            $target.show();
	            $target.find('input:eq(0)').focus();
	        }
	    });

	    allNextBtn.click(function () {
	        var curStep = $(this).closest(".setup-content"),
	            curStepBtn = curStep.attr("id"),
	            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
	            curInputs = curStep.find("input[type='text'],input[type='url']"),
	            isValid = true;

	        $(".form-group").removeClass("has-error");
	        for (var i = 0; i < curInputs.length; i++) {
	            if (!curInputs[i].validity.valid) {
	                isValid = false;
	                $(curInputs[i]).closest(".form-group").addClass("has-error");
	            }
	        }

	        if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
	    });

	    $('div.setup-panel div a.btn-primary').trigger('click');
	});

	function status(val){
		if (val == 'milik dinas') {
			$('#dinas').attr('type', 'text');
		}else{
			$('#dinas').attr('type', 'hidden');
		}
	}

	//add input
	function add_input(id,target){

		var html = $('#'+id).children().clone(true,true);


	    $('#'+target).append(html);
	}

	//remove input
	function remove_input(id,target){
		$(id).parents('.'+target).remove();
	}

	//select option
	$('#bumn_rumah').val('<?php echo @$data['bumn_rumah'] ?>').change();
	$('#bumn_kantor_cabang').val('<?php echo @$data['bumn_kantor_cabang'] ?>').change();
	$('#bumn_status').val('<?php echo @$data['bumn_status'] ?>').change();
	$('#bumn_kantor_wilayah').val('<?php echo @$data['bumn_kantor_wilayah'] ?>').change();
 
</script>