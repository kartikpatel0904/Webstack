<?php
session_start();
if (isset($_SESSION['username'])) {
	if (isset($_POST['codeid'])) {
	include('dbConnection.php');
	$con =ConnectDB();
	$checkuserquery="select userid from form_table where form_id=".$_POST['codeid'];
	$cres=mysqli_query($con,$checkuserquery);
	$rec=mysqli_fetch_array($cres);
	if($rec['userid']==$_SESSION['username'])
		{
		if (isset($_POST['codeid'])) {
		$CID=$_POST['codeid'];
		
		$query="UPDATE FORM_TABLE SET ISLOCKED=0 WHERE FORM_ID=".$CID;
		if(mysqli_query($con,$query))
		{
			echo '{"Result":"1","Data":"","Message":"Page Deleted Sucessfully"}';
			setcookie('formidis'.$CID,"",time()-(3600*24*365*50));
		}
		else
		{
			echo '{"Result":"0","Data":"","Message":"FAIL TO UPDATE"}';
		}
	}
	}
}
} 
?>