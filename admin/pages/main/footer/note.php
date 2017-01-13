

<base href="../../../">
 <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/jquery.nanoscroller/css/nanoscroller.css"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link type="text/css" href="assets/css/style.css" rel="stylesheet">  
    <?php include '../../../../getcontent.php'; ?>

<h1> Footer > Note</h1>
<br>
<br>
<h5>Note description here.... </h5>

<form method="post" target="_blank" action="function/preview.php">
<div class="col-sm-6">
	  <textarea class="form-control" name="content" style="margin: 0px -0.4px 0px 0px; max-width: 640px; height: 69px; max-height: 100px"><?php echo $footernote ?></textarea>
</div>
<br>
<br>
<br>
<br>
<br>
<br><input type="hidden" name="type" value="home">
<input type="hidden" name="content_id" value="7">
<button type="submit" class="btn btn-space btn-primary btn-rounded btn-sm" name="preview"><i class="icon icon-left s7-search"></i> Preview</button>
<button type="submit" class="btn btn-space btn-success btn-sm" name="save"><i class="icon icon-left s7-diskette"></i> Save</button>
</form>