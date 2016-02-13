<?php
require_once 'dbconfig.php';

	
	if($_POST)
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		

		
	
			
			$stmt = $db_con->prepare("UPDATE groh SET name=? WHERE id=?");
			$stmt->bindParam(1, $name);
			$stmt->bindParam(2, $id);

			
			
		
		if($stmt->execute())
		{
			echo "Successfully updated";
		}
		else{
			echo "Query Problem";
		}
		 }
?>