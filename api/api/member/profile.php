<?php



	require_once "profile_method.php";



	$method = new profile();



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



			 if($act == 'profile'){



				$method->getUserById(); 



			 }



		 }



         break;



    case 'POST':



         if($act == ""){



			$method->index();



		 } else if ($act == "register"){



		 	$method->register_siswa();



		 } else if ($act == "update_user"){



		 	$method->update_user();



		 }



         break;



   default:



      // Invalid Request Method



         header("HTTP/1.0 405 Method Not Allowed");



         break;



      break;



}







?>