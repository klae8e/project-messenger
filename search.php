<?php 

include "connect.php";

if (isset($_REQUEST["q"])){
	$q = $_REQUEST["q"];
	$hint = "";
	$a = array();

	$queryselect = "SELECT * FROM `users`";
	$query = mysqli_query($sql, $queryselect) or die("1. Query hat nicht funktioniert!");

	while ($row = $query->fetch_assoc()) {

		if ($q !== "") {
		  $q = strtolower($q);
		  $len=strlen($q);

		  array_push($a,$row['login']);
		  foreach($a as $name) {
		    if (stristr($q, substr($name, 0, $len))) {
		      if ($hint === "") {
		        $hint = $name;
		        
		      } else {
		        $hint .= ", $name";
		      }
		    }
		  }
		}

		// Output "no suggestion" if no hint was found or output correct values
		echo $hint === "" ? " " : $hint;
	}
}




?>