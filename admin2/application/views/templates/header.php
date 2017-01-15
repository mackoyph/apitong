<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Apitong Village Admin</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('assets/font_awesome/css/font-awesome.min.css');?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/ionicons/ionicons.min.css');?>">

	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css');?>">
	
	<!-- AdminLTE Skins. We have chosen the skin-blue for this starter
		page. However, you can choose any other skin. Make sure you
		apply the skin class to the body tag so the changes take effect.
	-->
	<link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/skin-blue.min.css');?>">

	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/select2.min.css');?>">

	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/datepicker/datepicker3.css');?>">

	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css');?>">
	
	<!-- jQuery 2.2.3 -->
	<script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js');?>"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="hold-transition skin-blue fixed">
<div class="wrapper">

	<!-- Main Header -->
	<header class="main-header">

	<!-- Logo -->
	<a href="<?php echo base_url('home');?>" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>AV</b>Admin</span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><b>Apitong</b>Village Admin</span>
	</a>

	<!-- Header Navbar -->
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
		<span class="sr-only">Toggle navigation</span>
		</a>
		<!-- Navbar Right Menu -->
		<div class="navbar-custom-menu">
		<ul class="nav navbar-nav">
			<!-- User Account Menu -->
			<li class="dropdown user user-menu">
			<!-- Menu Toggle Button -->
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<!-- The user image in the navbar-->
				<img src="<?php echo base_url('assets/dist/img/avatar5.png');?>" class="user-image" alt="User Image">
				<!-- hidden-xs hides the username on small devices so only the image appears. -->
				<span class="hidden-xs"><?php echo $username;?></span>
			</a>
			<ul class="dropdown-menu">
				<!-- The user image in the menu -->
				<li class="user-header">
				<img src="<?php echo base_url('assets/dist/img/avatar5.png');?>" class="img-circle" alt="User Image">
				</li>
				<!-- Menu Footer-->
				<li class="user-footer">
				<div class="pull-left">
					<a href="#" class="btn btn-default btn-flat">Profile</a>
				</div>
				<div class="pull-right">
					<a href="<?php echo base_url('home/logout');?>" class="btn btn-default btn-flat">Sign out</a>
				</div>
				</li>
			</ul>
			</li>
			<!-- Control Sidebar Toggle Button -->
			<li>
			<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
			</li>
		</ul>
		</div>
	</nav>
	</header>
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">

	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">

		<!-- Sidebar user panel (optional) -->
		<div class="user-panel">
		<div class="pull-left image">
			<img src="<?php echo base_url('assets/dist/img/avatar5.png');?>" class="img-circle" alt="User Image">
		</div>
		<div class="pull-left info">
			<p><?php echo $username; ?></p>
			<!-- Status -->
			<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		</div>
		</div>

		<!-- search form (Optional) -->
		<form action="#" method="get" class="sidebar-form">
		<div class="input-group">
			<input type="text" name="q" class="form-control" placeholder="Search...">
				<span class="input-group-btn">
				<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
				</button>
				</span>
		</div>
		</form>
		<!-- /.search form -->

		<!-- Sidebar Menu -->
		<ul class="sidebar-menu">
		<li class="header">MENU</li>
		<!-- Optionally, you can add icons to the links -->
		<li id='home'><a href="<?php echo base_url('home');?>"><i class="fa fa-dashboard"></i> <span>Admin Home</span></a></li>
		<li id='admin-mgmt' class='treeview'>		
			<a href="<?php echo base_url('admin_management');?>"><i class="fa fa-users"></i><span>User Management</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class='treeview-menu'>
				<li><a href="<?php echo base_url('admin_management/crud');?>"><i class='fa fa-circle-o'></i>Add, Modify, Delete Users</a></li>
			</ul>
		</li>
		<li id='main-page'><a href="<?php echo base_url('main_page');?>"><i class="fa fa-desktop"></i> <span>Main Page</span></a></li>
		<li id='home-page'><a href="<?php echo base_url('home_page');?>"><i class="fa fa-home"></i> <span>Home Page</span></a></li>
		<li id='about-page'><a href="<?php echo base_url('About');?>"><i class="fa fa-question-circle"></i> <span>About</span></a></li>
		<li id='home'><a href="<?php echo base_url('main_page');?>"><i class="fa fa-picture-o"></i> <span>Gallery</span></a></li>
		<li id='home'><a href="<?php echo base_url('main_page');?>"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
		</ul>
		<!-- /.sidebar-menu -->
	</section>
	<!-- /.sidebar -->
	</aside>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">