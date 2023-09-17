<?php
session_start();
if (isset($_SESSION['username'])) {
	if (isset($_POST['codeid'])) {
	$CID=$_POST['codeid'];
	include('dbConnection.php');
	$con =ConnectDB();
	$checkuserquery="select userid,ISLOCKED from editor_table where code_id=".$_POST['codeid'];
	$cres=mysqli_query($con,$checkuserquery);
	$rec=mysqli_fetch_array($cres);
	if($rec['ISLOCKED']=="1"){exit;}
	if(!isset($_COOKIE['pageid'.$CID]))
		{
	if($rec['userid']==$_SESSION['username'])
		{
		if (isset($_POST['codeid'])) {
		
		
		$query="UPDATE EDITOR_TABLE SET ISLOCKED=1 WHERE CODE_ID=".$CID;
		if(mysqli_query($con,$query))
		{
			echo '{"Result":"1","Data":"","Message":"Page Deleted Sucessfully"}';
			setcookie('pageid'.$CID,$CID,time()+(3600*24*365*50));
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