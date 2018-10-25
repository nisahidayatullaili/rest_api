<?php
require APPPATH . '/libraries/REST_Controller.php';
	class melihat extends REST_Controller {
		function __construct($config = 'rest') {
			parent::__construct($config);
		}

	public function index_get() {
		$id_suhu = $this->get('id_suhu');
			if ($id_suhu == '') {
			$suhu = $this->db->get('tabelsuhu')->result();
			} else {
			$this->db->where('tabelsuhu', $suhu);
			$suhu = $this->db->get('tabelsuhu')->result();
			}
		$this->response($suhu, 200);
		}

	function index_post() {
		$data = array(
			'id_suhu' => $this->post('id_suhu'),
			'status' => $this->post('status'),
			// 'lembap' => $this->post('lembap')
		);
			$insert = $this->db->insert('suhu', $data);
				if ($insert) {
					$this->response($data, 200);
				} else {
					$this->response(array('status' => 'fail', 502));
				}
	}

}

