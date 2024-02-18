<?php 

require_once "../koneksi.php";

class Member {

	public function index(){

		echo "API Admin function Data Member / Siswa<br>";

		echo "memner : Daftar siswa<br>";

		// echo "banner<br>";

		// echo "paket<br>";

		// echo "sekolah_kedinasan<br>";

		// echo "susunan_organisasi<br>";

		// echo "tentor<br>";

		// echo "visi_misi<br>";

	}

	public function get_all_member(){
		$query="SELECT * FROM users";

		  $data=array();

		  $result=mysqli_query($GLOBALS['koneksi'], $query);

		  while($row=mysqli_fetch_assoc($result))

		  {
			 $data[]=$row;
		  }

		  $response=array(

						 'status' => 1,

						 'message' =>'Get All Member Successfully.',

						 'data' => $data

					  );

		  header('Access-Control-Allow-Origin: *');
		  header('Content-Type: application/json');

		  echo json_encode($response);
	}
	
	public function get_all_bukti_bayar(){
		$query="SELECT * FROM bukti_pembayaran";

		  $data=array();

		  $result=mysqli_query($GLOBALS['koneksi'], $query);

		  while($row=mysqli_fetch_assoc($result))

		  {
			 $data[]=$row;
		  }

		  $response=array(

						 'status' => 1,

						 'message' =>'Get All Bukti Bayar Successfully.',

						 'data' => $data

					  );

		  header('Access-Control-Allow-Origin: *');
		  header('Content-Type: application/json');

		  echo json_encode($response);
	}

}







?>