<?php 

require_once "../koneksi.php";

class Member {
	
	public function index(){
		echo "API function Member<br>";
		echo "tentor<br>";
		// echo "banner<br>";
		// echo "paket<br>";
		// echo "sekolah_kedinasan<br>";
		// echo "susunan_organisasi<br>";
		// echo "tentor<br>";
		// echo "visi_misi<br>";
	}
	
	public function getTentorById(){
		global $mysqli;
		  $query="SELECT b.* FROM matriks_tentor_member a
				INNER JOIN tentor b ON (a.id_tentor = b.id)
				WHERE a.id_user = 1";
		  $data=array();
		  $result=mysqli_query($GLOBALS['koneksi'], $query);
		  while($row=mysqli_fetch_assoc($result))
		  {
			 $data[]=$row;
		  }
		  $response=array(
						 'status' => 1,
						 'message' =>'Get Data Tentor',
						 'data' => $data
					  );
		  header('Access-Control-Allow-Origin: *');
		  echo json_encode($response);
	}

	public function get_jadwal_pelaksanaan(){
		global $mysqli;
		  $query="SELECT id,tanggal,id_paket,keterangan,DAYNAME(tanggal) hari FROM jadwal_pelaksanaan
				WHERE id_paket = 1
				ORDER BY tanggal";
		  $data=array();
		  $result=mysqli_query($GLOBALS['koneksi'], $query);
		  while($row=mysqli_fetch_assoc($result))
		  {
			 $data[]=$row;
		  }
		  $response=array(
						 'status' => 1,
						 'message' =>'Get Jadwal Pelaksanaan Successfully.',
						 'data' => $data
					  );
		  header('Access-Control-Allow-Origin: *');
		  echo json_encode($response);
	}

	public function set_pertanyaan(){

		//echo $this->cek_temp_ujian();
		$tmp_ujian = json_decode($this->cek_temp_ujian());
		//var_dump($tmp_ujian->data);

		if ($tmp_ujian->data){
			echo "ada data";
		} else {
			echo "tidak ada data";
			// SET Pertanyaan
			$pertanyaan = json_decode($this->get_pertanyaan());
			$jmlPertanyaan = count($pertanyaan);

			//echo $jmlPertanyaan;
			//var_dump($pertanyaan);
			
			// SET DETAIL UJIAN
		 	 $query = "insert into tmp_detail_ujian 
					(id_user,last_number,total_number,tanggal_ujian,start_time,finish_time,status) 
					values (1,1,5,CURDATE(),current_time,current_time + INTERVAL 10 MINUTE,0)";
		 	 
			 if ($GLOBALS['koneksi']->query($query)) {
				$id_ujian = $GLOBALS['koneksi']->insert_id;
				
				for ($i=0; $i < $jmlPertanyaan; $i++) { 
		 		$id_user = $pertanyaan[$i]->id_user;
		 		$id_pertanyaan = $pertanyaan[$i]->id_pertanyaan;
		 		$no_urut = $i+1;


		 		$query = "insert into temp_ujian (id_ujian,id_user,id_pertanyaan,no_urut) values ($id_ujian,$id_user,$id_pertanyaan,$no_urut)";

		 		$GLOBALS['koneksi']->query($query);
				}

				if ($i == $jmlPertanyaan) {

					

					$response=array(
								 'status' => 1,
								 'message' =>'Get List Pertanyaan Successfully.',
								 'data' => []
							  );
					  header('Content-Type: application/json');
					  header('Access-Control-Allow-Origin: *');
					  echo json_encode($response);
				} else {
					$response=array(
								 'status' => 1,
								 'message' =>'Get List Pertanyaan Tidak Lengkap	.',
								 'data' => []
							  );
					  header('Content-Type: application/json');
					  header('Access-Control-Allow-Origin: *');
					  echo json_encode($response);
				}
			 }
			 
			
		 	
		}
		  
	}

	private function get_pertanyaan(){
		global $mysqli;
		  $query="SELECT 1 id_user,id id_pertanyaan
					FROM (
					SELECT * FROM pertanyaan
					ORDER BY RAND() LIMIT 5
					) tbl";
		  $data=array();
		  $result=mysqli_query($GLOBALS['koneksi'], $query);
		  while($row=mysqli_fetch_assoc($result))
		  {
			 $data[]=$row;
		  }
		  return json_encode($data);
	}

