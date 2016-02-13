<?php
  
  require_once 'admin/dbconfig.php';
  if(isset($_POST['login']))
  {
    $user_email = $_POST['user_email'];
    $user_password = $_POST['password'];
    
    $password = md5($user_password);
    
    
    
      $stmt = $db_con->prepare("SELECT * FROM admin WHERE email=:email AND password=:pass");
      $stmt->execute(array(":email"=>$user_email , ":pass"=>$password));
      $count = $stmt->rowCount();
      $row = $stmt->fetch();
      if($count==0){
        header('location: login.php?state=2');
     }
      else{
        $_SESSION['id'] = $row['id'];
        $_SESSION['login'] = true ;
        //die($_SESSION['id']);
        header('location: index.php');
      }

  }
      ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ورود به سیستم</title>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>

<script type="text/javascript" src="validation.min.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen">

<script type="text/javascript" src="script.js"></script>

</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php" title="Coding Cage Programming Blog">تخفیف </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="admin/index.php">پنل مدیریت</a></li>
            </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
</nav>
    
<div class="signin-form">

  <div class="container">
     

        
       <form class="form-signin" method="post" id="form" action="login.php">
      
        <h2 class="form-signin-heading">LOG IN</h2><hr />
        
        <div id="error">
        <!-- error will be showen here ! -->
        <?php if (isset($_GET['state']) == 2 ) { ?>
<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; اطلاعات نادرست است . !</div>
     <?php }?>

        </div>
        
        
        
        <div class="form-group">
        <input type="email" class="form-control" placeholder="Email address" name="user_email" id="user_email" />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
        </div>
        
              <hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="login" id="btn-submit">
        <span class="glyphicon glyphicon-log-in"></span> &nbsp; ورود
      </button> 
        </div>  
      
      </form>

    </div>
    
</div>
    
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>