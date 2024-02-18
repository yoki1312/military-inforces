<?php 



require_once "../koneksi.php";



class Profile {

	

	public function index(){

		echo "get function Member Profile<br>";

		// echo "keunggulan<br>";

		// echo "banner<br>";

		// echo "paket<br>";

		// echo "sekolah_kedinasan<br>";

		// echo "susunan_organisasi<br>";

		// echo "tentor<br>";

		// echo "visi_misi<br>";

	}

	

	public function getUserById(){

		global $mysqli;

		  $query="SELECT a.*,b.nama_paket,b.harga,b.path_foto FROM users a 

					inner join paket b on (a.jenis_paket = b.id) 

					WHERE a.id = 1";

		  $data=array();

		  $result=mysqli_query($GLOBALS['koneksi'], $query);

		  while($row=mysqli_fetch_assoc($result))

		  {

			 $data[]=$row;

		  }

		  $response=array(

						 'status' => 1,

						 'message' =>'Get Data User Member',

						 'data' => $data

					  );

		  header('Access-Control-Allow-Origin: *');

		  echo json_encode($response);

	}



	public function update_user(){

		$data = json_decode(file_get_contents("php://input"), true);


		if ($data){

			$id = $data['id'];

			$password = md5($data['password']);
			 
			$query = "update users set password = '$password' where id = $id";

	
			if ($GLOBALS['koneksi']->query($query)){

					$response=array(

									'status' => 1,

									'message' =>'Update Password Successfully.',

									'data' => []

								);

					header('Access-Control-Allow-Origin: *');

					header('Content-Type: application/json');

					echo json_encode($response);

			} else {

				$response=array(

					'status' => 0,

					'message' =>'Update Password Failed',

					'data' => []

					);

				header('Access-Control-Allow-Origin: *');

				header('Content-Type: application/json');

				echo json_encode($response);

			}

		}

	}



	public function get_paket(){

		global $mysqli;

		  $query="SELECT * FROM paket";

		  $data=array();

		  $result=mysqli_query($GLOBALS['koneksi'], $query);

		  while($row=mysqli_fetch_assoc($result))

		  {

			 $data[]=$row;

		  }

		  $response=array(

						 'status' => 1,

						 'message' =>'Get List Paket Successfully.',

						 'data' => $data

					  );

		  header('Content-Type: application/json');

		  echo json_encode($response);

	}



	public function get_sekolah_kedinasan(){

		global $mysqli;

		  $query="SELECT * FROM sekolah_kedinasan";

		  $data=array();

		  $result=mysqli_query($GLOBALS['koneksi'], $query);

		  while($row=mysqli_fetch_assoc($result))

		  {

			 $data[]=$row;

		  }

		  $response=array(

						 'status' => 1,

						 'message' =>'Get List Sekolah Kedinasan Successfully.',

						 'data' => $data

					  );

		  header('Content-Type: application/json');

		  echo json_encode($response);

	}



	public function get_susunan_organisasi(){

		global $mysqli;

		  $query="SELECT * FROM susunan_organisasi";

		  $data=array();

		  $result=mysqli_query($GLOBALS['koneksi'], $query);

		  while($row=mysqli_fetch_assoc($result))

		  {

			 $data[]=$row;

		  }

		  $response=array(

						 'status' => 1,

						 'message' =>'Get List Susunan Organisasi Successfully.',

						 'data' => $data

					  );

		  header('Content-Type: application/json');

		  echo json_encode($response);

	}



	public function get_tentor(){

		global $mysqli;

		  $query="SELECT * FROM tentor";

		  $data=array();

		  $result=mysqli_query($GLOBALS['koneksi'], $query);

		  while($row=mysqli_fetch_assoc($result))

		  {

			 $data[]=$row;

		  }

		  $response=array(

						 'status' => 1,

						 'message' =>'Get List Tentor Successfully.',

						 'data' => $data

					  );

		  header('Content-Type: application/json');

		  echo json_encode($response);

	}



	public function get_visi_misi(){

		global $mysqli;

		  $query="SELECT * FROM visi_misi";

		  $data=array();

		  $result=mysqli_query($GLOBALS['koneksi'], $query);

		  while($row=mysqli_fetch_assoc($result))

		  {

			 $data[]=$row;

		  }

		  $response=array(

						 'status' => 1,

						 'message' =>'Get List Visi Misi Successfully.',

						 'data' => $data

					  );

		  header('Content-Type: application/json');

		  echo json_encode($response);

	}

	

}







?>