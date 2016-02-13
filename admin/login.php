<?php 
session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Signin </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    
  </head>

  <body>

    <div class="container">
<?php if (isset($_GET['state']) && $_GET['state'] == 'ok') {?>
      <div class="alert alert-success" role="alert">ثبت نام با موفقیت انجام شد . میتونانید وارد شوید</div>
      <?php 
      }?>
      <?php if (isset($_GET['state']) && $_GET['state'] == 'Nok') {?>
      <div class="alert alert-danger" role="alert">اطلاعات وارد شده اشتباه است .</div>
      <?php }?>
      <?php if (isset($_GET['state']) && $_GET['state'] == 'Ook') {?>
      <div class="alert alert-warning" role="alert">نام انتخابی یا ایمیل تکراری است</div>
      <?php }?>
      <form action="proces.php" method="post" class="form-signin">
        <h2 class="form-signin-heading">Please Log in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="emeil" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        
        <button name="login" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
