<?php
session_start();
if ($_SESSION['username']) {
  include('dbConnection.php');
  $con = ConnectDB();
  $checkuserquery = "select * from form_table where form_id=" . $_REQUEST['id'];
  $cres = mysqli_query($con, $checkuserquery);
  $rec = mysqli_fetch_array($cres);
  if ($rec['USERID'] == $_SESSION['username']) {
    if ($rec['ISLOCKED'] == "1") {
      if (isset($_COOKIE['formidis' . $_REQUEST['id']])) {
      } else {
        echo "PAGE IS CURRENTLY LOCKED WAIT UNTILL USER UNLOCK PAGE";
        exit;
      }
    }
  } else {
    echo "<center>ONCE A WISE MAN SAID DON'T LOOK FOR WHAT OTHER HAVE  :)  </center>";
    exit;
  }
} 
else {
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>WebStack</title>
  <link rel="stylesheet" href="assets/css/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="assets/css/adminlte/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="control.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="./src/gridstack.min.css" rel="stylesheet" />
  <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>
  <script src="./src/jquery.js"></script>
  <script src="./src/gridstack.js"></script>
  <script src="./src/jquery-ui.js"></script>
  <script src="./src/gridstack.jQueryUI.js"></script>
  <secret id="head">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link href="https://ik.imagekit.io/qhtlnrwvk/gridstack.min_1yDEXckA6.css" rel="stylesheet" />
    <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>
    <script src="https://ik.imagekit.io/qhtlnrwvk/jquery_xYWlxiriU.js"></script>
    <script src="https://ik.imagekit.io/qhtlnrwvk/gridstack_MsjOe3IW9.js"></script>
    <script src="https://ik.imagekit.io/qhtlnrwvk/jquery-ui_YKLhZI1xB.js"></script> 
    <script src="https://ik.imagekit.io/qhtlnrwvk/gridstack.jQueryUI_7cxyGeUvd.js"></script>
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </secret>
 
  <jvs id="jvs">
    <script>
      var grid = GridStack.init();
      grid.enableMove(false);
      grid.enableResize(false);
      grid.el.contentEditable = "false";
    </script>
  </jvs>
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
          <BUTTON class="btn btn-dark" id="SAVE">SAVE</BUTTON>
          <BUTTON class="btn btn-dark" onclick="saveTextAsFile()">DOWNLOAD</BUTTON>
          <select id="controlid" class="btn btn-dark">
            <option selected disabled>CONTROLS SETTING</option>
          </select>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <span style="text-align:center;" class="brand-text font-weight-light"><STRONG>FORM BUILDER</STRONG></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th-large"></i>
                <p>
                  FORM CONTROLS
                  <i class="fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <!--  INPUT BOX  -->

                <div class="newWidget grid-stack-item controls">
                  <div class="card-body   grid-stack-item-content">
                    <div class="titlelist">
                      <div cid=1 id="drag1" src="img_logo.gif" class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>INPUT BOX</p>
                        </a>
</div>
                    </div>

                    <div class="form-group row col-12" style="display:none;">
                      <label class="col-4 control-label controls" for="textinput">Label</label>
                      <div class="col-8">
                        <input id="textinput" name="textinput" type="text" class="form-control input-md controls">

                      </div>
                    </div>
                  </div>
                </div>
                <!-- END INPUT BOX  -->

                <!-- BUTTON  -->
                <div id="Delete-buttoncointainer" class="newWidget grid-stack-item controls">
                  <div class="card-body   grid-stack-item-content">
                    <div class="titlelist">
                      <li cid=1 id="drag1" src="img_logo.gif" class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>BUTTON</p>
                        </a>
                      </li>
                    </div>

                    <div class="form-group row" style="display:none;">
                      <button type="submit" class="btn btn-dark col-md-12 controls">Dark</button>

                    </div>
                  </div>
                </div>
                <!-- END BUTTON  -->
                <!-- DROPDOWN  -->


                <div class="newWidget grid-stack-item controls">
                  <div class="card-body   grid-stack-item-content">
                    <div class="titlelist">
                      <li cid=1 id="drag1" src="img_logo.gif" class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>DROPDOWN</p>
                        </a>
                      </li>
                    </div>

                    <div class="form-group row col-12" style="display:none;">
                      <label class="col-4 control-label controls" for="textinput">Label</label>
                      <div class="col-8">
                        <select class="form-control btn-white controls">
                          <option>OPTION 1</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END DROPDOWN  -->
                <!-- CHECKBOX  -->
                <div class="newWidget grid-stack-item controls">
                  <div class="card-body   grid-stack-item-content">
                    <div class="titlelist">
                      <li cid=1 id="drag1" src="img_logo.gif" class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>CHECKBOX</p>
                        </a>
                      </li>
                    </div>

                    <div class="form-group row col-12" style="display:none;">
                      <div class="col-12">
                        <input id="chk" name="textinput" type="checkbox" class="controls">
                        <label class="controls">Label</LABEL>
                      </div>
                    </div>
                  </div>
                </div>
                <!--END  CHECKBOX-->
                <!--RADIO-->
                <div class="newWidget grid-stack-item controls">
                  <div class="card-body   grid-stack-item-content">
                    <div class="titlelist">
                      <li cid=1 id="drag1" src="img_logo.gif" class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>RADIO BUTTON</p>
                        </a>
                      </li>
                    </div>

                    <div class="form-group row col-12" style="display:none;">
                      <div class="col-12">
                        <input id="RADIO" name="textinput" type="RADIO" class="controls">
                        <label class="controls">Label</LABEL>
                      </div>
                    </div>
                  </div>
                </div>
                <!--END RADIO-->
                <!--FILE-->
                <div class="newWidget grid-stack-item controls">
                  <div class="card-body   grid-stack-item-content">
                    <div class="titlelist">
                      <li cid=1 id="drag1" src="img_logo.gif" class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>FILE UPLOAD</p>
                        </a>
                      </li>
                    </div>

                    <div class="form-group row col-12" style="display:none;">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input controls" id="customFile">
                        <label class="custom-file-label controls" for="customFile">Choose file</label>
                      </div>
                    </div>
                  </diV>
                </div>
                <!--END FILE-->
                  <!--  NUMERIC TEXTBOX  -->

                  <div class="newWidget grid-stack-item controls">
                  <div class="card-body   grid-stack-item-content">
                    <div class="titlelist">
                      <div cid=1 id="drag1" src="img_logo.gif" class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>NUMERIC TEXTBOX</p>
                        </a>
</div>
                    </div>

                    <div class="form-group row col-12" style="display:none;">
                      <label class="col-4 control-label controls" for="textinput">Label</label>
                      <div class="col-8">
                        <input id="textinput" name="textinput" type="number" class="form-control input-md controls">

                      </div>
                    </div>
                  </div>
                </div>
                <!-- END NUMERIC BOX  -->
                 <!--  DATE TIME PICKER  -->

                 <div class="newWidget grid-stack-item controls">
                  <div class="card-body   grid-stack-item-content">
                    <div class="titlelist">
                      <div cid=1 id="drag1" src="img_logo.gif" class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>DATE-TIME PICKER</p>
                        </a>
</div>
                    </div>

                    <div class="form-group row col-12" style="display:none;">
                      <label class="col-4 control-label controls" for="textinput">Label</label>
                      <div class="col-8">
                        <input id="textinput" name="textinput" type="datetime-local" class="form-control input-md controls">

                      </div>
                    </div>
                  </div>
                </div>
                <!-- END DATE TIME PICKER  -->
                 <!--  EMAIL INPUT BOX   -->

                 <div class="newWidget grid-stack-item controls">
                  <div class="card-body   grid-stack-item-content">
                    <div class="titlelist">
                      <div cid=1 id="drag1" src="img_logo.gif" class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>EMAIL INPUT BOX</p>
                        </a>
</div>
                    </div>

                    <div class="form-group row col-12" style="display:none;">
                      <label class="col-4 control-label controls" for="textinput">Label</label>
                      <div class="col-8">
                        <input id="textinput" name="textinput" type="email" class="form-control input-md controls">

                      </div>
                    </div>
                  </div>
                </div>
                <!-- END EMAIL INPUT BOX  -->
                 <!--  URL INPUT BOX  -->

                 <div class="newWidget grid-stack-item controls">
                  <div class="card-body   grid-stack-item-content">
                    <div class="titlelist">
                      <div cid=1 id="drag1" src="img_logo.gif" class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>URL INPUT BOX</p>
                        </a>
</div>
                    </div>

                    <div class="form-group row col-12" style="display:none;">
                      <label class="col-4 control-label controls" for="textinput">Label</label>
                      <div class="col-8">
                        <input id="textinput" name="textinput" type="url" class="form-control input-md controls">

                      </div>
                    </div>
                  </div>
                </div>
                <!-- END URL INPUT BOX  -->
              </ul>
           

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content ondrop="drop(event)" ondragover="allowDrop(event)" -->
    <div id="down">
    <form id="grid" class="content-wrapper grid-stack row" onsubmit="return ReturnFalse();"></form>
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
      <div class="float-right d-none d-sm-inline">
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2020-21 <a href="#">M7</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->
  <div class="modal fade" id="config" value="">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">CONTROL CONFIGURATION</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-6">
              <p text-align="center"> SELECT BACKGROUND COLOR</p><input id="bgc" type="COLOR" class="form-control">
            </div>
            <div class="col-6">
              <p text-align="center"> SELECT FONT COLOR</p><input id="fc" type="COLOR" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <p text-align="center"> ENTER HEIGHT</p><input id="height" type="number" class="form-control">
            </div>
            <div class="col-6">
              <p text-align="center"> ENTER FONT SIZE</p><input id="fsize" type="number" class="form-control">
            </div>
          </div> 
        <div class="row">
            <div class="col-6">
              <p text-align="center"> ENTER ID</p><input id="idval" type="text" class="form-control">
            </div>
        
            <div class="col-6">
              <p text-align="center"> ENTER NAME</p><input id="nameval" type="text" class="form-control">
            </div>
            <div class="col-6">
              <p text-align="center"> ENTER BORDER WIDTH</p><input id="bordval" type="number" class="form-control">
            </div>
        
            <div class="col-6">
              <p text-align="center"> ENTER BORDER COLOR</p><input id="bordclrval" type="color" class="form-control">
            </div>
            <div class="col-6">
              <p text-align="center"> ENTER BORDER STYLE</p><input id="bordstyleval"  list="style" type="text" class="form-control">
                <datalist id="style">
                              <option value="dotted"></option>
                              <option value="dashed"></option>
                              <option value="solid"></option>
                              <option value="double"></option>
                              <option value="groove"></option>
                              <option value="ridge"></option>
                              <option value="inset"></option>
                              <option value="outset"></option>
                </datalist>
            </div>
            <div class="col-6" id="disabledcontainer" style="display:none;">
              <p text-align="center"> DISABLED </p><select id="disabled"   class="form-control">
              <option value="true">TRUE</option>
              <option value="false">FALSE</option>
              </select>
  
            </div>
            <div class="col-6 minmaxcontainer">
              <p text-align="center"> ENTER MINIMUM VALUE  </p><input id="minvalue" type="text" class="form-control">
            </div>
            <div class="col-6 minmaxcontainer">
              <p text-align="center"> ENTER MAXIMUM VALUE </p><input id="maxvalue" type="text" class="form-control">
            </div>
            <div class="col-6" id="actioncontainer" style="display:none;">
              <p text-align="center"> ACTION </p><input id="action"  type="text" class="form-control">
            </div>
            <div class="col-6"  id="requirecontainer" style="display: none;">
              <p text-align="center"> ISREQUIRED </p><select id="requirevalue"   class="form-control">
              <option value="true">TRUE</option>
              <option value="false">FALSE</option>
              </select>
  
            </div>
            <div class="col-6"  id="methodcontainer" style="display: none;">
              <p text-align="center"> METHOD </p><select id="methodvalue"   class="form-control">
              <option value="get">GET</option>
              <option value="post">POST</option>
              </select>
  
            </div>
            <div class="col-6"  id="targetcontainer" style="display: none;">
              <p text-align="center"> TARGET </p><select id="targetvalue"   class="form-control">
              <option value="_SELF">_SELF</option>
              <option value="_BLANK">_BLANK</option>
              <option value="_PARENT">_PARENT</option>
              </select>
  
            </div>
          <div class="col-6" id="selectvalcontainer" style="display: none;">
              <p text-align="center">ENTER OPTIONS </p><input id="optionval" type="text" placeholder="BY SEPARATING THEM WITH  ," class="form-control">
          </div>
          </div>
          
        
          
        </div>
        

        <!-- Modal footer -->
        <div class="modal-footer">
          <button id="save" type="button" class="btn btn-secondary" data-dismiss="">SAVE</button>
          <button type="button" class="btn btn-secondary" id="close">Close</button>
        </div>

      </div>
    </div>
    <!-- REQUIRED SCRIPTS -->
    <style>
      @import "../dist/gridstack.css";

    

      .grid-stack {
        background: lightgoldenrodyellow;
        overflow-x: hidden;
        overflow-y: auto;
      }

      .grid-stack-item-content {
        color: #2c3e50;
        overflow-x: hidden;
        overflow-y: auto;
      }

      .btnconfig {
        z-index: 999999;
      }
    </style>
    <script>
    var mode=1;
      var grid = GridStack.init({
        alwaysShowResizeHandle: /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
          navigator.userAgent
        ),
        resizable: {
          handles: 'e, se, s, sw, w'
        },
        verticalMargin: 0,
        removable: '#trash',
        removeTimeout: 100,
        acceptWidgets: '.newWidget'
      });

      grid.on('added', function(e, items) {
        if(mode==0)
        {
         if(grid.el.lastChild.children[0].children[0].classList.contains("titlelist"))
         {
        grid.el.lastChild.children[0].children[0].remove();
        grid.el.lastChild.children[0].children[0].style.display = "flex";
        POPULATE_CONTROLS_SETTING();
        addRemoveButton();
         }
          POPULATE_CONTROLS_SETTING();
          addRemoveButton();
        }
      });
      // TODO: switch jquery-ui out
      $('.newWidget').draggable({
        revert: 'invalid',
        scroll: false,
        appendTo: 'body',
        helper: 'clone'
      });

      function domp(element) {
        var path = element.parents().addBack();
        var quickCss = path.get().map(function(item) {
          var self = $(item),
            id = item.id ? '#' + item.id : '',
            clss = item.classList.length ? item.classList.toString().split(' ').map(function(c) {
              return '.' + c;
            }).join('') : '',
            name = item.nodeName.toLowerCase(),
            index = self.siblings(name).length ? ':nth-child(' + (self.index() + 1) + ')' : '';

          if (name === 'html' || name === 'body') {
            return name;
          }
          return name + index + id + clss;

        }).join(' > ');

        return quickCss;
      }
      grid.el.addEventListener('contextmenu', function(ev) {
        ev.preventDefault();
        ev.target.focus = true;
        grid.el.contentEditable = true;
      }, false);
      
      $("#controlid").change(function(event) {
      
        $("#config").prop('dompath', $("#controlid").val());   
        $("#config").modal("show");
          if(document.querySelector($("#controlid").val()).style.backgroundColor !== undefined )   
          {
            document.getElementById("bgc").value = rgb2hex(document.querySelector($("#controlid").val()).style.backgroundColor);
          }
          else
          {
            document.getElementById("bgc").value='#00FFFF'
          }
          if(typeof document.querySelector($("#controlid").val()).style.height !== undefined)
          {
            document.getElementById("height").value = document.querySelector($("#controlid").val()).style.height.replace("px","");
          }
          if(typeof document.querySelector($("#controlid").val()).style.fontSize !== undefined)
          {
            document.getElementById("fsize").value = document.querySelector($("#controlid").val()).style.fontSize.replace("px","");;
          }
          if(typeof document.querySelector($("#controlid").val()).style.color !== undefined)
          {
            document.getElementById("fc").value = rgb2hex(document.querySelector($("#controlid").val()).style.color);
          }
    
    
        //for id

        if( document.querySelector($("#controlid").val()).id !== undefined )   
          {
            document.getElementById("idval").value =document.querySelector($("#controlid").val()).id;
          }


       //for name

          if( document.querySelector($("#controlid").val()).name !== undefined )   
          {
            document.getElementById("nameval").value =document.querySelector($("#controlid").val()).name;
          }
        
      //for border width
          if( document.querySelector($("#controlid").val()).style.borderWidth !== undefined )   
          {
            document.getElementById("bordval").value=document.querySelector($("#controlid").val()).style.borderWidth.replace("px","");;
          }
      //for border color
      if( document.querySelector($("#controlid").val()).style.borderWidth !== undefined )   
          {
            document.getElementById("bordclrval").value=rgb2hex(document.querySelector($("#controlid").val()).style.borderColor);
          }
       //for border style
     if( document.querySelector($("#controlid").val()).style.borderStyle !== undefined )   
          {
            document.getElementById("bordstyleval").value=document.querySelector($("#controlid").val()).style.borderStyle;
          }
      
        
         //for  select option
         if(document.querySelector($("#controlid").val()).tagName==="SELECT")
         {
           document.getElementById("selectvalcontainer").style.display="flex";
           if(document.querySelector($("#controlid").val()).children.length>0)
           {
            var sepratedlistbycomma="";
             for(var i=0;i<document.querySelector($("#controlid").val()).children.length;i++)
             {
              sepratedlistbycomma +=document.querySelector($("#controlid").val()).children[i].innerHTML+',';
             }
             document.getElementById("optionval").value=sepratedlistbycomma;
           }
         }
         else
         {
          document.getElementById("selectvalcontainer").style.display="none";
         }
      //disabledcontainer
      if( document.querySelector($("#controlid").val()).tagName==="BUTTON" || document.querySelector($("#controlid").val()).tagName==="INPUT")   
          {
            document.getElementById("disabledcontainer").style.display="block";
            if(document.querySelector($("#controlid").val()).disabled==true)
            {
              document.getElementById("disabled").children[0].selected=true;
            }
            else
            {
              document.getElementById("disabled").children[1].selected=true;
            }
          }
          else
         {
          document.getElementById("disabledcontainer").style.display="none";
         }
         //for action of form
         if(document.querySelector($("#controlid").val()).tagName==="FORM"){
          document.querySelector("#actioncontainer").style.display="block";
          if( document.querySelector($("#controlid").val()).action !== undefined )   
          {
            document.querySelector("#action").value=document.querySelector($("#controlid").val()).action;
          }
         }
         else
         {
          document.querySelector("#actioncontainer").style.display="none";
         }
         //FOR METHOD OF FORM
         if(document.querySelector($("#controlid").val()).tagName==="FORM"){
          $("#methodcontainer").show();
          if( document.querySelector($("#controlid").val()).method ==="get" )   
          {
            document.getElementById("methodvalue").children[0].selected=true;
          }
          else{
            document.getElementById("methodvalue").children[1].selected=true;
          }
         }
         else
         {
          $("#methodcontainer").hide();
         }
         //for require
         if(document.querySelector($("#controlid").val()).tagName==="SELECT" || document.querySelector($("#controlid").val()).tagName==="INPUT" || document.querySelector($("#controlid").val()).tagName==="LABEL")
         {
            document.getElementById("requirecontainer").style.display="block";
            if(document.querySelector($("#controlid").val()).required==true)
            {
                document.getElementById("requirevalue").children[0].selected=true;
            }
            else if(document.querySelector($("#controlid").val()).required==false)
            {
              document.getElementById("requirevalue").children[1].selected=true;
            }
            
         }
         else
         {
          document.getElementById("requirecontainer").style.display="none";
         }
        //FOR MIN MAX FIELDS 
       if(document.querySelector($("#controlid").val()).type==="number")
       {
        $('.minmaxcontainer').show();
        if(document.querySelector($("#controlid").val()).max!=="")
        {
            document.getElementById("maxvalue").value=document.querySelector($("#controlid").val()).max;
        }
        if(document.querySelector($("#controlid").val()).min!=="")
        {
            document.getElementById("minvalue").value=document.querySelector($("#controlid").val()).min;
        }
       }
       else
       {
        $('.minmaxcontainer').hide();
       }
       //form target
       if(document.querySelector($("#controlid").val()).tagName==="FORM"){
          $("#targetcontainer").show();
          if(document.querySelector($("#controlid").val()).target==="_SELF")   
          {
            document.getElementById("targetvalue").children[0].selected=true;
          }
          else if(document.querySelector($("#controlid").val()).target==="__BLANK"){
            document.getElementById("targetvalue").children[1].selected=true;
          }
          else if(document.querySelector($("#controlid").val()).target==="_PARENT"){
            document.getElementById("targetvalue").children[2].selected=true;
          }
          
         }
         else
         {
          $("#targetcontainer").hide();
         }
      });
      $("#save").click(function(e) {
        if(document.getElementById("bgc").value!=='#00FFFF'){
      
          document.querySelector($("#controlid").val()).style.backgroundColor = document.getElementById("bgc").value;
        }
       

        
        document.querySelector($("#controlid").val()).style.height = document.getElementById("height").value + 'px';
        document.querySelector($("#controlid").val()).style.color = document.getElementById("fc").value;
        document.querySelector($("#controlid").val()).style.fontSize = document.getElementById("fsize").value + 'px';
        if (document.querySelector($("#controlid").val()).tagName == "IMG" || document.querySelector($("#controlid").val()).tagName == "IFRAME") {
          document.querySelector($("#controlid").val()).src = document.getElementById("src").value;
        } else {

        }
   
       
        //for id
          
        if( document.getElementById("idval").value !=="")   
          {
           document.querySelector($("#controlid").val()).id= document.getElementById("idval").value ;
          }


        //for name


        if( document.getElementById("nameval").value !=="")   
          {
           document.querySelector($("#controlid").val()).name= document.getElementById("nameval").value ;
          }
        
    
        //for border width
         if(document.getElementById("bordval").value!=="")   
          {
           document.querySelector($("#controlid").val()).style.borderWidth= document.getElementById("bordval").value +'px';
          }
       //for border color
          if(document.getElementById("bordval").value!==document.querySelector($("#controlid").val()).style.borderColor)   
          {
            document.querySelector($("#controlid").val()).style.borderColor=document.getElementById("bordclrval").value;
          }
        //for border color
          if(document.getElementById("bordstyleval").value!=="" )   
          {
            document.querySelector($("#controlid").val()).style.borderStyle=document.getElementById("bordstyleval").value;
          }
          
        
        // for select
        if( document.getElementById("optionval").value!=="")
        {
          var separatedoption=document.getElementById("optionval").value.split(',');
          var innerHTML='';
          for(var i=0;i<separatedoption.length;i++)
          {
           innerHTML+="<OPTION>"+separatedoption[i]+"</OPTION>";
          }
          document.querySelector($("#controlid").val()).innerHTML=innerHTML;
        }
        //disabled
        if( document.querySelector($("#controlid").val()).tagName==="BUTTON" || document.querySelector($("#controlid").val()).tagName==="INPUT" || document.querySelector($("#controlid").val()).tagName==="SELECT" || document.querySelector($("#controlid").val()).tagName==="LABEL")   
          {
            if(document.getElementById("disabled").children[0].selected==true)
            {
              document.querySelector($("#controlid").val()).disabled=true;
              
            }
            else
            {
              document.querySelector($("#controlid").val()).disabled=false;
              
            }
           
          }
        //for action
        if(document.querySelector($("#controlid").val()).tagName==="FORM")
        {
        if(document.querySelector("#action").value!=="")
        {
          document.querySelector($("#controlid").val()).action=document.querySelector("#action").value;
        }
      }
      //for require
      if(document.querySelector($("#controlid").val()).tagName==="SELECT" || document.querySelector($("#controlid").val()).tagName==="INPUT" || document.querySelector($("#controlid").val()).tagName==="LABEL")
      {
        if(document.getElementById("requirevalue").children[0].selected==true)
       {
              document.querySelector($("#controlid").val()).required=true;
              
       }
        else if(document.getElementById("requirevalue").children[1].selected==true)
       {
              document.querySelector($("#controlid").val()).required=false;
        }
      } 
         //FOR MIN MAX FIELDS 
         if(document.querySelector($("#controlid").val()).type==="number")
       {
        if(document.getElementById("maxvalue").value!=="")
        {
          document.querySelector($("#controlid").val()).max=document.getElementById("maxvalue").value;
        }
        if(document.getElementById("minvalue").value!=="")
        {
          document.querySelector($("#controlid").val()).min= document.getElementById("minvalue").value;
        }
       } 
       //for method of form
       if(document.querySelector($("#controlid").val()).tagName==="FORM"){
         if(document.getElementById("methodvalue").value=="post")
         {
          document.querySelector($("#controlid").val()).method="post";
         }
         else if(document.getElementById("methodvalue").value=="get")
         {
          document.querySelector($("#controlid").val()).method="get";
         }

         }
         //FOR TARGET OF FORM
         if(document.querySelector($("#controlid").val()).tagName==="FORM"){
          document.querySelector($("#controlid").val()).target=document.getElementById("targetvalue").value;  
         }
        $("#config").modal("hide");
      });
      $("#close").click(function(e) {
        $("#config").modal("hide");
      });

      function saveTextAsFile() {
        var fileNameToSaveAs = "index.html";
        var textToWrite = "<html><head>" + document.querySelector("#head").innerHTML + "<style>.grid-stack>.grid-stack-item>.grid-stack-item-content {position:relative;}</style>" + "</head>" + "<body>" + document.querySelector("#down").innerHTML + document.querySelector("#jvs").innerHTML + "</body>" + "</html>";
        var textFileAsBlob = new Blob([textToWrite], {
          type: 'text/plain'
        });
        var downloadLink = document.createElement("a");
        downloadLink.download = fileNameToSaveAs;
        downloadLink.innerHTML = "Download File";
        if (window.webkitURL != null) {
          // Chrome allows the link to be clicked
          // without actually adding it to the DOM.
          downloadLink.href = window.webkitURL.createObjectURL(textFileAsBlob);
        } else {
          // Firefox requires the link to be added to the DOM
          // before it can be clicked.
          downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
          downloadLink.onclick = destroyClickedElement;
          downloadLink.style.display = "none";
          document.body.appendChild(downloadLink);
        }

        downloadLink.click();
      }
      document.querySelector("#SAVE").addEventListener('click', () => {
        const filecode = JSON.stringify(saveGrid(grid));
        const cid = new URLSearchParams(window.location.search).get('id');
        $.ajax({
          url: 'updatepage.php',
          type: 'post',
          data: {
            filecode: filecode,
            cid: cid
          },
          success: function(response) {
            var result = JSON.parse(response);
            if (result.result == 1) {
              console.log("success");
            } else {
              console.log("fail");
            }
          }
        });
      });
      function rgb2hex(rgb) {
     if (  rgb.search("rgb") == -1 ) {
          return rgb;
     } else {
          rgb = rgb.match(/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+))?\)$/);
          function hex(x) {
               return ("0" + parseInt(x).toString(16)).slice(-2);
          }
          return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]); 
     }
}
saveGrid = function(grid) {
      var serializedData = [];
      var removebuttons=document.querySelectorAll(".btnremove");
      for(var i=0;i<removebuttons.length;i++)
      {
        removebuttons[i].remove();
      }
      grid.engine.nodes.forEach(function(node) {
        serializedData.push({
          x: node.x,
          y: node.y,
          width: node.width,
          height: node.height,
          content : $(node.el).html().replaceAll(/"/gi,'\\"').replace(/(?:\r\n|\r|\n)/g, ''),
          mainStyle:getMainElementStyle(node.el),
          parentStyle:getMainElementStyle(node.el.parentElement),
          value:node.el.children[0].children[0].children[0].children[0].children[0].children[0].children[1].children[0].value
        });
        
      });
      addRemoveButton();
      return serializedData;
    };

    loadGrid = function(grid,data) {
      grid.removeAll();
      var items = GridStack.Utils.sort(data);
      grid.batchUpdate();
      items.forEach(function (node) {
        grid.addWidget('<div class="newWidget controls" data-gs-id="widget_' + '" class="grid-stack-item"><div class="grid-stack-item-content">'+node.content+'</div></div>', node);
        grid.el.lastChild.setAttribute("style",node.mainStyle);
       grid.el.children[0].children[0].children[0].children[0].children[0].children[0].children[1].children[0].value=node.value;
        if(node.value!=undefined)
        {
           grid.el.lastChild.setAttribute("value",node.value); 
        }
        grid.el.setAttribute("style",node.parentStyle);
      });
      grid.commit();
    };
    $(document).ready(function(e){
    const load = new URLSearchParams(window.location.search).get('id');
      $.ajax({
          url: 'load.php',
          type: 'post',
          data: {
            cid: load
          },
          success: function(response) {
          
            if(response!=="")
            {
              var result = JSON.parse(response);
              loadGrid(grid,result);
            POPULATE_CONTROLS_SETTING();
            addRemoveButton();
            }
            mode=0;
          }
        });
    });
    //Delete BUTTON SUBMIT
    document.querySelector("#Delete-buttoncointainer").remove();
    function POPULATE_CONTROLS_SETTING()
    {
      $("#controlid").html("<option disabled selected>CONTROLS SETTING</option>");
       var ElementsArray= document.querySelectorAll('#down .controls');
       for(var i=0;i<ElementsArray.length;i++)
       {
        document.getElementById("controlid").innerHTML += "<option value=\"" + domp($(ElementsArray[i])) + "\">" + ElementsArray[i].tagName + "</option>";
       }
       document.getElementById("controlid").innerHTML += "<option value=\"" + domp($("#grid")) + "\">" + "FORM" + "</option>";
       
      
    }
    function addRemoveButton()
    {
      var nodes =document.querySelectorAll("#grid .newWidget");
      for(var i=0;i<nodes.length;i++)
      {
        if(nodes[i].lastChild.tagName!=="BUTTON")
        {
          var button = document.createElement('BUTTON');  
          button.classList.add("fas");
          button.classList.add("fa-times-circle");
          button.classList.add("btn");
          button.classList.add("btnremove");
          button.addEventListener("click",function(e){grid.removeWidget(e.target.parentElement);POPULATE_CONTROLS_SETTING();});
          nodes[i].appendChild(button);
        }
     }
    }
    function getMainElementStyle(node)
    {
      var style=node.getAttribute("style");
      return style;
    }
    function avoidAction(e) { e.preventDefault(); }
    function ReturnFalse()
    {
      return false;
    }
    
    </script>
    <!-- jQuery -->
    <!-- Bootstrap 4 -->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/js/adminlte/adminlte.min.js"></script>
    <script src="assets/js/webstack/script.js"></script>
</body>

</html>