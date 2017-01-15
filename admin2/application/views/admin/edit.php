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
					<h4>Edit User Account</h4>
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
				<?php echo form_open('admin_management/edit/' . $admin_account->ACCESS_NO);?>
				<div class='form-group'>
					<label>First Name</label>
					<input class='form-control' type='text' id='firstname' name='firstname' required value="<?php echo $admin_account->ACCESS_FIRSTNAME; ?>">
				</div>
				<div class='form-group'>
					<label>Last Name</label>
					<input class='form-control' type='text' id='lastname' name='lastname' min='0' required value="<?php echo $admin_account->ACCESS_LASTNAME; ?>">
				</div>
				<div class='form-group'>
					<label>User Name</label>
					<input class='form-control' type='text' id='username' name='username' min='0' required value="<?php echo $admin_account->ACCESS_USERNAME; ?>">
				</div>
				<div class='form-group'>
					<label>Email Name</label>
					<input class='form-control' type='text' id='email' name='email' min='0' required value="<?php echo $admin_account->ACCESS_EMAIL; ?>">
				</div>
				<div class='form-group'>
					<label>Contact</label>
					<input class='form-control' type='number' id='contact' name='contact' min='0' required value="<?php echo $admin_account->ACCESS_CONTACT; ?>">
				</div>
				<div class='form-group'>
					<label>Address</label>
					<input class='form-control' type='text' id='address' name='address' min='0' required value="<?php echo htmlentities($admin_account->ACCESS_ADDRESS); ?>">
				</div>
				<button type='submit' class='btn btn-primary pull-right'>Save</button>
				<?php echo form_close();?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->
