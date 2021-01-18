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
		                <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
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
		                    <input name="bumn_rumah" type="text" value="<?php echo $data['bumn_rumah'] ?>" class="form-control" placeholder="Rumah BUMN" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Berdiri sejak</label>
		                    <input name="bumn_berdiri" type="text" value="<?php echo $data['bumn_berdiri'] ?>" class="form-control" placeholder="Sejak" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Status Gedung Rumah BUMN</label>
		                    <input name="bumn_status" type="text" value="<?php echo $data['bumn_status'] ?>" class="form-control" placeholder="Status Gedung" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Foto gedung Rumah BUMN</label>
		                    <input name="bumn_foto" type="file" value="" class="form-control" />
		                </div>

		                <?php if ($data['bumn_foto']): ?>
	                    	<a class="btn btn-primary btn-sm" target="_BLANK" href="<?php echo base_url('asset/gambar/bumn/'.$data['bumn_foto']) ?>" title="">View foto <i class="fa fa-eye"></i></a>	
	                    <?php endif ?>
		                
		                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
		            </div>
		        </div>
		        
		        <div class="panel panel-primary setup-content" id="step-2">
		            <div class="panel-body">
		                <div class="form-group">
		                    <label class="control-label">Nama pengelola Rumah BUMN</label>
		                    <input type="text" name="bumn_pengelola" value="<?php echo $data['bumn_pengelola'] ?>" class="form-control" placeholder="pengelola Rumah" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">No Telepon/HP</label>
		                    <input type="number" name="bumn_no" value="<?php echo $data['bumn_no'] ?>" class="form-control" placeholder="Telepon/HP" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Kantor Cabang pengelolah</label>
		                    <input type="text" name="bumn_cabang" value="<?php echo $data['bumn_cabang'] ?>" class="form-control" placeholder="Cabang pengelolah" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Nama PIC Kantor Cabang</label>
		                    <input type="text" name="bumn_pic" value="<?php echo $data['bumn_pic'] ?>" class="form-control" placeholder="PIC Kantor Cabang" />
		                </div>
		                
		                <button class="btn btn-success pull-right" type="submit">Finish!</button>
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
	            navListItems.removeClass('btn-success').addClass('btn-default');
	            $item.addClass('btn-success');
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

	    $('div.setup-panel div a.btn-success').trigger('click');
	});
 
</script>