	public function cek_temp_ujian(){
		global $mysqli;
		  $query="SELECT * FROM temp_ujian where id_user = 1 and status = 0";
		  $data=null;
		  $result=mysqli_query($GLOBALS['koneksi'], $query);
		  if ($result){
			  while($row=mysqli_fetch_assoc($result))
			  {
				 $data[]=$row;
			  }
		  }
		  $response=array(
						 'status' => 1,
						 'message' =>'Temporary Ujian',
						 'data' => $data
					  );
		  header('Content-Type: application/json');
		  header('Access-Control-Allow-Origin: *');
		  return json_encode($response);
	}
	
	public function cek_ujian(){
		global $mysqli;
		  $query="SELECT * FROM tmp_detail_ujian where id_user = 1 and status = 0";
		  $data=null;
		  $result=mysqli_query($GLOBALS['koneksi'], $query);
		  while($row=mysqli_fetch_assoc($result))
		  {
			 $data[]=$row;
		  }
		  $response=array(
						 'status' => 1,
						 'message' =>'Temporary Ujian',
						 'data' => $data
					  );
		  header('Content-Type: application/json');
		  header('Access-Control-Allow-Origin: *');
		  echo json_encode($response);
	}

	public function get_temp_detail_ujian(){
		global $mysqli;
		  $query="SELECT * FROM tmp_detail_ujian where id_user = 1 AND STATUS = 0";
		  $data=array();
		  $result=mysqli_query($GLOBALS['koneksi'], $query);
		  while($row=mysqli_fetch_assoc($result))
		  {
			 $data[]=$row;
		  }

		  // var_dump($data);
		  if ($data) {
		  	$id_ujian = $data[0]['id'];

			  $query="SELECT * FROM temp_ujian a
						INNER JOIN pertanyaan b ON (a.id_pertanyaan = b.id)
						LEFT OUTER JOIN data_answer c ON (a.id_ujian = c.id_ujian AND b.id = c.id_pertanyaan)
						WHERE a.id_user = 1 AND a.id_ujian = $id_ujian";
			  $data1=array();
			  $result1=mysqli_query($GLOBALS['koneksi'], $query);
			  while($row=mysqli_fetch_assoc($result1))
			  {
				 $data1[]=$row;
			  }

		  } else {
		  	$data1 = null;
		  }
		  
		  $response=array(
						 'status' => 1,
						 'message' =>'Get Temp Detail Ujian Successfully.',
						 'data' => $data,
						 'allPertanyaan' => $data1
					  );
		  header('Content-Type: application/json');
		  header('Access-Control-Allow-Origin: *');
		  echo json_encode($response);
	}

	public function getPertanyaanByNo(){
		//$no = params.query.no;
		$data = json_decode(file_get_contents("php://input"));
		//var_dump($data);
		if ($data){
			//var_dump($data);
			//echo $data->no;
			$last_no = $data->no;
			$id_ujian = $data->id_ujian;
			$query="SELECT * FROM temp_ujian a
					INNER JOIN pertanyaan b ON (a.id_pertanyaan = b.id)
					LEFT OUTER JOIN data_answer c ON (a.id_ujian = c.id_ujian AND b.id = c.id_pertanyaan)
					WHERE a.id_user = 1 AND a.no_urut = $last_no AND a.id_ujian = $id_ujian";
			  $data=array();
			  $result=mysqli_query($GLOBALS['koneksi'], $query);
			  while($row=mysqli_fetch_assoc($result))
			  {
				 $data[]=$row;
			  }
			  $response=array(
							 'status' => 1,
							 'message' =>'Get Pertanyaan Successfully.',
							 'data' => $data
						  );
			  header('Content-Type: application/json');
			  header('Access-Control-Allow-Origin: *');
			  echo json_encode($response);
		} else {
			$response=array(
							 'status' => 0,
							 'message' =>'Get Pertanyaan Failed.',
							 'data' => null
						  );
			  header('Content-Type: application/json');
			  header('Access-Control-Allow-Origin: *');
			  echo json_encode($response);
		}
	}

