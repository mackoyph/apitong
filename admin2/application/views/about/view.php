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
	<!-- Your Page Content Here -->
	<div class='row'>
		<div class='col-md-12'>
			<div class='box box-successful'>
				<div class='box-header'>
					Main About 
					<a href="#" class='btn btn-primary pull-right'>Edit</a>
				</div>
				<div class='box-body'>
					<?php
					if (isset($main_about))
					{
					?>
						<h4><b>Title: </b><?php echo $main_about->title; ?></h4>
						<br/><b>Text:</b><br/>
						<?php echo html_entity_decode($main_about->text); ?>
					<?php 
					} 
					else
					{
						echo "No About Us page yet.";
					}
					?>
				</div>
			</div> <!-- end box -->
		</div>
	</div> <!-- end row -->
	<div class='row'>
		<div class='col-md-12'>
			<div class='box box-primary'>
				<div class='box-header'>
					<h3>Articles</h3>
				</div>
				<div class='box-body'>
					table for articles goes here
				</div>
			</div>
		</div>
	</div>
	<!-- end row -->
</section>
<!-- /.content -->