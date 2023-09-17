<?php
include_once("dbConnection.php");
function ValidateUser($username,$password)
{   
    $con= ConnectDB();
    $queryForFindingUser="select * from wbs_user_info where EMAIL='$username' and PASSWORD='$password'";
    $resultset=mysqli_query($con,$queryForFindingUser);
    if (mysqli_num_rows($resultset)==1) {
        $row=mysqli_fetch_array($resultset);
        return $row['USER_ID'];
    }
    return false;
}

?>