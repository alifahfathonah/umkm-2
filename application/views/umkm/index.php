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
		                    <label class="control-label">Asal UMKM</label>

		                    <select id="umkm_rumah" name="umkm_rumah" class="form-control">
		                    	<option value="" hidden="">Rumah BUMN</option>
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
		                    	<option value="Tega">Tega</option>
		                    	<option value="Wonogiri">Wonogiri</option>
		                    	<option value="Banyuwangi">Banyuwangi</option>
		                    	<option value="Ngawi">Ngawi</option>
		                    	<option value="Tulungagung">Tulungagung</option>
		                    	<option value="Manggarai">Manggarai</option>
		                    	<option value="Belu">Belu</option>
		                    	<option value="Sumba Barat Daya">Sumba Barat Daya</option>
		                    	<option value="Sumba Tengah"></option>
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
		                <div class=" form-group">
		                	
		                	<select id="umkm_skc" name="umkm_skc" class="form-control">
		                    	<option value="" hidden="">SKC</option>
		                    	<option value="SKC Medan">SKC Medan</option>
		                    	<option value="SKC Polonia">SKC Polonia</option>
		                    	<option value="SKC Pekanbaru">SKC Pekanbaru</option>
		                    	<option value="SKC Palembang">SKC Palembang</option>
		                    	<option value="SKC Bandung">SKC Bandung</option>
		                    	<option value="SKC Priangan">SKC Priangan</option>
		                    	<option value="SKC Semarang">SKC Semarang</option>
		                    	<option value="SKC Solo">SKC Solo</option>
		                    	<option value="SKC Yogjakarta">SKC Yogjakarta</option>
		                    	<option value="SKC Graha Pangeran">SKC Graha Pangeran</option>
		                    	<option value="SKC Surabaya">SKC Surabaya</option>
		                    	<option value="SKC Makasar">SKC Makasar</option>
		                    	<option value="SKC Denpasar">SKC Denpasar</option>
		                    	<option value="SKC Banjarmasin">SKC Banjarmasin</option>
		                    	<option value="SKC Melawai">SKC Melawai</option>
		                    	<option value="SKC Tanah Abang">SKC Tanah Abang</option>
		                    	<option value="SKC Jakarta Kota">SKC Jakarta Kota</option>
		                    	<option value="SKC Kelapa Gading">SKC Kelapa Gading</option>
		                    	<option value="SKC Pecenongan">SKC Pecenongan</option>
		                    	<option value="SKC Bogor">SKC Bogor</option>
		                    	<option value="SKC Tangerang">SKC Tangerang</option>
		                    	<option value="SKC Bekasi">SKC Bekasi</option>
		                    	<option value="SKC Jatinegara">SKC Jatinegara</option>
		                    	<option value="SKC Kramat">SKC Kramat</option>
		                    	<option value="SKC Kramat">SKC Jakarta Graha Elok Mas</option>
		                    </select>

		                </div>

		                <div class=" form-group">
		                	
		                	<select id="umkm_cabang" name="umkm_cabang" class="form-control">
		                    	<option value="" hidden="">Cabang</option>
		                    	<option value="Langsa">Langsa</option>
		                    	<option value="Gunung Sitoli">Gunung Sitoli</option>
		                    	<option value="Tg Balai Karimun"></option>
		                    	<option value="Padang">Padang</option>
		                    	<option value="Payakumbuh">Payakumbuh</option>
		                    	<option value="Payakumbuh">Payakumbuh</option>
		                    	<option value="Pangkal Pinang">Pangkal Pinang</option>
		                    	<option value="Muara Bungo">Muara Bungo</option>
		                    	<option value="Kotabumi">Kotabumi</option>
		                    	<option value="Banjar">Banjar</option>
		                    	<option value="Cilacap">Cilacap</option>
		                    	<option value="UGM">UGM</option>
		                    	<option value="Tegal">Tegal</option>
		                    	<option value="Wonogiri">Wonogiri</option>
		                    	<option value="Banyuwang">Banyuwang</option>
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
		                    	<option value="Monokwari">Monokwari</option>
		                    	<option value="Jayapura">Jayapura</option>
		                    	<option value="Sorong">Sorong</option>
		                    	<option value="Bekasi">Bekasi</option>
		                    </select>

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
		                    <label class="control-label">Jenis Usaha</label>
		                    <select id="umkm_jenis" name="umkm_jenis"  class="form-control">
		                    	<option value="" hidden="">Jenis Usaha</option>
		                    	<?php foreach ($jenis_usaha as $key): ?>
		                    		<option value="<?php echo $key['jenis_usaha_id'] ?>"><?php echo $key['jenis_usaha_nama'] ?></option>
		                    	<?php endforeach ?>
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

		                    <select id="umkm_provinsi" name="umkm_provinsi"  class="form-control">
		                    	<option value="" hidden="">Provinsi</option>
		                    	<?php foreach ($provinsi as $key): ?>
		                    		<option value="<?php echo $key['provinsi_id'] ?>"><?php echo $key['provinsi_nama'] ?></option>
		                    	<?php endforeach ?>
		                    </select>

		                    <input type="hidden" id="umkm_provinsi_text" name="umkm_provinsi_text" value="<?php echo @$data['umkm_provinsi_text'] ?>">

		                </div>
		                <div class="form-group">

		                    <select id="umkm_kota" name="umkm_kota"  class="form-control">
		                    	<option value="" hidden="">Kab/Kota</option>
		                    </select>

		                    <input type="hidden" id="umkm_kota_text" name="umkm_kota_text" value="<?php echo @$data['umkm_kota_text'] ?>">

		                </div>

		                <div class="form-group">

		                    <select id="umkm_kecamatan" name="umkm_kecamatan"  class="form-control">
		                    	<option value="" hidden="">Kecamatan</option>
		                    </select>

		                    <input type="hidden" id="umkm_kecamatan_text" name="umkm_kecamatan_text" value="<?php echo @$data['umkm_kecamatan_text'] ?>">

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
		                    <label class="control-label">Alamat Email (Aktif)</label>
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
		                    <input type="text" value="<?php echo $data['umkm_blibli'] ?>" name="umkm_blibli"  class="form-control" placeholder="Blibli" />
		                </div>
		                <div class="form-group">
		                    <input type="text" value="<?php echo $data['umkm_padi'] ?>" name="umkm_padi"  class="form-control" placeholder="PADI" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Nama Website Usaha</label>
		                    <input type="text" value="<?php echo $data['umkm_website'] ?>" name="umkm_website"  class="form-control" placeholder="Website" />
		                </div>

		                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
		                
		            </div>
		        </div>

		        <div class="panel panel-primary setup-content" id="step-5">
		            <div class="panel-body">

			            <div class="form-group">
		                    <label class="control-label">Pameran yang pernah di ikuti di dalam negeri</label>

							<?php if (@$data['umkm_pameran_dalam']): ?>

								<?php $i = 0; ?>
								<?php foreach (json_decode($data['umkm_pameran_dalam']) as $key): ?>

									<div class="input-group" style="margin-top: 1%;">
			                    		<input type="text" class="form-control" name="umkm_pameran_dalam[]" value="<?php echo $key ?>">
										<span class="input-group-addon" style="background-color: #efefef;">

											<?php if ($i < 1): ?>
												<button style="border: none; outline:none;" type="button" onclick="add_input('umkm_pameran_dalam_copy','umkm_pameran_dalam_tampil')"><i class="fa fa-plus"></i></button>
											<?php else: ?>	
												<button style="border: none; outline:none;" type="button" <button onclick="remove_input(this,'input-group')" style="border: none; outline:none;"><i class="fa fa-minus"></i></button>
											<?php endif ?>

										</span>
									</div>
								
								<?php $i++; ?>
								<?php endforeach ?>
							
							<?php else: ?>
								
								<div class="input-group">
		                    		<input type="text" class="form-control" name="umkm_pameran_dalam[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button style="border: none; outline:none;" type="button" onclick="add_input('umkm_pameran_dalam_copy','umkm_pameran_dalam_tampil')"><i class="fa fa-plus"></i></button></span>
								</div>

							<?php endif ?>

							<!--clone element-->
							<div hidden="" id="umkm_pameran_dalam_copy">
								<div class="input-group" style="margin-top: 1%;">
		                    		<input type="text" class="form-control" name="umkm_pameran_dalam[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button onclick="remove_input(this,'input-group')" style="border: none; outline:none;" type="button"><i class="fa fa-minus"></i></button></span>
								</div>
							</div>

							<!--tampil-->
							<div id="umkm_pameran_dalam_tampil">
								
							</div>

		                </div>

		                <div class="form-group">
		                    <label class="control-label">Pameran yang pernah di ikuti di luar negeri</label>

		                    <?php if (@$data['umkm_pameran_luar']): ?>

								<?php $i = 0; ?>
								<?php foreach (json_decode($data['umkm_pameran_luar']) as $key): ?>

									<div class="input-group" style="margin-top: 1%;">
			                    		<input type="text" class="form-control" name="umkm_pameran_luar[]" value="<?php echo $key ?>">
										<span class="input-group-addon" style="background-color: #efefef;">

											<?php if ($i < 1): ?>
												<button style="border: none; outline:none;" type="button" onclick="add_input('umkm_pameran_luar_copy','umkm_pameran_luar_tampil')"><i class="fa fa-plus"></i></button>
											<?php else: ?>	
												<button style="border: none; outline:none;" type="button" <button onclick="remove_input(this,'input-group')" style="border: none; outline:none;"><i class="fa fa-minus"></i></button>
											<?php endif ?>

										</span>
									</div>
								
								<?php $i++; ?>
								<?php endforeach ?>
							
							<?php else: ?>
								
								<div class="input-group">
		                    		<input type="text" class="form-control" name="umkm_pameran_luar[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button style="border: none; outline:none;" type="button" onclick="add_input('umkm_pameran_luar_copy','umkm_pameran_luar_tampil')"><i class="fa fa-plus"></i></button></span>
								</div>

							<?php endif ?>

							<!--clone element-->
							<div hidden="" id="umkm_pameran_luar_copy">
								<div class="input-group" style="margin-top: 1%;">
		                    		<input  type="text" class="form-control" name="umkm_pameran_luar[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button onclick="remove_input(this,'input-group')" style="border: none; outline:none;" type="button"><i class="fa fa-minus"></i></button></span>
								</div>
							</div>

							<!--tampil-->
							<div id="umkm_pameran_luar_tampil">
								
							</div>
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Penghargaan yang pernah di terima </label>

		                    <?php if (@$data['umkm_penghargaan']): ?>

								<?php $i = 0; ?>
								<?php foreach (json_decode($data['umkm_penghargaan']) as $key): ?>

									<div class="input-group" style="margin-top: 1%;">
			                    		<input type="text" class="form-control" name="umkm_penghargaan[]" value="<?php echo $key ?>">
										<span class="input-group-addon" style="background-color: #efefef;">

											<?php if ($i < 1): ?>
												<button style="border: none; outline:none;" type="button" onclick="add_input('umkm_penghargaan_copy','umkm_penghargaan_tampil')"><i class="fa fa-plus"></i></button>
											<?php else: ?>	
												<button style="border: none; outline:none;" type="button" <button onclick="remove_input(this,'input-group')" style="border: none; outline:none;"><i class="fa fa-minus"></i></button>
											<?php endif ?>

										</span>
									</div>
								
								<?php $i++; ?>
								<?php endforeach ?>
							
							<?php else: ?>
								
								<div class="input-group">
		                    		<input type="text" class="form-control" name="umkm_penghargaan[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button style="border: none; outline:none;" type="button" onclick="add_input('umkm_penghargaan_copy','umkm_penghargaan_tampil')"><i class="fa fa-plus"></i></button></span>
								</div>

							<?php endif ?>

							<!--clone element-->
							<div hidden="" id="umkm_penghargaan_copy">
								<div class="input-group" style="margin-top: 1%;">
		                    		<input  type="text" class="form-control" name="umkm_penghargaan[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button onclick="remove_input(this,'input-group')" style="border: none; outline:none;" type="button"><i class="fa fa-minus"></i></button></span>
								</div>
							</div>

							<!--tampil-->
							<div id="umkm_penghargaan_tampil">
								
							</div>
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Deskripsi produk UMKM</label>
		                    
		                    <?php if (@$data['umkm_deskripsi']): ?>

								<?php $i = 0; ?>
								<?php foreach (json_decode($data['umkm_deskripsi']) as $key): ?>

									<div class="input-group" style="margin-top: 1%;">
			                    		<input type="text" class="form-control" name="umkm_deskripsi[]" value="<?php echo $key ?>">
										<span class="input-group-addon" style="background-color: #efefef;">

											<?php if ($i < 1): ?>
												<button style="border: none; outline:none;" type="button" onclick="add_input('umkm_deskripsi_copy','umkm_deskripsi_tampil')"><i class="fa fa-plus"></i></button>
											<?php else: ?>	
												<button style="border: none; outline:none;" type="button" <button onclick="remove_input(this,'input-group')" style="border: none; outline:none;"><i class="fa fa-minus"></i></button>
											<?php endif ?>

										</span>
									</div>
								
								<?php $i++; ?>
								<?php endforeach ?>
							
							<?php else: ?>
								
								<div class="input-group">
		                    		<input type="text" class="form-control" name="umkm_deskripsi[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button style="border: none; outline:none;" type="button" onclick="add_input('umkm_deskripsi_copy','umkm_deskripsi_tampil')"><i class="fa fa-plus"></i></button></span>
								</div>

							<?php endif ?>

							<!--clone element-->
							<div hidden="" id="umkm_deskripsi_copy">
								<div class="input-group" style="margin-top: 1%;">
		                    		<input  type="text" class="form-control" name="umkm_deskripsi[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button onclick="remove_input(this,'input-group')" style="border: none; outline:none;" type="button"><i class="fa fa-minus"></i></button></span>
								</div>
							</div>

							<!--tampil-->
							<div id="umkm_deskripsi_tampil">
								
							</div>
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
		                    <label class="control-label">Upload foto produk <small class="text-danger">* Maksimal 4 lebih dari 4 foto tidak akan di simpan</small></label>

		                    <div class="row">
		                    	<div class="col-md-3">
			                    	<input type="file" name="umkm_produk[]"  class="form-control" />
			                    </div>
			                    <div class="col-md-3">
			                    	<input type="file" name="umkm_produk[]"  class="form-control" />
			                    </div>
			                    <div class="col-md-3">
			                    	<input type="file" name="umkm_produk[]"  class="form-control" />
			                    </div>
			                    <div class="col-md-3">
			                    	<input type="file" name="umkm_produk[]"  class="form-control" />
			                    </div>
		                    </div>

		                </div>

		                <div class="form-group">

		                	<div class="row">
		                
		                	<?php if (@$data['umkm_produk']): ?>
		                    	<?php $i = 1; ?>
		                    	 <?php foreach (json_decode($data['umkm_produk'],true) as $key): ?>
		                    	 	<div class="col-md-2 col-xs-6">
			                    	 	<img src="<?php echo base_url('asset/gambar/umkm/'.$key) ?>" alt="" class="img-thumbnail" width="200">
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
			                               <a href="<?php echo base_url('umkm/delete/'.$key) ?>"><button class="btn btn-success" type="button" style="width: 49%;">Yes</button></a>
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

		                <div class="form-group">
		                    <label class="control-label">Upload Logo UMKM</label>
		                    <input type="file" name="umkm_logo"  class="form-control" />

		                    <div style="margin-top: 0.5%;"></div>
			                    <?php if (@$data['umkm_logo']): ?>
			                    	<img src="<?php echo base_url('asset/gambar/umkm/'.$data['umkm_logo']) ?>" alt="" class="img-thumbnail" width="100">
			                    <?php endif ?>
			                </div>

		                <div class="form-group">
		                    <label class="control-label"> Bila usaha merupakan usaha makanan/minuman apa sudah – Memiliki izin BPOM</label>
		                    <select id="umkm_bpom" name="umkm_bpom" class="form-control">
		                    	<option value="Tidak">Tidak</option>
		                    	<option value="Ya">Ya</option>
		                    </select>
		                </div>

		                <div class="form-group">
			                <label>Izin Usaha yang dimiliki</label>
			                <select id="umkm_izinusaha" name="umkm_izinusaha[]" class="form-control select2" multiple="multiple" style="width: 100%;">
			                  <option value="PIRT">PIRT</option>
			                  <option value="SKDP">SKDP</option>
			                  <option value="SIUP">SIUP</option>
			                  <option value="TDP">TDP</option>
			                  <option value="NPWP">NPWP</option>
			                  <option value="Sertifikat Halal">Sertifikat Halal</option>
			                  <option value="Izin BPOM">Izin BPOM</option>
			                </select>
			              </div>

		        		<button class="btn btn-success pull-right" type="submit">Finish!</button>
		        	</div>
		        </div>

		    </form>

	    </div>
	    <!-- /.box-body -->

	    <div id="loading">
		  <span style="position: fixed; bottom: 50%; right: 40%; padding: 0.5%; background-color: #1b30587d; color: white;"><h4>Loading <i class="fa fa-spinner fa-pulse"></i></h4></span>
		</div>

	  </div>

