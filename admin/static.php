<?php
        require_once 'dbconfig.php';

 if(isset($_SESSION['login'])  ){
  $admin = $_SESSION['id'];
/* get total offer*/
  $stmt=$db_con->prepare("SELECT SUM(offer) AS totaloffer FROM totaloffer WHERE  admin=:admin");
  $stmt->execute(array(':admin'=>$admin)); 
  $totaloffer = $stmt->fetch(PDO::FETCH_ASSOC);
  $totaloffer =$totaloffer['totaloffer'];
  
  /*get total payment*/

  $stmt2=$db_con->prepare("SELECT SUM(payment) AS totalpayment FROM totaloffer WHERE  admin=:admin");
  $stmt2->execute(array(':admin'=>$admin)); 
  $totalpayment = $stmt2->fetch(PDO::FETCH_ASSOC);
  $totalpayment =$totalpayment['totalpayment'];
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>تنظیمات </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
<!--<link href="assets/datatables.min.css" rel="stylesheet" type="text/css">-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen">

<script type="text/javascript" src="assets/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript">

</script>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.php">تخفیف </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="../logout.php?doLogout=1">Log out</a></li>
                       <li><a href="../calc.php">محاسبه تخفیف</a></li>

          </ul>
          
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="../index.php">صفحه اصلی  <span class="sr-only">(current)</span></a></li>
            
            <li><a href="off.php">تخفیف ها </a></li>
                        <li><a href="index.php">اعضا </a></li>

            <li><a href="center.php">مجموعه ها</a></li>
            <li><a href="group.php">گروهها </a></li>
            <li><a href="static.php">آمار</a></li>

          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2>آمار فروش کل مراکز </h2>
          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder pull-right">
            <!-- numver for count up to it-->
                <h2 class="jumbo" id="myTargetElement1"><?=$totaloffer?>   </h2>تومان
              <h4>همه تخفیفات داده شده </h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
                <!-- numver for count up to it-->
                <h2 class="jumbo" id="myTargetElement2"><?=$totalpayment?>   </h2>تومان
              <h4>میزان فروش</h4>
            </div>
            
          </div>
        <hr />
<?php
        $admin = $_SESSION['id'];
        $stmt3 = $db_con->prepare("SELECT * FROM center where admin=? ORDER BY id DESC");
        $stmt3->bindParam(1, $admin);
        $stmt3->execute();
    while($row=$stmt3->fetch(PDO::FETCH_ASSOC))
    {
      $stmt4=$db_con->prepare("SELECT SUM(offer) AS totaloffer1 FROM totaloffer WHERE  admin=:admin AND center=:id");
  $stmt4->execute(array(':admin'=>$admin,':id'=>$row['id'])); 
  $totaloffer1 = $stmt4->fetch(PDO::FETCH_ASSOC);
  $totaloffer1 =$totaloffer1['totaloffer1'];
 
  /*get total payment*/

  $stmt21=$db_con->prepare("SELECT SUM(payment) AS totalpayment1 FROM totaloffer WHERE  admin=:admin AND center=:id");
  $stmt21->execute(array(':admin'=>$admin,':id'=>$row['id'])); 
  $totalpayment1 = $stmt21->fetch(PDO::FETCH_ASSOC);
  $totalpayment1 =$totalpayment1['totalpayment1'];
      ?>
      <h2> آمار فورش <?=$row['name']?> </h2>
          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder pull-right">
            <!-- numver for count up to it-->
                <h4 class="jumbo"  id="myTargetElement1"><?=$totaloffer1 ?>   </h4>تومان
              <h4>همه تخفیفات داده شده </h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
                <!-- numver for count up to it-->
                <h4 class="jumbo"  ><?=$totalpayment1 ?>   </h4>تومان
              <h4>میزان فروش</h4>
            </div>
            
          </div>
          <hr/>
      <?php
    }
      ?>
        
        
        <div class="content-loader">
        
        
        
        </div>
  

    </div>
    
            </div>
          </div>

       


    


         </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
 
     <script src="js/countUp.js"></script>
     <script type="text/javascript" src="assets/datatables.min.js"></script>
<script type="text/javascript" src="crud.js"></script>
      <script type="text/javascript" charset="utf-8">
$(document).ready(function() {
  $('#example').DataTable();

  $('#example')
  .removeClass( 'display' )
  .addClass('table table-bordered');
});
</script>
     <script src="js/countUp.js"></script>

     <script type="text/javascript">
    var options = {
  useEasing : true, 
  useGrouping : true, 
  separator : ',', 
  decimal : '.', 
  prefix : '', 
  suffix : '' 
};
    var demo1 = new CountUp("myTargetElement1", 0, <?=$totaloffer?>, 0, 1, options);
      demo1.start();
      var demo2 = new CountUp("myTargetElement2", 0, <?=$totalpayment?>, 0, 1, options);
demo2.start();


</script>
     </body>
</html>
<?php }else { 

header('location: ../');
}
  ?>
