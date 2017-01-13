<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 

if (isset($_GET["logout"])) {
        include 'function/config.php';
        mysqli_query($dbcon, "UPDATE user_access SET ACCESS_STATUS = 0 WHERE ACCESS_NO = '".$_SESSION['APITONG_NO']."'");
		$_SESSION = array();
        session_destroy();
        header('location: index.php');
}
else{
	if(isset($_SESSION['APITONG_STATUS'])){
	   include('views/_logged-in.php');
	}
	else{
	  include('views/_not-logged-in.php');  
	}
}
?>