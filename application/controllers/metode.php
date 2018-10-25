<?php  
require APPPATH . '/libraries/REST_Controller.php';  
class metode extends REST_Controller {  
	function __construct($config = 'rest') 
	{
		parent::__construct($config);
	}  

	public function index(){

	}


	function index_get() 
	{
		$id_suhu = $this->get('');         
		if ($id_suhu == '') 
		{
			$datanya = $this->db->query('SELECT durasi FROM tabelsuhu ORDER BY id_suhu DESC LIMIT 1')->result();
		} 
		else 
		{           
			$datanya = $this->db->get('time')->result();
		}
		$this->response($datanya, 200);
	}

	// insert new data

	function index_post() 
	{
		$data = array(

			'id'=> $this->post('id'),
			'suhu'=> $this->post('suhu'),
			'kelembapan'=> $this->post('kelembapan'));

		$suhu = $this->post('suhu');
		$kelembapan = $this->post('kelembapan');

        //fuzzifikasi 
        //mengubah informasi dari inputan data dari sensor ke data himpunan fuzzy linguistic//
        //SUHU
      
		if ($suhu <= 24 ){
			$sejuk= 1;
		}
		elseif ($suhu >= 24 and $suhu <= 36){
			$sejuk= (36 - $suhu)/(36-24);
		}
		elseif ($suhu>=36) {
			$sejuk = 0;
		}

		if ($suhu <= 24 || $suhu >= 48) {
			$normal = 0;
		}
		elseif ($suhu >= 24 and $suhu <= 36) {
			$normal= ($suhu-24)/(36-24);
		}
		elseif ($suhu >= 36 and $suhu <= 48) {
			$normal= (48-$suhu)/(48-36);
		}

		if ($suhu >= 48) {
			$panas=1;
		}
		elseif ($suhu >= 36 and $suhu <= 48) {
			$panas= ($suhu-36)/ (48-36);
		}
		elseif ($suhu <=36) {
			$panas=0;
		}

      	//KELEMBAPAN

		if ($kelembapan <= 40 ){
			$kering= 1;
		}
		elseif ($kelembapan >= 40 and $kelembapan < 60){
			$kering= (60-$kelembapan)/(60-40);
		}
		elseif ($kelembapan>=60) {
			$kering = 0;
		}

		if ($kelembapan <= 40 || $kelembapan >= 80) {
			$normal2 = 0;
		}
		elseif ($kelembapan >= 40 and $kelembapan <= 60) {
			$normal2= ($kelembapan-40)/(60-40);
		}
		elseif ($kelembapan >= 60 and $kelembapan <= 80) {
			$normal2= (80-$kelembapan)/(80-60);
		}

		if ($kelembapan >= 80) {
			$lembab=1;
		}
		elseif ($kelembapan >= 60 and $kelembapan <= 80) {
			$lembab= ($kelembapan-60)/ (80-60);
		}
		elseif ($kelembapan <=60) {
			$lembab=0;
		}
        // echo "fungsi keanggotaan"; echo "<br>";
        // echo round($sejuk,1); echo "<br>";
        // echo round ($normal,1); echo "<br>";
        // echo round ($panas,1); echo "<br>";
        // echo round ($kering,1); echo "<br>";
        // echo round ($normal2, 1); echo "<br>";
        // echo round ($lembab,1); echo "<br>";

        // $d['sejuk'] = $sejuk; 
        // $d['normal']= $normal; 
        // $d['panas']=$panas; 
        // $d['kering']=$kering; 
        // $d['normal2']=$normal2; 
        // $d['lembab']=$lembab; 

        // RULE BASE MIN
      
		if ($sejuk<$kering){
			$alpha1= round($sejuk,1);
		}
		else {
			$alpha1=round($kering,1);
		}

		if ($sejuk<$normal2){
			$alpha2= round($sejuk,1);
		}
		else {
			$alpha2=round($normal2,1);
		}

		if ($sejuk<$lembab){
			$alpha3= round($sejuk,1);
		}
		else {
			$alpha3=round($lembab,1);
		}	

		if ($normal<$kering){
			$alpha4= round($normal,1);
		}
		else {
			$alpha4=round($kering,1);
		}

		if ($normal<$normal2){
			$alpha5=round($normal,1);
		}
		else {
			$alpha5=round($normal2,1);
		}
		if ($normal<$lembab){
			$alpha6= round($normal,1);
		}
		else {
			$alpha6=round($lembab,1);
		}
		if ($panas<$kering){
			$alpha7= round($panas,1);
		}
		else {
			$alpha7=round($kering,1);
		}
		if ($panas<$normal2){
			$alpha8= round($panas,1);
		}
		else {
			$alpha8=round($normal2,1);
		}
		if ($panas<$lembab){
			$alpha9= round($panas,1);
		}
		else {
			$alpha9=$lembab;
		}
        // echo "alpha min"; echo "<br>";
        // echo $alpha1; echo "<br>";
        // echo $alpha2; echo "<br>";
        // echo $alpha3; echo "<br>";
        // echo $alpha4; echo "<br>";
        // echo $alpha5; echo "<br>";
        // echo $alpha6; echo "<br>";
        // echo $alpha7; echo "<br>";
        // echo $alpha8; echo "<br>";
        // echo $alpha9; echo "<br>";

        // Menghitung fungsi durasi
       	//RULE 1 = DURASI LAMA, x = 5(a) +10
		if($alpha1 == 0){
			$x1 = 0;
		}else{
			$x1 =  (5*$alpha1)+10;
		}

		//RULE 2 = DURASI SEDANG, x = 5(a)+5

		if($alpha2 == 0){
			$x2 = 0;
		}else{

			$x2 = (5*$alpha2) + 5;
		}

		//RULE 3 = DURASI CEPAT, x = 10 - 5(a)

		if($alpha3 == 0){
			$x3 = 0;
		}else{

			$x3 = 	10 - (5*$alpha3);
		}

		//RULE 4 = DURASI LAMA, x = 5(a) +10
		if($alpha4 == 0){
			$x4 = 0;
		}else{

			$x4 = (5*$alpha1)+10;

		}	

		//RULE 5 = DURASI SEDANG, x = 5(a)+5										
		if($alpha5 == 0){
			$x5 = 0;
		}else{

			$x5 = (5*$alpha2) + 5;
		}

		//RULE 6 = DURASI CEPAT, x = 10 - 5(a)

		if($alpha6 == 0){
			$x6 = 0;
		}else{

			$x6 = 10 - (5*$alpha3);
		}

		//RULE 7 = DURASI LAMA, x = 5(a) +10
		if($alpha7 == 0){
			$x7 = 0;
		}else{
			$x7 = (5*$alpha1)+10;
		}					

		//RULE 8 = DURASI SEDANG, x = 5(a)+5
		if($alpha8 == 0){
			$x8 = 0;
		}else{
			$x8 = (5*$alpha8) + 5;
		}

		//RULE 9 = DURASI CEPAT, x = 10 - 5(a
		if($alpha9 == 0){
			$x9 = 0;
		}else{

			$x9 = 	10 - (5*$alpha9);
		}

        //    echo "hitung durasi";
        // echo "<br>";
        // echo $x1;
        // echo "<br>";
        // echo $x2;
        // echo "<br>";
        // echo $x3;
        // echo "<br>";
        // echo $x4;
        // echo "<br>";
        // echo $x5;
        // echo "<br>";
        // echo $x6;
        // echo "<br>";
        // echo $x7;
        // echo "<br>";
        // echo $x8;
        // echo "<br>";
        // echo $x9;
        // echo "<br>";

        //perkalian antara min dan hitung durasi
      
		$p1 = round($alpha1,1) * $x1;
		$p2 = round($alpha2,1) * $x2;
		$p3 = round($alpha3,1) * $x3;
		$p4 = round($alpha4,1) * $x4;
		$p5 = round($alpha5,1) * $x5;
		$p6 = round($alpha6,1) * $x6;
		$p7 = round($alpha7,1) * $x7;
		$p8 = round($alpha8,1) * $x8;
		$p9 = round($alpha9,1) * $x9;
        // echo "perkalian"; echo "<br>";
        // echo "<br>";
        // echo $p1;
        // echo "<br>";
        // echo $p2;
        // echo "<br>";
        // echo $p3;
        // echo "<br>";
        // echo $p4;
        // echo "<br>";
        // echo $p5;
        // echo "<br>";
        // echo $p6;
        // echo "<br>";
        // echo $p7;
        // echo "<br>";
        // echo $p8;
        // echo "<br>";
        // echo $p9;

        //hitung defuzzifikasi
      
		$sigmaAlpha = ($alpha1+$alpha2+$alpha3+$alpha4+$alpha5+$alpha6
			+$alpha7+$alpha8+$alpha9);
		$sigmaP = ($p1+$p2+$p3+$p4+$p5+$p6+$p7+$p8+$p9);

		$def = $sigmaP/$sigmaAlpha;
		echo "<br>";
		echo "defuzzifikasi";
		echo "<br>";
		echo round($def);

		// $def = $this->post('durasi');
      
		$object = array(
			'suhu' => $suhu ,
			'kelembapan' => $kelembapan,
			'durasi' => round($def) );
		$insert = $this->db->insert('tabelsuhu', $object);

		if ($insert) {$this->response($data, 200);} 
		else {$this->response(array('status' => 'fail', 502));}} 	
	}
	?>