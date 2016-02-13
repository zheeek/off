<?php
include_once 'dbconfig.php';

if($_GET['edit_id'])
{
	$id = $_GET['edit_id'];	
	$stmt=$db_con->prepare("SELECT * FROM member WHERE id=:id");
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
        
 	
	 <form method='post' id='emp-UpdateForm' action='#'>
 
    <table class='table table-bordered'>
 		<input type='hidden' name='id' value='<?php echo $row['id']; ?>' />
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control' value='<?php echo $row['name']; ?>' required></td>
        </tr>
 
        <tr>
            <td>phone</td>
            <td><input type='text' name='phone' class='form-control' value='<?php echo $row['phone']; ?>' required></td>
        </tr>
 
        <tr>
            <td>Email</td>
            <td><input type='text' name='email' class='form-control' value='<?php echo $row['email']; ?>' required></td>
        </tr>
        <tr>
            <td>سن</td>
            <td><input type='number' name='age' class='form-control' value="<?= $row['age']?>" placeholder='مثال : 18' required></td>
        </tr>
        <tr>
            <td>خانم /آقا</td>

            <td><label> <input type='radio' value="1" name='gender' <?php if($row['gender'] == 1)  { echo "checked";}?>   required> آقا </label> 
            <label> <input type='radio' value="2" name='gender' <?php if($row['gender'] == 2)  { echo "checked";}?>  required> خانم </label> </td>

        </tr>
    <tr>
            <td>وضعین تاهل</td>
            <td><label> <input type='radio' value="1" name='marrageState' <?php if($row['marrageState'] == 1)  { echo "checked";}?>   required> مجرد </label> 
            <label> <input type='radio' value="2" name='marrageState' <?php if($row['marrageState'] == 2)  { echo "checked";}?>  required> متاهل </label> </td>

        </tr>
        <tr>
            <td>مدرک تحصیلی</td>
            <td><label> <input type='radio' value="1" name='degree' <?php if($row['degree'] == 1)  { echo "checked";}?>   required> دیپلم </label> 
            <label> <input type='radio' value="2" name='degree' <?php if($row['degree'] == 2)  { echo "checked";}?>  required> کارشناسی </label> 
            <label> <input type='radio' value="3" name='degree' <?php if($row['degree'] == 3)  { echo "checked";}?>  required> ارشد و دکترا </label> </td>


        </tr>
 <tr>
        <td> گوزه مورد نظر </td>
        <td>
           <select name="group" class='form-control'>
            <option value="">  </option>

<?php
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
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-update" id="btn-update">
    		<span class="glyphicon glyphicon-plus"></span> Save Updates
			</button>
            </td>
        </tr>
 
    </table>
</form>
     
