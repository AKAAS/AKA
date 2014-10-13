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
	<li class="active">Data Mahasiswa</li>
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
		Mahasiswa
		<small>
			<i class="icon-double-angle-right"></i>
			Data mahasiswa
		</small>
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">

		<div class="control-group">		
				<div class="controls">
					<label class="control-label" for="form-field-1">Cari Data Mahasiswa</label>
					<input type="text" id="form-field-1" placeholder="" />
					<select id="form-field-select-1">
										<option value="" />--Pilih--
										<option value="AL" />xample
										
									</select>
					<button class="btn btn-small btn-primary" style="margin-top:-10px;">Search</button>
				</div>
		</div>
	</div><!--/.row-fluid-->
	<br>
<div class="row-fluid">
			<div class="table-header">
				Results for "hasil pencarian Mahasiswa"
			</div>
			
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th style="text-align:center;"><center>No</center></th>
						<th style="text-align:center;">NIM</th>
						<th style="text-align:center;">Nama Mahasiswa; <br> Kelas</th>
						<th style="text-align:center;">Tempat Tanggal Lahir; Jenis Kelamin</th>
						<th style="text-align:center;">Agama; Gol Darah</th>
						<th style="text-align:center;">Alamat mahasiswa; Asal kota; Asal povinsi</th>
						<th style="text-align:center;">Asal sekolah; Alamat Sekolah</th>
						<th style="text-align:center;">Nama orang tua; Pendidikan orang tua;  Pekerjaan orang tua;  Alamat orang tua;  Nomor Telepon</th>
						<th style="text-align:center;">Foto</th>
						<th style="text-align:center;">

							<a class="green" href="<?php echo base_url(); ?>c_index_aka/add_data_mahasiswa">
								Tambah <i class="icon-plus bigger-130"></i> 
							</a>

						</th>
					</tr>
				</thead>

				<tbody>
					
				<?php

					//Loop data
					$no = 1;
					foreach ($data as $data) {			 
				?>
					<tr>
						<td style="text-align:center;" ><center><?php echo $no;?></center></td>
						<td style="text-align:center;" ><?php echo $data['nim']; ?></td>
						<td style="text-align:center;" ><?php echo $data['nama']; ?>; <br> ID Kelas : <?php echo $data['id_kelas']; ?> <br> <?php echo $data['nama_kelas']; ?></td>
						<td style="text-align:center;" ><?php echo $data['ttl']; ?>; <br> <?php echo $data['jenis_kelamin']; ?></td>
						<td style="text-align:center;" ><?php echo $data['agama']; ?>; <br> <?php echo $data['golongan_darah']; ?></td>
						<td style="text-align:center;" ><?php echo $data['alamat']; ?>;</td>
						<td style="text-align:center;" ><?php echo $data['asal_sekolah']; ?>; <br> <?php echo $data['alamat_sekolah']; ?>; </td>
						<td style="text-align:center;" ><?php echo $data['nama_ortu']; ?>; <br> <?php echo $data['pend_ortu']; ?>; <br> <?php echo $data['pekerjaan']; ?>; <br> <?php echo $data['no_ponsel_ortu']; ?></td>
						<td  style="text-align:center;" width="10%"><img src="<?php echo base_url(); ?>assets/images/<?php echo $data['foto']; ?>" alt=""></td>
						<td  style="text-align:center;" class="td-actions">
							<div class="hidden-phone visible-desktop action-buttons">
								<a class="blue" href="#">
									<i class="icon-zoom-in bigger-130"></i>
								</a><br>

								<a class="green" href="<?php echo base_url(); ?>c_index_aka/edit_mahasiswa/<?php echo $data['id_mahasiswa']; ?>">
									<i class="icon-pencil bigger-130"></i>
								</a><br>

								<a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url(); ?>c_index_aka/hapus_mahasiswa/<?php echo $data['id_mahasiswa']; ?>/<?php echo $data['foto']; ?>">
									<i class="icon-trash bigger-130"></i>
								</a>
							</div>

							
						</td>
					</tr>
					<?php
						$no++;
					} ?>
				</tbody>
			</table>
		
</div>
</div><!--/.page-content-->

