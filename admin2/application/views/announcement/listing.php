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
								echo "<td>" . htmlentities($row->title) . "</td>";
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
});
</script>