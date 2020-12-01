<?php
session_start();
$_SESSION['perms'] = "User";
if($_SESSION['perms'] != "Admin"){
	header('Location: /session.php');
	//don't forget die();
}

if($_GET['submit']){
	$_SESSION['perms'] = "Admin";
}
if($_GET['create_user']){
/*
localhost/?user=Florian&role=Admin&create_user=true User created, no need admin role
Because the PHP script is executed until the end
*/
	$req = $pdo->prepare('INSERT users ("name", "role") VALUES (?, ?)');
	$req->execute([$_POST['user'], $_POST['role']]);
	header('Location: /session.php?msg=create_user-'.$_GET['user'].'-'.$_GET['role']);
}
var_dump($_SESSION);
