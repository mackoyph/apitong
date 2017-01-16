<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Apitong Village Website Admin Panel
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url('home');?>"><i class="fa fa-dashboard"></i> Home</a></li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class='row'>
		<div class='col-md-12'>
			<div class='box box-primary'>
				<div class='box-header with-border'>
					<h3 class='box-title'>Write New Announcement</h3>
				</div>
				<!-- end box header-->
				<div class='box-body'>
					<?php echo validation_errors("<div class='alert alert-danger'><h4><i class='icon fa fa-ban'></i>Alert!</h4>", "</div>"); ?>
					<?php 
						if ($errormsg !== NULL)
						{
							echo "<div class='alert alert-danger'><h4><i class='icon fa fa-ban'></i>Alert!</h4>";
							echo $errormsg;
							echo "</div>";
						}
					?>
					<?php echo form_open('announcement/new_announcement'); ?>
					<div class='form-group'>
						<input class='form-control' id='title' name='title' value='<?php echo set_value('title'); ?>'>
					</div>
					<div class='form-group'>
						<textarea id='editor1' name='editor1' rows='10' cols='80'>
							<?php echo set_value('editor1'); ?>
						</textarea>
					</div>
					<button class='btn btn-primary pull-right' type='submit'>Submit</button>
					<?php echo form_close(); ?>
				</div>
			</div>
			<!-- end box -->
		</div>
		<!-- end col 12 -->
	</div>
	<!-- end row -->
</section>
<!-- /.content -->
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script src="<?php echo base_url('assets/plugins/select2/select2.full.min.js');?>"></script>
<script>
	CKEDITOR.replace( 'editor1' );	
</script>