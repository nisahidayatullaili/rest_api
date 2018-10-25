<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	function __construct() {
			parent::__construct();

			$this->load->model('Modelku');
		}


	public function index(){
		$this->data['hasil'] = $this->Modelku->m_lihat('tabelsuhu');
		$this->load->view('v_home.php', $this->data);
	}
}
