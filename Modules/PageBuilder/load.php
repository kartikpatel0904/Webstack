<?php
 include('dbConnection.php');
 session_start();
 if (isset($_SESSION['username'])) {
     if(isset($_POST['cid']))
     {
        $CID=$_POST['cid'];
        $con =ConnectDB();
        $query="SELECT CODE FROM PAGE_TABLE WHERE PAGE_ID=".$CID;
        if(mysqli_query($con,$query))
        {
            $res=mysqli_query($con,$query);
            $rec=mysqli_fetch_array($res);
            echo $rec['CODE'];
        }
     }
 }

?>