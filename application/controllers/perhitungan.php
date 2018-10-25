<?php  
require APPPATH . '/libraries/REST_Controller.php';  
class perhitungan extends REST_Controller {  
    function __construct($config = 'rest') 
	{
		parent::__construct($config);
	}  
	
	// public function index(){

	// }

	function index_get() 
	{
		$id_suhu = $this->get('');         
		if ($id_suhu == ''){
			$datasuhu = $this->db->query('SELECT durasi FROM tabelsuhu ORDER BY id_suhu LIMIT 1')->result();
		}else{          
			$datasuhu = $this->db->get('time')->result();
		}
		$this->response($datasuhu, 200);
	}

	function index_post(){
		
		
	}


}
?>