<?php
      session_start();
    
      if(!isset( $_SESSION['Email']))
     {
        header( "Location: admin.php" ) ;
        exit;
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cathryn Gruhns Art Gallery</title>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
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
	<link href="css/custom.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js">
	</script>
 


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
<body ng-app="adminGallery" ng-controller="MyCtrl">
	
	<nav class="navbar navbar-inverse adminNav">
		<div class="container-fluid">
			<div class="navbar-header">
				<button class="navbar-toggle" data-target="#myNavbar" data-toggle="collapse" type="button"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
				<h1 class="siteTitle"><a href="index.html" title="Cathryn Gruhn">Cathryn Gruhn <span class="H2span">Art Gallery</span></a></h1>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li>
						<a href="#Admin-home" title="Home" id="Home-admin">Home</a>
					</li>
					<li>
						<a href="#Admin-about" title="About" id="About-admin">About Page</a>
					</li>
					<li>
						<a href="#Admin-art" title="Art Gallery" id="Art-admin">Art Gallery</a>
					</li>
					<li>
						<a href="php/logout.php" title="Logout" id="logout">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid bg-3 text-center" ng-controller="adminCtrl" id="Admin-home">
		<div class="list-group-item">
			<h1 class="section-header fixTop" >ADMIN AREA</h1><!-- <div class="form-group row align">-->
			
			
			<table class="col2table admintable">
				<tr>
					<td>
						<h3>Change Password</h3>
						<form action="#" class="form-control-other" id="changePass" method="post">
							<p><input class="form-control" name="oldPass" placeholder="Old password" type="text"></p>
							<p><input class="form-control" name="newPass" placeholder="New password" type="text"></p>
							<p><input class=" form-control submit btn btn-primary updateBtn" type="submit" value="update" id="submitPass"></p>
							
						</form>
					</td>
					<td>
						
						<h3 class="NewImage">New Artwork</h3>
						<form action="#" class="form-control-other" enctype="multipart/form-data" id="New-art-Form" method="post">
							<p><input class="form-control" name="MAX_FILE_SIZE" type="hidden" value=""> Choose an image to add to gallery: <input class="form-control ImageUpload" id="ImageArt" name="ImageArt" type="file"></p><button class=" form-control submit btn btn-primary" id="submitArt" type="button" ng-click="showImg($event)">update</button>
						</form>
					</td>
				</tr>
			</table>
			
			<h2 id="Admin-about">About page</h2>
			
			<table class="col2table admintable">
						
				<tr><td><h3>Change Profile Content</h3>
						<form action="#" class="form-control-other" id="changeBio" method="post">
							<p><textarea rows="4" cols="50" class="form-control" name="newBio" ></textarea></p>
							<p><input class=" form-control submit btn btn-primary updateBtn" type="submit" value="update" id="submitBio"></p>
						</form></td></tr></table>

							
							
				<table class="col2table admintable"  id="Tablecrop">	
					<form name="myForm" id="newImgform">	
          	 <tr><td><h3>Crop Image and Upload</h3></td></tr>
          <tr><td>Want to start over? &rarr; <a ng-click="reset($this); picFile = null" class="reset">Reset</a>
       
        <button ngf-select="validate($this)" ng-model="picFile" accept="image/*" id="Fileupload">
            Select Picture</button></td></tr>
            
         <tr><td><div ngf-drop ng-model="picFile" ngf-pattern="image/*"
             class="cropArea submit btn btn-primary" id="ImgCrop">
            <img-crop image="picFile  | ngfDataUrl"                 
            result-image="croppedDataUrl" ng-init="croppedDataUrl=''">
            </img-crop>
        </div>
        </td></tr>

        
        <tr><td><div id="newImg">
            <img ng-src="{{croppedDataUrl}}" />
        </div><button ng-click="upload(croppedDataUrl); picFile = null" class=" submit btn btn-primary" id="updatetxt"><div id="divData">upload</div></button> 
        </td></tr>
        </form> 
			</table>
			
			
			
			<h2 class="section-header" id="Admin-art">ART GALLERY</h2>
			<p>You can change the Title and Description of your Artwork by simply entering the new information in the boxes provided and hit enter.</p>
			<div class="adminRow">
				<div class="gallery">
					<div class="art changefields" ng-repeat="x in admin">
						<button class="delArt form-control submit btn btn-primary" name="{{x.Source}}" id="{{ x.ID }}" ng-click=" showDetail($event)" name="art" type="button"><span class="glyphicon glyphicon-arrow-down"></span> Delete</button>
						<form action="#" method="post">
							<table class="Art-Info">
								<thead>
									<tr>
										<th class="thead-inverse">Title</th>
									</tr>
								</thead>
								<tr>
									<td><input class="update form-control" id="{{ x.ID }}" name="Title" type="text" value="{{ x.Title }}"></td>
									<td class="message"></td>
								</tr>
								<thead>
									<tr>
										<th class="thead-inverse">Description</th>
									</tr>
								</thead>
								<tr>
									<td><input class="update form-control" id="{{ x.ID }}" name="Description" type="text" value="{{ x.Description }}"></td>
									<td class="message"></td>
								</tr>
							</table>
						</form>
						<figure class="popArt">
							<img alt="image" class="img-responsive" id="{{x.ID}}" src="{{x.Source}}">
							<figcaption>
								{{x.Title}} <small>{{x.Description}}</small>
							</figcaption>
						</figure>
					</div><svg style="display:none;" xmlns="http://www.w3.org/2000/svg">
					<symbol id="close" viewbox="0 0 18 18">
						<path clip-rule="evenodd" d="M9,0.493C4.302,0.493,0.493,4.302,0.493,9S4.302,17.507,9,17.507 S17.507,13.698,17.507,9S13.698,0.493,9,0.493z M12.491,11.491c0.292,0.296,0.292,0.773,0,1.068c-0.293,0.295-0.767,0.295-1.059,0 l-2.435-2.457L6.564,12.56c-0.292,0.295-0.766,0.295-1.058,0c-0.292-0.295-0.292-0.772,0-1.068L7.94,9.035L5.435,6.507 c-0.292-0.295-0.292-0.773,0-1.068c0.293-0.295,0.766-0.295,1.059,0l2.504,2.528l2.505-2.528c0.292-0.295,0.767-0.295,1.059,0 s0.292,0.773,0,1.068l-2.505,2.528L12.491,11.491z" fill="black" fill-rule="evenodd"></path>
					</symbol></svg>
				</div><!-- close the gallery class -->
			</div><!-- close the adminRow class -->
		</div><!-- close the list-group-item class -->
	</div><!-- close the container-fluid class -->
	
	<footer class="container-fluid text-center">
		<p>Copyright &#9400; All Rights Reserved - Cathryn Gruhn.</p>
		<p>Created and Developed by Adam Batten</p>
	</footer>
	<script>
	      
	      popup = {
	    init: function(){
	      $(document).on("click",".popArt", function(){
	      
	        popup.open($(this));
	      });
	      
	      $(document).on('click', '.popup img', function(){
	      
	        return false;
	      }).on('click', '.popup', function(){
	        popup.close();
	      })
	    },
	    open: function($figure) {
	      $('.gallery').addClass('pop');
	      $(".gallery button").hide();
	      $(".gallery form").hide();
	      $popup = $('<div class="popup" />').appendTo($('body'));
	      $fig = $figure.clone().appendTo($('.popup'));
	      $bg = $('<div class="bg" />').appendTo($('.popup'));
	      
	      $close = $('<div class="close"><svg><use xlink:href="#close"><\/use><\/svg><\/div>').appendTo($fig);

	      $shadow = $('<div class="shadow" />').appendTo($fig);
	      src = $('img', $fig).attr('src');
	      $shadow.css({backgroundImage: 'url(' + src + ')'});
	      $bg.css({backgroundImage: 'url(' + src + ')'});
	      setTimeout(function(){
	        $('.popup').addClass('pop');
	      }, 10);
	    },
	    close: function(){
	      $('.gallery, .popup').removeClass('pop');
	      $(".gallery button").show();
	      $(".gallery form").show();
	      setTimeout(function(){
	        $('.popup').remove();
	      }, 100);
	    }
	   }



	   popup.init();



	</script> 

    <script src="js/ng-file-upload-shim.js">
	</script> 
	 <script src="js/ng-file-upload.js">
	</script> 
    <script src="js/ng-img-crop.js">
	</script> 
	<script src="js/custom.js">
	</script> 
	<script src="js/account.js">
	</script> 
	<script src="js/admin-scripts.js">
    </script>

</body>
</html>