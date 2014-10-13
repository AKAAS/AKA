<div class="main-content">
<div class="breadcrumbs" id="breadcrumbs">
<ul class="breadcrumb">
<li>
	<i class="icon- home-icon"></i>
	<a href="#">Home</a>

	<span class="divider">
		<i class="icon-angle-right arrow-icon"></i>
	</span>
</li>
<li class="active">Tambah Data Mahasiswa</li>
</ul><!--.breadcrumb-->

<div class="nav-search" id="nav-search">
<form class="form-search" />
	<span class="input-icon">
		<input type="text" placeholder="Search ..." class="input-small nav-search-input" id="nav-search-input" autocomplete="off" />
		<i class="icon-search nav-search-icon"></i>
	</span>
</form>
</div><!--#nav-search-->
</div>

<div class="page-content">
<div class="page-header position-relative">
<h1>
	Akademik Kimia Analisis
</h1>
</div><!--/.page-header-->

<div class="row-fluid">
	<h2>Form Input Data Mahasiswa</h2>
	
	<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Input Data Mahasiswa
					</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
					
						<div class="form-horizontal">
						<?php echo form_open_multipart('c_index_aka/proses_data_mahasiswa');?>
						
							<div class="control-group">
														<label class="control-label" for="form-field-2">Foto</label>

														<div class="controls">
															<input type="file" name="userfile" />
														</div>
													</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">NIM </label>

								<div class="controls">
									<input type="text" id="form-field-1" name="nim" placeholder="NIM" />
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Nama Mahasiswa </label>

								<div class="controls">
									<input type="text" id="form-field-1" name="nama" placeholder="Nama Mahasiswa" />
								</div>
							</div>

							
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Angkatan</label>
								<div class="controls">
									<select id="form-field-select-1" name="angkatan">
										<?php

											$this_year = date("Y");
											
											for ($year=2001; $year <= $this_year ; $year++) { 
												
												$year_plus = $year + 1;
											
											?>
											<option value="<?php echo $year; ?> / <?php echo $year_plus; ?>"><?php echo $year; ?> / <?php echo $year_plus; ?></option>
										<?php
											
											}
											
										 ?>
										
									</select>
								</div>
							</div>
							
							
							<?php

								$gender = array(
									'gender_1' => 'Laki-laki',
									'gender_2' => 'Perempuan'
									);

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Jenis kelamin</label>
								<div class="controls">
									<select id="form-field-select-1" name="jenis_kelamin">
										<?php

											//Loop Gender

											foreach($gender as $gender){

										?>

										<option value="<?php echo $gender; ?>" /><?php echo $gender; ?>

										<?php

											}

										?>
									</select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Alamat
								</label>

								<div class="controls">
									<textarea rows = "4" id="form-field-1" name="alamat"></textarea>
									&nbsp &nbsp
									Format penulisan alamat :
									(Jalan, RT/RW, Kelurahan,  
									Kecamatan, Kota/Kabupaten, 
									Kode Pos, Propinsi)
								</div>	

							</div>

							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Kode pos </label>

								<div class="controls">
									<input type="text" id="form-field-1" name="kode_pos" placeholder="Kode Pos" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" >Tempat Tanggal Lahir </label>

								<div class="controls">
									<input type="text" name="tempat_lahir" placeholder="Tempat Lahir" />
									<br><br>
									<select id="form-field-select-1" name="tanggal_lahir">
										<option value="" />--Tanggal Lahir--
										<?php

										 for ($i=1; $i <32 ; $i++) { 

										?>
										<option value="<?php echo $i; ?>" /><?php echo $i; ?>
										<?php 
											}
										 ?>
									</select>

									<br><br>
								<select id="form-field-select-1" name="bulan_lahir">
										<option value="" />--Bulan Lahir--
										<?php

											$mounth = array('Januari' => 'Januari', 'Februari' => 'Februari', 'Maret' => 'Maret', 'April' => 'April', 'Mei' => 'Mei', 'Juni' => 'Juni', 'Juli' => 'Juli', 'Agustus' => 'Agustus', 'September' => 'September', 'Oktober' => 'Oktober', 'November' => 'November', 'Desember' => 'Desember'); 
											foreach ($mounth as $mounth) {
																					
										 ?>
										<option value="<?php echo $mounth; ?>" /><?php echo $mounth; ?>

										<?php 
											}
										 ?>
									</select>

									<br><br>

									<select id="form-field-select-1" name="tahun_lahir">
										<option value="--Tahun--" />--Tahun--
										<?php

											//Loop Year

											

											for ($i = 1945; $i <= 2014; $i++) { 
										
										?>

										<option value="<?php echo $i; ?>"><?php echo $i; ?></option>

										<?php
											
											}

										?>
									</select>

								</div>
							</div>

							<?php

								$sn = array(
									'sn_1' => 'Sudah menikah',
									'sn_2' => 'Belum menikah'
									);

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Status Nikah</label>
								<div class="controls">
									<select id="form-field-select-1" name="status_nikah">
										<option>---pilih--- </option>
										<?php

											//Loop sn

											foreach($sn as $sn){

										?>
										
										<option value="<?php echo $sn; ?>" /><?php echo $sn; ?>

										<?php

											}

										?>
									</select>
								</div>
							</div>

							<?php

								$gol = array(
									'gol_1' => 'a',
									'gol_2' => 'b',
									'gol_3' => 'o',
									'gol_4' => 'ab'
									);

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Golongan Darah</label>
								<div class="controls">
									<select id="form-field-select-1" name="golongan_darah">
										<option>---pilih--- </option>
										<?php

											//Loop gol

											foreach($gol as $gol){

										?>
										
										<option value="<?php echo $gol; ?>" /><?php echo $gol; ?>

										<?php

											}

										?>
									</select>
								</div>
							</div>

							<?php

								$agama = array(
									'agama_1' => 'Islam',
									'agama_2' => 'Kristen',
									'agama_3' => 'Katolik',
									'agama_4' => 'Budha',
									'agama_5' => 'Hindu'
									);

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Agama</label>
								<div class="controls">
									<select id="form-field-select-1" name="agama">
										<option>---pilih--- </option>
										<?php

											//Loop agama

											foreach($agama as $agama){

										?>
										
										<option value="<?php echo $agama; ?>" /><?php echo $agama; ?>

										<?php

											}

										?>
									</select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">No ponsel </label>

								<div class="controls">
									<input type="text" id="form-field-1" name="no_ponsel" placeholder="no ponsel" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Jalur masuk </label>

								<div class="controls">
									<input type="text" id="form-field-1" name="jalur_masuk" placeholder="Jalur masuk" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Asal Sekolah </label>

								<div class="controls">
									<input type="text" id="form-field-1" name="asal_sekolah" placeholder="Asal Sekolah" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Alamat Sekolah </label>

								<div class="controls">
									<textarea rows = "4" id="form-field-1" name="alamat_sekolah"></textarea>
								</div>	
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Kode pos asal </label>

								<div class="controls">
									<input type="text" id="form-field-1" name="kode_pos_ortu" placeholder="Kode pos" />
								</div>
							</div>

							<?php

								$jurusan = array(
									'jurusan_1' => 'IPA',
									'jurusan_2' => 'IPS',
									'jurusan_3' => 'Bahasa'
									);

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Jurusan</label>
								<div class="controls">
									<select id="form-field-select-1" name="jurusan">
										<option>---pilih--- </option>
										<?php

											//Loop agama

											foreach($jurusan as $jurusan){

										?>
										
										<option value="<?php echo $jurusan; ?>" /><?php echo $jurusan; ?>

										<?php

											}

										?>
									</select>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Nama Orang Tua </label>

								<div class="controls">
									<input type="text" id="form-field-1" name="nama_ortu" placeholder="Nama Orang Tua" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Alamat Orang Tua</label>

								<div class="controls">
									<textarea rows = "4" id="form-field-1" name="alamat_ortu"></textarea>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">No Ponsel Orang Tua</label>

								<div class="controls">
									<input type="text" id="form-field-1" name="no_ponsel_ortu" placeholder="No Ponsel Orang Tua" />
								</div>
							</div>

							

							<div class="control-group">
								<label class="control-label" for="form-field-1">Pekerjaan</label>

								<div class="controls">
									<input type="text" id="form-field-1" name="pekerjaan" placeholder="Pekerjaan" />
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Pendidikan Orang Tua</label>

								<div class="controls">
									<input type="text" id="form-field-1" name="pend_ortu" placeholder="Pendidikan Orang Tua" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">No Telepon</label>

								<div class="controls">
									<input type="text" id="form-field-1" name="no_telp" placeholder="No Telpon" />
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Password</label>

								<div class="controls">
									<input type="password" id="form-field-1" name="password" placeholder="Password" />
								</div>
							</div>

							
							<?php

								$k = $this->db->get('t_kelas');
								$kelas = $k->result();

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Kelas</label>
									<div class="controls">
									<select id="form-field-select-1" name="id_kelas">
										<option value="" />--Kelas--
										<?php 
											foreach($kelas as $row){ ?>
											<option value="<?php echo $row->id_kelas;?>"><?php echo $row->nama_kelas;?></option>
											
											<?php
											}
											?>
									</select>
									</div>
							</div>

							<?php

								$status = array(
									'status_1' => 'aktif',
									'status_2' => 'non aktif'
									);

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Status kuliah</label>
								<div class="controls">
									<select id="form-field-select-1" name="status_kuliah">
										<option>---pilih--- </option>
										<?php

											//Loop agama

											foreach($status as $status){

										?>
										
										<option value="<?php echo $status; ?>" /><?php echo $status; ?>

										<?php

											}

										?>
									</select>
								</div>
							</div>
						
						
						<div class="form-actions">
							<input type="submit" name="add_mahasiswa" value ="Save" class="btn btn-info">
						</div>
						
					</form>
					</div>
					</div>
				</div>
			
			</div>
</div>