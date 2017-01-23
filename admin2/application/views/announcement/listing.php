<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Apitong Village Website Admin Panel
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url('home');?>"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="<?php echo base_url('admin_management'); ?>"><i class='fa fa-users'></i>Admin Management</a></li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<!-- Your Page Content Here -->
	<div class='row'>
		<div class='col-md-12'>
			<div class='box box-primary'>
				<div class='box-header with-border'>
					<h3 class='box-title'>Announcements</h3>
				</div>
				<div class='box-body'>
					<div class='btn-group' role='group'>
						<a href='<?php echo base_url('announcement/new_announcement'); ?>' class='btn btn-default'>New Announcement</a>
					</div>
					<table id='announcement-table' class='table dataTable table-hover table-bordered'>
						<thead>
							<tr>
								<td>Date</td>
								<td>Title</td>
								<td>Text</td>
								<td>Other Information</td>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($announcements as $row)
							{
								echo "<tr>";
								echo "<td>" . $row->creation_date . "</td>";
								echo "<td>" . htmlentities($row->title) . '<br/>';
								echo "<div class='btn-group' role='group'>";
								echo "<a href='" . base_url('announcement/edit/' . $row->id) . "' class='btn btn-default btn-xs'>Edit</a>";
								echo "<button data-toggle='modal' data-target='#deleteAnnouncementModal' class='btn btn-default btn-xs' data-title='" . $row->title . "' data-articleid='" . $row->id . "'>Delete</button></div>";
								echo  "</td>";
								echo "<td>" . htmlentities(substr($row->text, 0, 100)) . " ... </td>";
								echo "<td> Author: " . $row->author . "<br/>Last Edited by: " . $row->editor . "<br/>Last edited on: " . $row->last_edit_date . "</td>"; 
								echo "</tr>";
							}
							?>
						</tbody>
					</table>
				</div>
				<div class='box-footer'>
					<div class='btn-group' role='group'>						
						<?php
						echo "<label>Number of pages: " . $numPages . '</label><br/>';
						if($currentPage != 1)
						{
							echo "<a href='" . base_url('announcement/listing/' . ($currentPage - 1)) . "' class='btn btn-default'>< Previous</a>";
						}
						echo "<a href='" . base_url('announcement/listing/' . $currentPage) . "' class='btn btn-default'>" . $currentPage . "</a>";
						if($currentPage < $numPages)
						{
							echo "<a href='" . base_url('announcement/listing/' . ($currentPage + 1)) . "' class='btn btn-default'>Next ></a>";
						}
						?>
					</div>
				</div>
			</div>
			<!-- end box -->
		</div>
	</div>
	<div class="modal fade" id='deleteAnnouncementModal' tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Delete Announcement Confirmation</h4>
	  			</div>
	  			<div class="modal-body">
					<p>Are you sure you want to delete the Announcement ?</p>
					<p id='title-to-delete'></p>
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
$(function(){
	$('#announcement-table').DataTable({
		"ordering":false,
		"paging":false,
		"searching":false,
		"info":false
	});
	$('#deleteAnnouncementModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var articleid = button.data('articleid');
		var title = button.data('title');
		$('#title-to-delete').text("Title: " + title);
		console.log("article id=" + articleid);
		$("#deleteArticleLink").attr('href', "<?php echo base_url('announcement/delete/');?>" + articleid);

	});
});
</script>