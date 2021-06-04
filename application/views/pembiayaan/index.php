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
		                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
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

		    <br/>
		    <span style="background: #117a8b; padding: 0.3%; color: white;">Update Terakhir : <?php $xx = date_create(@$data['pembiayaan_tanggal']); echo date_format($xx, 'd/m/Y') ?></span>
		    <br/><br/>
		    
		    <form role="form" method="POST" action="<?php echo base_url('pembiayaan/save') ?>" enctype="multipart/form-data">
		        <div class="panel panel-primary setup-content" id="step-1">
		            <div class="panel-body">
		                <div class="form-group">
		                    <label class="control-label">Asal pembiayaan</label>

		                    <!-- <select id="pembiayaan_rumah" name="pembiayaan_rumah" class="form-control">
		                    	<option value="" hidden="">Rumah BUMN</option>
		                    	<?php foreach ($rumah_bumn as $key): ?>
		                    		<option value="<?php echo @$key['rumah_bumn_id'] ?>"><?php echo @$key['rumah_bumn_nama'] ?></option>
		                    	<?php endforeach ?>
		                    </select> -->

		                </div>
		                <div class="form-group">
		                	<!--DB menyusul-->
		                    <select id="pembiayaan_skm" name="pembiayaan_skm" class="form-control">
		                    	<option value="" hidden="">SKM</option>
		                    	<?php foreach ($skm as $key): ?>
		                    		<option value="<?php echo $key['skm_id'] ?>"><?php echo $key['skm_nama'] ?></option>
		                    	<?php endforeach ?>
		                    </select>
		                </div>
		                <div class=" form-group">
		                	
		                	<select id="pembiayaan_skc" name="pembiayaan_skc" class="form-control">
		                    	<option value="" hidden="">SKC</option>
		                    	<?php foreach ($skc as $key): ?>
		                    		<option value="<?php echo @$key['skc_id'] ?>"><?php echo @$key['skc_nama'] ?></option>
		                    	<?php endforeach ?>
		                    </select>

		                </div>

		                <div class=" form-group">
		                	
		                	<select id="pembiayaan_cabang" name="pembiayaan_cabang" class="form-control">
		                    	<option value="" hidden="">Cabang</option>
		                    	<?php foreach ($cabang as $key): ?>
		                    		<option value="<?php echo @$key['rumah_bumn_cabang_id'] ?>"><?php echo @$key['rumah_bumn_cabang_nama'] ?></option>
		                    	<?php endforeach ?>
		                    </select>

		                </div>

						<div class="form-group">
							<label class="control-label">Kantor Wilayah</label>		          
							<select id="pembiayaan_wilayah" name="pembiayaan_wilayah" class="form-control">
		                    	<option value="" hidden="">-- Pilih --</option>
		                    	<?php foreach ($wilayah as $key): ?>
		                    		<option value="<?php echo @$key['wilayah_baru_kode'] ?>"><?php echo @$key['wilayah_baru_nama'] ?></option>
		                    	<?php endforeach ?>
		                    </select>

						</div>		                

		                <div class="form-group">
		                    <label class="control-label">Nama Brand/Merk</label>
		                    <input value="<?php echo @$data['pembiayaan_brand'] ?>" name="pembiayaan_brand" type="text"  class="form-control" placeholder="Brand/Merk" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Nama Usaha</label>
		                    <input value="<?php echo @$data['pembiayaan_usaha'] ?>" name="pembiayaan_usaha" type="text"  class="form-control" placeholder="Usaha" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Jenis Usaha</label>
		                    <select id="pembiayaan_jenis" name="pembiayaan_jenis"  class="form-control">
		                    	<option value="" hidden="">Jenis Usaha</option>
		                    	<?php foreach ($jenis_usaha as $key): ?>
		                    		<option value="<?php echo @$key['jenis_usaha_id'] ?>"><?php echo @$key['jenis_usaha_nama'] ?></option>
		                    	<?php endforeach ?>
		                    	<option value="Lain-lain">Lain-lain sebutkan</option>
		                    </select>
		                </div>
		                <div class="form-group">
		                	<input value="<?php echo @$data['pembiayaan_jenis_lain'] ?>" id="lain" type="hidden" name="pembiayaan_jenis_lain" class="form-control" placeholder="Lain-lain">
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Kategori pembiayaan</label>
		                    <select id="pembiayaan_kategori" name="pembiayaan_kategori"  class="form-control">
		                    	<option value="" hidden="">-- Pilih --</option>
		                    	<option value="Unggulan">Unggulan</option>
		                    	<option value="Non Unggulan">Non Unggulan</option>
		                    </select>
		                </div>

		                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
		            </div>
		        </div>
		        
		        <div class="panel panel-primary setup-content" id="step-2">
		            <div class="panel-body">
		                <div class="form-group">
		                    <label class="control-label">Alamat Usaha</label>

		                    <select id="pembiayaan_provinsi" name="pembiayaan_provinsi"  class="form-control">
		                    	<option value="" hidden="">Provinsi</option>
		                    	<?php foreach ($provinsi as $key): ?>
		                    		<option value="<?php echo @$key['provinsi_id'] ?>"><?php echo @$key['provinsi_nama'] ?></option>
		                    	<?php endforeach ?>
		                    </select>

		                    <input type="hidden" id="pembiayaan_provinsi_text" name="pembiayaan_provinsi_text" value="<?php echo @@$data['pembiayaan_provinsi_text'] ?>">

		                </div>
		                <div class="form-group">

		                    <select id="pembiayaan_kota" name="pembiayaan_kota"  class="form-control">
		                    	<option value="" hidden="">Kab/Kota</option>
		                    </select>

		                    <input type="hidden" id="pembiayaan_kota_text" name="pembiayaan_kota_text" value="<?php echo @@$data['pembiayaan_kota_text'] ?>">

		                </div>

		                <div class="form-group">

		                    <select id="pembiayaan_kecamatan" name="pembiayaan_kecamatan"  class="form-control">
		                    	<option value="" hidden="">Kecamatan</option>
		                    </select>

		                    <input type="hidden" id="pembiayaan_kecamatan_text" name="pembiayaan_kecamatan_text" value="<?php echo @@$data['pembiayaan_kecamatan_text'] ?>">

		                </div>

		                <div class="form-group">
		                    <input type="text" value="<?php echo @$data['pembiayaan_pos'] ?>" name="pembiayaan_pos"  class="form-control" placeholder="Kode Pos" />
		                </div>
		                <div class="form-group">
		                    <input type="text" value="<?php echo @$data['pembiayaan_alamat'] ?>" name="pembiayaan_alamat"  class="form-control" placeholder="Alamat lengkap" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Nama Pemilik</label>
		                    <input type="text" value="<?php echo @$data['pembiayaan_pemilik'] ?>" name="pembiayaan_pemilik"  class="form-control" placeholder="Nama Pemilik" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">No Tlp/Hp pemilik</label>
		                    <input value="<?php echo @$data['pembiayaan_no'] ?>" type="number" name="pembiayaan_no"  class="form-control" placeholder="Tlp/Hp" />
		                </div>

		                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
		            </div>
		        </div>
		        
		        <div class="panel panel-primary setup-content" id="step-3">
		            <div class="panel-body">
		                <div class="form-group">
		                    <label class="control-label">Nama PIC selain pemilik</label>
		                    <input type="text" value="<?php echo @$data['pembiayaan_pic'] ?>" name="pembiayaan_pic"  class="form-control" placeholder="Nama PIC selain pemilik" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">No Tlp/HP PIC</label>
		                    <input type="number" value="<?php echo @$data['pembiayaan_no_pic'] ?>" name="pembiayaan_no_pic"  class="form-control" placeholder="Tlp/HP PIC " />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Nama IG Usaha</label>
		                    <input type="text" value="<?php echo @$data['pembiayaan_ig'] ?>" name="pembiayaan_ig"  class="form-control" placeholder="Instagram" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Nama FB Usaha</label>
		                    <input type="text" value="<?php echo @$data['pembiayaan_fb'] ?>" name="pembiayaan_fb"  class="form-control" placeholder="Facebook" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Alamat Email (Aktif)</label>
		                    <input type="text" value="<?php echo @$data['pembiayaan_email'] ?>" name="pembiayaan_email"  class="form-control" placeholder="Gmail" />
		                </div>

		                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
		            </div>
		        </div>
		        
		        <div class="panel panel-primary setup-content" id="step-4">
		            <div class="panel-body">
		                <div class="form-group">
		                    <label class="control-label">Channel penjualan online</label>
		                    <input type="text" name="pembiayaan_shopee"  class="form-control" placeholder="Shopee" value="<?php echo @$data['pembiayaan_shopee'] ?>" />
		                </div>
		                <div class="form-group">
		                    <input type="text" name="pembiayaan_tokopedia"  class="form-control" placeholder="Tokopedia" value="<?php echo @$data['pembiayaan_tokopedia'] ?>" />
		                </div>
		                <div class="form-group">
		                    <input type="text" value="<?php echo @$data['pembiayaan_lazada'] ?>" name="pembiayaan_lazada"  class="form-control" placeholder="Lazada" />
		                </div>
		                <div class="form-group">
		                    <input type="text" value="<?php echo @$data['pembiayaan_bukalapak'] ?>" name="pembiayaan_bukalapak"  class="form-control" placeholder="Bukalapak" />
		                </div>
		                <div class="form-group">
		                    <input type="text" value="<?php echo @$data['pembiayaan_jdid'] ?>" name="pembiayaan_jdid"  class="form-control" placeholder="Jd.id" />
		                </div>
		                <div class="form-group">
		                    <input type="text" value="<?php echo @$data['pembiayaan_blibli'] ?>" name="pembiayaan_blibli"  class="form-control" placeholder="Blibli" />
		                </div>
		                <div class="form-group">
		                    <input type="text" value="<?php echo @$data['pembiayaan_padi'] ?>" name="pembiayaan_padi"  class="form-control" placeholder="PADI" />
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Nama Website Usaha</label>
		                    <input type="text" value="<?php echo @$data['pembiayaan_website'] ?>" name="pembiayaan_website"  class="form-control" placeholder="Website" />
		                </div>

		                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
		                
		            </div>
		        </div>

		        <div class="panel panel-primary setup-content" id="step-5">
		            <div class="panel-body">

			            <div class="form-group">
		                    <label class="control-label">Pameran yang pernah di ikuti di dalam negeri</label>

							<?php if (@@$data['pembiayaan_pameran_dalam']): ?>

								<?php $i = 0; ?>
								<?php foreach (json_decode(@$data['pembiayaan_pameran_dalam']) as $key): ?>

									<div class="input-group" style="margin-top: 1%;">
			                    		<input type="text" class="form-control" name="pembiayaan_pameran_dalam[]" value="<?php echo $key ?>">
										<span class="input-group-addon" style="background-color: #efefef;">

											<?php if ($i < 1): ?>
												<button style="border: none; outline:none;" type="button" onclick="add_input('pembiayaan_pameran_dalam_copy','pembiayaan_pameran_dalam_tampil')"><i class="fa fa-plus"></i></button>
											<?php else: ?>	
												<button style="border: none; outline:none;" type="button" <button onclick="remove_input(this,'input-group')" style="border: none; outline:none;"><i class="fa fa-minus"></i></button>
											<?php endif ?>

										</span>
									</div>
								
								<?php $i++; ?>
								<?php endforeach ?>
							
							<?php else: ?>
								
								<div class="input-group">
		                    		<input type="text" class="form-control" name="pembiayaan_pameran_dalam[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button style="border: none; outline:none;" type="button" onclick="add_input('pembiayaan_pameran_dalam_copy','pembiayaan_pameran_dalam_tampil')"><i class="fa fa-plus"></i></button></span>
								</div>

							<?php endif ?>

							<!--clone element-->
							<div hidden="" id="pembiayaan_pameran_dalam_copy">
								<div class="input-group" style="margin-top: 1%;">
		                    		<input type="text" class="form-control" name="pembiayaan_pameran_dalam[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button onclick="remove_input(this,'input-group')" style="border: none; outline:none;" type="button"><i class="fa fa-minus"></i></button></span>
								</div>
							</div>

							<!--tampil-->
							<div id="pembiayaan_pameran_dalam_tampil">
								
							</div>

		                </div>

		                <div class="form-group">
		                    <label class="control-label">Pameran yang pernah di ikuti di luar negeri</label>

		                    <?php if (@@$data['pembiayaan_pameran_luar']): ?>

								<?php $i = 0; ?>
								<?php foreach (json_decode(@$data['pembiayaan_pameran_luar']) as $key): ?>

									<div class="input-group" style="margin-top: 1%;">
			                    		<input type="text" class="form-control" name="pembiayaan_pameran_luar[]" value="<?php echo $key ?>">
										<span class="input-group-addon" style="background-color: #efefef;">

											<?php if ($i < 1): ?>
												<button style="border: none; outline:none;" type="button" onclick="add_input('pembiayaan_pameran_luar_copy','pembiayaan_pameran_luar_tampil')"><i class="fa fa-plus"></i></button>
											<?php else: ?>	
												<button style="border: none; outline:none;" type="button" <button onclick="remove_input(this,'input-group')" style="border: none; outline:none;"><i class="fa fa-minus"></i></button>
											<?php endif ?>

										</span>
									</div>
								
								<?php $i++; ?>
								<?php endforeach ?>
							
							<?php else: ?>
								
								<div class="input-group">
		                    		<input type="text" class="form-control" name="pembiayaan_pameran_luar[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button style="border: none; outline:none;" type="button" onclick="add_input('pembiayaan_pameran_luar_copy','pembiayaan_pameran_luar_tampil')"><i class="fa fa-plus"></i></button></span>
								</div>

							<?php endif ?>

							<!--clone element-->
							<div hidden="" id="pembiayaan_pameran_luar_copy">
								<div class="input-group" style="margin-top: 1%;">
		                    		<input  type="text" class="form-control" name="pembiayaan_pameran_luar[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button onclick="remove_input(this,'input-group')" style="border: none; outline:none;" type="button"><i class="fa fa-minus"></i></button></span>
								</div>
							</div>

							<!--tampil-->
							<div id="pembiayaan_pameran_luar_tampil">
								
							</div>
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Penghargaan yang pernah di terima </label>

		                    <?php if (@@$data['pembiayaan_penghargaan']): ?>

								<?php $i = 0; ?>
								<?php foreach (json_decode(@$data['pembiayaan_penghargaan']) as $key): ?>

									<div class="input-group" style="margin-top: 1%;">
			                    		<input type="text" class="form-control" name="pembiayaan_penghargaan[]" value="<?php echo $key ?>">
										<span class="input-group-addon" style="background-color: #efefef;">

											<?php if ($i < 1): ?>
												<button style="border: none; outline:none;" type="button" onclick="add_input('pembiayaan_penghargaan_copy','pembiayaan_penghargaan_tampil')"><i class="fa fa-plus"></i></button>
											<?php else: ?>	
												<button style="border: none; outline:none;" type="button" <button onclick="remove_input(this,'input-group')" style="border: none; outline:none;"><i class="fa fa-minus"></i></button>
											<?php endif ?>

										</span>
									</div>
								
								<?php $i++; ?>
								<?php endforeach ?>
							
							<?php else: ?>
								
								<div class="input-group">
		                    		<input type="text" class="form-control" name="pembiayaan_penghargaan[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button style="border: none; outline:none;" type="button" onclick="add_input('pembiayaan_penghargaan_copy','pembiayaan_penghargaan_tampil')"><i class="fa fa-plus"></i></button></span>
								</div>

							<?php endif ?>

							<!--clone element-->
							<div hidden="" id="pembiayaan_penghargaan_copy">
								<div class="input-group" style="margin-top: 1%;">
		                    		<input  type="text" class="form-control" name="pembiayaan_penghargaan[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button onclick="remove_input(this,'input-group')" style="border: none; outline:none;" type="button"><i class="fa fa-minus"></i></button></span>
								</div>
							</div>

							<!--tampil-->
							<div id="pembiayaan_penghargaan_tampil">
								
							</div>
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Deskripsi produk pembiayaan</label>
		                    
		                    <?php if (@@$data['pembiayaan_deskripsi']): ?>

								<?php $i = 0; ?>
								<?php foreach (json_decode(@$data['pembiayaan_deskripsi']) as $key): ?>

									<div class="input-group" style="margin-top: 1%;">
			                    		<input type="text" class="form-control" name="pembiayaan_deskripsi[]" value="<?php echo $key ?>">
										<span class="input-group-addon" style="background-color: #efefef;">

											<?php if ($i < 1): ?>
												<button style="border: none; outline:none;" type="button" onclick="add_input('pembiayaan_deskripsi_copy','pembiayaan_deskripsi_tampil')"><i class="fa fa-plus"></i></button>
											<?php else: ?>	
												<button style="border: none; outline:none;" type="button" <button onclick="remove_input(this,'input-group')" style="border: none; outline:none;"><i class="fa fa-minus"></i></button>
											<?php endif ?>

										</span>
									</div>
								
								<?php $i++; ?>
								<?php endforeach ?>
							
							<?php else: ?>
								
								<div class="input-group">
		                    		<input type="text" class="form-control" name="pembiayaan_deskripsi[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button style="border: none; outline:none;" type="button" onclick="add_input('pembiayaan_deskripsi_copy','pembiayaan_deskripsi_tampil')"><i class="fa fa-plus"></i></button></span>
								</div>

							<?php endif ?>

							<!--clone element-->
							<div hidden="" id="pembiayaan_deskripsi_copy">
								<div class="input-group" style="margin-top: 1%;">
		                    		<input  type="text" class="form-control" name="pembiayaan_deskripsi[]">
									<span class="input-group-addon" style="background-color: #efefef;"><button onclick="remove_input(this,'input-group')" style="border: none; outline:none;" type="button"><i class="fa fa-minus"></i></button></span>
								</div>
							</div>

							<!--tampil-->
							<div id="pembiayaan_deskripsi_tampil">
								
							</div>
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Berdiri sejak tahun</label>
		                    <input type="text" value="<?php echo @$data['pembiayaan_berdiri'] ?>" name="pembiayaan_berdiri"  class="form-control" placeholder="Sejak Tahun" />
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Skala Usaha</label>
		                    <select id="pembiayaan_skala" name="pembiayaan_skala" class="form-control">
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
		                    <input type="number" value="<?php echo @$data['pembiayaan_karyawan'] ?>" name="pembiayaan_karyawan"  class="form-control" placeholder="Jumlah Karyawan" />
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Omset rata-rata per bulan</label>
		                    <input type="text" value="<?php echo @$data['pembiayaan_omset'] ?>" name="pembiayaan_omset"  class="form-control" placeholder="Omset rata-rata" />
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Jenis pembiayaan BNI</label>
		                    <select id="pembiayaan_jenis_biaya_bni" name="pembiayaan_jenis_biaya_bni" class="form-control">
		                   		<option value="Kredit Kemitraan">Kredit Kemitraan</option>
		                    	<option value="KUR">KUR</option>
		                    	<option value="BCM">BCM</option>
		                    </select>
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Nilai Kredit</label>
		                    <input type="number" value="<?php echo @$data['pembiayaan_kredit'] ?>" name="pembiayaan_kredit"  class="form-control" placeholder="Nilai Kredit" />
		                </div>

		                <div class="form-group">
		                    <label class="control-label">Upload foto produk</label> <small class="text-danger">* Maksimal 4 lebih dari 4 foto tidak akan di simpan</small>

		                    <div class="row">
		                    	<div class="col-md-3">
			                    	<input type="file" name="pembiayaan_produk[]"  class="form-control" />
			                    </div>
			                    <div class="col-md-3">
			                    	<input type="file" name="pembiayaan_produk[]"  class="form-control" />
			                    </div>
			                    <div class="col-md-3">
			                    	<input type="file" name="pembiayaan_produk[]"  class="form-control" />
			                    </div>
			                    <div class="col-md-3">
			                    	<input type="file" name="pembiayaan_produk[]"  class="form-control" />
			                    </div>
		                    </div>

		                </div>

		                <div class="form-group">

		                	<div class="row">
		                
		                	<?php if (@@$data['pembiayaan_produk']): ?>
		                    	<?php $i = 1; ?>
		                    	 <?php foreach (json_decode(@$data['pembiayaan_produk'],true) as $key): ?>
		                    	 	<div class="col-md-2 col-xs-6">
			                    	 	<img src="<?php echo base_url('asset/gambar/pembiayaan/'.$key) ?>" alt="" class="img-thumbnail" width="200">
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
			                               <a href="<?php echo base_url('pembiayaan/delete/'.$key) ?>"><button class="btn btn-success" type="button" style="width: 49%;">Yes</button></a>
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
		                    <label class="control-label">Upload Logo pembiayaan</label>
		                    <input type="file" name="pembiayaan_logo"  class="form-control" />

		                    <div style="margin-top: 0.5%;"></div>
			                    <?php if (@@$data['pembiayaan_logo']): ?>
			                    	<img src="<?php echo base_url('asset/gambar/pembiayaan/'.@$data['pembiayaan_logo']) ?>" alt="" class="img-thumbnail" width="100">
			                    <?php endif ?>
			                </div>

		                <div class="form-group">
		                    <label class="control-label"> Bila usaha merupakan usaha makanan/minuman apa sudah – Memiliki izin BPOM</label>
		                    <select id="pembiayaan_bpom" name="pembiayaan_bpom" class="form-control">
		                    	<option value="Tidak">Tidak</option>
		                    	<option value="Ya">Ya</option>
		                    </select>
		                </div>

		                <div class="form-group">
			                <label>Izin Usaha yang dimiliki</label> <small class="text-danger">* dapat memilih lebih dari satu izin usahan</small>
			                <select id="pembiayaan_izinusaha" name="pembiayaan_izinusaha[]" class="form-control select2" multiple="multiple" style="width: 100%;">
			                  <option value="PIRT">PIRT</option>
			                  <option value="SKDP">SKDP</option>
			                  <option value="SIUP">SIUP</option>
			                  <option value="TDP">TDP</option>
			                  <option value="NPWP">NPWP</option>
			                  <option value="Sertifikat Halal">Sertifikat Halal</option>
			                  <option value="Izin BPOM">Izin BPOM</option>
			                </select>
			              </div>

		        		<button class="btn btn-primary pull-right" type="submit">Finish!</button>
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

	////////////////// end form next ////////////////////////

