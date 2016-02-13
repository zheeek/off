<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>تخفیف </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/carousel.css" rel="stylesheet">
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">تخفیف </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">خانه</a></li>
                <?php if(isset($_SESSION['login'])  ){?>
                <li><a href="logOut.php?doLogout=1">خروج</a></li>
                <li class="dropdown">
                  <a href="admin/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">مدیریت <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="admin/index.php">اعضا</a></li>
                    <li><a href="admin/off.php">تخفیف ها</a></li>
                    <li><a href="admin/center.php">مجموعه ها</a></li>
                    <?php }else { ?>
                    <li ><a href="singin.php">ثبت نام</a></li>
                <li><a href="login.php">ورود</a></li>
                <?php }?>
                 <li class="active"><a href="about.php">ارتباط با ما</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="1.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              </div>
          </div>
        </div>
        
        <div class="item">
          <img src="2.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="5.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>مدیریت مشتریان</h2>
          <p>می تونید تمام مشتریان خودتون رو مدیریت کنید و اطلاعات تمام مشتریانتون رو داشته باشید.</p>
          <p><a class="btn btn-default" href="admin/index.php" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="6.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>مدیریت تخفیف ها</h2>
          <p>می تونید تمامی تخفیف هاتون رو مدیریت کنید , برای استفاده محدودیت قائل بشید . میتونید لیست تخفیفهای موجود رو ببینید و از بین اونها انتخاب کنید.</p>
          <p><a class="btn btn-default" href="admin/off.php" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="4.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>مدیریت مراکز خرید</h2>
          <p> چند تا مرکز خرید دارید ؟ میتونید همه اونها رو به سادگی مدیریت کنید .</p>
          <p><a class="btn btn-default" href="admin/center.php" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      

      

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">بازگشت به بالا</a></p>
        <p>&copy; 2016 Company, Inc. &middot; <a href="#">Privacy</a> &middot;<a href="#">درباره ما</a> &middot; <a href="#">قوانین</a></p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
