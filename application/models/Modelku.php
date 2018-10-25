<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelku extends CI_Model {

	public function m_lihat($table)
	{
		$data = $this->db->query("SELECT suhu, kelembapan, durasi FROM tabelsuhu ORDER BY id_suhu DESC LIMIT 1");
		return $data->result_array();
	}
}
