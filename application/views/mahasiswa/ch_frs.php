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
	<div class='row-fluid'>
		<div class='control-group'>
			<div class='controls'>
				<div class="table-header">
					Data Mahasiswa
				</div>
<?php
				$row_mahasiswa = $data_mhs->row();
?>				
				<table id="sample-table-2" class="table table-striped table-bordered table-hover">				
					<tbody>
						<tr>
							<td>
					<h3>								
								<div class='span4'>	
								NIM  
								</div>
								<div class='span5'>
								<?php echo $row_mahasiswa->nim_a; ?>
								</div> 
							</td>
					</h3>
							<td>
					<h3>								
								<div class='span4'>
								Semester  
								</div>
								<div class='span5'>
								<?php echo $row_mahasiswa->smt; ?>
								</div>
							</td>
					</h3>
						</tr>
						<tr>
							<td>
					<h3>								
								<div class='span4'>	
								Nama  
								</div>
								<div class='span5'>
								<?php echo $row_mahasiswa->nama_mhs; ?>									
								</div> 
							</td>
					</h3>
					
							<td>
					<h3>								
								<div class='span4'>
								SKS  
								</div>
								<div class='span5'>
								<div id='sks_mahasiswa'><?php echo $row_mahasiswa->sks; ?></div>
								</div>
							</td>
					</h3>
						
						</tr>						
					</tbody>
			</table>

			</div>
		</div>
	</div>
<div class="row-fluid">

			<div class="table-header">
				Formulir Rencana Studi
			</div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th><center>No</center></th>
						<th>Kode MK</th>
						<th>Mata Kuliah</th>
						<th>SKS</th>
						<th>Sisa Kuota Kelas</th>
						<th>Kelas</th>
						<th>Semester</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>

				<?php
				echo $this->m_aka->msg('frs','alert-error');
					//Loop data
					$no = 1;
					foreach ($data_frs->result() as $row) {			 
				?>
				<form metho='POST' name='frs' action=''>
					<tr>
						<td><center><?php echo $no;?></center></td>
						<td><?php echo $row->kode_mk_d; ?></td>
						<td><?php echo $row->nama_mk_a; ?></td>
						<td><label id='sks'><?php echo $row->jumlah_sks; ?></label></td>
						<td><label id='sisa_kuota'><?php echo $row->isi; ?></label></td>
						<td><?php echo $row->nama_kelas; ?></td>
						<td><?php echo $row->smt; ?></td>
						<td>
							<a href='<?php echo base_url(); ?>c_index_aka/frs_cart/<?php echo $this->uri->segment(3); ?>/<?php echo $row->id_e ?>' id='<?php echo $row->id_e; ?>'><button class='btn btn-primary' onclick='javascript:proses();'>Ambil</button</a>
<!--							<label>
								<input name='ambil_frs' type='checkbox' value='<?php echo $row->id_e; ?>' onClick='javascript:pilih('<?php echo $row->id_e; ?>');'><span class='lbl'>Ambil</span>
							</label>-->
						</td>
					</tr>
					<?php
						$no++;
					} ?>					
				</tbody>
			</table>
</div>
<?php
if($this->cart->contents() >= 1){
	foreach($this->cart->contents() as $mk){
		echo $mk['rowid'];
			
	}
}else{
	echo"Masih engga ada bos";
}
?>
</div><!--/.page-content-->
<script type="text/javascript">
		var XMLObject = createObjectAjax();
		function proses(){
			if(document.forms['frs'].button.onClick){
				document.forms['frs'].button.getElementById('<?php echo $this->$uri->segment(4); ?>').innerHTML = 
			}
		}
		function pilih(id){
			if(document.frs.ambil_frs.checked){
				var url = "<?php echo base_url(); ?>/c_index_aka/frs_cart/" + id;
				XMLObject.open('GET',url,true);
				XMLObject.onreadystatechnge = function(){
					if(XMLObject.readyState == 4){
						if(XMLObject.status == 200){

						}
					}
				}
				XMLObject.send(null);
			}
		}
</script>