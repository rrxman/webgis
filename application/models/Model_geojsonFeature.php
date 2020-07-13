<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_geojsonFeature extends CI_Model {
	
	public function getSekolah(){
		$query = "SELECT `mhs`.`id`, `mhs`.`nama`, `mhs`.`alamat`, `sklh`.`nama_sklh`,`sklh`.`lat`,`sklh`.`lon`
					FROM (`mhs`
					JOIN `sklh` ON `mhs`.`asal_sekolah` = `sklh`.`id`) ORDER BY `id` ASC";
		return $this->db->query($query)->result_array();
	}

	public function getMahasiswa(){
		$kueri = "SELECT `mhs`.*, `kabupaten`.`kab` AS `kab`, `sklh`.`nama_sklh`, `jenis_kelamin`.`jk`, `kewarganegaraan`.`warga` AS `kewarganegaraan`, `status_sipil`.`status` AS `stts_sipil`, `kecamatan`.`kec`, `provinsi`.`prov`, `jurusan`.`jurusan`, `prodi`.`prodi` AS `prodi1`
				  FROM (((((((((`mhs`
				  JOIN `kabupaten` ON `mhs`.`kab/kot` = `kabupaten`.`id`)
				  JOIN `sklh` ON `mhs`.`asal_sekolah` = `sklh`.`id`)
				  JOIN `jenis_kelamin` ON `mhs`.`jk` = `jenis_kelamin`.`id_jk`)
				  JOIN `kewarganegaraan` ON `mhs`.`kewarganegaraan` = `kewarganegaraan`.`id_warga`)
				  JOIN `status_sipil` ON `mhs`.`stts_sipil` = `status_sipil`.`id_stts`)
				  JOIN `kecamatan` ON `mhs`.`kec` = `kecamatan`.`id_kecamatan`)
				  JOIN `provinsi` ON `mhs`.`prov` = `provinsi`.`id`)
				  JOIN `jurusan` ON `mhs`.`jurusan` = `jurusan`.`id_jurus`)
				  JOIN `prodi` ON `mhs`.`prodi1` = `prodi`.`id`)
				  ORDER BY `id` ASC";
    	return $this->db->query($kueri)->result_array();
	}

	public function getWilayahKab(){
		$query = "SELECT * FROM `dataponpes`
					WHERE `id_daerah` = 1";
		return $this->db->query($query)->result_array();
	}
	public function getWilayahKota(){
		$query = "SELECT * FROM `dataponpes`
					WHERE `id_daerah` = 2";
		return $this->db->query($query)->result_array();
	}
	public function getC1(){
		$query = "SELECT *
					FROM ((`hasil`
					JOIN `dataponpes` ON `hasil`.`id_ponpes` = `dataponpes`.`id_ponpes`)
					JOIN `max_cluster` ON `hasil`.`id_cluster` = `max_cluster`.`id_cluster`)
					WHERE `max` = 'C1' ORDER BY `id_hasil` ASC";
		return $this->db->query($query)->result_array();
	}

	public function getC2(){
		$query = "SELECT *
					FROM ((`hasil`
					JOIN `dataponpes` ON `hasil`.`id_ponpes` = `dataponpes`.`id_ponpes`)
					JOIN `max_cluster` ON `hasil`.`id_cluster` = `max_cluster`.`id_cluster`)
					WHERE `max` = 'C2' ORDER BY `id_hasil` ASC";
		return $this->db->query($query)->result_array();
	}

	public function getC3(){
		$query = "SELECT *
					FROM ((`hasil`
					JOIN `dataponpes` ON `hasil`.`id_ponpes` = `dataponpes`.`id_ponpes`)
					JOIN `max_cluster` ON `hasil`.`id_cluster` = `max_cluster`.`id_cluster`)
					WHERE `max` = 'C3' ORDER BY `id_hasil` ASC";
		return $this->db->query($query)->result_array();
	}

	public function getSekolahById($id)
	{
		$query = $this->db->get_where('sklh', array('id' => $id ))->row_array();
		return $query;
	}
}

/* End of file Model_geojsonFeature.php */
/* Location: ./application/models/Model_geojsonFeature.php */ ?>