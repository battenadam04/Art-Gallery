<?php
    session_start();
    
   if(isset($_SESSION['Email']))
    {
        header( "Location: admin-area.php" );
        exit;
    }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cathryn Gruhns Art Gallery</title>
	<meta charset="utf-8">
	<meta content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta content="Adam Batten" name="author">
	<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<link href="img/favicon.ico" rel="icon" type="image/x-icon">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	</script>
	<link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet"><!-- Global site tag (gtag.js) - Google Analytics -->

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-61264219-2"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script>
	 window.dataLayer = window.dataLayer || [];
	 function gtag(){dataLayer.push(arguments);}
	 gtag('js', new Date());

	 gtag('config', 'UA-61264219-2');
	</script><!-- check that JS is enabled or redirect-->
	 <noscript>
	<meta content="0;URL=ShowErrorPage.html" http-equiv="Refresh"></noscript>
</head>
<body>
	
	<nav class="navbar navbar-inverse adminNav">
		<div class="container-fluid">
			<div class="navbar-header">
				<button class="navbar-toggle" data-target="#myNavbar" data-toggle="collapse" type="button"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
				<h1 class="siteTitle"><a href="index.html" title="Cathryn Gruhn">Cathryn Gruhn <span class="H2span">Art Gallery</span></a></h1>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li>
						<a href="index.html" title="Home">Home</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid bg-3 text-center">
		<div class="list-group-item">
			
			<form action="#" class="login form" enctype="multipart/form-data" id="logIn" method="post" name="logIn">
				<h2 class="section-header">Admin login</h2>
				<div class="form-group row">
					<label class="col-sm-2 form-control-label" for="inputFname">Email</label>
					<div class="col-sm-10">
						<input class="form-control" id="Email" name="Email" placeholder="Email" type="text">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 form-control-label" for="inputFname">Password</label>
					<div class="col-sm-10">
						<input class="form-control" id="Password" name="Password" placeholder="Password" type="password">
					</div>
				</div><input class="form-control submit btn btn-primary" id="login-Ex" type="submit" value="Go">
			</form><a href="#" id="PassForget" title="forgotten your password">Forgotten my password</a> <!-- the hidden div is to allow user to click anywhere on screen and hide the messagepop div below -->
			<div class="hiddendiv">
				<p>hidden div</p>
			</div><!-- close the hiddendiv div -->
			<div class="messagepop">
				<div class="arrow-up"></div>
				<form action="#" enctype="multipart/form-data" id="forgot-pass" method="post" name="forgot-pass">
					<p><label for="email">Your email</label> <input id="Emailcheck" name="Email" size="30" type="text"></p>
					<p><a class="btn submit btn-primary" href="#" title="Cancel" id="message_cancel">Cancel</a> or <input class="btn submit btn-primary" id="message_submit" name="commit" type="submit" value="Send Message"></p>
					<p class="msg"></p>
				</form>
			</div><!--close the messagepop div-->
		</div>
	</div>
	<footer class="container-fluid text-center">
		<p>Copyright &#9400; All Rights Reserved - Cathryn Gruhn.</p>
		<p>Created and Developed by Adam Batten</p>
	</footer>
	<script src="js/login.js">
	</script> 
	<script src="js/custom.js">
	</script>
</body>
</html>