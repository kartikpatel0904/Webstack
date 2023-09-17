<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body class="" style="background:grey;">
	<nav id="navop" class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand text-light" href="#">DATABASE TABLE'S DATA TO HTML TABLE FORMAT</a>
       
        <div class=" text-right text-lg-right text-md-right" id="navbarNavAltMarkup" style="margin-left: auto;">
          <div class="navbar-nav" style=" margin-left:auto;" >
    
            <div class="mr-1 btnc text-right text-lg-right text-md-right"> 
                <button disabled id="btncode" class="js-seralize btn btn-success btn-lg">GET CODE</button>
            </div>
        </div>
        </div>
        </nav>  

        <H2 align="center">PROVIDE ALL CREDENTIALS</H2>
	<div class="row" style="margin-top:20px;border: 1px solid grey">
		<div class="col-md-2">
			<input id="server" class="form-control" type="text" placeholder="ENTER SERVER'S NAME" name="servername">
		</div>
		<div class="col-md-2">
			<input id="database" class="form-control" type="text" placeholder="ENTER DATABASE" name="DB">
		</div>
		<div class="col-md-2">
			<input id="userid" class="form-control" type="text" placeholder="ENTER USERNAME" name="DB">
		</div>
		<div class="col-md-2">
			<input id="password" class="form-control" type="text" placeholder="ENTER PASSWORD" name="DB">
		</div>
		<div class="col-md-2">
			<CENTER>
			<button id="go" class="btn-primary btn w-50">GO</button>
			</CENTER>
		</div>
		<div class="col-md-2">

		<SELECT disabled id="select" class="form-control">
			<option value="" disabled selected>SELECT TABLE</option>

		</SELECT>
		</div>
	</div>
	<div class="col-md-12" id="tblcont">

	</div>
	<div class="modal fade" id="CODE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">CODE</h5>
        </div>
        <div class="modal-body">
          <p style="font-size: 13px;" class="text-danger">NOTE :  YOU HAVE TO INCLUDE BS4 FILES TO YOUR WEBPAGE FOR WORKING GRID PROPERLY .</p>
          <form>
            <div class="form-group">
              <textarea id="textcode" style="color:cadetblue;" readonly rows=17 class="form-control bg-dark" id="message-text"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="copytext" type="button" class="btn btn-primary">Copy</button>
        </div>
      </div>
    </div>
  </div>

	<style type="text/css">
		table
		{
			width:100%;
			height:100%;
			margin-top:10px;
		}
	</style>
<script>
	$(document).ready(function(){
		//$('select').select2();
		$("#go").click(function(event){
		if (document.querySelector("#server").value.trim()!=="" && document.querySelector("#userid").value.trim()!=="" && document.querySelector("#database").value.trim()!=="") {
			var server	=document.querySelector("#server").value;
			var userid	=document.querySelector("#userid").value;
			var password=document.querySelector("#password").value;
			var database=document.querySelector("#database").value;

		$.ajax({
                url:'tablechecker.php',
                type:'post',
                data:{servername:server,username:userid,password:password,dbname:database},
                success:function(response){
                			$("#select").prop('disabled',false);
            		       $("#select").html(response);    //$("#message").html(msg);
                },
                error:function(response){
            		 alert("SOMETHING WENT WRONG");                  //$("#message").html(msg);
                }
            });
			}
		});
		$("#select").change(function(event){
			var table =document.querySelector("#select").value;
			var server	=document.querySelector("#server").value;
			var userid	=document.querySelector("#userid").value;
			var password=document.querySelector("#password").value;
			var database=document.querySelector("#database").value;
			$.ajax({
                url:'tablemaker.php',
                type:'post',
                data:{servername:server,username:userid,password:password,dbname:database,tablename:table},
                success:function(response){
                			$("#tblcont").html(response);  
                			$("#btncode").prop("disabled",false);
                },
                error:function(response){
            		 alert("SOMETHING WENT WRONG");                 
                }
            });
		});
		$("#btncode").click(function(event){
			$("#CODE").modal("show");
			$("#textcode").html($("#tblcont").html());
		});
		$("#copytext").click(function (e) { 
        e.preventDefault();
     var  el=  document.querySelector("#textcode");
     el.select();
        document.execCommand('copy');
      });
	});
</script>
</body>
</html>