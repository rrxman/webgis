<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	private $filename = "format"; // Kita tentukan nama filenya

	public function __construct(){
		parent::__construct();
    }
    
    public function index() {
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Map';

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('mhs/map', $data);
		$this->load->view('templates/user_footer');
	}
}