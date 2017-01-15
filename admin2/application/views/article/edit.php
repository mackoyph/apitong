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
	<!-- Your Page Content Here -->
	<div class='row'>
		<div class='col-md-9'>
			<div class='box box-success'>
				<div class='box-header with-border'>
					<h4>Edit Article</h4>
				</div>
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
				<?php echo form_open('article_management/edit/' . $article->id);?>
				<div class='form-group'>
					<label>Title</label>
					<input class='form-control' type='text' id='title' name='title' required value="<?php echo $article->title; ?>">
				</div>
				<div class='form-group'>
					<label>Text</label>
					<input class='form-control' type='text' id='text' name='text' min='0' required value="<?php echo $article->text; ?>">
				</div>
				
				<button type='submit' class='btn btn-primary pull-right'>Save</button>
				<?php echo form_close();?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->
