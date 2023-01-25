<?php

	include 'connect.php';

	$queryselect1 = "UPDATE `users` SET `id`='".$_POST['id']."',`login`='".$_POST['login']."',`password`='".$_POST['password']."',`email`='".$_POST['email']."',`ban`='".$_POST['ban']."',`role`='".$_POST['role']."' WHERE id=".$_POST['id']."";
	$query1 = mysqli_query($sql, $queryselect1) or die("1. Query don't work!");

	$_SESSION['message'] = 'Success!';
	header("Location: adminpanel.php");exit();

?>