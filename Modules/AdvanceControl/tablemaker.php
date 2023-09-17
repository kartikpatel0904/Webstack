<?php  
if (isset($_POST['servername']) && isset($_POST['dbname']) && isset($_POST['tablename'])&& isset($_POST['username'])&& isset($_POST['password'])) {
		$servername=$_POST['servername'];
		$dbname=$_POST['dbname'];
		$tablename=$_POST['tablename'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$con=mysqli_connect($servername,$username,$password,$dbname);
		$colinstr="";
		$colname=mysqli_query($con,"SHOW COLUMNS from $tablename");
		while ($row=mysqli_fetch_array($colname)){
			$colinstr=$colinstr.'<TH>'.$row[0].'</TH>';
		}
		$col="<TR>".$colinstr."</TR>";



		$tablesdata="";
		$intr="";
		$data=mysqli_query($con,"SELECT * FROM $tablename");
		while($tbldata=mysqli_fetch_assoc($data))
		{
			foreach($tbldata as $key=>$val) {
				$tablesdata.="<td>".$tbldata[$key]."</td>";
			}

			$intr.="<tr>".$tablesdata."</tr>";
			$tablesdata="";
		}
		$wholetable="<table class='table table-striped table-dark col-md-12'>".$colinstr.$intr."</table>";
		echo $wholetable;

}
?>