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
					<h3 class='box-title'>Main About </h3>
					<br/>
					<a href="<?php echo base_url('about/edit_article/' . $main_about->id . "/1");?>" class='btn btn-primary'>Edit About Us</a>
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
					<h3 class='box-title'>Articles</h3>
					<br/>
					<a href="<?php echo base_url('about/new_article');?>" class='btn btn-primary'> New Article</a>
				</div>
				<div class='box-body'>
					table for articles goes here
					<?php 
						if ($errormsg !== NULL)
						{
							echo "<div class='alert alert-danger'><h4><i class='icon fa fa-ban'></i>Alert!</h4>";
							echo $errormsg;
							echo "</div>";
						}
					?>
					<table id='article-table' class='table table-hover table-bordered'>
						<thead>
							<tr>
								<td>Title</td>
								<td>Text</td>
								<td>Author</td>
								<td>Category</td>
								<td>Creation Date</td>
								<td>Last Editor</td>
								<td>Last Edited on</td>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($about_articles as $row)
								{
									echo "<tr>";
									echo "<td><h4>" . htmlentities($row->title) . "</h4>";
									echo "<a href='" . base_url('about/edit_article/' . $row->id) . "' class='btn btn-xs pull-right btn-primary'>Edit</a>";
									echo '<button data-articleid="' . $row->id . '" class="btn btn-warning btn-xs pull-left" data-toggle="modal" data-target="#deleteArticleModal" >Delete</button>';
									echo "</td>";
									echo "<td>" . htmlentities(substr($row->text, 0, 100) )."..." . "</td>";
									echo "<td>" . htmlentities($row->author_username) . "</td>";
									echo "<td>" . htmlentities($row->name) . "</td>";
									
									echo "<td>" . htmlentities($row->creation_date) . "</td>";
									echo "<td>" . htmlentities($row->editor_username) . "</td>";
									echo "<td>" . htmlentities($row->last_edit_date) . "</td>";
									echo "</tr>";

								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- end row -->

	<div class='row'>
		<div class='col-md-12'>
			<div class='box box-primary'>
				<div class='box-header with-border'>
					<h3 class='box-title'>About Us Page categories</h3>
				</div>
				<div class='box-body'>
					<a href='<?php echo base_url('about/new_category');?>' class='btn-sm btn btn-primary'>Add Category</a>
					<table id='categories-table' class='table table-bordered table-hover'>
						<thead>
							<tr>
								<th>Category Name</th>
								<th>Article Count</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($about_categories as $row)
							{
								echo "<tr>";
									echo "<td>" . $row->name;
									echo "<a href='" . base_url('about/edit_category/'. $row->id) . "' class='pull-right btn btn-xs btn-warning'>Edit Name</a>";
									
									echo "</td>";
									echo "<td>" . $category_count[$row->id] . "</td>";
								echo '</tr>';
							}

							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- end row -->

	<div class="modal fade" id='deleteArticleModal' tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Delete Confirmation</h4>
	  			</div>
	  			<div class="modal-body">
					<p>Are you sure you want to delete the article?</p>
	  			</div>
	  			<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<a id='deleteArticleLink' class="btn btn-warning">Delete</a>
	  			</div>
			</div><!-- /.modal-content -->
  		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</section>
<!-- /.content -->

<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js');?>"></script>
<script>
$(function() {
	$('#article-table').DataTable({
		"ordering":true
	});
	$('#categories-table').DataTable();

	$('#deleteArticleModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var articleid = button.data('articleid');
		console.log("article id=" + articleid);
		$("#deleteArticleLink").attr('href', "<?php echo base_url('about/delete_article/');?>" + articleid);

	})
});
</script>