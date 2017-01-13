<?php 


	if(isset($_POST['save'])){
		include 'config.php';
		if(isset($_POST['content'])){
			$sql = "UPDATE contents SET content = '".$_POST['content']."' WHERE content_id = ".$_POST['content_id']." ";
			$update = mysqli_query($dbcon,$sql);
		}
		if(isset($_POST['content2'])){
			$sql = "UPDATE contents SET content = '".$_POST['content2']."' WHERE content_id = ".$_POST['content_id2']." ";
			$update = mysqli_query($dbcon,$sql);
		}
		if(isset($_POST['content3'])){
			$sql = "UPDATE contents SET content = '".$_POST['content3']."' WHERE content_id = ".$_POST['content_id3']." ";
			$update = mysqli_query($dbcon,$sql);
		}

		echo "<script>window.close();</script>";
	}

	if(isset($_POST['preview'])){
		if($_POST['type'] == "home"){
			include '../pages/preview_home.php';
		}

	}
	

 ?>