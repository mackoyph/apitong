<?php 

	$dbcon = mysqli_connect("localhost", "root", "") or die("SERVER IS NOT AVAILABLE~".mysql_error());
    mysqli_select_db($dbcon,"apitong") or die ("no data".mysql_error());

    $sql = "SELECT * FROM contents";
	$result = mysqli_query($dbcon,$sql);

	if(mysqli_num_rows($result) != 0) {
		while($row = mysqli_fetch_array($result)){
			switch ($row[0]) {
				case 1:
					$headermainname = $row[2];
					break;
				case 2:
					$headertagline = $row[2];
					break;
				case 3:
					$footercontactnumber = $row[2];
					break;
				case 4:
					$footertwitter = $row[2];
					break;
				case 5:
					$footerfacebook = $row[2];
					break;
				case 7:
					$footernote = $row[2];
					break;
				case 8:
					$footercontactemail = $row[2];
					break;
				case 9:
					$footercontactaddress = $row[2];
					break;
				case 10:
					# code...
					break;
				case 11:
					# code...
					break;
				case 12:
					# code...
					break;
				case 13:
					# code...
					break;
				case 14:
					# code...
					break;
				case 15:
					# code...
					break;
				case 16:
					# code...
					break;
				case 17:
					# code...
					break;
			}
		}

	}


 ?>