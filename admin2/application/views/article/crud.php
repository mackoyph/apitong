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
	<h1>CRUD for articles</h1>
	<div class='row'>
		<div class='col-md-12'>
		<a href='#' class='btn btn-primary'>Add User</a>
		</div>
	</div>
	
	<div class='row'>
		<div class='col-md-12'>
		<div class='box box-success'>
			<div class='box-header with-border'>
				Articles
			</div>
			<div class='box-body'>
			<table id='articles-table' class='table table-bordered table-hover'>
				<thead>
					<tr>
						<th>Title</th>
						<th>Text</th>
					</tr>
				</thead>
				<tbody>
				<?php
					foreach($articles as $row)
					{
						echo "<tr class='clickable-row' data-href='" . base_url('article_management/edit/' . $row->id) . "'>";
						echo "<td>" . $row->title . "</td>";
						echo "<td>" . $row->text . "</td>";
						echo "</tr>";
						
					}
				?>
				</tbody>
			</table>
			</div>
		</div>
		</div>
	
	</div>
</section>
<!-- /.content -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js');?>"></script>
<script>
$(function() {
	$('#articles-table').DataTable();
	$(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });
});
</script>