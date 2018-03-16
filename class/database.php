<?php


class database {
///database credentials
public $host;
public $username;
public $password;
public $database;
public function __construct() {
  $this->host = $_SERVER['DB_HOST'];
  $this->username = $_SERVER['DB_USER'];
  $this->password = $_SERVER['DB_PASS'];
  $this->database = $_SERVER['DB_DB'];
}
	public function selectNow($table,$cols,$condition,$value) {
		$connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);      
		$result = mysqli_query($connection, " SELECT ".$cols." as cols FROM ".$table." WHERE ".$condition." = '".$value."' ") or die("Query fail: " . mysqli_error()); 
		while($row = mysqli_fetch_array($result))
		{
			return $row['cols'];
		}
	}
	public function doubleSelectNow($table,$cols,$condition,$value,$condition1,$value1) {
		$connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);      
		$result = mysqli_query($connection, " SELECT ".$cols." as cols FROM ".$table." WHERE ".$condition." = '".$value."' AND ".$condition1." = '".$value1."' ") or die("Query fail: " . mysqli_error()); 
		while($row = mysqli_fetch_array($result))
		{
			return $row['cols'];
		}
	}
	private $insertNow_lastID;
	public function insertNow_lastID() {
		return $this->insertNow_lastID;
	}
	private $insertNow_cols;
	private $insertNow_data;
	private $insertNow_totalArray;
	private $insertNow_a;
	public function insertNow($table,$data) {
		$this->insertNow_totalArray = count($data);
		$this->insertNow_a = 0;
		$this->insertNow_cols=""; //pra sa looping alisin ung last value nea n gling s huling loop. 
		$this->insertNow_data="";
		/* make your connection */
		$sql = new \mysqli($this->host,$this->username,$this->password,$this->database);
	 	
	 	$table = "insert into ".$table;
	 	foreach($data as $c => $d) {
			
	 		if(++$this->insertNow_a == $this->insertNow_totalArray) { //knuha q ung last array pra matanggal ung comma sa $d
	 			$this->insertNow_cols .= $c;
	 			$this->insertNow_data .= "'".$d."'";
	 		}else {
	 			$this->insertNow_cols .= $c.",";
	 			$this->insertNow_data .= "'".$d."',";
	 		}
		} 
		$query = $table."(".$this->insertNow_cols.") values(".$this->insertNow_data.")";
		if ( $sql->query($query) ) {
	  		$this->insertNow_lastID = mysqli_insert_id($sql);
		} else {
	    	echo "There was a problem:<br />$query<br />{$sql->error}";
		}	
		/* close our connection */
		$sql->close();
	}


	public function editNow($table,$identifier,$identifierData,$columns,$newData) {
		$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->host, $this->username, $this->password));
		if (!$con)
		  {
		  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
		  }
		((bool)mysqli_query( $con, "USE " . $this->database));
		mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE $table SET $columns = '$newData'
		WHERE $identifier = '$identifierData' ");
		((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);
	}


	public function doubleEditNow($table,$identifier,$identifierData,$identifier1,$identifierData1,$columns,$newData) {
		$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->host, $this->username, $this->password));
		if (!$con)
		  {
		  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
		  }
		((bool)mysqli_query( $con, "USE " . $this->database));
		mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE $table SET $columns = '$newData'
		WHERE $identifier = '$identifierData' AND '$identifier1' = '$identifierData1' ");
		((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);
	}


	public function deleteNow($table,$identifier,$data) {
		$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->host, $this->username, $this->password));
		if (!$con)
		  {
		  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
		  }
		((bool)mysqli_query( $con, "USE " . $this->database));
		mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM $table WHERE $identifier='$data' ");
		((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);
	}
	public function formatText($text) {
		return ucfirst(strtolower($text));
	}
	public function formatDate($date) {
		if( $date == "" ) {
			return "";
		}else {
			$date1 = preg_split ("/\-/", $date); 
			$month = [
					'01'=>'Jan',
					'02'=>'Feb',
					'03'=>'Mar',
					'04'=>'Apr',
					'05'=>'May',
					'06'=>'Jun',
					'07'=>'Jul',
					'08'=>'Aug',
					'09'=>'Sep',
					'10'=>'Oct',
					'11'=>'Nov',
					'12'=>'Dec'];
			return $month[$date1[1]]." ".$date1[2].", ".$date1[0];
		}
	}

	public function formatCompleteDate($date) {
		if( $date == "" ) {
			return "";
		}else {
			$date1 = preg_split ("/\-/", $date); 
			$month = [
					'01'=>'January',
					'02'=>'February',
					'03'=>'March',
					'04'=>'April',
					'05'=>'May',
					'06'=>'June',
					'07'=>'July',
					'08'=>'August',
					'09'=>'September',
					'10'=>'October',
					'11'=>'November',
					'12'=>'December'];
			return $month[$date1[1]]." ".$date1[2].", ".$date1[0];
		}
	}

	public function formatTime($time) {
		return date('h:i A', strtotime($time));
	}
	public function number_format($number) {
		($number > 0) ? $x = number_format($number,2) : $x = "";
		return $x;
	}

	public function format24hr($time) {
		$timeShift = preg_split('/\s+/', $time, NULL, PREG_SPLIT_NO_EMPTY);
		$timeOnly = preg_split ("/\:/", $timeShift[0]);
		$convertedHour;

		if( $timeShift[1] == "PM" ) {
			$convertedHour = (int)$timeShift[0] + 12;
		}else {
			$convertedHour = $timeShift[0];
		}
		return $convertedHour.":".$timeOnly[1].":00";
	}


function encrypt_decrypt( $string, $action = 'e' ) {
    // you may change these values to your own
    $secret_key = 'my_simple_secret_key';
    $secret_iv = 'my_simple_secret_iv';
 
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
 
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
 
    return $output;
}

	
}