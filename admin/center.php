<?php 
        require_once 'dbconfig.php';

if(isset($_SESSION['login'])  ){?>


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

<script type="text/javascript" src="assets/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  
  $("#btn-view").hide();
  
  $("#btn-add").click(function(){
    $(".content-loader").fadeOut('slow', function()
    {
      $(".content-loader").fadeIn('slow');
      $(".content-loader").load('addCenter_form.php');
      $("#btn-add").hide();
      $("#btn-view").show();
    });
  });
  
  $("#btn-view").click(function(){
    
    $("body").fadeOut('slow', function()
    {
      $("body").load('center.php');
      $("body").fadeIn('slow');
      window.location.href="center.php";
    });
  });
  
});
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
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="../index.php">صفحه اصلی  <span class="sr-only">(current)</span></a></li>
            
            <li><a href="index.php">اعضا</a></li>
            <li><a href="off.php">تخفیف ها </a></li>
            <li><a href="center.php">مجموعه ها</a></li>
            <li><a href="group.php">گروهها </a></li>
            <li><a href="static.php">آمار</a></li>

          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
        <h2 class="form-signin-heading">مشاهده ی تخفیف ها</h2><hr />
        <button class="btn btn-info" type="button" id="btn-add"> <span class="glyphicon glyphicon-pencil"></span> &nbsp; Add CENTER</button>
        <button class="btn btn-info" type="button" id="btn-view"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; View CENTER</button>
        <hr />
        
        <div class="content-loader">
        
        <table cellspacing="0" width="100%" id="example" class="table table-striped table-hover table-responsive">
        <thead>
        <tr>
        <th>ID</th>
        <th>نام مرکز</th>
        
        <th>edit</th>
        <th>delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $admin = $_SESSION['id'];
        $stmt = $db_con->prepare("SELECT * FROM center where admin=? ORDER BY id DESC");
        $stmt->bindParam(1, $admin);
        $stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {
      ?>
      <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td align="center">
      <a id="<?php echo $row['id']; ?>" class="edit-link-center" href="#" title="Edit">
      <img src="edit.png" width="20px" />
            </a></td>
      <td align="center"><a id="<?php echo $row['id']; ?>" class="delete-link-center" href="#" title="Delete">
      <img src="delete.png" width="20px" />
            </a></td>
      </tr>
      <?php
    }
    ?>
        </tbody>
        </table>
        
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
    
     </body>
</html>

<?php }else { 

header('location: ../');
}
  ?>