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
				<form method="post" action='<?php echo base_url(); ?>c_index_aka/cari_nim'>
					<label class="control-label" for="form-field-1">Cari NIM Mahasiswa</label>
					<input type="text" id="form-field-1" placeholder="berdasarkan NIM" name="nim"/>
					<input type ="submit" name="cari" value="Cari" class="btn btn-info"/>
				</form>
				</div>
		</div>	
	</div><!--/.row-fluid-->
	<br>
<?php /*
   declare target date; source: http://us.imdb.com/ReleaseDates?0121766 ; 
  */
  $day   = 31;     // Day of the countdown
  $month = 12;      // Month of the countdown
  $year  = 2014;   // Year of the countdown
  $hour  = 23;     // Hour of the day (east coast time)
  $event = "New Year's Eve, 2014"; //event

  $calculation = ((mktime ($hour,0,0,$month,$day,$year) - time(void))/3600);
  $hours = (int)$calculation;
  $days  = (int)($hours/24);
/*
  mktime() http://www.php.net/manual/en/function.mktime.php
  time()   http://www.php.net/manual/en/function.time.php
  (int)    http://www.php.net/manual/en/language.types.integer.php
*/
?>
<ul>
<li>The date is <?=(date ("l, jS \of F Y g:i:s A"));?>.</li>
<li>It is <?=$days?> days until <?=$event?>.</li>
<li>It is <?=$hours?> hours until <?=$event?>.</li>
</ul>
<div class="row-fluid">
			<div class="table-header">
				Results for "hasil pencarian Mahasiswa" <?php echo $this->m_aka->msg('msg_cari_nim'); ?>
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
					}
					 ?>
				</tbody>
			</table>
</div>
</div><!--/.page-content-->

