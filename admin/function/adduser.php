<?php
	include 'config.php';

	date_default_timezone_set('Asia/Manila');
	$date = date('m-d-Y H:i:s', time());
	$email = $_POST['email'];
	$userName = $_POST['userName'];
	$password = md5($_POST['password']);
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];
	

	$sql = "SELECT * FROM user_access WHERE ACCESS_USERNAME = '".$userName."' AND ACCESS_EMAIL = '".$email."'";
	$result = mysqli_query($dbcon,$sql);

	if(mysqli_num_rows($result) == 0) {
		$uniqui = uniqid();
	$filename = $_FILES['image']['name'];
	 if(!file_exists("../img/profile/" .$uniqui. $filename)){
 			 move_uploaded_file($_FILES["image"]["tmp_name"],"../img/profile/" .$uniqui. $filename);			 
	 }

	 $filename = "img/profile/" . $uniqui. $filename;
	$add = mysqli_query($dbcon, "INSERT INTO user_access(ACCESS_FIRSTNAME, ACCESS_LASTNAME, ACCESS_USERNAME, ACCESS_PASSWORD, ACCESS_EMAIL, ACCESS_PHOTO, ACCESS_CONTACT,ACCESS_ADDRESS) 
  				 	VALUES('".$name."','".$surname."','".$userName."','".$password."','".$email."','".$filename."','".$contact."','".$address."')");

	 if($add){ 
			 header('location: ../pages/user/crud.php');
	 } else { 
		  	echo "not added!  Error: " . $add . " " . mysqli_error($dbcon) ."<br>";
		  }

    }
?>