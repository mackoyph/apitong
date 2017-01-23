<?php 
		$dbcon = mysqli_connect("localhost", "root", "") or die("SERVER IS NOT AVAILABLE~".mysql_error());
		mysqli_select_db($dbcon,"apitong") or die ("no data".mysql_error());

	$uname = $_POST['uname'];
	$pword = md5($_POST['upass']);

	$sql = "SELECT * FROM user_access WHERE (ACCESS_USERNAME = '".$uname."' AND ACCESS_PASSWORD = '".$pword."') ||  (ACCESS_EMAIL = '".$uname."' AND ACCESS_PASSWORD = '".$pword."')";
	$result = mysqli_query($dbcon,$sql);
	
	if(mysqli_num_rows($result) == 0) {
	
		header('location: signin.php?error=1');
	}
	else{
		$row = mysqli_fetch_array($result);
		date_default_timezone_set('Asia/Manila');
		if (session_status() == PHP_SESSION_NONE) {
		    session_start();
		}

		
		$_SESSION['APITONG_USERNAME'] = $row['ACCESS_USERNAME'];
		$_SESSION['APITONG_NO'] = $row['ACCESS_NO'];
		$_SESSION['APITONG_FNAME'] = $row['ACCESS_FIRSTNAME'];
		$_SESSION['APITONG_LNAME'] = $row['ACCESS_LASTNAME'];
		$_SESSION['APITONG_CODE'] = $row['ACCESS_CODE'];
		$_SESSION['APITONG_EMAIL'] = $row['ACCESS_EMAIL'];
		$_SESSION['APITONG_STATUS'] = "ACTIVE";

		$update = mysqli_query($dbcon, "UPDATE user_access SET ACCESS_STATUS = 1 WHERE ACCESS_NO = '".$row['ACCESS_NO']."'");
	     if($update){ 
	   
	     	header('location: announcement.php?success=1&page=1');
		  } 
		  else { 
		  	echo "not updated!  Error: " . $sql . " " . mysqli_error($dbcon) ."<br>";
		  }

	}

 ?>	