$('#pembiayaan_jenis').on('change', function (e) {
    if ($('#pembiayaan_jenis').val() == 'Lain-lain') {
    	$('#lain').attr('type','text');
    	$('#lain').attr('required',true);
    }else{
    	$('#lain').attr('type','hidden');
    	$('#lain').val('');
    }
});

//pembiayaan kota
$('#pembiayaan_provinsi').on('change', function (e) {

	let id = $(this).val();

	//delete
	$('#pembiayaan_kota').empty();
	$('#pembiayaan_kota').append('<option value="" hidden="">Kab/Kota</option>');

   $.getJSON('<?php echo $this->api_kota->kota() ?>'+id, function(data) {
   		
   		$.each(data, function(index) {
   			
   			let html = '';
   			html += '<option value="'+data[index].kota_id+'">'+data[index].kota_nama+'</option>';

   			$('#pembiayaan_kota').append(html);

   			$('#pembiayaan_kota').val('<?php echo @@$data['pembiayaan_kota'] ?>').change();
   		});

   });

   //pembiayaan_provinsi_text
  $('#pembiayaan_provinsi_text').val($('#pembiayaan_provinsi option:selected').text());
   
});


//pembiayaan kecamatan
$('#pembiayaan_kota').on('change', function (e) {

	let id = $(this).val();

	//delete
	$('#pembiayaan_kecamatan').empty();
	$('#pembiayaan_kecamatan').append('<option value="" hidden="">Kecamatan</option>');

   $.getJSON('<?php echo $this->api_kota->kecamatan() ?>'+id, function(data) {
   		
   		$.each(data, function(index) {
   			
   			let html = '';
   			html += '<option value="'+data[index].kecamatan_id+'">'+data[index].kecamatan_nama+'</option>';

   			$('#pembiayaan_kecamatan').append(html);

   			$('#pembiayaan_kecamatan').val('<?php echo @@$data['pembiayaan_kecamatan'] ?>').change();
   		});   		

   });

   //pembiayaan_kota_text
  $('#pembiayaan_kota_text').val($('#pembiayaan_kota option:selected').text());
   
});

