
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.html">
    <title>Content Management | Apitong Village</title>
    <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/jquery.nanoscroller/css/nanoscroller.css"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link type="text/css" href="../admin/assets/css/style.css" rel="stylesheet">  
 </head>
 <body>
    <div class="am-wrapper">
      <nav class="navbar navbar-default navbar-fixed-top am-top-header">
        <div class="container-fluid">
          <div class="navbar-header">
            <div class="page-title"><span>Dashboard</span></div><a href="#" class="am-toggle-left-sidebar navbar-toggle collapsed"><span class="icon-bar"><span></span><span></span><span></span></span></a><a href="index-2.html" class="navbar-brand"></a>
          </div><a href="#" class="am-toggle-right-sidebar"><span class="icon s7-menu2"></span></a><a href="#" data-toggle="collapse" data-target="#am-navbar-collapse" class="am-toggle-top-header-menu collapsed"><span class="icon s7-angle-down"></span></a>
          <div id="am-navbar-collapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right am-user-nav">
              <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="<?php echo $_SESSION['APITONG_PHOTO']; ?>"><span class="user-name">Administrator</span><span class="angle-down s7-angle-down"></span></a>
                <ul role="menu" class="dropdown-menu">
                  <li><a href="#"> <span class="icon s7-user"></span>My profile</a></li>
                  <li><a href="#"> <span class="icon s7-config"></span>Settings</a></li>
                  <li><a href="#"> <span class="icon s7-help1"></span>Help</a></li>
                  <li><a href="index.php?logout"> <span class="icon s7-power"></span>Sign Out</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right am-icons-nav">
             </ul>
          </div>
        </div>
      </nav>
      <div class="am-left-sidebar">
        <div class="content">
          <div class="am-logo"></div>
          <ul class="sidebar-elements">
              <li class="parent"><a href="#"><i class="icon s7-users"></i><span>Admin Management</span></a>
              <ul class="sub-menu">
                  <li><a href="index.php#admin-crud" onclick="switchpage('admin-crud');">Add, Modify and Delete Admin</a>
                  </li>
                  <li><a href="index.php#admin-report" onclick="switchpage('admin-report');">Report Admin</a>
                  </li>
                  <li><a href="index.php#admin-logs" onclick="switchpage('admin-logs');">Logs</a>
                  </li>
                </ul>
            </li>
            <li class="parent"><a href="#"><i class="icon s7-add-user"></i><span>User Management</span></a>
              <ul class="sub-menu">
                <li><a href="index.php#user-crud" onclick="switchpage('user-crud');">Add, Modify and Block</a>
                </li>
                <li><a href="index.php#user-report" onclick="switchpage('user-report');">Report User</a>
                </li>
                <li><a href="index.php#user-logs" onclick="switchpage('user-logs');">Logs</a>
                </li>
              </ul>
            </li>
             <li class="parent"><a href="#"><i class="icon s7-monitor"></i><span>Main Page</span></a>
              <ul class="sub-menu">
                <li><a href="index.php#main-header-logo'" onclick="switchpage('main-header-logo'');">Header - Main Logo</a>
                </li>
                <li><a href="index.php#main-header-name" onclick="switchpage('main-header-name');">Header - Main Name</a>
                </li>
                <li><a href="index.php#main-header-tagline" onclick="switchpage('main-header-tagline');">Header - Tagline</a>
                </li>
                <li><a href="index.php#main-footer-contact" onclick="switchpage('main-footer-contact');">Footer - Contact</a>
                </li>
                <li><a href="index.php#main-footer-follow" onclick="switchpage('main-footer-follow');">Footer - Follow Us</a>
                </li>
                <li><a href="index.php#main-footer-note" onclick="switchpage('main-footer-note');">Footer - Note</a>
                </li>
                </ul>
            </li>
            <li class="parent"><a href="#"><i class="icon s7-home"></i><span>Home Page</span></a>
              <ul class="sub-menu">
                <li><a href="index.php#home-banner" onclick="switchpage('home-banner');">Main Banner</a>
                </li>
                <li><a href="#">Main Tagline</a>
                </li>
                <li><a href="#">House Affordable</a>
                </li>
                <li><a href="#">Featured Houses</a>
                </li>
                <li><a href="#">Developers</a>
                </li>
              </ul>
            </li>
            <li class="parent"><a href="#"><i class="icon s7-leaf"></i><span>About Page</span></a>
              <ul class="sub-menu">
                <li><a href="#">Main Description</a>
                </li>
                <li><a href="#">Main Banner</a>
                </li>
                <li><a href="#">About the logo - Banner</a>
                </li>
                <li><a href="#">About the logo - Description</a>
                </li>
                <li><a href="#">Softscape &amp; Landscape - Banner 1</a>
                </li>
                <li><a href="#">Softscape &amp; Landscape - Banner 2</a>
                </li>
                <li><a href="#">Softscape &amp; Landscape - Description</a>
                </li>
              </ul>
            </li>
            <li class="parent"><a href="#"><i class="icon s7-photo"></i><span>Gallery Page</span></a>
              <ul class="sub-menu">
                <li><a href="#">Add, Modify and Remove Photo</a>
                </li>
                <li><a href="#">Sidebar</a>
                </li>
                </li>
              </ul>
            </li>
            <li class="parent"><a href="#"><i class="icon s7-settings"></i><span>Settings</span></a>
               <ul class="sub-menu">
                <li><a href="#">Edit Profile</a>
                </li>
                <li><a href="#">Change Password</a>
                </li>
                <li><a href="#">Deactivate Account</a>
                </li>
              </ul>
            </li>
          </ul>
          <!--Sidebar bottom content-->
        </div>
      </div>