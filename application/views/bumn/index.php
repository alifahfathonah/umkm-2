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
		                    <select id="bumn_rumah" name="bumn_rumah" class="form-control">
		                    	<option value="" hidden="">-- Pilih --</option>
		                    	<option value="Aceh Tenggara">Aceh Tenggara</option>
		                    	<option value="Nias Selatan">Nias Selatan</option>
		                    	<option value="Tanjung Balai">Tanjung Balai</option>
		                    	<option value="Padang">Padang</option>
		                    	<option value="Payakumbuh">Payakumbuh</option>
		                    	<option value="Payakumbuh 50 Kota">Payakumbuh 50 Kota</option>
		                    	<option value="Pangkal Pinang">Pangkal Pinang</option>
		                    	<option value="Tebo">Tebo</option>
		                    	<option value="Way Kanan">Way Kanan</option>
		                    	<option value="Pangandaran">Pangandaran</option>
		                    	<option value="Cilacap">Cilacap</option>
		                    	<option value="Sleman">Sleman</option>
		                    	<option value="Tegal">Tegal</option>
		                    	<option value="Wonogiri">Wonogiri</option>
		                    	<option value="Banyuwangi">Banyuwangi</option>
		                    	<option value="Ngawi">Ngawi</option>
		                    	<option value="Tulungagung">Tulungagung</option>
		                    	<option value="Manggarai">Manggarai</option>
		                    	<option value="Belu">Belu</option>
		                    	<option value="Sumba Barat Daya">Sumba Barat Daya</option>
		                    	<option value="Sumba Tengah">Sumba Tengah</option>
		                    	<option value="Banjarbaru">Banjarbaru</option>
		                    	<option value="Katingan">Katingan</option>
		                    	<option value="Pontianak">Pontianak</option>
		                    	<option value="Tabalong">Tabalong</option>
		                    	<option value="Bantaeng">Bantaeng</option>
		                    	<option value="Maluku Tenggara">Maluku Tenggara</option>
		                    	<option value="Mamuju">Mamuju</option>
		                    	<option value="Takalar">Takalar</option>
		                    	<option value="Banggai laut">Banggai laut</option>
		                    	<option value="Pohuwato">Pohuwato</option>
		                    	<option value="Ternate">Ternate</option>
		                    	<option value="Fakfak">Fakfak</option>
		                    	<option value="Jayapura">Jayapura</option>
		                    	<option value="Raja Ampat">Raja Ampat</option>
		                    	<option value="Bekasi">Bekasi</option>
		                    </select>
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Kantor Cabang Pengelola</label>
		                    <select name="bumn_kantor_cabang" id="bumn_kantor_cabang" class="form-control">
		                    	<option value="" hidden="">-- Pilih --</option>
		                    	<option value="Langsa">Langsa</option>
		                    	<option value="Gunung Sitoli">Gunung Sitoli</option>
		                    	<option value="Tg Balai Karimun">Tg Balai Karimun</option>
		                    	<option value="Padang">Padang</option>
		                    	<option value="Payakumbuh">Payakumbuh</option>
		                    	<option value="Pangkal Pinang">Pangkal Pinang</option>
		                    	<option value="Muara Bungo">Muara Bungo</option>
		                    	<option value="Kotabumi">Kotabumi</option>
		                    	<option value="Banjar">Banjar</option>
		                    	<option value="Cilacap">Cilacap</option>
		                    	<option value="UGM">UGM</option>
		                    	<option value="Tegal">Tegal</option>
		                    	<option value="Wonogiri">Wonogiri</option>
		                    	<option value="Banyuwangi">Banyuwangi</option>
		                    	<option value="Madiun">Madiun</option>
		                    	<option value="Tulungagung">Tulungagung</option>
		                    	<option value="Ende">Ende</option>
		                    	<option value="Kupang">Kupang</option>
		                    	<option value="Banjarbaru">Banjarbaru</option>
		                    	<option value="Palangkaraya">Palangkaraya</option>
		                    	<option value="Pontianak">Pontianak</option>
		                    	<option value="Barabai">Barabai</option>
		                    	<option value="Bulukumba">Bulukumba</option>
		                    	<option value="Ambon">Ambon</option>
		                    	<option value="Mamuju">Mamuju</option>
		                    	<option value="Mattoangin">Mattoangin</option>
		                    	<option value="Luwuk">Luwuk</option>
		                    	<option value="Gorontalo">Gorontalo</option>
		                    	<option value="Ternate">Ternate</option>
		                    	<option value="Monokwar">Monokwar</option>
		                    	<option value="Jayapura">Jayapura</option>
		                    	<option value="Sorong">Sorong</option>
		                    	<option value="Bekasi">Bekasi</option>
		                    </select>
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
		                    <input type="text" name="bumn_pengelola" value="<?php echo $data['bumn_pengelola'] ?>" class="form-control" placeholder="pengelola Rumah" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">No Telepon/HP</label>
		                    <input type="number" name="bumn_no" value="<?php echo $data['bumn_no'] ?>" class="form-control" placeholder="Telepon/HP" />
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


	//select option
	$('#bumn_rumah').val('<?php echo @$data['bumn_rumah'] ?>').change();
	$('#bumn_kantor_cabang').val('<?php echo @$data['bumn_kantor_cabang'] ?>').change();
 
</script>