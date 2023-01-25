<?
session_start();

include '../connect.php';
if ($_POST['access'] == 'Public') {
	$access = '0';
}
elseif ($_POST['access'] == 'Private') {
	$access = '1';
}
else{
	echo "access error!";
}

$queryselect1 = "SELECT name_topic from all_topic where name_topic='".$_POST['name_topic']."'";
$query1 = mysqli_query($sql, $queryselect1) or die("1. error_sql!");

#echo mysqli_num_rows($query1);
$n_rows = mysqli_num_rows($query1);

if ($n_rows == 0) {
	$query = "INSERT INTO `all_topic`(`name_topic`, `author`, `access`,`textarea`) VALUES ('".$_POST['name_topic']."','".$_SESSION['user']['id']."', '".$access."', '".$_POST['text_topic']."')";
	mysqli_query($sql, $query) or die("error!");
	
	$queryselect1_1 = "SELECT author,topic_id from all_topic where name_topic='".$_POST['name_topic']."' limit 1";
	$query1_1 = mysqli_query($sql, $queryselect1_1) or die("1. error_sql!");

	while ($row_1 = $query1_1->fetch_assoc()){ 
		
		$queryselect2 = "Create table ".$row_1['author']."_".$row_1['topic_id']."(user_id int NOT NULL, text text NOT NULL, date timestamp default current_timestamp() NOT NULL)";
		$query2 = mysqli_query($sql, $queryselect2) or die("1. error_sql!");
	}

	echo 'success';
	$_SESSION['message'] = 'Success!';
	header("Location: ../forum.php");exit();
}
else{
	
	echo 'error';
	$_SESSION['message'] = 'Error!';
	header("Location: ../forum.php");exit();
}



?>