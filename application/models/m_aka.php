<?php

class m_aka extends CI_Model{

	public function validationlogin(){

		//Get Value Post Username And Password

		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$username = mysql_real_escape_string($user);
		$password = mysql_real_escape_string(md5($pass));
		$query = $this->db->query("SELECT * FROM t_user WHERE username = '$username' AND password = '$password'");
		$data = $query->row_array();

		// If Checked Than Create Session From Value Database

			if($query->num_rows() == 1)
			{
				//Get Value In Database

				$config = array(
					'login' => true,
					'name_s' => $data['username'],
					'level_s' => $data['level']
				);

				//Create Session

				$this->session->set_userdata($config);
				redirect('c_index_aka/index');
				
			}else{
				redirect('c_index_aka/login');
			}		

	}

	//Get all value a table without query

	public function get_all($table)
	{
		
		$data = $this->db->get($table);
		return $data->result_array();
	}

	//Get value with query

	public function get_db_query($select, $table, $where){
		
		$data = $this->db->query("SELECT $select FROM $table WHERE $where");
		return $data->result_array();
	}

	//Insert

	public function add_value($data, $table, $location){

		$this->db->insert($table, $data);
		redirect($location);
		
	}
	
	
	/* insert mahasiswa */
	
	public function input_data_mahasiswa(){
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$bulan_lahir = $this->input->post('bulan_lahir');
		$tahun_lahir = $this->input->post('tahun_lahir');
		$data_tahun = $tempat_lahir.",".$tanggal_lahir."-".$bulan_lahir."-".$tahun_lahir;

		$config['upload_path'] = "./assets/images/"; //lokasi folder yang akan digunakan untuk menyimpan file
		$config['allowed_types'] = 'gif|jpg|png|JPEG'; //extension yang diperbolehkan untuk diupload
		$config['file_name'] = url_title($this->input->post('userfile'));	
		$this->load->library('upload', $config);
		$this->upload->do_upload();


	$data = array(
	   'id_mahasiswa' => '',
	   'id_pendaftaran' => '',
	   'foto' => $this->upload->file_name,
	   'nim' => $this->input->post('nim'),
	   'nama' => $this->input->post('nama'),
	   'angkatan' => $this->input->post('angkatan'),
	   'jenis_kelamin' => $this->input->post('jenis_kelamin'),
	   'alamat' => $this->input->post('alamat'),
	   'kode_pos' => $this->input->post('kode_pos'),
	   'ttl' => $data_tahun,
	   'status_nikah' => $this->input->post('status_nikah'),
	   'golongan_darah' => $this->input->post('golongan_darah'),
	   'agama' => $this->input->post('agama'),
	   'no_ponsel' => $this->input->post('no_ponsel'),
	   'jalur_masuk' => $this->input->post('jalur_masuk'),
	   'asal_sekolah' => $this->input->post('asal_sekolah'),
	   'alamat_sekolah' => $this->input->post('alamat_sekolah'),
	   'kode_pos' => $this->input->post('kode_pos'),
	   'jurusan' => $this->input->post('jurusan'),
	   'nama_ortu' => $this->input->post('nama_ortu'),
	   'alamat_ortu' => $this->input->post('alamat_ortu'),
	   'no_ponsel_ortu' => $this->input->post('no_ponsel_ortu'),
	   'pekerjaan' => $this->input->post('pekerjaan'),
	   'pend_ortu' => $this->input->post('pend_ortu'),
	   'no_telp' => $this->input->post('no_telp'),
	   'password' => md5($this->input->post('password')),
	   'id_kelas' => $this->input->post('id_kelas'),
	   'status_kuliah' => $this->input->post('status_kuliah')
	   );

	$this->db->insert('t_mahasiswa', $data); 

	}
	
	//edit mahasiswa
	
	function edit_mahasiswa(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_mahasiswa WHERE id_mahasiswa =".$id);
		return $data->result_array();
	}
	
