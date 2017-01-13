<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Apitong Village - Meycauayan City Bulacan</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<?php include 'getcontent.php'; ?>
<body class="home">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for xest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.php"><img src="assets/images/black.png" width="250" alt="Progressus HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="gallery.php">Gallery</a></li>
					<li><a href="interactivity2.swf" target="_blank">Home Tour</a></li>
					<li><a class="btn" href="signin.php">SIGN IN </a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<!-- Header -->
	<header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead"><?php echo $headermainname; ?></h1>
				<p class="tagline"><?php echo $headertagline; ?></a></p>
				<p><a href="about.php"class="btn btn-default btn-lg" role="button">MORE INFO</a> <a href="interactivity2.swf" class="btn btn-action btn-lg" target="_blank" role="button">HOME TOUR</a></p>  
			</div>
		</div>
	</header>
	<!-- /Header -->

	<!-- Intro -->
	<br>
<meta name="viewport" content="width=device-width, initial-scale=1">

<center>


<div class="w3-content w3-section" style="max-width:900px">

  <img class="mySlides" src='assets/images/int1.jpg' style="width:100%">
  <img class="mySlides" src='assets/images/int2.jpg' style="width:100%">
  <img class="mySlides" src='assets/images/int3.jpg' style="width:100%">

  </div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>

</center>
	
	
	<div class="container text-center">
		<br> <br>
		<h2 class="thin">Live at the heart of Meycauayan City. </h2>
		<p class="text-muted">
			Apitong Court Residences is conveniently located near schools, 
			transport terminals, commercial establishments, place of worship,
			industrial parks and government offices.
		</p>
	</div>
	<!-- /Intro-->
		
	<!-- Highlights - jumbotron -->
	<div class="jumbotron top-space">
		<div class="container">
			
			<h3 class="text-center thin">Why Apitong is Your Most Sensible Choice?</h3>
			
			<div class="row">
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-cogs fa-5"></i>SECURITY</h4></div>
					<div class="h-body text-center">
						<p>Apitong guarantees its homeowners' safety with exquisitely designed guarded entrance gates equipped with CCTV, as well as high perimeter fences, and round-the-clock roving security guards.  These security features allow families to feel safe in their own homes – as should always be the case – and enjoy worry-free lives every single day, making their homes and community safe havens and comfortable escapes from the stresses and fears of city living.</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-flash fa-5"></i>INTERIOR AND EXTERIOR DESIGN</h4></div>
					<div class="h-body text-center">
						<p>Apitong Village is designed by an excellent and reputable developer, each house is set in a breathtaking tropical modern aesthetic that provides optimal natural ventilation, light, and shade designed by Architect Dan Rainier Calingo.
A well-lit and designed guardhouse and front entrance, complements an organically formed lustrous landscape that capitalizes on the uniqueness of a tropical plants. 
	</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-heart fa-5"></i>LOCATED NEAR</h4></div>
					<div class="h-body text-center">
						<p>Apitong Village is strategically situated near schools, hospitals and medical centers, places of worship, shopping malls and leisure centers, government institutions, transportation hubs and main access roads. A proof that we value your family’s health, future and bond. Because we believe that a village starts with a family.</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-smile-o fa-5"></i>AFFORDABILITY & VALUE FOR MONEY</h4></div>
					<div class="h-body text-center">
						<p>Apitong Village situated at the very heart of Sto. Nino, Meycauayan, Bulacan, aims to provide value to your hard earned money. We promise to give you more than what you are paying for, the quality of the materials to be used in building your home, the community 
						that surrounds the village, and our heartfelt commitment in making sure that you get a home, not just a house.</div>
				</div>
			</div> <!-- /row  -->
		
		</div>
	</div>
	<!-- /Highlights -->

	<!-- container -->
	<div class="container">

		

</div>	<!-- /container -->
	

	<section id="social">
		<div class="container">
			<div class="wrapper clearfix">
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_button_linkedin_counter"></a>
				<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
				</div>
				<!-- AddThis Button END -->
			</div>
		</div>
	</section>
	<!-- /social links -->


	<footer id="footer" class="top-space">

		<div class="footer1">
			<div class="container">
				<div class="row">
					
					<div class="col-md-3 widget">
						<h3 class="widget-title">Contact</h3>
						<div class="widget-body">
							<p><?php echo $footercontactnumber ?><br>
								<a href="mailto:#"><?php echo $footercontactemail ?></a><br>
								<br>
								<?php echo $footercontactaddress ?>
							</p>	
						</div>
					</div>

					<div class="col-md-3 widget">
						<h3 class="widget-title">Follow us</h3>
						<div class="widget-body">
							<p class="follow-me-icons">
								<a href="<?php echo $footertwitter ?>"><i class="fa fa-twitter fa-2"></i></a>
								<a href="<?php echo $footerfacebook ?>"><i class="fa fa-facebook fa-2"></i></a>
							</p>	
						</div>
					</div>

					<div class="col-md-6 widget">
						<h3 class="widget-title">Beautiful, quality homes at an affordable price</h3>
						<div class="widget-body">
							<p><?php echo $footernote ?></p>
							
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">
					
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								APITONG COURT RESIDENCE
								
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2016, Apitong Court.</a> 
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

	</footer>	
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>