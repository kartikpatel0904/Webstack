<?php
if (isset($_POST['servername']) && isset($_POST['dbname'])&& isset($_POST['username'])&& isset($_POST['password'])) {
	$servername=$_POST['servername'];
	$dbname=$_POST['dbname'];
	$password=$_POST['password'];
	$username=$_POST['username'];
	$con=mysqli_connect($servername,$username,$password,$dbname);
	$query="SHOW TABLES";
	$result=mysqli_query($con,$query);
	$tablestring="";
	while($row=mysqli_fetch_array($result)) {
	$tablestring=$tablestring.'<option>'.$row[0].'</option>';
	}
	echo $tablestring;
}
?>