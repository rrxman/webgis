<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_autonumber extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	
	public function kodeMahasiswa()
	{
		$this->db->select('RIGHT(mhs.id, 4) as kode', FALSE);
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('mhs');
		if($query->num_rows() <> 0){
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}

		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$createKode = "M".$kodemax;
		return $createKode;
	}

	

}

/* End of file Model_autonumber.php */
/* Location: ./application/models/Model_autonumber.php */