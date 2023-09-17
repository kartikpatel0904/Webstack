<?php
session_start();
if(isset($_SESSION["allpage"]))
 {
 }
 else 
 {
  // ECHO "YOU HAVE NOT PERMISSION TO ACCCES";
   ECHO "<script>window.location.replace('login.php')</script>";
   exit;
 }
  include('dbConnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>WebStack</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/css/fontawesome/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>      
    </ul>

    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link"  href="logout.php" ><i
            class="fas fa-sign-out-alt"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link">
      <img src="dist/img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">WebStack</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <p class="userFA">
          <?php
          $con = ConnectDB();
          $sesname=$_SESSION['username'];
          $QueryForUname="SELECT USERNAME FROM wbs_user_info WHERE USER_ID='$sesname'";
          $result = mysqli_query($con,$QueryForUname);
          $row = mysqli_fetch_assoc($result);
            $Usname= $row["USERNAME"];
            echo strtoupper($Usname[0]);
          ?>
        </p>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo strtoupper($Usname); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th-large"></i>
              <p>
                Modules
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Modules\PageBuilder\EditorWorkspace.php" target="WORKSPACE" class="nav-link">
                <img src="Page.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 nav-icon" style="opacity: .8 ;width:35px;margin-left:-4px;">
                  <p>Page Builder</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Modules\FormBuilder\EditorWorkspace.php" target="WORKSPACE" class="nav-link">
                <img src="form.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 nav-icon" style="opacity: .8 ;width:35px;margin-left:-4px;">
                  <p>Form Builder</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Modules\GridBuilder\" class="nav-link">
                  <img src="grid.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 nav-icon" style="opacity: .8 ;width:35px;margin-left:-4px;">
                  <p>Grid Builder</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="http://localhost/WebStack/Modules/AdvanceControl/listcontrol.html" target="WORKSPACE" class="nav-link">
                  <img src="Advance.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 nav-icon" style="opacity: .8 ;width:35px;margin-left:-4px;">
                  <p>Advance Controls</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Modules\CodeCompiler\EditorWorkspace.php" target="WORKSPACE" data-nav-link="codecompiler" class="nav-link">
                <img src="code.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 nav-icon" style="opacity: .8 ;width:35px;margin-left:-4px;">
                  <p>Code Compiler</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="DivMain">
    <iframe id="iframe" src="welcome.html" style="width:100%;height:36rem" name="WORKSPACE">
      
    </iframe>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div  class="float-right d-none d-sm-inline">
      <a href="Modules/Contact_Us/templatemo_467_easy_profile/index.html">Anything you want</a>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2023-24 <a href="#">WebStack</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<style>
.userFA
{
  text-align:  center; 
  color:indigo;
  background-color:gray;
  border-radius: 100px;
  width: 2rem;
  font-size: 19px;
 margin-top:3px;  
 font-style:bold;  
}
</style>
<!-- jQuery -->
<script src="assets/js/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte/adminlte.min.js"></script>
<script src="assets/js/webstack/script.js"></script>
</body>
</html>
