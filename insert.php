<?php
	
	require 'class/database.php';

	$db = new database();

	$studentNo = $_POST['studentNo'];
	$studentName = $_POST['studentName'];
	$studentContact = $_POST['studentContact'];
	$studentAge = $_POST['studentAge'];
	$studentAddress = $_POST['studentAddress'];
	$studentStatus = $_POST['studentStatus'];
	$studentGender = $_POST['studentGender'];
	$studentStudy = $_POST['studentStudy'];

	$data = array(
		"studentNo" => $studentNo,
		"studentName" => $studentName,
		"studentContact" => $studentContact,
		"studentAge" => $studentAge,
		"studentAddress" => $studentAddress,
		"studentStatus" => $studentStatus,
		"studentGender" => $studentGender,
		"studentStudy" => $studentStudy
	);

	$db->insertNow('student',$data);


?>