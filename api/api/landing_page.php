<?php
	require_once "landing_page_method.php";
	$lp = new Landing_page();
	$request_method=$_SERVER["REQUEST_METHOD"];
	
	if(!isset($_GET["act"])){
		$act = "";
	} else {
		
		$act = $_GET["act"];
	}
	
	switch ($request_method) {
   case 'GET':
         if($act == ""){
			 $lp->index();
		 } else {
			 if($act == 'keunggulan'){
				$lp->get_keunggulan(); 
			 } else if($act == 'banner'){
				$lp->get_banner(); 
			 } else if($act == 'paket'){
				$lp->get_paket(); 
			 } else if($act == 'sekolah_kedinasan'){
				$lp->get_sekolah_kedinasan(); 
			 } else if($act == 'susunan_organisasi'){
				$lp->get_susunan_organisasi(); 
			 } else if($act == 'tentor'){
				$lp->get_tentor(); 
			 } else if($act == 'visi_misi'){
				$lp->get_visi_misi(); 
			 } 
		 }
         break;
   default:
      // Invalid Request Method
         header("HTTP/1.0 405 Method Not Allowed");
         break;
      break;
}

?>