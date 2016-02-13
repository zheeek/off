<?php
include_once 'dbconfig.php';

if($_GET['edit_id'])
{
	$id = $_GET['edit_id'];	
	$stmt=$db_con->prepare("SELECT * FROM center WHERE id=:id");
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
        
 	
	 <form method='post' id='emp-UpdateFormCenter' action='#'>
 
    <table class='table table-bordered'>
    <input type='hidden' name='id' value='<?php echo $row['id']; ?>' />
        <tr>
            <td>نام</td>
            <td><input type='text' name='name' value='<?php echo $row['name']; ?>' class='form-control' placeholder='مثال: عرفان اویسی' required /></td>
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
     
