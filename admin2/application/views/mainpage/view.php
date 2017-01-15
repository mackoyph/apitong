<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Apitong Village Website Admin Panel
		<small>Optional description</small>
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
					<h3 class='box-title'>Content Fields</h3>
				</div>
				<!-- end box header-->
				<div class='box-body'>
					<?php echo validation_errors("<div class='alert alert-danger'><h4><i class='icon fa fa-ban'></i>Alert!</h4>", "</div>"); ?>
					<?php 
						if ($errormsg !== NULL)
						{
							echo "<div class='alert alert-danger'><h4><i class='icon fa fa-ban'></i>Alert!</h4>";
							echo $error;
							echo "</div>";
						}
					?>
					<?php echo form_open(base_url('main_page')); ?>

					<?php 

						foreach($contents as $row)
						{
							echo "<div class='form-group'>";
							echo "<label>" . $row->content_desc . "</label>";
							echo "<input class='form-control' id='". $row->content_desc . "' name=' " . $row->content_desc ."' value='" . $row->content . "'>";
							echo "</div>";
						}
					?>


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