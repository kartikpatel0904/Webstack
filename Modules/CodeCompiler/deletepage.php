<?php
session_start();
if (isset($_SESSION['username'])) {
	if (isset($_POST['codeid'])) {
	include('dbConnection.php');
	$con =ConnectDB();
	$checkuserquery="select userid,islocked from editor_table where code_id=".$_POST['codeid'];
	$cres=mysqli_query($con,$checkuserquery);
	$rec=mysqli_fetch_array($cres);
	if($rec['userid']==$_SESSION['username'])
		{
		if (isset($_POST['codeid'])) {
		$CID=$_POST['codeid'];
		if($rec["islocked"]=="1")
		{
			if(isset($_COOKIE['pageid'.$CID]))
			{

			}
			else
			{
				exit;
			}
		}
		$query="DELETE FROM EDITOR_TABLE WHERE CODE_ID=".$CID;
		if(mysqli_query($con,$query))
		{
			echo '{"Result":"1","Data":"","Message":"Page Deleted Sucessfully"}';
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