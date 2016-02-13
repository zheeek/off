<?php
require_once 'dbconfig.php';

	
	if($_POST)
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];	
		$marrage = $_POST['marrageState'];
		$degree = $_POST['degree'];
		$group = $_POST['group'];

		
		
		$stmt = $db_con->prepare("UPDATE member SET name=?, phone=?, email=? ,age=? , gender=? ,marrageState=?,degree=?,groh=? WHERE id=?");
			$stmt->bindParam(1, $name);
			$stmt->bindParam(2, $phone);
			$stmt->bindParam(3, $email);
			$stmt->bindParam(4, $age);
			$stmt->bindParam(5, $gender);
			$stmt->bindParam(6, $marrage);
			$stmt->bindParam(7, $degree);
			$stmt->bindParam(8, $group);
			$stmt->bindParam(9, $id);
		
		if($stmt->execute())
		{
			echo "Successfully updated";
		}
		else{
			echo "Query Problem";
		}
	}
?>