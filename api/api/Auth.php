<?php

	require_once "auth_method.php";

	$method = new Auth();

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

			 if($act == 'keunggulan'){

				$method->get_keunggulan(); 

			 } else if($act == 'banner'){

				$method->get_banner(); 

			 } else if($act == 'paket'){

				$method->get_paket(); 

			 } else if($act == 'sekolah_kedinasan'){

				$method->get_sekolah_kedinasan(); 

			 } else if($act == 'susunan_organisasi'){

				$method->get_susunan_organisasi(); 

			 } else if($act == 'tentor'){

				$method->get_tentor(); 

			 } else if($act == 'visi_misi'){

				$method->get_visi_misi(); 

			 } 

		 }

         break;

    case 'POST':

         if($act == ""){

			$method->index();

		 } else if ($act == "register"){

		 	$method->register_siswa();

		 } else if ($act == "upload") {

			$method->uploadFile();

		 } else if ($act == "login") {

			 $method->login();

		 } else if ($act == "uploadBuktiBayar") {

			$method->uploadFileBuktiPembayaran();

		 } else if ($act == "simpanBuktiBayar") {

			$method->bukti_pembayaran();

		 }

         break;

   default:

      // Invalid Request Method

         header("HTTP/1.0 405 Method Not Allowed");

         break;

      break;

}



?>