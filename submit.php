<?php
      require_once 'admin/dbconfig.php';

 if(isset($_SESSION['login'])  ){
if(isset($_GET['center']) && !empty($_GET['center']) && isset($_GET['price']) && !empty($_GET['price']) && isset($_GET['payment']) && !empty($_GET['payment']))
{

  $center = $_GET['center'] ;
  $price = $_GET['price'] ;
  $payment = $_GET['payment'] ;
  $admin = $_SESSION['id'] ;
  $offer = $price - $payment;
  $member = $_GET['member'] ;
  $params = json_decode($_GET['params'] , true);
  $offId = array();
  //print_r($params);
  //echo $params[2];

for ($i=0; $i  < $params['length'] ; $i++) { 
      $stmt3 = $db_con->prepare("INSERT INTO offermember  VALUES(null ,$member ,$params[$i])");
      $stmt3->execute();
   
}

  $stmt = $db_con->prepare("INSERT INTO totaloffer(center,payment,offer,admin) VALUES(?,?,?,?)");
      $stmt->bindParam(1, $center);
      $stmt->bindParam(2, $payment);
      $stmt->bindParam(3, $offer);
      $stmt->bindParam(4, $admin);
      if($stmt->execute())
      {
  header('location: admin/');
      }
      else{
  header('location: calc.php?state=2');
      } 
}
else{
  header('location: calc.php');
}

 }else { 

header('location: indes.php');
}
  ?>
?>