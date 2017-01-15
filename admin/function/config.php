<?PHP
		$dbcon = mysqli_connect("localhost", "root", "walalang") or die("SERVER IS NOT AVAILABLE~".mysql_error());
		mysqli_select_db($dbcon,"apitong") or die ("no data".mysql_error());
?>