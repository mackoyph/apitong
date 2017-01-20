<?php 
		if (session_status() == PHP_SESSION_NONE) {
		    session_start();
		}

		if(!isset($_SESSION['APITONG_STATUS'])) header('location: index.php');




 ?>

<html>
<?php 
	$page_title = "Announcements";
	include_once('header.php'); ?>
<body>
<?php include 'getcontent.php'; ?>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.php"><img src="assets/images/black.png" width="250" alt="Progressus HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li><a href="index.php">Home</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="gallery.php">Gallery</a></li>
					<li><a href="interactivity2.swf" target="_blank">Home Tour</a></li>
					<li><a class="btn" href="signin.php">SIGN IN </a></li>
					<li><a class="btn" href="logout.php">LOGOUT</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">
		<?php 
			ini_set("allow_url_fopen", 1);
			$page = 1;
			if(isset($_GET['page']))
			{
				$page = $_GET['page'];
			}
			$article = file_get_contents('http://localhost/apitong/admin2/about/announcementserver/' . $page);
			$articles = json_decode($article, TRUE);
		?>

		<div class="row">
			<!-- Article main content -->
			<?php 
			foreach($articles as $row){
			echo "<article class='col-sm-8 maincontent'>";
				echo "<header class='page-header'>";
					echo "<h1 class='page-title'>".$row['title']."</h1>";
				echo "</header>";
				echo $row['creation_date'];
				echo "<p>";
				echo "<br>".$row['text']."</p></article><hr>";
			}?>
			<!-- /Article -->
			<div class='btn-group' role='group'>
				<?php
					if($page != 1)
					{
						echo "<a href='announcement.php?page=" . ($page - 1) . "' class='btn btn-default'>< Previous</a>";
					}
					echo "<a class='btn btn-default' href='announcement.php?page=". $page. "'>" . $page . "</a>";
					echo "<a class='btn btn-default' href='announcement.php?page=". ($page + 1) . "'>Next ></a>";
				?>
			</div>
			
			<!-- Sidebar -->
			<aside class="col-sm-4 sidebar sidebar-right">

				<center><p><img src="assets/images/tech.jpg" width="200" ></p><center>
				<h3>Welcome! Homeowner's name</h3>

			</aside>
			<!-- /Sidebar -->

		</div>
	</div>	<!-- /container -->
	

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

 
