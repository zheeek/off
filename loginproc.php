<?php
	
	require_once 'admin/dbconfig.php';


	if($_POST)
	{
		$user_email = $_POST['user_email'];
		$user_password = $_POST['password'];
		
		$password = md5($user_password);
		
		try
		{	
		
			$stmt = $db_con->prepare("SELECT * FROM admin WHERE email=:email AND password:pass");
			$stmt->execute(array(":email"=>$user_email , ":pass"=>$user_password));
			$count = $stmt->rowCount();
			
			if($count==0){
				
			$stmt = $db_con->prepare("INSERT INTO admin(username,email,password,joining_date) VALUES(:uname, :email, :pass, :jdate)");
			$stmt->bindParam(":uname",$user_name);
			$stmt->bindParam(":email",$user_email);
			$stmt->bindParam(":pass",$password);
			$stmt->bindParam(":jdate",$joining_date);
					
				if($stmt->execute())
				{
					echo "registered";
				}
				else
				{
					echo "Query could not execute !";
				}
			
			}
			else{
				
				echo "1"; //  not available
			}
				
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>