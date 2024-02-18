<?php 



require_once "koneksi.php";



class Auth {

	

	public function index(){

		echo "get function authentication<br>";

		echo "register<br>";

		echo "login<br>";

	}

	

	public function register_siswa(){



		$data = json_decode(file_get_contents("php://input"), true);



		if ($data){

			$nama = $data['nama'];

			$no_hp = $data['no_hp'];

			$email = $data['email'];

			$alamat = '';

			$asal_sekolah= $data['asal_sekolah'];

			$jenis_paket = '';

			$role_id = 2;

			$is_active = 0;

			$password = md5($data['no_hp']);

			$path_foto = $data['path_foto'];

			$name = explode('.',$path_foto);
		     
		     $string = preg_replace('/\s+/', '_', $name[0]);
		     
		     $newName = $string.'_'.time().'.'.$name[1];



			$query = "select * from users where email = '$email'";



			$result=mysqli_query($GLOBALS['koneksi'], $query);

			$row = mysqli_num_rows($result);

			if ($row >0) {

				$response=array(

							'status' => 0,

							'message' =>'Email Sudah Terdaftar.',

							'data' => []

				);

				header('Access-Control-Allow-Origin: *');

				header('Content-Type: application/json');

				echo json_encode($response);

			} else {

				$query = "insert into users (nama,no_hp,email,alamat,asal_sekolah,role_id,is_active,password,path_foto,created_dt,created_by) values ('$nama','$no_hp','$email','$alamat','$asal_sekolah',$role_id,$is_active,'$password','$newName',current_timestamp,'$nama')";

	

				if ($GLOBALS['koneksi']->query($query)){

						$response=array(

										'status' => 1,

										'message' =>'Register Siswa Successfully.',

										'data' => []

									);

						header('Access-Control-Allow-Origin: *');

						header('Content-Type: application/json');

						echo json_encode($response);

				} else {

					$response=array(

						'status' => 0,

						'message' =>'Register Siswa Gagal.',

						'data' => []

						);

					header('Access-Control-Allow-Origin: *');

					header('Content-Type: application/json');

					echo json_encode($response);

				}

			}

		}

	}	

	public function uploadFile(){
		header('Access-Control-Allow-Origin: *');  
		 
		 if ($_FILES["file"]["tmp_name"]) {
		     
		     $name = explode('.',$_FILES['file']['name']);
		     
		     $string = preg_replace('/\s+/', '_', $name[0]);
		     
		     $newName = $string.'_'.time().'.'.$name[1];
		     
		     if (move_uploaded_file($_FILES["file"]["tmp_name"], "images/profile/".$newName)) {
    			echo "done";
    			exit;
		    }
		 }
  
		echo "failed";

	}

	public function uploadFileBuktiPembayaran(){
		header('Access-Control-Allow-Origin: *');  
		 
		 if ($_FILES["file"]["tmp_name"]) {
		     
		     $name = explode('.',$_FILES['file']['name']);
		     
		     $string = preg_replace('/\s+/', '_', $name[0]);
		     
		     $newName = $string.'_'.time().'.'.$name[1];
		     
		     if (move_uploaded_file($_FILES["file"]["tmp_name"], "images/bukti_bayar/".$newName)) {
    			echo "done";
    			exit;
		    }
		 }
  
		echo "failed";

	}

	

	public function login(){

		$data = json_decode(file_get_contents("php://input"), true);

		

		if ($data){

			$email = $data['username'];

			$password = md5($data['password']);

			

			$query = "select * from users where email = '$email' and password = '$password'";



			$result=mysqli_query($GLOBALS['koneksi'], $query);

			$row = mysqli_num_rows($result);

			if ($row >0) {

				

				while($row=mysqli_fetch_assoc($result))

				  {

					 $data[]=$row;

				  }

				  

				if ($data[0]['is_active'] == 0) {

					$response=array(

						'status' => 0,

						'message' =>'Login Gagal, Akun Belum Aktif',

						'data' => []

						);

					header('Access-Control-Allow-Origin: *');

					header('Content-Type: application/json');

					echo json_encode($response);

				} else {

					$response=array(

							'status' => 1,

							'message' =>'Berhasil Login',

							'data' => $data[0]

					);

					header('Access-Control-Allow-Origin: *');

					header('Content-Type: application/json');

					echo json_encode($response);

				}

				

			} else {

				$response=array(

						'status' => 0,

						'message' =>'Login Gagal, username / password salah',

						'data' => []

						);

				header('Access-Control-Allow-Origin: *');

				header('Content-Type: application/json');

				echo json_encode($response);

			}

		}

	}
	
	public function bukti_pembayaran(){



		$data = json_decode(file_get_contents("php://input"), true);



		if ($data){

			$nama = $data['nama'];

			$transfer_by = $data['transfer_by'];

			$path_foto = $data['path_foto'];

			$name = explode('.',$path_foto);
		     
			$string = preg_replace('/\s+/', '_', $name[0]);
			 
			$newPathFoto = $string.'_'.time().'.'.$name[1];
			 
			$query = "insert into bukti_pembayaran (nama,transfer_by,path_foto) values ('$nama','$transfer_by','$newPathFoto')";

	
			if ($GLOBALS['koneksi']->query($query)){

					$response=array(

									'status' => 1,

									'message' =>'Kirim Bukti Pembayaran Successfully.',

									'data' => []

								);

					header('Access-Control-Allow-Origin: *');

					header('Content-Type: application/json');

					echo json_encode($response);

			} else {

				$response=array(

					'status' => 0,

					'message' =>'Kirim Bukti Pembayaran Gagal',

					'data' => []

					);

				header('Access-Control-Allow-Origin: *');

				header('Content-Type: application/json');

				echo json_encode($response);

			}

		}

	}

	

}



?>