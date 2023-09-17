<?php
session_start();
if ($_SESSION['username']) {
	include('dbConnection.php');
	$con=ConnectDB();
	$checkuserquery="select * from editor_table where code_id=".$_REQUEST['id'];
	$cres=mysqli_query($con,$checkuserquery);
	$rec=mysqli_fetch_array($cres);
	if($rec['USERID']==$_SESSION['username'])
		{
      if($rec['ISLOCKED']=="1")
      {
        if(isset($_COOKIE['pageid'.$_REQUEST['id']]))
        {

        }
        else
        {
          echo "PAGE IS CURRENTLY LOCKED WAIT UNTILL USER UNLOCK PAGE";
          exit;
        }
      }

		}
		else
		{
			echo "<center>ONCE A WISE MAN SAID DON'T LOOK FOR WHAT OTHER HAVE  :)  </center>";
			exit;
		}
	}
	else
	{
		exit;
	}
?>
<html>
  <head>
    <title>Code Editor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
     <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  </head>

  <body>
    <nav id="navop" class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand text-light" href="#">EDITOR</a>
 
  <div class=" text-right text-lg-right text-md-right" id="navbarNavAltMarkup" style="margin-left: auto;">
    <div class="navbar-nav" style=" margin-left:auto;" >
      <div class="btnc text-right text-lg-right text-md-right"> 
        <button class="btn btn-dark navbar-btn pull-right" id="view">PREVIEW</button>
        <button class="btn btn-white navbar-btn pull-right"ID="SAVE">SAVE</button>
        <button class="btn btn-danger navbar-btn pull-right" onclick="saveTextAsFile();">DOWNLOAD</button>
        
    </div>
  </div>
  </div>
</nav>
<div class="row col-12 col-md-12 col-lg-12">
<div class="col-12 col-md-6 col-lg-6">
	 <textarea rows="29"id="InputCode" placeholder="WRITE YOUR CODE HERE ">
		<?php
			$query="select code from editor_table where code_id=".$_REQUEST['id'];
			$result=mysqli_query($con,$query);
			$row=mysqli_fetch_array($result);
			echo $row['code'];

		?>    	
    </textarea>
</div>
<div class="col-12 col-md-6 col-lg-6">
	<iframe id="code"></iframe>
</div>
</div>  	
<style>
   body {
      text-align: center;
        background-color:#012127;    
    }
    .btnc
    {
      float:right;    
    }
  textarea {
   	width: 104%;
    height:100%;
    resize:none;
    min-height: 250px;
    overflow: scroll;
        display: inline-block;
    background: #f4f4f9;
    outline: none;
    font-family: Courier, sans-serif;
    font-size: 14px;    
  }

 iframe {
 	width: 105%;
    height:100%;
      background:white;
   
 }
 #navop{
 	background-color: #012127 !important;
 	color:white !important;
 }

</style>
    <script type="text/javascript">
      $(document).ready(function(){
      	CompileCode();

   document.querySelector("#SAVE").addEventListener('click',()=>{
  		const filecode=document.querySelector("#InputCode").value;
  		const cid=new URLSearchParams(window.location.search).get('id');
             $.ajax({
                url:'updatepage.php',
                type:'post',
                data:{filecode:filecode,cid:cid},
                success:function(response){
	                  var result =  JSON.parse(response);
                    	if(result.result==1)
                    	{
                    		console.log("success");
                    	}	
                    	else
                    	{
                    		console.log("fail");
                    	}
                }
            });
      });
});
      // document.querySelector("#InputCode").addEventListener('keyup',()=>{
      //CompileCode();
   // });

   document.querySelector("#view").addEventListener('click',()=>{
  			CompileCode();
  			});
   function CompileCode()
   {
   	 var html = document.querySelector("#InputCode").value;
         var iframe=document.querySelector("#code");
      iframe.src = "data:text/html;charset=utf-8," + encodeURI(html);
   }

    function saveTextAsFile()
    {
    	var fileNameToSaveAs = "index.html"
    	var textToWrite =document.querySelector("#InputCode").value;
    	var textFileAsBlob = new Blob([textToWrite], {type:'text/plain'}); 
    	var downloadLink = document.createElement("a");
    	downloadLink.download = fileNameToSaveAs;
    	downloadLink.innerHTML = "Download File";
    	if (window.webkitURL != null)
    	{
    		// Chrome allows the link to be clicked
    		// without actually adding it to the DOM.
    		downloadLink.href = window.webkitURL.createObjectURL(textFileAsBlob);
    	}
    	else
    	{
    		// Firefox requires the link to be added to the DOM
    		// before it can be clicked.
    		downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
    		downloadLink.onclick = destroyClickedElement;
    		downloadLink.style.display = "none";
    		document.body.appendChild(downloadLink);
    	}
    
    	downloadLink.click();
    }

    </script>
  </body>
</html>