	//proses edit mahasiswa
	
	public function prosesedit_mahasiswa(){
		

		$data = array(
		'id_mahasiswa' => $this->input->post('id_mahasiswa'),
	   'foto' => $this->input->post('foto'),
	   'nim' => $this->input->post('nim'),
	   'nama' => $this->input->post('nama'),
	   'angkatan' => $this->input->post('angkatan'),
	   'jenis_kelamin' => $this->input->post('jenis_kelamin'),
	   'alamat' => $this->input->post('alamat'),
	   'kode_pos' => $this->input->post('kode_pos'),
	   'ttl' => $tahun_lahir,
	   'status_nikah' => $this->input->post('status_nikah'),
	   'golongan_darah' => $this->input->post('golongan_darah'),
	   'agama' => $this->input->post('agama'),
	   'no_ponsel' => $this->input->post('no_ponsel'),
	   'jalur_masuk' => $this->input->post('jalur_masuk'),
	   'asal_sekolah' => $this->input->post('asal_sekolah'),
	   'alamat_sekolah' => $this->input->post('alamat_sekolah'),
	   'id_daerah' => $this->input->post('id_daerah'),
	   'kode_pos' => $this->input->post('kode_pos'),
	   'jurusan' => $this->input->post('jurusan'),
	   'nama_ortu' => $this->input->post('nama_ortu'),
	   'alamat_ortu' => $this->input->post('alamat_ortu'),
	   'no_ponsel_ortu' => $this->input->post('no_ponsel_ortu'),
	   'pekerjaan' => $this->input->post('pekerjaan'),
	   'pend_ortu' => $this->input->post('pend_ortu'),
	   'no_telp' => $this->input->post('no_telp'),
	   'password' => md5($this->input->post('password')),
	   'id_kelas' => $this->input->post('id_kelas'),
	   'status_kuliah' => $this->input->post('status_kuliah')

	);
		$this->db->where('id_mahasiswa',$this->input->post('id_mahasiswa'));
		$edit = $this->db->update('t_mahasiswa',$data);
		return $edit; 

	}
	
	//hapus mahasiswa
	