<script type="text/javascript">
	
	//////////////////// form next ////////////////////

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

	////////////////// end form next ////////////////////////

$('#umkm_jenis').on('change', function (e) {
    if ($('#umkm_jenis').val() == 'Lain-lain') {
    	$('#lain').attr('type','text');
    	$('#lain').attr('required',true);
    }else{
    	$('#lain').attr('type','hidden');
    	$('#lain').val('');
    }
});

//umkm kota
$('#umkm_provinsi').on('change', function (e) {

	let id = $(this).val();

	//delete
	$('#umkm_kota').empty();
	$('#umkm_kota').append('<option value="" hidden="">Kab/Kota</option>');

   $.getJSON('<?php echo $this->api_kota->kota() ?>'+id, function(data) {
   		
   		$.each(data, function(index) {
   			
   			let html = '';
   			html += '<option value="'+data[index].kota_id+'">'+data[index].kota_nama+'</option>';

   			$('#umkm_kota').append(html);

   			$('#umkm_kota').val('<?php echo @$data['umkm_kota'] ?>').change();
   		});

   });

   //umkm_provinsi_text
  $('#umkm_provinsi_text').val($('#umkm_provinsi option:selected').text());
   
});


//umkm kecamatan
$('#umkm_kota').on('change', function (e) {

	let id = $(this).val();

	//delete
	$('#umkm_kecamatan').empty();
	$('#umkm_kecamatan').append('<option value="" hidden="">Kecamatan</option>');

   $.getJSON('<?php echo $this->api_kota->kecamatan() ?>'+id, function(data) {
   		
   		$.each(data, function(index) {
   			
   			let html = '';
   			html += '<option value="'+data[index].kecamatan_id+'">'+data[index].kecamatan_nama+'</option>';

   			$('#umkm_kecamatan').append(html);

   			$('#umkm_kecamatan').val('<?php echo @$data['umkm_kecamatan'] ?>').change();
   		});   		

   });

   //umkm_kota_text
  $('#umkm_kota_text').val($('#umkm_kota option:selected').text());
   
});

