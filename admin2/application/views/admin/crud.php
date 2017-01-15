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
	<h1>CRUD for user accounts</h1>
	<div class='row'>
		<div class='col-md-12'>
		<a href='<?php echo base_url('admin_management/add');?>' class='btn btn-primary'>Add User</a>
		</div>
	</div>
	
	<div class='row'>
		<div class='col-md-12'>
		<div class='box box-success'>
			<div class='box-header with-border'>
				Admin Accounts
			</div>
			<div class='box-body'>
			<table id='admin-accounts-table' class='table dataTable table-bordered table-hover'>
				<thead>
					<tr>
						<th>Last Name</th>
						<th>First Name</th>
						<th>User Name</th>
						<th>Email</th>
						<th>Contact</th>
						<th>Address</th>
					</tr>
				</thead>
				<tbody>
				<?php
					foreach($admin_accounts as $row)
					{
						echo "<tr class='clickable-row' data-href='" . base_url('admin_management/edit/' . $row->ACCESS_NO) . "'>";
						echo "<td>" . htmlentities($row->ACCESS_LASTNAME) . "</td>";
						echo "<td>" . htmlentities($row->ACCESS_FIRSTNAME) . "</td>";
						echo "<td>" . htmlentities($row->ACCESS_USERNAME) . "</td>";
						echo "<td>" . htmlentities($row->ACCESS_EMAIL) . "</td>";
						echo "<td>" . htmlentities($row->ACCESS_CONTACT) . "</td>";
						echo "<td>" . htmlentities($row->ACCESS_ADDRESS) . "</td>";
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
	$('#admin-accounts-table').DataTable();
	$(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });
});
</script>