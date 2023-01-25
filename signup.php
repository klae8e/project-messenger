<?php
	
	session_start();
	include "connect.php";


	if (isset($_SESSION['user'])) {
		header("Location: mainpage.php");exit();
		#echo "1";
	}
	$login_val = trim($_POST['login']);
	$pass_val = trim($_POST['pass']);
	$pass2_val = trim($_POST['pass2']);
	$email_val = trim($_POST['email']);

	
	if (empty(!$login_val) && empty(!$pass_val) && empty(!$pass2_val) && empty(!$email_val)){
		$login = $_POST['login'];
		$pass = md5($_POST['pass']);
		$pass2 = md5($_POST['pass2']);
		$email = $_POST['email'];
		$emailvalid = "MyEmail@mysite.ru";
		if ($pass === $pass2) {
			if (preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $email)){
				#echo "3";
				$queryselect = "SELECT * FROM `users` WHERE login = '".$login."'";
				$query = mysqli_query($sql, $queryselect) or die("1. Query don't work!");

				$queryselect2 = "SELECT * FROM `users` WHERE email = '".$email."'";
				$query2 = mysqli_query($sql, $queryselect2) or die("1. Query don't work!");

				if (mysqli_num_rows($query)>0) {
					$_SESSION['message'] = 'Login is busy!';
					header("Location: reg.php"); exit;
				}

				if (mysqli_num_rows($query2)>0) {
					$_SESSION['message'] = 'Email is busy!';
					header("Location: reg.php"); exit;
				}
				else{
					$query = "INSERT INTO `users`(`login`, `password`, `email`) VALUES ('".$login."','".$pass."','".$email."')";
					mysqli_query($sql, $query) or die("2. Query don't work!");
					
					$_SESSION['message'] = 'Success!';
					header("Location: index.php"); exit;
				}
			}
			else{
				$_SESSION['message'] = 'Email invalid!';
				header("Location: reg.php"); exit;
			}
		}
		else{
			$_SESSION['message'] = 'Password not equal!';
			header("Location: reg.php"); exit;
		}
	}

	else{
		$_SESSION['message'] = 'Error 1: Write all inputs!';
		header("Location: reg.php");exit();
		#echo "2";
	}
		
		
	mysqli_close($sql);
?>