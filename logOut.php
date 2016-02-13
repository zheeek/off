<?php
session_start();
if(isset($_GET['doLogout'] )&& $_GET['doLogout'] ==1){
	unset($_SESSION['id']);
	unset($_SESSION['login']);
	header('location: index.php');
}
else
	header('location: index.php');

?>