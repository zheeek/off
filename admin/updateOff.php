<?php
require_once 'dbconfig.php';

	
	if($_POST)
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$mount = $_POST['mount'];
		$centerId = $_POST['centerId'];
		$minage = $_POST['minAge'];
		$maxage = $_POST['Maxage'];
		$gender = $_POST['gender'];	
		$marrage = $_POST['marrageState'];
		$degree = $_POST['degree'];
		$group = $_POST['group'];
		$limit = $_POST['limit'];
		$forWho = $_POST['forWho'];

		
	
			
			$stmt = $db_con->prepare("UPDATE offer SET name=?, mount=?, centerId=? ,minAge=? , maxAge=?,gender=? ,marrageState=?,degree=?,groh=? ,limitt=?,forWho=? WHERE id=?");
			$stmt->bindParam(1, $name);
			$stmt->bindParam(2, $mount);
			$stmt->bindParam(3, $centerId);
			$stmt->bindParam(4, $minage);
			$stmt->bindParam(5, $maxage);
			$stmt->bindParam(6, $gender);
			$stmt->bindParam(7, $marrage);
			$stmt->bindParam(8, $degree);
			$stmt->bindParam(9, $group);
			$stmt->bindParam(10, $limit);
			$stmt->bindParam(11, $forWho);
			$stmt->bindParam(12, $id);

			
		
		if($stmt->execute())
		{
			echo "Successfully updated";
		}
		else{
			echo "Query Problem";
		}
		 }
?>