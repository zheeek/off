<?php 
include_once 'admin/dbconfig.php';


if(isset($_SESSION['login'])  ){
  $admin = $_SESSION['id'];

if(isset($_POST['search']) & !empty($_POST['id']) & !empty($_POST['centerId']))
{
  $id = $_POST['id']; 
  $centerId = $_POST['centerId'] ;
  $stmt=$db_con->prepare("SELECT * FROM member WHERE id=:id AND admin=:admin");
  $stmt->execute(array(':id'=>$id,':admin'=>$admin));  
  if($stmt->rowcount() != 0) { 
    $flag = 1;
  $row=$stmt->fetch(PDO::FETCH_ASSOC);

  }
  else{
    header('location: calc.php?state=2');
  }
  
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>محاسبه تخفیف</title>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="js/jquery.js"></script>

<link href="css/style.css" rel="stylesheet" type="text/css" media="screen">



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
            <li class="active"><a href="admin/static.php">مشاهده ی سوابق</a></li>
            </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
</nav>
    
<div class="signin-form">

  <div class="container form-calc">
     
        
       <form class="" method="post" action="calc.php">
      
        <h3 class="form-signin-heading">محاسبه</h3><hr />
        
             <div id="error">
        <!-- error will be showen here ! -->
        <?php if (isset($_GET['state']) && $_GET['state']== 2 ) { ?>
<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; id نادرست است . !</div>
     <?php }?>

        </div>  
        <div class="form-group">
        <input type="text" class="form-control" placeholder="ID" name="id" id="user_name" />

        
         
        <select name="centerId" class='form-control' placeholder="انتخاب مرکز">
          <option value="">  </option>

<?php
        
        $stmt = $db_con->prepare("SELECT * FROM center where admin=? ORDER BY id DESC");
                $stmt->bindParam(1, $admin);
        $stmt->execute();
    while($row2=$stmt->fetch(PDO::FETCH_ASSOC))
    {
      ?>
     
                <option value="<?=$row2['id'];?>"><?=$row2['name'];?>  </option>
<?php }?>
           </select>
        </div>   
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="search" id="btn-submit">
        <span class="glyphicon glyphicon-search"></span> &nbsp;جستجو
      </button> 
        </div>  
      
      </form>
      <hr/>
<?php if(isset($flag) && $flag ==1){?>
      <div class="info col-md-5 pull-right">
        <table>
        <tr>
            <td>Id</td>
            <td id="member"><?=$row['id'] ?></td>
        </tr>
          <tr>
            <td>نام</td>
            <td><?=$row['name'] ?></td>
        </tr>
 
        <tr>
            <td>تلفن</td>
            <td><?=$row['phone'] ?></td>
        </tr>
 
        <tr>
            <td>ایمیل</td>
            <td><?=$row['email'] ?></td>
        </tr>
        <tr>
            <td>سن</td>
            <td><?=$row['age'] ?></td>
        </tr>
        <tr>
            <td>آقا /خانم</td>
            <?php if ($row['gender'] ==1 ) {?>
              
            <td>اقا</td>
            <?php }else {?>
                        <td>خانم</td>
<?php }?>
        </tr>
        <tr>
            <td>مدرک تحصیلی</td>
            <?php if ($row['degree'] ==1 ) {?>
              
            <td>دیپلم</td>
            <?php }else if ($row['degree'] ==2) {?>
                        <td>کارشناس</td>

<?php }else if ($row['degree'] ==3) {?>
                        <td>ارشد و بالاتر</td>
<?php }?>
        </tr>
        <tr>
            <td>وضعیت تاهل</td>
            <?php if ($row['gender'] ==1 ) {?>
              
            <td>مجرد</td>
            <?php }else if ($row['gender'] ==2 ){?>
                        <td>متاهل</td>
<?php }?>
        </tr>
        </table>
      </div>
      <?php }?>
      <div class="col-md-6 ">
      <!-- show all exist offer -->
<form method="post" >
<input type="text"  id="price" class="form-control" placeholder="مبلغ را وارد کنید">
<button  id="sub"  class="btn btn-default PriceCalculator" > ثبت </button>
<a id="PriceCalculator"   class="btn btn-default PriceCalculator" href="#"> محاسبه </a>

        <ul class="off">
 <p> تخفیفهای موجود </p>
<?php
        
        $stmt = $db_con->prepare("SELECT * FROM offer where admin=? AND centerId=? ORDER BY id DESC");
        $stmt->bindParam(1, $admin);
        $stmt->bindParam(2, $centerId);

        $stmt->execute();
    while($row3=$stmt->fetch(PDO::FETCH_ASSOC))
    {
      $stmt5 = $db_con->prepare("SELECT count(which) AS totalo FROM offermember where which=? AND who=? ");
      $stmt5->bindParam(1, $row3['id']);
        $stmt5->bindParam(2, $row['id']);
      $offer3 = $stmt5->execute();
        $offer3 = $stmt5->fetch(PDO::FETCH_ASSOC);
      $totalOff = $offer3['totalo'];
     

      # check is this offer for this member 
      # frist check age
      if( $row3['forWho'] == $row['id'] )
      if($totalOff < $row3['limitt']  || $row3['limitt'] ==0){
          #check limit of use offer
        ?>
       <li>
                         <input  name="<?=$row3['id']?>" id="<?=$row3['id']?>" class="calculator" type="checkbox" value="<?=$row3['mount']?>">
                          <?=$row3['name']?>
                  
      </li>
        <?php
      }
      if( $row3['forWho'] ==0 )
      //  if($totalOff < $row3['limitt'] || $row3['limitt'] ==0)
      if (  ($row3['minAge'] <= $row['age'] && $row['age'] <= $row3['maxAge']) || ( $row3['minAge'] ==0 && $row3['maxAge']  == 0 ))
        # check gender of member with offer
      
        if ( $row['gender'] == $row3['gender'] || $row3['gender'] == 3)  
          #check marrage state of offer with member
          if( $row['marrageState'] == $row3['marrageState'] || $row3['marrageState'] == 3 )
            # check degree of member with offer
            if( $row['degree'] == $row3['degree'] || $row3['degree'] == 4 )
              if($row['groh'] == $row3['groh'] || $row3['groh'] == 0 ){
      
      ?>

          <li>
                         <input  name="<?=$row3['id']?>" id="<?=$row3['id']?>" class="calculator" type="checkbox" value="<?=$row3['mount']?>">
                          <?=$row3['name']?>
                  
      </li>
 <?php }
}
 ?>
        </ul>
</form >
<hr>
مبلغ پرداختی :   <div id="pay"> </div>
      </div>
    </div>
    
</div>
   
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
  
$('document').ready(function()
{ 
  //consol.log ();
  var json ;
  var payment =0;
  var price = 0;
  var j =0;
  var offer2 = 0;
  var pp = [];
  var member = parseInt($('#member').text());
  console.log(member);
  $(document).on('click', '#PriceCalculator', function() { 
    offer2 = 0;
    pp = [];
    var values = $('input:checkbox:checked.calculator').map(function () {
  return this.value;
}).get();
var total =0 ;
price =parseInt (  $('#price').val() );
for(  var i=0 ; i < values.length ; i++){
  if(values[i] < 100) { 
total += values[i] << 0 ;
}
else if (values[i] < price * .8 ) {
  pp[j]= values[i] ;
  j ++ ;
}
}
for (var i = pp.length - 1; i >= 0; i--) {
  offer2 +=pp[i]<< 0;
};
console.log('offer2 = '+offer2);

var offer = ( 100 - total ) / 100;
 payment = price *offer - offer2;
 

$('#pay').html(  payment + "تومان");
var selected  = $('input:checkbox:checked.calculator').map(function () {
  return this.name;
});
json = JSON.stringify(selected);
console.log(selected[0] + ', ' + selected[1]) ; 
console.log(json) ; 

return false;
  });


$(document).on('click', '#sub', function() { 
  
  window.location =("submit.php?center=<?=$centerId?>&price="+price+"&payment="+payment+"&member="+member+"&params="+json);
return false;


      });
});
</script>
</body>
</html>




<?php } else { 

header('location: index.php');
}

  ?>