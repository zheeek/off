<?php
include_once 'dbconfig.php';

if($_GET['edit_id'])
{
	$id = $_GET['edit_id'];	
	$stmt=$db_con->prepare("SELECT * FROM offer WHERE id=:id");
	$stmt->execute(array(':id'=>$id));	
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
}

?>
<style type="text/css">
#dis{
	display:none;
}
</style>


	
    
    <div id="dis">
    
	</div>
        
 	
	 <form method='post' id='emp-UpdateFormOff' action='#'>
 
    <table class='table table-bordered'>
    <input type='hidden' name='id' value='<?php echo $row['id']; ?>' />
        <tr>
            <td>نام</td>
            <td><input type='text' name='name' value='<?php echo $row['name']; ?>' class='form-control' placeholder='مثال: عرفان اویسی' required /></td>
        </tr>
 
        <tr>
            <td>مقدار</td>
            <td><input type='number' name='mount' value='<?php echo $row['mount']; ?>' class='form-control' placeholder='20' required> </td>
        </tr>
 
        <tr>
            <td> سن </td>
            <td>حد اقل<input type='text' name='minAge' value='<?php echo $row['minAge']; ?>' class='form-control' placeholder='مثلا : 12 ' required>
        
            
            حد اکثر<input type='number' name='Maxage' value='<?php echo $row['maxAge']; ?>' class='form-control' placeholder='مثال : 18' required></td>
        </tr>
        <tr>
            <td> تعداد مجاز استفاده </td>
            <td><input type='text' name='limit' value='<?php echo $row['limit']; ?>' class='form-control' placeholder='مثلا : 2 ' required>
        
        </tr>
        <tr>
            <td> استفاده برای یک شخص</td>
            <td><input type='text' name='forWho' value='<?php echo $row['forWho']; ?>' class='form-control' placeholder=' id شخص را وارد کنید . ' required>
        
            
        </tr>
        <tr>
            <td>خانم /آقا</td>
            <td><label> <input type='radio' value="1" name='gender'  <?php if($row['gender'] == 1)  { echo "checked";}?>   required> آقا </label> 
            <label> <input type='radio' value="2" name='gender'  <?php if($row['gender'] == 2)  { echo "checked";}?>  required> خانم </label> 
            <label> <input type='radio' value="3" name='gender'  <?php if($row['gender'] == 3)  { echo "checked";}?>  required> تمامی افراد </label> </td>

        </tr>

    <tr>
            <td>وضعین تاهل</td>
            <td><label> <input type='radio' value="1" name='marrageState'  <?php if($row['marrageState'] == 1)  { echo "checked";}?>  required> مجرد </label> 
            <label> <input type='radio' value="2" name='marrageState'  <?php if($row['marrageState'] == 2)  { echo "checked";}?> required> متاهل </label> 
            <label> <input type='radio' value="3" name='marrageState'  <?php if($row['marrageState'] == 3)  { echo "checked";}?> required> تمامی افراد </label> </td>


        </tr>
        <tr>
            <td>مدرک تحصیلی</td>
            <td><label> <input type='radio' value="1" name='degree'  <?php if($row['degree'] == 1)  { echo "checked";}?>  required> دیپلم </label> 
            <label> <input type='radio' value="2" name='degree'  <?php if($row['degree'] == 2)  { echo "checked";}?> required> کارشناسی </label> 
            <label> <input type='radio' value="3" name='degree' <?php if($row['degree'] == 3)  { echo "checked";}?> required> ارشد و دکترا </label> 
            <label> <input type='radio' value="4" name='degree' <?php if($row['degree'] == 4)  { echo "checked";}?> required> تمامی افراد </label> </td>



        </tr>
        
        <tr>
        <td> گوزه مورد نظر </td>
        <td>
           <select name="group" class='form-control'>
            <option value="">  </option>

<?php
        include_once 'dbconfig.php';
        $admin = $_SESSION['id'];
        $stmt = $db_con->prepare("SELECT * FROM groh where admin=? ORDER BY id DESC");
                $stmt->bindParam(1, $admin);
        $stmt->execute();
    while($row2=$stmt->fetch(PDO::FETCH_ASSOC))
    {
      ?>
     
                <option value="<?=$row2['id'];?>"><?=$row2['name'];?>  </option>
<?php }?>
           </select>
</td>
        </tr>
        <tr>
        <td> مرکز مورد نظر </td>
        <td>
           <select name="centerId" class='form-control'>
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
</td>
        </tr>
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save">
            <span class="glyphicon glyphicon-plus"></span> Save this Record
            </button>  
            </td>
        </tr>
 
    </table>
</form>
     
