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
				<form method="post" action='<?php echo base_url(); ?>c_index_aka/cari_nim'>
					<label class="control-label" for="form-field-1">Cari NIM Mahasiswa</label>
					<input type="text" id="form-field-1" placeholder="berdasarkan NIM" name="nim"/>
					<input type ="submit" name="cari" value="Cari" class="btn btn-info"/>
				</form>
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
						<th><center>No</center></th>
						<th>NIM</th>
						<th>Nama Mahasiswa</th>
						<th>Semester</th>
						<th>Jumlah SKS</th>
						<th>Action
						</th>
					</tr>
				</thead>

				<tbody>
					
				<?php

					//Loop data
					$no = 1;
					foreach ($query as $row) {			 
				?>
					<tr>
						<td><center><?php echo $no;?></center></td>
						<td><?php echo $row->nim; ?></td>
						<td><?php echo $row->nama; ?></td>
						<td><?php echo $row->smt; ?></td>
						<?php 
						$jml_sks = $row->sks;
						if($jml_sks <= 0 ){
						?>
							<td><span class="label label-info arrowed arrowed-righ">Habis</span></td>							
						<?php	
						}else{
						?>
							<td><?php echo $row->sks; ?></td>						
						<?php
						}
						?>
						<td class="td-actions">
							<div class="hidden-phone visible-desktop action-buttons">
								<a class="green" href="<?php echo base_url(); ?>c_index_aka/frs/<?php echo $row->id; ?>">
									<span class="label label-info arrowed arrowed-righ" style='width:20px;'>Isi</span>
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
