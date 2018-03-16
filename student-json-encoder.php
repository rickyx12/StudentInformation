<?php
	
	require 'class/database.php';
	require 'class/Student.php';

	$db = new database();
	$student = new student();

	$student->getStudent();

	$data = array();


	if(!empty($student->getStudent_id())) {

		foreach($student->getStudent_id() as $id) {
			$data[$id]['studentNo'] = $db->selectNow('student','studentNo','id',$id);
			$data[$id]['name'] = $db->selectNow('student','studentName','id',$id);
			$data[$id]['contact'] = $db->selectNow('student','studentContact','id',$id);
			$data[$id]['age'] = $db->selectNow('student','studentAge','id',$id);
			$data[$id]['address'] = $db->selectNow('student','studentAddress','id',$id);
			$data[$id]['civilStatus'] = $db->selectNow('student','studentStatus','id',$id);
			$data[$id]['gender'] = $db->selectNow('student','studentGender','id',$id);
			$data[$id]['backgroundStudy'] = $db->selectNow('student','studentStudy','id',$id);
		}

		echo json_encode($data);

	}else {
		echo "null";
	}

?>