	function hapus_mahasiswa(){

		$uri4 = $this->uri->segment(4);
		if($uri4 != "" ){
			$urlgambar = $uri4;
			unlink("assets/images/".$urlgambar);			
		}

		$id = $this->uri->segment(3);
		$this->db->delete('t_mahasiswa',array('id_mahasiswa' => $id));

	}
function input_nilai(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_mahasiswa WHERE id_mahasiswa =".$id);
		return $data->result_array();
	}
	
	
	/* ======================================== MATA KULIAH =================================== */
	// data mata kuliah
	public function data_mata_kuliah(){
		$config['base_url'] = 'http://localhost/AKA/c_index_aka/data_mata_kuliah';
		$offset = $this->uri->segment(3);
		if(empty($offset))
		{
			$offset = 0;
		}
		$config['total_rows'] = $this->db->count_all('t_mk');
		$config['per_page'] = 4;
		$config['prev_link'] = "<div id='pref'><<</div>";
		$config['next_link'] = "<div id='next'>>></div>";
		$this->pagination->initialize($config);
		$num = $config['per_page'];

	if($this->input->post('submit')){
	$cari = $this->input->post('src');
	$src = "t_mk.nama_mk LIKE '%$cari%' AND";

	}else{
		$src = "";
	}
	$data = $this->db->query("SELECT * FROM t_mk WHERE $src id_mk = id_mk order by id_mk DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //
	}


	//proses input mata kuliah
	public function prosesinput_mata_kuliah(){
	$data = array(
	   'id_mk' => $this->input->post('id_mk'),
	   'kode_mk' => $this->input->post('kode_mk'),
	   'nama_mk' => $this->input->post('nama_mk'),
	   'jumlah_sks' => $this->input->post('jumlah_sks'),
	   'sks_teori' => $this->input->post('sks_teori'),
	   'sks_praktek' => $this->input->post('sks_praktek'),
	   'semester' => $this->input->post('semester'),
	   'is_pratikum' => $this->input->post('is_pratikum'),
	   'status' => $this->input->post('status'),
	   'id_mk_prasarat' => $this->input->post('id_mk_prasarat')
	   );

	$this->db->insert('t_mk', $data); 

	}

	//edit mata kuliah
	function edit_mata_kuliah(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_mk WHERE id_mk =".$id);
		return $data->result_array();
	}

	//proses edit mata kuliah
	public function prosesedit_mata_kuliah(){

		$data = array(
		'id_mk' => $this->input->post('id_mk'),	   
	   'kode_mk' => $this->input->post('kode_mk'),
	   'nama_mk' => $this->input->post('nama_mk'),
	   'jumlah_sks' => $this->input->post('jumlah_sks'),
	   'sks_teori' => $this->input->post('sks_teori'),
	   'sks_praktek' => $this->input->post('sks_praktek'),
	   'semester' => $this->input->post('semester'),
	   'is_pratikum' => $this->input->post('is_pratikum'),
	   'status' => $this->input->post('status'),
	   'id_mk_prasarat' => $this->input->post('id_mk_prasarat')

	);
		$this->db->where('id_mk',$this->input->post('id_mk'));
		$edit = $this->db->update('t_mk',$data);
		return $edit; 

	}

	//hapus mata kuliah
	function hapus_mata_kuliah(){
		$id = $this->uri->segment(3);
		$this->db->delete('t_mk',array('id_mk' => $id));
	}

	/*===================================== end mata kuliah ==================== */


	/* ======================================== TAHUN AJARAN =================================== */
	// data mata kuliah
	public function data_tahun_ajaran(){
		$config['base_url'] = 'http://localhost/AKA/c_index_aka/data_tahun_ajaran';
		$offset = $this->uri->segment(3);
		if(empty($offset))
		{
			$offset = 0;
		}
		$config['total_rows'] = $this->db->count_all('t_tahun_akademik');
		$config['per_page'] = 10;
		$config['prev_link'] = "<div id='pref'><<</div>";
		$config['next_link'] = "<div id='next'>>></div>";
		$this->pagination->initialize($config);
		$num = $config['per_page'];

	/*if($this->input->post('submit')){
	$cari = $this->input->post('src');
	$src = "t_mk.nama_mk LIKE '%$cari%' AND";

	}else{
		$src = "";
	}*/
	$data = $this->db->query("SELECT * FROM t_tahun_akademik WHERE id = id order by id DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //
	}


	//proses input mata kuliah
	public function prosesinput_tahun_ajaran(){
	$data = array(
	   'id' => '',
	   'tahun_akademik' => $this->input->post('tahun_akademik'),
	   'current' => $this->input->post('current')
	   );

	$this->db->insert('t_tahun_akademik', $data); 

	}

	//edit mata kuliah
	function edit_tahun_ajaran(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_tahun_akademik WHERE id =".$id);
		return $data->result_array();
	}

	//proses edit mata kuliah
	public function prosesedit_tahun_ajaran(){

		$data = array(
	   'tahun_akademik' => $this->input->post('tahun_akademik'),
	   'current' => $this->input->post('current')

	);
		$this->db->where('id',$this->input->post('id'));
		$edit = $this->db->update('t_tahun_akademik',$data);
		return $edit; 

	}

	//hapus mata kuliah
	function hapus_tahun_ajaran(){
		$id = $this->uri->segment(3);
		$this->db->delete('t_tahun_akademik',array('id' => $id));
	}

	/*===================================== END TAHUN AJARAN ==================== */



	/* ========================================  BAHAN KULIAH =================================== */
	// data mata kuliah
	public function data_bahan_kuliah(){
		$config['base_url'] = 'http://localhost/AKA/c_index_aka/data_bahan_kuliah';
		$offset = $this->uri->segment(3);
		if(empty($offset))
		{
			$offset = 0;
		}
		$config['total_rows'] = $this->db->count_all('t_download_mk');
		$config['per_page'] = 10;
		$config['prev_link'] = "<div id='pref'><<</div>";
		$config['next_link'] = "<div id='next'>>></div>";
		$this->pagination->initialize($config);
		$num = $config['per_page'];

	/*if($this->input->post('submit')){
	$cari = $this->input->post('src');
	$src = "t_mk.nama_mk LIKE '%$cari%' AND";

	}else{
		$src = "";
	}*/
	$data = $this->db->query("SELECT * FROM t_download_mk, t_mk WHERE t_download_mk.id_mk = t_mk.id_mk order by t_download_mk.id_mk DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //
	}


	//proses input mata kuliah
	public function prosesinput_bahan_kuliah(){
	$config['upload_path'] = "./assets/file/"; //lokasi folder yang akan digunakan untuk menyimpan file
	$config['file_name'] = url_title($this->input->post('userfile'));
	$this->load->library('upload', $config);
	$this->upload->do_upload();


	$data = array(
	   'id' => '',
	   'id_mk' => $this->input->post('id_mk'),
	   'nama' => $this->input->post('nama'),
	   'keterangan' => $this->input->post('keterangan'),
	   'path' => $this->upload->file_name,
	   'is_tampil' => $this->input->post('is_tampil')
	   );

	$this->db->insert('t_download_mk', $data); 

	}

	/*//edit mata kuliah
	function edit_bahan_kuliah(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_tahun_akademik WHERE id =".$id);
		return $data->result_array();
	}

	//proses edit mata kuliah
	public function prosesedit_bahan_kuliah(){

		$data = array(
	   'tahun_akademik' => $this->input->post('tahun_akademik'),
	   'current' => $this->input->post('current')

	);
		$this->db->where('id',$this->input->post('id'));
		$edit = $this->db->update('t_tahun_akademik',$data);
		return $edit; 

	}
	*/
	//hapus mata kuliah
	function hapus_bahan_kuliah(){
		$id = $this->uri->segment(3);
		$this->db->delete('t_download_mk',array('id' => $id));
	}

	/*===================================== END BAHAN KULIAH ==================== */



	/* ========================================  JADWAL KULIAH =================================== */
	// data mata kuliah
	public function data_jadwal_kuliah(){
		$config['base_url'] = 'http://localhost/AKA/c_index_aka/data_jadwal_kuliah';
		$offset = $this->uri->segment(3);
		if(empty($offset))
		{
			$offset = 0;
		}
		$config['total_rows'] = $this->db->count_all('t_download_jadwal');
		$config['per_page'] = 10;
		$config['prev_link'] = "<div id='pref'><<</div>";
		$config['next_link'] = "<div id='next'>>></div>";
		$this->pagination->initialize($config);
		$num = $config['per_page'];

	/*if($this->input->post('submit')){
	$cari = $this->input->post('src');
	$src = "t_mk.nama_mk LIKE '%$cari%' AND";

	}else{
		$src = "";
	}*/
	$data = $this->db->query("SELECT * FROM t_download_jadwal WHERE 1 order by id DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //
	}


	//proses input mata kuliah
	public function prosesinput_jadwal_kuliah(){
	$config['upload_path'] = "./assets/file/"; //lokasi folder yang akan digunakan untuk menyimpan file
	$config['file_name'] = url_title($this->input->post('userfile'));
	$this->load->library('upload', $config);
	$this->upload->do_upload();


	$data = array(
	   'id' => '',
	   'tingkat' => $this->input->post('tingkat'),
	   'keterangan' => $this->input->post('keterangan'),
	   'path' => $this->upload->file_name,
	   'tahun_ajaran' => $this->input->post('tahun_ajaran')
	   );

	$this->db->insert('t_download_jadwal', $data); 
	
	}

	/*//edit mata kuliah
	function edit_bahan_kuliah(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_tahun_akademik WHERE id =".$id);
		return $data->result_array();
	}

	//proses edit mata kuliah
	public function prosesedit_bahan_kuliah(){

		$data = array(
	   'tahun_akademik' => $this->input->post('tahun_akademik'),
	   'current' => $this->input->post('current')

	);
		$this->db->where('id',$this->input->post('id'));
		$edit = $this->db->update('t_tahun_akademik',$data);
		return $edit; 

	}
	*/
	//hapus mata kuliah
	function hapus_jadwal_kuliah(){
		$id = $this->uri->segment(3);
		$this->db->delete('t_download_jadwal',array('id' => $id));
	}

	/*===================================== END JADWAL KULIAH ==================== */


	/* ========================================  JADWAL KULIAH =================================== */
	// data mata kuliah
	public function data_pengumuman_akademik(){
		$config['base_url'] = 'http://localhost/AKA/c_index_aka/data_pengumuman_akademik';
		$offset = $this->uri->segment(3);
		if(empty($offset))
		{
			$offset = 0;
		}
		$config['total_rows'] = $this->db->count_all('t_pengumuman_akademik');
		$config['per_page'] = 10;
		$config['prev_link'] = "<div id='pref'><<</div>";
		$config['next_link'] = "<div id='next'>>></div>";
		$this->pagination->initialize($config);
		$num = $config['per_page'];

	/*if($this->input->post('submit')){
	$cari = $this->input->post('src');
	$src = "t_mk.nama_mk LIKE '%$cari%' AND";

	}else{
		$src = "";
	}*/
	$data = $this->db->query("SELECT * FROM t_pengumuman_akademik WHERE 1 order by id DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //
	}


	//proses input mata kuliah
	public function prosesinput_pengumuman_akademik(){
	$config['upload_path'] = "./assets/file/"; //lokasi folder yang akan digunakan untuk menyimpan file
	$config['file_name'] = url_title($this->input->post('userfile'));
	$this->load->library('upload', $config);
	$this->upload->do_upload();


	$data = array(
	   'id' => '',
	   'nama' => $this->input->post('nama'),
	   'keterangan' => $this->input->post('keterangan'),
	   'path' => $this->upload->file_name,
	   'tgl_buat' => $this->input->post('tgl_buat')
	   );

	$this->db->insert('t_pengumuman_akademik', $data); 
	
	}

	/*//edit mata kuliah
	function edit_bahan_kuliah(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_tahun_akademik WHERE id =".$id);
		return $data->result_array();
	}

	//proses edit mata kuliah
	public function prosesedit_bahan_kuliah(){

		$data = array(
	   'tahun_akademik' => $this->input->post('tahun_akademik'),
	   'current' => $this->input->post('current')

	);
		$this->db->where('id',$this->input->post('id'));
		$edit = $this->db->update('t_tahun_akademik',$data);
		return $edit; 

	}
	*/
	//hapus mata kuliah
	function hapus_pengumuman_akademik(){
		$id = $this->uri->segment(3);
		$this->db->delete('t_pengumuman_akademik',array('id' => $id));
	}

	/*===================================== END JADWAL KULIAH ==================== */
	
	/*===================================== PENGISIAN FRS ==================== */
	public function cari_nim(){
	
		$nim=$this->input->post('nim');
		$query = $this->db->query("SELECT * FROM t_dump,t_mahasiswa WHERE t_dump.nim=t_mahasiswa.nim AND t_dump.nim LIKE '%$nim%'");
		if(!$query->num_rows() >= 1){
			$this->session->set_userdata('msg_cari_nim','Maaf NIM yang anda cari tidak ada');			

		}return $query->result();

	}

	//Get Notification
	public function msg($msg){
		if($this->session->userdata($msg)){
			$messege =$this->session->userdata($msg);
			echo "<div class=''>$messege</div>";//css alert alert$style
			$this->session->unset_userdata($msg);
		}

	}

}

 ?>