<!DOCTYPE html>
<html lang="en">
<?php 
	$page_title = "About";
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
					<li class="active"><a href="about.php">About</a></li>
					<li><a href="gallery.php">Gallery</a></li>
					<li><a href="interactivity2.swf" target="_blank">Home Tour</a></li>
					<li><a class="btn" href="signin.php">SIGN IN </a></li>
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
			$article = file_get_contents('http://localhost/apitong/admin2/about/articleserver/' . $_GET['articleid']);
			$article = json_decode($article, TRUE);
			$category_name = "About";
			if(isset($_GET['category']))
			{
				$category_name = $_GET['category'];
			}
			//echo "ARTICLE=<br/>" . var_export($article, TRUE) . "<br/>";
		?>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-sm-8 maincontent">
				<header class='page-header'>
					<h1 class='page-title'><?php echo $category_name . " -> " . $article['title'] ?> </h1>
				</header>
				
				
				<?php echo $article['text'];?>
				
			</article>
			<!-- /Article -->
			
			<!-- Sidebar -->
			<aside class="col-sm-4 sidebar sidebar-right">

				<div class="widget">
					<?php
					$categories = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/AboutPageCategories');
					$categories = json_decode($categories, TRUE);
					//echo "about page categories= <br/>" . var_export($categories, TRUE);
					foreach($categories as $row)
					{
						//echo "ROW = <br/>" . var_export($row, TRUE) . "<br/>";
						echo "<h4>" . $row['name'] . "</h4>";
						echo "<ul class='list-unstyled list-spaces'>";
						foreach($row['articles'] as $item)
						{
							echo "<li><a href='aboutpage.php?articleid=" . $item['article_id'] . "&category=" . $row['name'] . "'>" . $item['title'] . "</a></li>";
						}
						echo "</ul>";
					}
					?>
					<!--
					<h4>Kinds of Houses</h4>
					<ul class="list-unstyled list-spaces">
						<li><a href="assets/images/single.jpg"" target="_blank">Economic House</a><br><span class="small text-muted"></span></li>
						<li><a href="">Wala pang name House</a><br><span class="small text-muted"></span></li>
						<h4>Customized</h4>
						<li><a href="">With balcony</a><br><span class="small text-muted"></span></li>
						<li><a href="">With dirty kitchen</a><br><span class="small text-muted"></span></li>
						
					</ul>
					-->
				</div>

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
</body>
</html>