$('#umkm_kecamatan').on('change', function (e) {
	//umkm_kecamatan_text
	$('#umkm_kecamatan_text').val($('#umkm_kecamatan option:selected').text());
});
	
//loading ajax
$(document).ajaxStart(function(){
    $('#loading').show();
}).ajaxStop(function(){
    $('#loading').hide();
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

//izin_usaha
$('#umkm_bpom').on('change', function (e) {
	if ($(this).val() == 'Ya') {
		$('#izin_usaha').removeAttr('hidden');
	}else{
		$('#izin_usaha').attr('hidden',true);
	}
});

//

/////////////select option/////////////////////////

//alamat usaha
$('#umkm_provinsi').val('<?php echo @$data['umkm_provinsi'] ?>').change();
/////////////

$('#umkm_rumah').val('<?php echo @$data['umkm_rumah'] ?>').change();
$('#umkm_skc').val('<?php echo @$data['umkm_skc'] ?>').change();
$('#umkm_cabang').val('<?php echo @$data['umkm_cabang'] ?>').change();

$('#umkm_jenis').val('<?php echo @$data['umkm_jenis'] ?>').change();
$('#umkm_skala').val('<?php echo @$data['umkm_skala'] ?>').change();
$('#umkm_bpom').val('<?php echo @$data['umkm_bpom'] ?>').change();

$('#umkm_izinusaha').val(<?php echo @$data['umkm_izinusaha'] ?>).select();
 
</script>