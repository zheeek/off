<?php
require_once 'dbconfig.php';

	
	if($_POST)
	{
		$name = $_POST['name'];
		$admin = $_SESSION['id'] ;

		
		try{
			
			$stmt = $db_con->prepare("INSERT INTO center(name,admin) VALUES(?,?)");
			$stmt->bindParam(1, $name);
			$stmt->bindParam(2, $admin);

			
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