<?php 
include_once 'dbconfig.php';


if(isset($_SESSION['login'])) {

if(isset($_GET['id']) & !empty($_GET['id']))
{
  $id = $_GET['id']; 
  $stmt=$db_con->prepare("SELECT * FROM member WHERE id=:id ");
  $stmt->execute(array(':id'=>$id));  
  if($stmt->rowcount() !== 0) { 
    $flag = 1;
  $row=$stmt->fetch(PDO::FETCH_ASSOC);

  }
  else{
    header('location: index.php');
  }
  
}
else{
    header('location: index.php');
  }



?>
  
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>محاسبه تخفیف</title>
<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="js/jquery.js"></script>

<link href="../css/style.css" rel="stylesheet" type="text/css" media="screen">



</head>

<body>


<div class="signin-form">

  <div class="container form-cart">
     
        
      <?php  if(isset($flag) && $flag ==1) { ?>
      <div class="info col-md-5 pull-right">
        <table>
        <tr>
            <td>کد عضویت </td>
            <td><?=$row['id']; ?></td>
        </tr>
          <tr>
            <td>نام</td>
            <td><?=$row['name']; ?></td>
        </tr>
 
        <tr>
            <td>تلفن</td>
            <td><?=$row['phone']; ?></td>
        </tr>
 
        
        <tr>
            <td>سن</td>
            <td><?=$row['age']; ?></td>
        </tr>
        
        
        
        </table>
      </div>
      <?php }  ?>
      
    </div>
    
</div>
</body>
</html>




<?php }
 else { 

header('location: index.php');
}

  ?>