<?php
	require_once "member_method.php";

	$method = new member();

	$request_method=$_SERVER["REQUEST_METHOD"];

	if(!isset($_GET["act"])){
		$act = "";
	} else {
		$act = $_GET["act"];
	}

	switch ($request_method) {

   	case 'GET':

         if($act == ""){
         		 $method->index();
		 } else {
			 if($act == 'all'){
				$method->get_all_member(); 
			 } else if ($act == 'jadwal_pelaksanaan') {
			 	$method->get_jadwal_pelaksanaan(); 

			 } else if ($act == 'set_ujian') {

			 	$method->set_pertanyaan(); 

			 } else if ($act == 'cek_temp_ujian') {

			 	$method->cek_temp_ujian();

			 } else if ($act == 'cek_ujian') {

			 	$method->cek_ujian();

			 } else if ($act == 'temp_detail_ujian') {

			 	$method->get_temp_detail_ujian();

			 } else if ($act == 'history_ujian') {

			 	$method->get_history_ujian();

			 } else if ($act == 'all_bukti_bayar') {

			 	$method->get_all_bukti_bayar();

			 }



		 }



         break;



    case 'POST':



         if($act == ""){



			$method->index();



		 } else if ($act == "register"){



		 	$method->register_siswa();



		 } else if ($act == 'pertanyaanByNo') {

			 	$method->getPertanyaanByNo();

		 } else if ($act == 'save_answer') {

			 	$method->save_answer();

		 } else if ($act == 'allPertanyaan') {

			 	$method->getAllPertanyaan();

		 } else if ($act == 'detail_history_ujian') {

			 	$method->get_detail_history_ujian();

		 }



         break;



   default:



      // Invalid Request Method



         header("HTTP/1.0 405 Method Not Allowed");



         break;



      break;



}







?>