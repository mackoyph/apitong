<base href="../../../">
 <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/jquery.nanoscroller/css/nanoscroller.css"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link type="text/css" href="assets/css/style.css" rel="stylesheet">  
    <link rel="stylesheet" type="text/css" href="admin/assests/css/sweetalert2.min.css">
    <?php include '../../../../getcontent.php'; ?>

<h1> Header > Main Name</h1>
<br>
<br>
<h5>Main Name description here.... </h5>
<form method="post" target="_blank" id="save" action="function/preview.php">
<div class="col-sm-6">
	<input type="text" value="<?php echo $headermainname ?>" placeholder="Main Name" class="form-control" name="content">
</div>
<br>
<br><br>
<br>
<br>
<input type="hidden" name="type" value="home">
<input type="hidden" name="content_id" value="1">
<button type="submit" class="btn btn-space btn-primary btn-rounded btn-sm" name="preview"><i class="icon icon-left s7-search"></i> Preview</button>
<button type="submit" class="btn btn-space btn-success btn-sm" name="save"><i class="icon icon-left s7-diskette"></i> Save</button>
</form>
<script type="text/javascript" src="assets/js/jquery-2.1.1.js"> </script>
<script type="text/javascript" src="admin/assests/js/sweetalert2.min.js"> </script>

<script type="text/javascript">
	
	$( "#save" ).submit(function( event ) {
		swal("Saved!", "New content has been saved to the database!", "success")
		event.preventDefault();
		//$( "#save" ).submit();
		});
</script>