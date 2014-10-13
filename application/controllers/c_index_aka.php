<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_index_aka extends CI_Controller {
	
	//Construct 

	function __Construct()
	{
		parent::__construct();
	
	}

	// Page Login

	public function login()
	{
		$clicked = $this->input->post('login');
		if($clicked)
		{
			$this->m_aka->validationlogin();
		}
		
		$this->load->view('login');
	}

	// Page Home 

	public function index()
	{

		//Check Logged User

		$logged = $this->session->userdata('login');
		if($logged)
		{

			$data['content'] = 'home';
			$this->load->view('content', $data);

		}else{
			redirect('c_index_aka/logout');
		}
	}


	/*========================= mahasiswa =======================*/
	
	public function data_mahasiswa()
	{
		//Check Logged User

		$logged = $this->session->userdata('login');
		if($logged)
		{
			$select = "*";
			$table = "t_mahasiswa,t_kelas";
			$where = 't_mahasiswa.id_kelas = t_kelas.id_kelas';
			$data['content'] = 'mahasiswa/data_mahasiswa';
			$data['data'] = $this->m_aka->get_db_query($select, $table, $where);		
			$this->load->view('content', $data);
		}else{
			redirect('c_index_aka/logout');
		}
	}

	//Add value table mahasiswa

	public function add_data_mahasiswa()
	{
		$save = $this->input->post('add_mahasiswa');
		$kelas = 't_kelas';
		$data['kelas'] = $this->m_aka->get_all($kelas);
		$data['content'] = 'mahasiswa/tambah_mahasiswa';
		$this->load->view('content', $data);
	}
	
	public function proses_data_mahasiswa()
	{
		$this->m_aka->input_data_mahasiswa();
		redirect('c_index_aka/data_mahasiswa');
	}
	
	//Edit mahasiswa
	
	public function edit_mahasiswa()
	{
		$this->load->model('m_aka');
		$data['edit'] = $this->m_aka->edit_mahasiswa();
		$data['content'] = 'mahasiswa/edit_mahasiswa';
		$this->load->view('content', $data);
		
	}
	
	public function prosesedit_mahasiswa(){
	$this->load->model('m_aka');
	$edit = $this->m_aka->prosesedit_mahasiswa();
	if($edit){
		redirect('c_index_aka/data_mahasiswa');
		
	}else if(!$edit){
		$data['content'] = 'mahasiswa/edit_mahasiswa';
		$this->load->view('content', $data);
		
	}
	}
	
	//Hapus mahasiswa
	
	public function hapus_mahasiswa()
	{
		$this->m_aka->hapus_mahasiswa();
		redirect('c_index_aka/data_mahasiswa');
	}

	/*========================= input nilai =======================*/
	
	public function data_nilai()
	{
	
	$cari = $this->input->post('cari');
	$src = $this->input->post('src');
	if($cari){
		$select = "*";
		$table = "t_mahasiswa";
		$where = "nim LIKE '%$src%'";
		$data['datacari'] = $this->m_aka->get_db_query($select, $table, $where);

	}else{
		$data['datacari'] = "";
	}
		 
		$data['content'] = 'mahasiswa/data_nilai';
		$this->load->view('content', $data);
	}

	//Add value table mahasiswa

	public function input_nilai()
	{
		$this->load->model('m_aka');
		$data['edit'] = $this->m_aka->input_nilai();
		$data['content'] = 'mahasiswa/input_nilai';
		$this->load->view('content', $data);
	}
	
	public function proses_input_nilai()
	{
		$this->load->model('m_aka');
		$data['edit'] = $this->m_aka->edit_mahasiswa();
		$data['content'] = 'mahasiswa/edit_mahasiswa';
		$this->load->view('content', $data);
	}
	
	//Edit mahasiswa
	
	public function edit_nilai()
	{
		$this->load->model('m_aka');
		$data['edit'] = $this->m_aka->edit_mahasiswa();
		$data['content'] = 'mahasiswa/edit_mahasiswa';
		$this->load->view('content', $data);
		
	}
	
	public function prosesedit_edit_nilai(){
	$this->load->model('m_aka');
	$edit = $this->m_aka->prosesedit_mahasiswa();
	if($edit){
		redirect('c_index_aka/data_mahasiswa');
		
	}else if(!$edit){
		$data['content'] = 'mahasiswa/edit_mahasiswa';
		$this->load->view('content', $data);
		
	}
	}
	
	//Hapus mahasiswa
	
	public function hapus_nilai()
	{
		$this->m_aka->hapus_mahasiswa();
		redirect('c_index_aka/data_mahasiswa');
	}

	/* ==================================== end input nilai ==========================*/
	
	
	
	
	/* ================================= MATA KULIAH ================================= */
	// data mahasiswa
	public function data_mata_kuliah()
	{
		$this->load->model('m_aka');
		$data['data'] = $this->m_aka->data_mata_kuliah(); 
		$data['pagination'] = $this->pagination->create_links();
		$data['content'] = 'mata_kuliah/data_mata_kuliah';
		$this->load->view('content', $data);
	}

	// input data mahasiswa
	public function input_mata_kuliah(){
		$data['content'] = 'mata_kuliah/input_mata_kuliah';
		$this->load->view('content',$data);
	}

	//proses input data mahasiswa
	public function prosesinput_mata_kuliah(){
		$this->load->model('m_aka');
		$this->m_aka->prosesinput_mata_kuliah();
		redirect('c_index_aka/data_mata_kuliah');
	}

	//edit mata kuliah
	public function edit_mata_kuliah(){
		$this->load->model('m_aka');
		$data['edit'] = $this->m_aka->edit_mata_kuliah();
		$data['content'] = 'mata_kuliah/edit_mata_kuliah';
		$this->load->view('content',$data);
	}

	//proses edit mata kuliah
	public function prosesedit_mata_kuliah()
	{
		$this->load->model('m_aka');
		$this->m_aka->prosesedit_mata_kuliah();
		redirect('c_index_aka/data_mata_kuliah');
	}

	//hapus mata kuliah
	public function hapus_mata_kuliah()
	{
		$this->m_aka->hapus_mata_kuliah();
		redirect('c_index_aka/data_mata_kuliah');
	}

	/* ================================= END MATA KULIAH ================================= */



	/* ================================= BAHAN KULIAH ================================= */
	// data mahasiswa
	public function data_bahan_kuliah()
	{
		$this->load->model('m_aka');
		$data['data'] = $this->m_aka->data_bahan_kuliah(); 
		$data['pagination'] = $this->pagination->create_links();
		$data['content'] = 'posting_pengumuman/data_bahan_kuliah';
		$this->load->view('content', $data);
	}

	// input data mahasiswa
	public function input_bahan_kuliah(){
		$data['content'] = 'posting_pengumuman/input_bahan_kuliah';
		$this->load->view('content',$data);
	}

	//proses input data mahasiswa
	public function prosesinput_bahan_kuliah(){
		$this->load->model('m_aka');
		$this->m_aka->prosesinput_bahan_kuliah();
		redirect('c_index_aka/data_bahan_kuliah');
	}

	/*//edit mata kuliah
	public function edit_cuti_akademik(){
		$this->load->model('m_aka');
		$data['edit'] = $this->m_aka->edit_tahun_ajaran();
		$data['content'] = 'mata_kuliah/edit_tahun_ajaran';
		$this->load->view('content',$data);
	}

	//proses edit mata kuliah
	public function prosesedit_cuti_akademik()
	{
		$this->load->model('m_aka');
		$this->m_aka->prosesedit_tahun_ajaran();
		redirect('c_index_aka/data_tahun_ajaran');
	}*/

	//hapus mata kuliah
	public function hapus_bahan_kuliah()
	{
		$this->m_aka->hapus_bahan_kuliah();
		redirect('c_index_aka/data_bahan_kuliah');
	}

	/* ================================= END BAHAN KULIAH ================================= */
	

	/* ================================= JADWAL KULIAH ================================= */
	// data mahasiswa
	public function data_jadwal_kuliah()
	{
		$this->load->model('m_aka');
		$data['data'] = $this->m_aka->data_jadwal_kuliah(); 
		$data['pagination'] = $this->pagination->create_links();
		$data['content'] = 'mata_kuliah/data_jadwal_kuliah';
		$this->load->view('content', $data);
	}

	// input data mahasiswa
	public function input_jadwal_kuliah(){
		$data['content'] = 'mata_kuliah/input_jadwal_kuliah';
		$this->load->view('content',$data);
	}

	//proses input data mahasiswa
	public function prosesinput_jadwal_kuliah(){
		$this->load->model('m_aka');
		$this->m_aka->prosesinput_jadwal_kuliah();
		redirect('c_index_aka/data_jadwal_kuliah');
	}

	/*//edit mata kuliah
	public function edit_cuti_akademik(){
		$this->load->model('m_aka');
		$data['edit'] = $this->m_aka->edit_tahun_ajaran();
		$data['content'] = 'mata_kuliah/edit_tahun_ajaran';
		$this->load->view('content',$data);
	}

	//proses edit mata kuliah
	public function prosesedit_cuti_akademik()
	{
		$this->load->model('m_aka');
		$this->m_aka->prosesedit_tahun_ajaran();
		redirect('c_index_aka/data_tahun_ajaran');
	}*/

	//hapus mata kuliah
	public function hapus_jadwal_kuliah()
	{
		$this->m_aka->hapus_jadwal_kuliah();
		redirect('c_index_aka/data_jadwal_kuliah');
	}

	/* ================================= END JADWAL KULIAH ================================= */



	/* ================================= PENGUMUMAN AKADEMIK ================================= */
	// data mahasiswa
	public function data_pengumuman_akademik()
	{
		$this->load->model('m_aka');
		$data['data'] = $this->m_aka->data_pengumuman_akademik(); 
		$data['pagination'] = $this->pagination->create_links();
		$data['content'] = 'posting_pengumuman/data_pengumuman_akademik';
		$this->load->view('content', $data);
	}

	// input data mahasiswa
	public function input_pengumuman_akademik(){
		$data['content'] = 'posting_pengumuman/input_pengumuman_akademik';
		$this->load->view('content',$data);
	}

	//proses input data mahasiswa
	public function prosesinput_pengumuman_akademik(){
		$this->load->model('m_aka');
		$this->m_aka->prosesinput_pengumuman_akademik();
		redirect('c_index_aka/data_pengumuman_akademik');
	}

	/*//edit mata kuliah
	public function edit_cuti_akademik(){
		$this->load->model('m_aka');
		$data['edit'] = $this->m_aka->edit_tahun_ajaran();
		$data['content'] = 'mata_kuliah/edit_tahun_ajaran';
		$this->load->view('content',$data);
	}

	//proses edit mata kuliah
	public function prosesedit_cuti_akademik()
	{
		$this->load->model('m_aka');
		$this->m_aka->prosesedit_tahun_ajaran();
		redirect('c_index_aka/data_tahun_ajaran');
	}*/

	//hapus mata kuliah
	public function hapus_pengumuman_akademik()
	{
		$this->m_aka->hapus_pengumuman_akademik();
		redirect('c_index_aka/data_pengumuman_akademik');
	}

	/* ================================= END PENGUMUMAN AKADEMIK ================================= */



	/* ================================= TAHUN AJARAN ================================= */
	
	// data mahasiswa
	public function data_tahun_ajaran()
	{
		$this->load->model('m_aka');
		$data['data'] = $this->m_aka->data_Tahun_ajaran(); 
		$data['pagination'] = $this->pagination->create_links();
		$data['content'] = 'mata_kuliah/data_Tahun_ajaran';
		$this->load->view('content', $data);
	}

	/*// input data mahasiswa
	public function input_tahun_ajaran(){
		$data['content'] = 'mata_kuliah/input_mata_kuliah';
		$this->load->view('content',$data);
	}*/

	//proses input data mahasiswa
	public function prosesinput_Tahun_ajaran(){
		$this->load->model('m_aka');
		$this->m_aka->prosesinput_Tahun_ajaran();
		redirect('c_index_aka/data_tahun_ajaran');
	}

	//edit mata kuliah
	public function edit_tahun_ajaran(){
		$this->load->model('m_aka');
		$data['edit'] = $this->m_aka->edit_tahun_ajaran();
		$data['content'] = 'mata_kuliah/edit_tahun_ajaran';
		$this->load->view('content',$data);
	}

	//proses edit mata kuliah
	public function prosesedit_tahun_ajaran()
	{
		$this->load->model('m_aka');
		$this->m_aka->prosesedit_tahun_ajaran();
		redirect('c_index_aka/data_tahun_ajaran');
	}

	//hapus mata kuliah
	public function hapus_tahun_ajaran()
	{
		$this->m_aka->hapus_tahun_ajaran();
		redirect('c_index_aka/data_tahun_ajaran');
	}

	/* ================================= END TAHUN AJARAN ================================= */
	


		/////Pengisian frs

	public function pengisian_frs(){
		$data['content']='mahasiswa/pengisian_frs';
		$this->load->view('content',$data);
	}

	public function cari_nim(){// Mencari berdasarkan NIM di form pengisian FRS
		$cari = $this->input->post('cari');
		$data['query'] = $this->m_aka->cari_nim();		
		$data['content']='mahasiswa/list_frs';
		if($cari){
				$this->load->view('content',$data);		
		}		
	}
	public function frs(){
		$id_frs = $this->uri-segment('3');
	}


	//Logout 

	public function logout()
	{

		$this->session->sess_destroy();
		redirect('c_index_aka/login');

	}
}