	public function save_answer() {
		$data = json_decode(file_get_contents("php://input"));
		var_dump($data);
		if ($data){
			$id_ujian = $data->id_ujian;
			$id_pertanyaan = $data->id_pertanyaan;
			$jawaban = $data->answer;
			$last_numb = $data->last_numb;

			// CEK Jawaban Sebelumnya
			$query ="select * from data_answer 
			WHERE id_user = 1 AND id_ujian = $id_ujian AND id_pertanyaan = $id_pertanyaan";

		 	$result=mysqli_query($GLOBALS['koneksi'], $query);

			$row = mysqli_num_rows($result);

			if ($row >0) {
				// Hapus Jawaban
			 	$query = "delete from data_answer WHERE id_user = 1 AND id_ujian = $id_ujian AND id_pertanyaan = $id_pertanyaan";
			 	$GLOBALS['koneksi']->query($query);	
			}

			// Save Jawaban
		 	$query = "insert into data_answer (id_user,id_ujian,id_pertanyaan,jawaban) values (1,$id_ujian,$id_pertanyaan,'$jawaban')";
		 	$GLOBALS['koneksi']->query($query);

		 	// Update data last number
		 	 $query = "update tmp_detail_ujian set last_number = $last_numb where id_user = 1 and id = $id_ujian";
		 	$GLOBALS['koneksi']->query($query);


		 		$response=array(
		 					 'status' => 1,
		 					 'message' =>'Save Answer Successfully.',
		 					 'data' => []
		 				  );
		 		  header('Content-Type: application/json');
		 		  header('Access-Control-Allow-Origin: *');
		 		  echo json_encode($response);
		} else {
			$response=array(
							 'status' => 0,
							 'message' =>'Save Answer Failed.',
							 'data' => null
						  );
			  header('Content-Type: application/json');
			  header('Access-Control-Allow-Origin: *');
			  echo json_encode($response);
		}
	}

	public function getAllPertanyaan(){
		$data = json_decode(file_get_contents("php://input"));
		if ($data){
			$id_ujian = $data->id_ujian;
			$query="SELECT * FROM temp_ujian a
					INNER JOIN pertanyaan b ON (a.id_pertanyaan = b.id)
					LEFT OUTER JOIN data_answer c ON (a.id_ujian = c.id_ujian AND b.id = c.id_pertanyaan)
					WHERE a.id_user = 1 AND a.id_ujian = $id_ujian";
			  $data=array();
			  $result=mysqli_query($GLOBALS['koneksi'], $query);
			  while($row=mysqli_fetch_assoc($result))
			  {
				 $data[]=$row;
			  }
			  $response=array(
							 'status' => 1,
							 'message' =>'Get Pertanyaan Successfully.',
							 'data' => $data
						  );
			  header('Content-Type: application/json');
			  header('Access-Control-Allow-Origin: *');
			  echo json_encode($response);
		} else {
			$response=array(
							 'status' => 0,
							 'message' =>'Get Pertanyaan Failed.',
							 'data' => null
						  );
			  header('Content-Type: application/json');
			  header('Access-Control-Allow-Origin: *');
			  echo json_encode($response);
		}
	}
	
	public function get_history_ujian(){
		  $query="SELECT * FROM tmp_detail_ujian where id_user = 1 and status = 1";
		  $data=null;
		  $result=mysqli_query($GLOBALS['koneksi'], $query);
		  while($row=mysqli_fetch_assoc($result))
		  {
			 $data[]=$row;
		  }
		  $response=array(
						 'status' => 1,
						 'message' =>'Get History Ujian Successfully.',
						 'data' => $data
					  );
		  header('Content-Type: application/json');
		  header('Access-Control-Allow-Origin: *');
		  echo json_encode($response);
	}
	
	public function get_detail_history_ujian(){
		$data = json_decode(file_get_contents("php://input"));
		if ($data){
			$id_ujian = $data->id_ujian;
			$query="SELECT * FROM temp_ujian a
					INNER JOIN pertanyaan b ON (a.id_pertanyaan = b.id)
					LEFT OUTER JOIN data_answer c ON (a.id_ujian = c.id_ujian AND b.id = c.id_pertanyaan)
					WHERE a.id_user = 1 AND a.id_ujian = $id_ujian";
			  $data=array();
			  $result=mysqli_query($GLOBALS['koneksi'], $query);
			  while($row=mysqli_fetch_assoc($result))
			  {
				 $data[]=$row;
			  }
			  $response=array(
							 'status' => 1,
							 'message' =>'Get History Ujian Successfully.',
							 'data' => $data
						  );
			  header('Content-Type: application/json');
			  header('Access-Control-Allow-Origin: *');
			  echo json_encode($response);
		} else {
			$response=array(
							 'status' => 0,
							 'message' =>'Get History Ujian Failed.',
							 'data' => null
						  );
			  header('Content-Type: application/json');
			  header('Access-Control-Allow-Origin: *');
			  echo json_encode($response);
		}
	}
}



?>