<?php
require('../connection.php');
if(isset($_GET['doLogout'])){
	unset($_SESSION['id']);
	unset($_SESSION['login']);
	unset($_SESSION['name']);
	unset($_SESSION['isAdmin']);
		header('location: http://localhost:8000/gallery/');
}
else
		header('location: http://localhost:8000/gallery/');

?>