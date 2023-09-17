<?php
 include('dbConnection.php');
 session_start();
 if (isset($_SESSION['username'])) {
 if ($_POST['filename']) {     
		$sessid=$_SESSION['username']; 
		$pagename=$_POST['filename'];
		$code='';
	$con =ConnectDB();
	$tquery="INSERT INTO PAGE_TABLE VALUES (null,'$sessid','$pagename','$code','0',NOW())";
	mysqli_query($con,$tquery);
	echo '{"Result":"1","Data":"","Message":"Page Saved Sucessfully"}'; 
}
else
{
 echo'{"Result":"0","Data":"","Message":"Operation Failed"}';
}
}
?>