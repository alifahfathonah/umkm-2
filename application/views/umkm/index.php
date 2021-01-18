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
		            <div class="stepwizard-step col-xs-2"> 
		                <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
		                <p><small>Step 1</small></p>
		            </div>
		            <div class="stepwizard-step col-xs-2"> 
		                <a href="#step-2" type="button" class="btn btn-default btn-circle" >2</a>
		                <p><small>Step 2</small></p>
		            </div>
		            <div class="stepwizard-step col-xs-2"> 
		                <a href="#step-3" type="button" class="btn btn-default btn-circle" >3</a>
		                <p><small>Step 3</small></p>
		            </div>
		            <div class="stepwizard-step col-xs-2"> 
		                <a href="#step-4" type="button" class="btn btn-default btn-circle" >4</a>
		                <p><small>Step 4</small></p>
		            </div>
		            <div class="stepwizard-step col-xs-2"> 
		                <a href="#step-5" type="button" class="btn btn-default btn-circle" >5</a>
		                <p><small>Step 5</small></p>
		            </div>
		            <div class="stepwizard-step col-xs-2"> 
		                <a href="#step-6" type="button" class="btn btn-default btn-circle" >6</a>
		                <p><small>Step 6</small></p>
		            </div>
		        </div>
		    </div>
		    
		    <form role="form" method="POST" action="<?php echo base_url('umkm/save') ?>" enctype="multipart/form-data">
		        <div class="panel panel-primary setup-content" id="step-1">
		            <div class="panel-body">
		                <div class="form-group">
		                    <label class="control-label">Nama UMKM</label>
		                    <input name="umkm_rumah" type="text" value="<?php echo $data['umkm_rumah'] ?>" class="form-control" placeholder="Rumah BUMN" />
		                </div>
		                <div class=" form-group">
		                	<input value="<?php echo $data['umkm_skc'] ?>" name="umkm_skc" type="text"  class="form-control" placeholder="SKC" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Nama Brand/Merk</label>
		                    <input value="<?php echo $data['umkm_brand'] ?>" name="umkm_brand" type="text"  class="form-control" placeholder="Brand/Merk" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Nama Usaha</label>
		                    <input value="<?php echo $data['umkm_usaha'] ?>" name="umkm_usaha" type="text"  class="form-control" placeholder="Usaha" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Jenisi Usaha</label>
		                    <select id="umkm_jenis" name="umkm_jenis" required="" class="form-control">
		                    	<option value="Kuliner (Snack)">Kuliner (Snack)</option>
		                    	<option value="Kuliner (Minuman)">Kuliner (Minuman)</option>
		                    	<option value="Kuliner (Catering)">Kuliner (Catering)</option>
		                    	<option value="Kopi dan olahannya">Kopi dan olahannya</option>
		                    	<option value="Tea dan olahannya">Tea dan olahannya</option>
		                    	<option value="Craft">Craft</option>
		                    	<option value="Fashion Ready to wear">Fashion Ready to wear</option>
		                    	<option value="Kain">Kain</option>
		                    	<option value="Hasil Perikanan">Hasil Perikanan</option>
		                    	<option value="Hasil Pertanian">Hasil Pertanian</option>
		                    	<option value="Lain-lain">Lain-lain sebutkan</option>
		                    </select>
		                </div>
		                <div class="form-group">
		                	<input value="<?php echo $data['umkm_jenis_lain'] ?>" id="lain" type="hidden" name="umkm_jenis_lain" class="form-control" placeholder="Lain-lain">
		                </div>

		                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
		            </div>
		        </div>
		        
		        <div class="panel panel-primary setup-content" id="step-2">
		            <div class="panel-body">
		                <div class="form-group">
		                    <label class="control-label">Alamat Usaha</label>
		                    <input value="<?php echo $data['umkm_provinsi'] ?>" type="text" name="umkm_provinsi"  class="form-control" placeholder="Provinsi" />
		                </div>
		                <div class="form-group">
		                    <input type="text" value="<?php echo $data['umkm_kota'] ?>" name="umkm_kota"  class="form-control" placeholder="Kab/Kota" />
		                </div>
		                <div class="form-group">
		                    <input type="text" value="<?php echo $data['umkm_pos'] ?>" name="umkm_pos"  class="form-control" placeholder="Kode Pos" />
		                </div>
		                <div class="form-group">
		                    <input type="text" value="<?php echo $data['umkm_alamat'] ?>" name="umkm_alamat"  class="form-control" placeholder="Alamat lengkap" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Nama Pemilik</label>
		                    <input type="text" value="<?php echo $data['umkm_pemilik'] ?>" name="umkm_pemilik"  class="form-control" placeholder="Nama Pemilik" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">No Tlp/Hp pemilik</label>
		                    <input value="<?php echo $data['umkm_no'] ?>" type="number" name="umkm_no"  class="form-control" placeholder="Tlp/Hp" />
		                </div>

		                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
		            </div>
		        </div>
		        
		        <div class="panel panel-primary setup-content" id="step-3">
		            <div class="panel-body">
		                <div class="form-group">
		                    <label class="control-label">Nama PIC selain pemilik</label>
		                    <input type="text" value="<?php echo $data['umkm_pic'] ?>" name="umkm_pic"  class="form-control" placeholder="Nama PIC selain pemilik" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">No Tlp/HP PIC</label>
		                    <input type="number" value="<?php echo $data['umkm_no_pic'] ?>" name="umkm_no_pic"  class="form-control" placeholder="Tlp/HP PIC " />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Nama IG Usaha</label>
		                    <input type="text" value="<?php echo $data['umkm_ig'] ?>" name="umkm_ig"  class="form-control" placeholder="Instagram" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Nama FB Usaha</label>
		                    <input type="text" value="<?php echo $data['umkm_fb'] ?>" name="umkm_fb"  class="form-control" placeholder="Facebook" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Alamat Email</label>
		                    <input type="text" value="<?php echo $data['umkm_email'] ?>" name="umkm_email"  class="form-control" placeholder="Gmail" />
		                </div>

		                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
		            </div>
		        </div>
		        
		        <div class="panel panel-primary setup-content" id="step-4">
		            <div class="panel-body">
		                <div class="form-group">
		                    <label class="control-label">Channel penjualan online</label>
		                    <input type="text" name="umkm_shopee"  class="form-control" placeholder="Shopee" value="<?php echo $data['umkm_shopee'] ?>" />
		                </div>
		                <div class="form-group">
		                    <input type="text" name="umkm_tokopedia"  class="form-control" placeholder="Tokopedia" value="<?php echo $data['umkm_tokopedia'] ?>" />
		                </div>
		                <div class="form-group">
		                    <input type="text" value="<?php echo $data['umkm_lazada'] ?>" name="umkm_lazada"  class="form-control" placeholder="Lazada" />
		                </div>
		                <div class="form-group">
		                    <input type="text" value="<?php echo $data['umkm_bukalapak'] ?>" name="umkm_bukalapak"  class="form-control" placeholder="Bukalapak" />
		                </div>
		                <div class="form-group">
		                    <input type="text" value="<?php echo $data['umkm_jdid'] ?>" name="umkm_jdid"  class="form-control" placeholder="Jd.id" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Nama Website</label>
		                    <input type="text" value="<?php echo $data['umkm_website'] ?>" name="umkm_website"  class="form-control" placeholder="Website" />
		                </div>

		                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
		                
		            </div>
		        </div>

		        <div class="panel panel-primary setup-content" id="step-5">
		            <div class="panel-body">

			            <div class="form-group">
		                    <label class="control-label">Pameran yang pernah di ikuti di dalam negeri</label>
		                    <input type="text" value="<?php echo $data['umkm_pameran_dalam'] ?>" name="umkm_pameran_dalam"  class="form-control" placeholder="Pameran Dalam Negeri" />
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Pameran yang pernah di ikuti di luar negeri</label>
		                    <input type="text" value="<?php echo $data['umkm_pameran_luar'] ?>" name="umkm_pameran_luar"  class="form-control" placeholder="Pameran Luar Negeri" />
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Penghargaan yang pernah di terima </label>
		                    <input type="text" value="<?php echo $data['umkm_penghargaan'] ?>" name="umkm_penghargaan"  class="form-control" placeholder="Penghargaan" />
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Ceritakan mengenai Brand Anda</label>
		                    <input type="text" value="<?php echo $data['umkm_cerita'] ?>" name="umkm_cerita"  class="form-control" placeholder="Mengenai Brand" />
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Berdiri sejak tahun</label>
		                    <input type="text" value="<?php echo $data['umkm_berdiri'] ?>" name="umkm_berdiri"  class="form-control" placeholder="Sejak Tahun" />
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Skala Usaha</label>
		                    <select id="umkm_skala" name="umkm_skala" class="form-control">
		                    	<option value="Mikro">Mikro</option>
		                    	<option value="Kecil">Kecil</option>
		                    	<option value="Menengah">Menengah</option>
		                    </select>
		                </div>

			            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
			        </div>
		        </div>

		        <div class="panel panel-primary setup-content" id="step-6">
		            <div class="panel-body">

		            	<div class="form-group">
		                    <label class="control-label">Jumlah Karyawan</label>
		                    <input type="number" value="<?php echo $data['umkm_karyawan'] ?>" name="umkm_karyawan"  class="form-control" placeholder="Jumlah Karyawan" />
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Omset rata-rata per bulan</label>
		                    <input type="text" value="<?php echo $data['umkm_omset'] ?>" name="umkm_omset"  class="form-control" placeholder="Omset rata-rata" />
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Jenis pembiayaan BNI</label>
		                    <select id="umkm_jenis_biaya_bni" name="umkm_jenis_biaya_bni" class="form-control">
		                   		<option value="Kredit Kemitraan">Kredit Kemitraan</option>
		                    	<option value="KUR">KUR</option>
		                    	<option value="BCM">BCM</option>
		                    </select>
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Nilai Kredit</label>
		                    <input type="number" value="<?php echo $data['umkm_kredit'] ?>" name="umkm_kredit"  class="form-control" placeholder="Nilai Kredit" />
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Upload produk dan deskripsi produk</label>
		                    <input type="file" name="umkm_produk"  class="form-control" />

		                    <?php if ($data['umkm_produk']): ?>
		                    	<a class="btn btn-primary btn-sm" target="_BLANK" href="<?php echo base_url('asset/gambar/umkm/'.$data['umkm_produk']) ?>" title="">View foto <i class="fa fa-eye"></i></a>	
		                    <?php endif ?>

		                </div>

		                <div class="form-group">
		                    <input type="text" value="<?php echo $data['umkm_produk_deskripsi'] ?>" name="umkm_produk_deskripsi"  class="form-control" placeholder="Deskripsi Foto" />
		                </div>

		                <div class="form-group">
		                    <label class="control-label"> Bila usaha merupakan usaha makanan/minuman apa sudah – Memiliki izin BPOM</label>
		                    <select id="umkm_bpom" name="umkm_bpom" class="form-control">
		                    	<option value="Ya">Ya</option>
		                    	<option value="Tidak">Tidak</option>
		                    </select>
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

$('#umkm_jenis').on('change', function (e) {
    if ($('#umkm_jenis').val() == 'Lain-lain') {
    	$('#lain').attr('type','text');
    	$('#lain').attr('required',true);
    }
});

//select option
$('#umkm_jenis').val('<?php echo $data['umkm_jenis'] ?>').change();
$('#umkm_skala').val('<?php echo $data['umkm_skala'] ?>').change();
$('#umkm_bpom').val('<?php echo $data['umkm_bpom'] ?>').change();
 
</script>