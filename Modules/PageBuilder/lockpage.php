<?php
session_start();
if (isset($_SESSION['username'])) {
	if (isset($_POST['codeid'])) {
	$CID=$_POST['codeid'];
	include('dbConnection.php');
	$con =ConnectDB();
	$checkuserquery="select userid,ISLOCKED from page_table where page_id=".$_POST['codeid'];
	$cres=mysqli_query($con,$checkuserquery);
	$rec=mysqli_fetch_array($cres);
	if($rec['ISLOCKED']=="1"){exit;}
	if(!isset($_COOKIE['pageidis'.$CID])=='pageidis'.$CID)
		{
	if($rec['userid']==$_SESSION['username'])
		{
		if (isset($_POST['codeid'])) {
		
		
		$query="UPDATE page_table SET ISLOCKED=1 WHERE page_id=".$CID;
		if(mysqli_query($con,$query))
		{
			echo '{"Result":"1","Data":"","Message":"Page Deleted Sucessfully"}';
			setcookie('pageidis'.$CID,$CID,time()+(3600*24*365*50));
		}
		else
		{
			echo '{"Result":"0","Data":"","Message":"FAIL TO UPDATE"}';
		}
	}
}
	}
}
} 
?>