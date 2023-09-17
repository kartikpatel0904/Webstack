<?php
 include('dbConnection.php');
 session_start();
 if (isset($_SESSION['username'])) {
 if ($_POST['filename']) {     
		$sessid=$_SESSION['username']; 
		$pagename=$_POST['filename'];
		$code='<!DOCTYPEhtml> <html lang="en"> <meta charset="UTF-8"> <title>Page Title</title> <meta
name="viewport" content="width=device-width,initial- scale=1"> <link
rel="stylesheet" href=""> <style> html,body {font- family:"Verdana",sans-
serif} h1,h2,h3,h4,h5,h6 {font-family:"Segoe UI",sans- serif} </style> <script
src=""></script> <body> <h1>This is a Heading</h1> <p>This is a paragraph.</p>
<p>This is a another paragraph.</p>

</body>
</html>
';
	$con =ConnectDB();
	$tquery="INSERT INTO EDITOR_TABLE VALUES (null,'$sessid','$pagename','$code','0',NOW())";
	mysqli_query($con,$tquery);
	echo '{"Result":"1","Data":"","Message":"Page Saved Sucessfully"}'; 
}
else
{
 echo'{"Result":"0","Data":"","Message":"Operation Failed"}';
}
}
?>