<?php
require_once 'dbconfig.php';

	
	if($_POST)
	{
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];	
		$marrage = $_POST['marrageState'];
		$degree = $_POST['degree'];
		$admin = $_SESSION['id'] ;
		$group = $_POST['group'];

		try{
			
			$stmt = $db_con->prepare("INSERT INTO member(name,phone,email,age,gender,marrageState,degree,admin,groh) VALUES(?,?,?,?,?,?,?,?,?)");
			$stmt->bindParam(1, $name);
			$stmt->bindParam(2, $phone);
			$stmt->bindParam(3, $email);
			$stmt->bindParam(4, $age);
			$stmt->bindParam(5, $gender);
			$stmt->bindParam(6, $marrage);
			$stmt->bindParam(7, $degree);
			$stmt->bindParam(8, $admin);
			$stmt->bindParam(9, $group);
			if($stmt->execute())
			{
				echo "Successfully Added";
			}
			else{
				echo "Query Problem";
			}	
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>