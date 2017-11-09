	<?php
	  session_start();
	
   if(!isset( $_SESSION['Email']))
	{
		header( "Location: admin.html" ) ;
		exit;
	}
	
	?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cathryn  Gruhns Art Gallery</title>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Adam Batten">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet">
   <link href="css/custom.css" rel="stylesheet">
   <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
   
   <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-61264219-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-61264219-2');
</script>

   
   <!-- check that JS is enabled or redirect-->
  <noscript>
  <META HTTP-EQUIV="Refresh" CONTENT="0;URL=ShowErrorPage.html">
</noscript>
  </head>
<body ng-app="adminGallery">
	
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     <h1 class="siteTitle"><a href="index.html" title="Cathryn Gruhn" >Cathryn  Gruhn</a> </h1> 
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
	   
		
      <ul class="nav navbar-nav">
        <li><a href="php/logout.php" id="logout" >logout</a></li>
      </ul>
    </div>
  </div>
</nav>


	
		
		
		
	<div class="container-fluid bg-3 text-center">
	<div class="row">
		 <div class="list-group-item">  
	  	<h1 class="section-header">ADMIN AREA</h1>  
	  	   
       <form action="#" method="POST" id="New-art-Form"  enctype="multipart/form-data">
       	 <div class="commErrors" class="form-group" >
     
     </div>
		      <div class="form-group row align">
		    <label for="inputFname" class="col-sm-12 form-control-label">Image Upload</label>
		    <div class="col-sm-12">
		    <input type="hidden" name="MAX_FILE_SIZE" value="600000" />
		    Choose an image to add to gallery: <input  type="file"  class="form-control"  name="ImageArt" id="ImageArt" />
		     <input  type="submit" class=" form-control submit btn btn-primary" id="submitArt" value="Add" >
		    
		    </div>
		    </div>
       </form>
       
         <h2 class="section-header">GALLERY</h2>  
        <p>You can change the Title and Description of your Artwork by simply entering the new information in the boxes provided and hit enter. </p>
	<div class="adminRow" ng-controller="adminCtrl">
		
			<div class="gallery" ng-repeat="x in admin">
				    
			<div class="art changefields">
					<button type="button" id="{{ x.ID }}"  ng-click="showDetail($event)" class="delArt form-control submit btn btn-primary" name="art" ><span class="glyphicon glyphicon-arrow-down"></span> Delete</button>
					   
		    <form  method="POST" action="#" >
                      
                               <table class="Art-Info">
	                               <thead><tr><th class="thead-inverse">Title</th></tr></thead>
                                  <tr value="Title"><td> <input type="Text" name="Title" class="update form-control" id="{{ x.ID }}" value="{{ x.Title }}"/></td><td class="message"></td></tr>
                                  
                                 <thead><tr><th class="thead-inverse">Description</th></tr></thead>
                                  
                                   <tr value="Description"><td> <input type="Text" name="Description" class="update form-control" id="{{ x.ID }}" value="{{ x.Description }}"/></td><td class="message"></td></tr>
                                  
                                   </table>
             
                                   </form>
			<figure class="popArt">
		    <img src="{{x.Source}}" alt="image" class="img-responsive" id="{{x.ID}}"/>
		 

		    
		    <figcaption>{{x.Title}} <small>{{x.Description}}</small></figcaption>
		  </figure>
		     </div>
	

		  
		  
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none;">
				  <symbol id="close" viewBox="0 0 18 18">
				    <path fill-rule="evenodd" clip-rule="evenodd" fill="black" d="M9,0.493C4.302,0.493,0.493,4.302,0.493,9S4.302,17.507,9,17.507
							S17.507,13.698,17.507,9S13.698,0.493,9,0.493z M12.491,11.491c0.292,0.296,0.292,0.773,0,1.068c-0.293,0.295-0.767,0.295-1.059,0
							l-2.435-2.457L6.564,12.56c-0.292,0.295-0.766,0.295-1.058,0c-0.292-0.295-0.292-0.772,0-1.068L7.94,9.035L5.435,6.507
							c-0.292-0.295-0.292-0.773,0-1.068c0.293-0.295,0.766-0.295,1.059,0l2.504,2.528l2.505-2.528c0.292-0.295,0.767-0.295,1.059,0
							s0.292,0.773,0,1.068l-2.505,2.528L12.491,11.491z"/>
				  </symbol>
				</svg>
			</div>

</div>
</div>
	</div>
</div>

<footer class="container-fluid text-center">
	<p>Copyright © All Rights Reserved.</p>
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
    
    $close = $('<div class="close"><svg><use xlink:href="#close"></use></svg></div>').appendTo($fig);

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
<script src="js/admin-scripts.js"></script>
<script src="js/upload.js"></script>
<script src="js/custom.js"></script>
<script src="js/account.js"></script>
</body></html>