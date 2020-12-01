<?php
session_start();
$_SESSION['perms'] = "User";
if($user['perms'] != "Admin"){
	header('Location: /session.php');
	//don't forget die();
}

if($_GET['submit']){
	$_SESSION['perms'] = "Admin";
}
var_dump($_SESSION);
