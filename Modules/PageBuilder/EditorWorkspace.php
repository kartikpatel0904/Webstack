<?php session_start();  if(isset($_SESSION["allpage"]))  {
include('dbConnection.php');   $sesop=$_SESSION['username'];   $con =
ConnectDB();   $Tquery="select * from page_table where userid='$sesop'";
$result=mysqli_query($con,$Tquery);

 }
 else
 {
   ECHO "YOU HAVE NOT PERMISSION TO ACCCES";
   exit;
 }
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="http://localhost/webstack/assets/css/fontawesome/css/all.min.css">
<!-- Latest compiled JavaScript -->
<style>
td
  {
    background:white;
  }
  body
  {
    background-color:#414a4c;
    color:black;
  }
  label
  {
    color:white   ;
  }
  button
  {
    background:black;
  }
  a
  {
    color:white;
  }
  select
  {
    color:black;  
  }
  div
  {
    color:white;
  }
  #table_info
  {
    color:white;
  }
  #table_paginite
  {
    color:white;
  }
  input
    {
      color:white;
    }
    #table_length
    {
      color:white;
    }
</style>

</head>
<body class="container-fluid">
	<button id="createbtn" class="btn btn-primary btn-md" style="margin-top:15px;margin-left:5px;"> CREATE NEW </button>
	<br>	
	<hr>
<table style="background:white;color:black" class="table btn-sm btn-info" id="table">
  <thead>
    <tr>
      <th scope="col">NAME</th>
      <th scope="col"> DATE</th>
      <th scope="col">EDIT</th>
      <th scope="col">LOCK</th>
      <th scope="col">DELETE</th>

    </tr>
  </thead>
  <tbody>
  <?php  
    if ($result) { 
    while($row=mysqli_fetch_array($result))
    {
    echo "<tr>";
    ECHO "<td>".$row['WP_NAME']."</td>";
    echo '<td>'.$row['CREATED_ON'].'</td>';
    echo '<td><BUTTON class="btn-sm btn-info btnget" retid='.$row['PAGE_ID'].'>Edit <i class="fa fa-edit"></i></BUTTON></td>';
    if ($row["ISLOCKED"]=="1") {
      if(isset($_COOKIE['pageidis'.$row['PAGE_ID']]))
      {
        echo  '<td><BUTTON class="btn-sm btn-warning btnunlock" retid='.$row['PAGE_ID'].'>UNLOCK</BUTTON></td>';
      }
      else
      {
        echo  '<td><span class="badge badge-lg badge-danger">Page is locked</span></td>';
      }
    }
    else
    {
    echo  '<td><BUTTON class="btn-sm btn-warning btnlock" retid='.$row['PAGE_ID'].'>LOCK</BUTTON></td>';
    }
    if ($row["ISLOCKED"]=="1") {
      if(isset($_COOKIE['pageidis'.$row['PAGE_ID']]))
      {
         echo  '<td><BUTTON class="btn-sm btn-danger btndel" delid='.$row['PAGE_ID'].'>DELETE</BUTTON></td>';
      }
      else
      {
        echo  '<td><span class="badge badge-lg badge-danger" style="margin-left:15px;"><i class="fa fa-ban" aria-hidden="true"></i></span></td>';
      }
    }
    else
      {
        echo  '<td><BUTTON class="btn-sm btn-danger btndel" delid='.$row['PAGE_ID'].'>DELETE</BUTTON></td>';
      }
    echo '</tr>';
    
  } 
}
 ?>
    </tbody>
</table>
<!-- Button trigger modal -->

<!-- Modal -->
<div style="color:black;" class="modal fade" id="Mymod" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div style="background:#061826;"class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color:white;">PAGE CONFIGURATION</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <!--<form id="currentform" method="POST" return validate()  name ="myform" action="process.php" target="_top">-->
      <div class="modal-body">
        <label style="color:white;font-size:15px;" >ENTER NAME OF PAGE :</label>
       <div class="form-group"> 
      <input type="text" id="filename" required class="form-control form-control-sm" placeholder="FILE NAME " name="text1">
    </div>
      </div>
      <div class="modal-footer">
        <button style="background:#061826" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button style="background:#061826" id="submitbtn" type="button" class="btn btn-primary">Save</button>
      </div>
    <!--</form>-->
    </div>
  </div>
</div>
  
<script>
   $(document).ready(function(){ 
      $("#createbtn").click(function (e) { 
        e.preventDefault();
        $("#Mymod").modal("show");
      });
      $("#submitbtn").click(function (e) { 
        e.preventDefault();
        validate();
      });
        $(".btnget").click(function (e) { 
        e.preventDefault();
        parent.window.location.href="http://localhost/WebStack/Modules/PageBuilder/index.php?id="+ e.target.getAttribute("retid");
      });
     function validate()
     {
          if(!(document.querySelector("#filename").value.trim()==="" || document.querySelector("#filename").value >20))
          {
            const filename=document.querySelector("#filename").value;
             $.ajax({
                url:'process.php',
                type:'post',
                data:{filename:filename},
                success:function(response){
                    var result =  JSON.parse(response);
                    
                    if(result.Result == 1){
                      $("#Mymod").modal("hide");
                           console.log("true");
                          reloadframe();          
                    }else{
                      $("#Mymod").modal("hide");
                        console.log(result.Message);
                        reloadframe();
                    }
                    //$("#message").html(msg);
                }
            });//document.forms["myform"].submit();
          }
          else
          {
            return false;
          }
    }
  });
  
$(document).ready(function() {
    $('#table').DataTable();
     $(".btndel").click(function (e) { 
        e.preventDefault();
        const codeid=e.target.getAttribute("delid");
        $.ajax({
                url:'deletepage.php',
                type:'post',
                data:{codeid:codeid},
                success:function(response){
                    var result =  JSON.parse(response);
                    
                    if(result.Result == 1){
                         e.target.parentElement.parentElement.remove();
                         document.querySelector("#table_length > label > select").selectedIndex=document.querySelector("#table_length > label > select").selectedIndex;
                           console.log("true");        
                    }else{
                        console.log(result.Message);
                        reloadframe();
                    }
                    //$("#message").html(msg);
                }
            });
            
     });
     $(".btnlock").click(function (e) { 
        e.preventDefault();
        const codeid=e.target.getAttribute("retid");
        $.ajax({
                url:'lockpage.php',
                type:'post',
                data:{codeid:codeid},
                success:function(response){
                    var result =  JSON.parse(response);
                    
                    if(result.Result == 1){
                         reloadframe();
                         document.querySelector("#table_length > label > select").selectedIndex=document.querySelector("#table_length > label > select").selectedIndex;
                           console.log("true");        
                    }else{
                        console.log(result.Message);
                        reloadframe();
                    }
                    //$("#message").html(msg);
                }
            });
            
     });
     $(".btnunlock").click(function (e) { 
        e.preventDefault();
        const codeid=e.target.getAttribute("retid");
        $.ajax({
                url:'unlockpage.php',
                type:'post',
                data:{codeid:codeid},
                success:function(response){
                    var result =  JSON.parse(response);
                    
                    if(result.Result == 1){
                         reloadframe();
                         document.querySelector("#table_length > label > select").selectedIndex=document.querySelector("#table_length > label > select").selectedIndex;
                           console.log("true");        
                    }else{
                        console.log(result.Message);
                        reloadframe();
                    }
                    //$("#message").html(msg);
                }
            });
            
     });
} );
function reloadframe()
{
 parent.document.getElementById('iframe').contentWindow.location.reload(true);
}
</script>
</body>
</html>