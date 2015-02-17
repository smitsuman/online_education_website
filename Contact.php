<?php
error_reporting(E_ALL); ini_set('display_errors', 'On'); 
//if(isset($_POST['Submit']))
if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == "POST")  
{
    
$to = 'anindyasudhir@gmail.com';
$fromEmail = $_POST['fieldFormEmail']; 
$fromName = $_POST['fieldFormName']; 
$subject = $_POST['fieldSubject']; 
$message = $_POST['phone']."\n\n".$_POST['message'];
			 
/* GET File Variables */ 
$tmpName = $_FILES['attachment']['tmp_name']; 
$fileType = $_FILES['attachment']['type']; 
$fileName = $_FILES['attachment']['name']; 

/* Start of headers */ 
$headers = "From: $fromEmail"."\r\n"."Reply-To: $fromEmail"; 

 
/* Reading file ('rb' = read binary)  */
if ($tmpName !='' && file($tmpName)) {
$file = fopen($tmpName,'rb'); 
$data = fread($file,filesize($tmpName)); 
fclose($file); 
			 
/* a boundary string */
$randomVal = md5(time()); 
$mimeBoundary = "==Multipart_Boundary_x{$randomVal}x"; 
			 
/* Header for File Attachment */
$headers .= "\nMIME-Version: 1.0\n"; 
$headers .= "Content-Type: multipart/mixed;\n" ;
$headers .= " boundary=\"{$mimeBoundary}\""; 
			 
/* Multipart Boundary above message */
$message = "This is a multi-part message in MIME format.\n\n" . 
"--{$mimeBoundary}\n" . 
"Content-Type: text/plain; charset=\"iso-8859-1\"\n" . 
"Content-Transfer-Encoding: 7bit\n\n" . 
$message . "\n\n"; 
			 
/* Encoding file data */
$data = chunk_split(base64_encode($data)); 
			 
/* Adding attchment-file to message*/
$message .= "--{$mimeBoundary}\n" . 
"Content-Type: {$fileType};\n" . 
" name=\"{$fileName}\"\n" . 
"Content-Transfer-Encoding: base64\n\n" . 
$data . "\n\n" . 
"--{$mimeBoundary}--\n"; 
} 

$flgchk = mail ("$to", "$subject", "$message", "$headers"); 

if($flgchk){
  header('Location: Thankyou.php');
}
else
{
	header('Location: 404.php');
}
}
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta content="Contact Codistan" name="description"/>

		<link rel="stylesheet" href="css/bootstrap.min.css">  
		<link rel="stylesheet" href="style.css">    

		<title>CONTACT | Codistan</title>
	</head>

	<body>

				<header class="container">
  
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">

				  <div class="container">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="index.php"><img src="logo.png"></a>
				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
				      <ul class="nav navbar-nav ">
				      <li class="active"><a href="index.php">HOME</a></li>
				        <li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown">ABOUT<span class="caret"></span></a>
				          <ul class="dropdown-menu" role="menu">
				            <li><a href="ABOUT.php">ABOUT US</a></li>

				            <li class="divider"></li>

				              <li><a href="Career.php">CAREERS</a></li>
				            <li><a href="Partners.php">PARTNERS</a></li>

				            <li class="divider"></li>

				            <li><a href="Contact.php">CONTACT</a></li>
				          </ul>
				        </li>

					        <li>
					        <a href="Product.php">SOLUTIONS</a>
					         </li>
				        
				       				   
					   <!--form class="navbar-form pull-left">
				<input type="text" class="form-control" placeholder="Search this site..." id="searchInput">
				<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
			</form-->
  </ul>
				    </div><!-- /.navbar-collapse -->
				  </div><!-- /.container -->
				</nav>
	</header>

  
					


	<div id="map_canvas"></div>

	<br>

		<article>

		<div class="container ">

			<form id="contact_form" action= "" method="POST" autocomplete="off" name="mainform" enctype="multipart/form-data">
			<fieldset>

			<!-- Form Name -->
			<legend><h2>Contact Us</h2></legend>

			<!-- NAME-->
			<div class="form-group">
			  <!--label class=" control-label" id="msg" for="textinput"><?php echo $msg; ?></label-->  
			  <input id="textinput" name="fieldFormName" type="text" placeholder="Name" class="form-control input-md" autofocus >
			    
			</div>

			<!-- SUBJECT-->
			<div class="form-group">
			  <label class=" control-label" for="textinput"></label>  
			  <input id="textinput" name="fieldSubject" type="text" placeholder="Subject" class="form-control input-md" >
			    
			</div>

			<!-- E_MAIL-->
			<div class="form-group">
			  <label class=" control-label" for="textinput"></label>  
			  <input id="textinput" name="fieldFormEmail" type="email" placeholder="E-Mail" class="form-control input-md" >
			    
			</div>

			<!-- Mobile Number-->
			<div class="form-group">
			  <label class=" control-label" for="textinput"></label>  
			  <input id="textinput" name="phone" type="tel" pattern=".{10,10}" maxlength="10"  title="10 to 10 characters" placeholder="Contact Number" class="form-control input-md">
			    
			</div>

			<!-- MESSAGE -->
			<div class="form-group">
			  <label class=" control-label" for="textinput"></label>
			    <textarea class="form-control" id="textinput" name="message" placeholder="MESSAGE" ></textarea>
			</div>

			<!-- File Button --> 
			<div class="form-group">
			  <label class=" control-label" for="filebutton"></label>
			    <input id="filebutton" name="attachment" class="input-file" type="file">
			</div>

			<!-- Button -->
			<div class="form-group">
			  <label class=" control-label" for="singlebutton"></label>
			    <button id="submitbutton" type="submit" name="Submit" value="Send" class="btn btn-primary" formtarget="_self">Submit</button>
			    <button id="resetbutton" type="reset" name="Reset" value="Reset" class="btn btn-default">Reset</button>
			</div>

			</fieldset>
			</form>
			</div>
			</article>

			<div style="height:100px"></div>

			<?php include('includes/footer.php'); ?>


	</body>

	<script src="https://maps.googleapis.com/maps/api/js"></script>
	<script src="js/maps.js"></script>

	<script src="jquery-1.11.1.min.js"></script>

	<script src="js/bootstrap.js"></script>
	<script src="jquery.js"></script>
</html>