$('#pembiayaan_kecamatan').on('change', function (e) {
	//pembiayaan_kecamatan_text
	$('#pembiayaan_kecamatan_text').val($('#pembiayaan_kecamatan option:selected').text());
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
$('#pembiayaan_bpom').on('change', function (e) {
	if ($(this).val() == 'Ya') {
		$('#izin_usaha').removeAttr('hidden');
	}else{
		$('#izin_usaha').attr('hidden',true);
	}
});

//

/////////////select option/////////////////////////

//alamat usaha
$('#pembiayaan_provinsi').val('<?php echo @@$data['pembiayaan_provinsi'] ?>').change();
/////////////

$('#pembiayaan_rumah').val('<?php echo @@$data['pembiayaan_rumah'] ?>').change();
$('#pembiayaan_skc').val('<?php echo @@$data['pembiayaan_skc'] ?>').change();
$('#pembiayaan_cabang').val('<?php echo @@$data['pembiayaan_cabang'] ?>').change();

$('#pembiayaan_jenis').val('<?php echo @@$data['pembiayaan_jenis'] ?>').change();
$('#pembiayaan_skala').val('<?php echo @@$data['pembiayaan_skala'] ?>').change();
$('#pembiayaan_bpom').val('<?php echo @@$data['pembiayaan_bpom'] ?>').change();
$('#pembiayaan_kategori').val('<?php echo @@$data['pembiayaan_kategori'] ?>').change();
$('#pembiayaan_wilayah').val('<?php echo @@$data['pembiayaan_wilayah'] ?>').change();
$('#pembiayaan_skm').val('<?php echo @@$data['pembiayaan_skm'] ?>').change();

$('#pembiayaan_izinusaha').val(<?php echo @@$data['pembiayaan_izinusaha'] ?>).select();
 
</script>