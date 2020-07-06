<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	private $filename = "format"; // Kita tentukan nama filenya

	public function __construct(){
		parent::__construct();
		is_logged_in();
		$this->load->model('Model_mahasiswa');
		$this->load->model('Model_autonumber');
		$this->load->model('Model_excel');
	}

	public function index() {
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Dashboard';

		$data['totalUser'] = $this->Model_mahasiswa->totalOperator();
		$data['totalData'] = $this->db->count_all_results('mhs');
		$data['totalAnalyze'] = $this->db->count_all_results('hasil');
		$data['chartHasil'] = $this->Model_mahasiswa->countMahasiswa();
		$coba = $this->Model_mahasiswa->countMahasiswa();
		// var_dump($coba);
		// die;

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/user_footer');
	}

	public function role() {
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Kelola Akses';

		$data['role'] = $this->db->get_where('tb_role')->result_array();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('templates/user_footer');
	}

	public function roleaccess($role_id) {
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Kelola Akses';

		$data['role'] = $this->db->get_where('tb_role', ['id' => $role_id])->row_array();
		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('tb_usermenu')->result_array();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/user_footer');
	}

	public function changeAccess() {
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('tb_access', $data);

		if($result->num_rows() < 1) {
			$this->db->insert('tb_access', $data);
		} else {
			$this->db->delete('tb_access', $data);
		}
		$this->session->set_flashdata('message', '<div class="alert alert-success role="alert>Akses telah diubah!</div>');
	}

	public function dataMahasiswa() {
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Data Mahasiswa';
		$data['dataMahasiswa'] = $this->Model_mahasiswa->getMahasiswa();
		
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('admin/dataMahasiswa', $data);
		$this->load->view('templates/user_footer');

	}

	public function detail($id)
	{
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Info Lengkap';

		$detail = $this->Model_mahasiswa->getMahasiswaById($id);
		$data['detail'] = $detail;

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('admin/detail', $data);
		$this->load->view('templates/user_footer');
	}

	public function add_data() {
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Tambah Data';
		$data['dataKecamatan'] = $this->db->get('kecamatan')->result_array();
		$data['dataKabupaten'] = $this->db->get('kabupaten')->result_array();
		$data['dataProvinsi'] = $this->db->get('provinsi')->result_array();
		$data['dataSekolah'] = $this->db->get('sklh')->result_array();
		$data['dataProdi'] = $this->db->get('prodi')->result_array();

		$data['getCode'] = $this->Model_autonumber->kodeMahasiswa();

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required' => 'Nama Mahasiswa wajib diisi'
		]);
		$this->form_validation->set_rules('lat', 'Latitude', 'required|trim|numeric', [
			'numeric' => 'Latitude salah. Inputan mengandung karakter atau huruf'
		]);
		$this->form_validation->set_rules('lon', 'Longitude', 'required|trim|numeric', [
			'numeric' => 'Longitude salah. Inputan mengandung karakter atau huruf'
		]);

		if($this->form_validation->run() == false) {
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_sidebar', $data);
			$this->load->view('templates/user_topbar', $data);
			$this->load->view('admin/add', $data);
			$this->load->view('templates/user_footer');
		} else {
			$data =[
				'id' => $this->input->post('id'),
				'nama' => $this->input->post('nama'),
				'jk' => $this->input->post('jk'),
				'kewarganegaraan' => $this->input->post('wn'),
				'stts_sipil' => $this->input->post('stts'),
				'kec' => $this->input->post('kec'),
				'kab/kot' => $this->input->post('kab'),
				'prov' => $this->input->post('prov'),
				'alamat' => $this->input->post('alamat'),
				'lat' => $this->input->post('lat'),
				'lon' => $this->input->post('lon'),
				'asal_sekolah' => $this->input->post('sklh'),
				'jurusan' => $this->input->post('jurusan'),
				'thn_lulus' => $this->input->post('lulus'),
				'prodi1' => $this->input->post('prodi1'),
				'prodi2' => $this->input->post('prodi2'),
				'prodi3' => $this->input->post('prodi3'),
				'dtail_pres' => $this->input->post('prestasi'),
			];
			$this->db->insert('mhs', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan!</div>');
			redirect('admin/dataMahasiswa');
		}
	}

	public function edit_data($id){
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Ubah Data';
		$where = array('id' => $id);

		$data['pontren'] = $this->Model_mahasiswa->editMahasiswaById($where, 'mhs')->row_array();
		$data['dataKecamatan'] = $this->db->get('kecamatan')->result_array();
		$data['dataKabupaten'] = $this->db->get('kabupaten')->result_array();
		$data['dataProvinsi'] = $this->db->get('provinsi')->result_array();
		$data['dataSekolah'] = $this->db->get('sklh')->result_array();
		$data['dataProdi'] = $this->db->get('prodi')->result_array();
		$data['jurusan'] = $this->db->get('jurusan')->result_array();
		$data['jk'] = $this->db->get('jenis_kelamin')->result_array();
		$data['warganegara'] = $this->db->get('kewarganegaraan')->result_array();
		$data['stts'] = $this->db->get('status_sipil')->result_array();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('admin/edit', $data);
		$this->load->view('templates/user_footer');
	}

	public function update_data(){
		$data_unit = $this->input->post('program');
		if($data_unit == null){
			$unit = 0;
		} else {
			$unit = sizeof($data_unit);
		}
		$countUnit = $this->db->where('id', $this->input->post('id'))->from('ponpes_unit')->count_all_results() + $unit;
		$data = [
			'nama' => $this->input->post('nama'),
			'jk' => $this->input->post('jk'),
			'kewarganegaraan' => $this->input->post('wn'),
			'stts_sipil' => $this->input->post('stts'),
			'kec' => $this->input->post('kec'),
			'kab/kot' => $this->input->post('kab'),
			'prov' => $this->input->post('prov'),
			'alamat' => $this->input->post('alamat'),
			'lat' => $this->input->post('lat'),
			'lon' => $this->input->post('lon'),
			'asal_sekolah' => $this->input->post('sklh'),
			'jurusan' => $this->input->post('jurusan'),
			'thn_lulus' => $this->input->post('lulus'),
			'prodi1' => $this->input->post('prodi1'),
			'prodi2' => $this->input->post('prodi2'),
			'prodi3' => $this->input->post('prodi3'),
			'dtail_pres' => $this->input->post('prestasi'),
		];
		$where = [
			'id' => $this->input->post('id')
		];
		if($data_unit){
			foreach ($data_unit as $unit) {
				$add_unit = array(
					'id_ponpes' => $this->input->post('id'),
					'nama_unit' => $unit
				);
				$this->db->insert('ponpes_unit', $add_unit);
			}
		} else {
			$this->Model_mahasiswa->update($where, $data, 'mhs');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah di ubah!</div>');
			redirect('admin/datamahasiswa','refresh');
		}
		

		$this->Model_mahasiswa->update($where, $data, 'mhs');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah di ubah!</div>');
		redirect('admin/datamahasiswa','refresh');
	}

	public function hapus($id){
		$where = ['id' => $id];
		$this->Model_mahasiswa->hapus_data($where, 'mhs');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah di hapus!</div>');
		redirect('admin/datamahasiswa');
	}

	public function sekolah(){
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Data Sekolah';
		$data['sekolah'] = $this->db->get('sklh')->result_array();

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('admin/sekolah', $data);
		$this->load->view('templates/user_footer');
	}

	public function add_sekolah(){
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Data Sekolah';
		$data['getCode'] = $this->Model_autonumber->kodeSekolah();

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required' => 'Nama Mahasiswa wajib diisi'
		]);
		$this->form_validation->set_rules('lat', 'Latitude', 'required|trim|numeric', [
			'numeric' => 'Latitude salah. Inputan mengandung karakter atau huruf'
		]);
		$this->form_validation->set_rules('lon', 'Longitude', 'required|trim|numeric', [
			'numeric' => 'Longitude salah. Inputan mengandung karakter atau huruf'
		]);
		
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_sidebar', $data);
			$this->load->view('templates/user_topbar', $data);
			$this->load->view('admin/add-sekolah', $data);
			$this->load->view('templates/user_footer');
		} else {
			$data =[
				'id' => $this->input->post('id'),
				'nama_sklh' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'lat' => $this->input->post('lat'),
				'lon' => $this->input->post('lon'),
			];
			$this->db->insert('sklh', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan!</div>');
			redirect('admin/sekolah');
		}
	}

	public function edit_sekolah($id){
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Edit Sekolah';
		$where = array('id' => $id);

		$data['pontren'] = $this->Model_mahasiswa->editMahasiswaById($where, 'sklh')->row_array();
		$data['dataSekolah'] = $this->db->get('sklh')->result_array();

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('admin/edit-sekolah', $data);
		$this->load->view('templates/user_footer');
	}

	public function update_sekolah(){
		$data_unit = $this->input->post('program');
		if($data_unit == null){
			$unit = 0;
		} else {
			$unit = sizeof($data_unit);
		}
		$countUnit = $this->db->where('id', $this->input->post('id'))->from('ponpes_unit')->count_all_results() + $unit;
		$data = [
			'nama_sklh' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'lat' => $this->input->post('lat'),
			'lon' => $this->input->post('lon'),
		];
		$where = [
			'id' => $this->input->post('id')
		];
		if($data_unit){
			foreach ($data_unit as $unit) {
				$add_unit = array(
					'id_ponpes' => $this->input->post('id'),
					'nama_unit' => $unit
				);
				$this->db->insert('ponpes_unit', $add_unit);
			}
		} else {
			$this->Model_mahasiswa->update($where, $data, 'sklh');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah di ubah!</div>');
			redirect('admin/sekolah','refresh');
		}
		

		$this->Model_mahasiswa->update($where, $data, 'sklh');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah di ubah!</div>');
		redirect('admin/sekolah','refresh');
	}

	public function hapus_sekolah($id){
		$where = ['id' => $id];
		$this->Model_mahasiswa->hapus_data($where, 'sklh');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah di hapus!</div>');
		redirect('admin/sekolah');
	}

	public function user(){
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Kelola Operator';
		$data['manageUser'] = $this->Model_mahasiswa-->user();
		$data['sttsApproved'] = $this->Model_mahasiswa-->approved();
		$data['sttsPending'] = $this->Model_mahasiswa-->pending();
		
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('admin/user', $data);
		$this->load->view('templates/user_footer');
	}

	public function user_all(){
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Kelola Operator';

		$data['manageUser'] = $this->ponpes->user();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('admin/user-all', $data);
		$this->load->view('templates/user_footer');
	}

	public function user_pending(){
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Kelola Operator';

		$data['manageUser'] = $this->ponpes->user();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('admin/user-pending', $data);
		$this->load->view('templates/user_footer');
	}

	public function pratinjau($id)
	{
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Pratinjau';

		$user = $this->Model_mahasiswa->getUserById($id);
		$data['user'] = $user;

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('admin/pratinjau', $data);
		$this->load->view('templates/user_footer');
	}

	public function user_detail($id)
	{
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Detail';

		$user = $this->Model_mahasiswa->getUserById($id);
		$data['user'] = $user;

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('admin/user-detail', $data);
		$this->load->view('templates/user_footer');
	}

	public function user_acc($id){
		$this->db->set('status', 1);
		$this->db->where('id', $id);
		$this->db->update('tb_user');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil disetujui!</div>');
		redirect('admin/user');
	}

	public function user_dec($id){
		$this->db->where('id', $id);
		$this->db->delete('tb_user');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil ditolak!</div>');
		redirect('admin/user');
	}

	public function user_block($id){
		$this->db->where('id', $id);
		$this->db->delete('tb_user');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil diblokir!</div>');
		redirect('admin/user');
	}

	public function preview(){
		$data = array(); // Buat variabel $data sebagai array

	    if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
	      	// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
	    	$upload = $this->Model_excel->upload_file($this->filename);

	      	if($upload['result'] == "success"){ // Jika proses upload sukses
		        // Load plugin PHPExcel nya
		      	include APPPATH.'third_party/PHPExcel/PHPExcel.php';

		      	$excelreader = new PHPExcel_Reader_Excel2007();
		        $loadexcel = $excelreader->load(FCPATH . 'assets/file/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
		        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		        
		        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
		        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
		        $data['sheet'] = $sheet; 
		      }else{ // Jika proses upload gagal
		        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
		    }
		}
		$this->load->view('admin/preview', $data);
	}

	public function import(){
	    // Load plugin PHPExcel nya
	    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
	    
	    $excelreader = new PHPExcel_Reader_Excel2007();
	    $loadexcel = $excelreader->load(FCPATH . 'assets/file/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
	    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
	    
	    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
	    $data = array();
	    
	    $numrow = 1;
	    foreach($sheet as $row){
	      // Cek $numrow apakah lebih dari 1
	      // Artinya karena baris pertama adalah nama-nama kolom
	      // Jadi dilewat saja, tidak usah diimport
	      if($numrow > 1){
	        // Kita push (add) array data ke variabel data
	        array_push($data, array(
	          'nis'=>$row['A'], // Insert data nis dari kolom A di excel
	          'nama'=>$row['B'], // Insert data nama dari kolom B di excel
	          'jenis_kelamin'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
	          'alamat'=>$row['D'], // Insert data alamat dari kolom D di excel
	        ));
	      }
	      
	      $numrow++; // Tambah 1 setiap kali looping
	    }
	    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
	    $this->Model_excel->insert_multiple($data);
	    
	    redirect("admin/dataPonpes"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
}