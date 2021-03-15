

<?php


class DataBase{

public $host = DB_HOST;
public $user = DB_USER;
public $pass = DB_PASS;
public $dbname = DB_NAME;


public $link;
public $error;



public function __construct(){

		$this->connectDB();

}

private function connectDB(){

	$this->link = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
	if (!$this->link) {
	  $this->error  = "Connection Failed !".$this->link->connect_error;
	  return false;
	}

}



//read or select data


public function select($query){

	$result = $this->link->query($query) or die($this->link->error.__LINE__);
	if ($result->num_rows > 0 ) {
		return $result;
	}
	else{
		return false;
	}

}


//insert Data


public function insert($query){

	$insertData = $this->link->query($query) or die($this->link->error.__LINE__);
	if ($insertData) {
		
		header("Location:index.php?msg=".urlencode('Image Uploaded successfully.'));
		exit();
	}

	else{
		die("Error:(".$this->link->errno.")".$this->link->error);
	}

}



public function delete($query){

	$deleteData = $this->link->query($query) or die($this->link->error.__LINE__);
	if ($deleteData) {
		
		header("Location:index.php?msg=".urlencode('Image Deleted successfully.'));
		exit();
	}

	else{
		die("Error:(".$this->link->errno.")".$this->link->error);
	}

}


}














?>