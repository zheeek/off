
<style type="text/css">
#dis{
	display:none;
}
</style>


	
    
    <div id="dis">
    <!-- here message will be displayed -->
	</div>
        
 	
	 <form method='post' id='off-SaveForm' action="#">
 
    <table class='table table-bordered'>
 
        <tr>
            <td>نام</td>
            <td><input type='text' name='name' class='form-control' placeholder='مثال: جشنواره تابستانه' required /></td>
        </tr>
 
        <tr>
            <td>مقدار</td>
            <td><input type='number' name='mount' class='form-control' placeholder='20' required> </td>
        </tr>
 
        <tr>
            <td> سن </td>
            <td>حد اقل<input type='number' name='minAge' class='form-control' placeholder='مثلا : 12 ' required>
        
            
            حد اکثر<input type='number' name='Maxage' class='form-control' placeholder='مثال : 18' required></td>
        </tr>
        <tr>
            <td> تعداد مجاز استفاده </td>
            <td><input type='number' name='limit' class='form-control' placeholder='مثلا : 2 ' >
        
        </tr>
        <tr>
            <td> استفاده برای یک شخص </td>
            <td><input type='text' name='forWho' class='form-control' placeholder=' id شخص را وارد کنید . ' >
        
            
        </tr>
        <tr>
            <td>خانم /آقا</td>
            <td><label> <input type='radio' value="1" name='gender'   required> آقا </label> 
            <label> <input type='radio' value="2" name='gender'  required> خانم </label> 
            <label> <input type='radio' value="3" name='gender'  required> تمامی افراد </label> </td>

        </tr>
    <tr>
            <td>وضعین تاهل</td>
            <td><label> <input type='radio' value="1" name='marrageState'   required> مجرد </label> 
            <label> <input type='radio' value="2" name='marrageState'  required> متاهل </label> 
            <label> <input type='radio' value="3" name='marrageState'  required> تمامی افراد </label> </td>


        </tr>
        <tr>
            <td>مدرک تحصیلی</td>
            <td><label> <input type='radio' value="1" name='degree'   required> دیپلم </label> 
            <label> <input type='radio' value="2" name='degree'  required> کارشناسی </label> 
            <label> <input type='radio' value="3" name='degree'  required> ارشد و دکترا </label> 
            <label> <input type='radio' value="4" name='degree'  required> تمامی افراد </label> </td>



        </tr>
        <tr>
        <td> گروه مورد نظر </td>
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
     
