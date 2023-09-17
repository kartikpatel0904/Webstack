<?php
if (isset($_POST['cid']) && isset($_POST['filecode'])) {
		$CODE=$_POST['filecode'];
		$CID=$_POST['cid'];
		$CODE=''.$CODE;
		include('dbConnection.php');
		$con =ConnectDB();
		$query="UPDATE PAGE_TABLE SET CODE='$CODE' WHERE PAGE_ID='$CID'";	
		if(mysqli_query($con,$query))
		{
			echo '{"Result":"1","Data":"","Message":"Page Saved Sucessfully"}';
		}
		else
		{
			echo '{"Result":"0","Data":"","Message":"FAIL TO UPDATE"}';
		}

}
?>