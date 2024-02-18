<?php 

require_once "koneksi.php";

class Landing_page {
	
	public function index(){
		echo "get function landing_page<br>";
		echo "keunggulan<br>";
		echo "banner<br>";
		echo "paket<br>";
		echo "sekolah_kedinasan<br>";
		echo "susunan_organisasi<br>";
		echo "tentor<br>";
		echo "visi_misi<br>";
	}
	
	public function get_keunggulan(){
		global $mysqli;
		  $query="SELECT * FROM keunggulan";
		  $data=array();
		  $result=mysqli_query($GLOBALS['koneksi'], $query);
		  while($row=mysqli_fetch_assoc($result))
		  {
			 $data[]=$row;
		  }
		  $response=array(
						 'status' => 1,
						 'message' =>'Get List Keunggulan Successfully.',
						 'data' => $data
					  );
		  header('Content-Type: application/json');
		  echo json_encode($response);
	}

	public function get_banner(){
		global $mysqli;
		  $query="SELECT * FROM banner";
		  $data=array();
		  $result=mysqli_query($GLOBALS['koneksi'], $query);
		  while($row=mysqli_fetch_assoc($result))
		  {
			 $data[]=$row;
		  }
		  $response=array(
						 'status' => 1,
						 'message' =>'Get List Banner Successfully.',
						 'data' => $data
					  );
		  header('Content-Type: application/json');
		  echo json_encode($response);
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