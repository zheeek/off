<?php
require_once 'dbconfig.php';

	
	if($_POST)
	{
		$name = $_POST['name'];
		$mount = $_POST['mount'];
		$centerId = $_POST['centerId'];
		$minage = $_POST['minAge'];
		$maxage = $_POST['Maxage'];
		$gender = $_POST['gender'];	
		$marrage = $_POST['marrageState'];
		$degree = $_POST['degree'];
		$admin = $_SESSION['id'] ;
		$groh = $_POST['group'] ;
		$limit = $_POST['limit'] ;
		$forWho = $_POST['forWho'] ;


		
		try{
			
			$stmt = $db_con->prepare("INSERT INTO offer(name,mount,centerId,minAge,maxAge ,gender,marrageState,degree,admin,groh,limitt,forWho) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->bindParam(1, $name);
			$stmt->bindParam(2, $mount);
			$stmt->bindParam(3, $centerId);
			$stmt->bindParam(4, $minage);
			$stmt->bindParam(5, $maxage);
			$stmt->bindParam(6, $gender);
			$stmt->bindParam(7, $marrage);
			$stmt->bindParam(8, $degree);
			$stmt->bindParam(9, $admin);
			$stmt->bindParam(10, $groh);
			$stmt->bindParam(11, $limit);
			$stmt->bindParam(12, $forWho);
			
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