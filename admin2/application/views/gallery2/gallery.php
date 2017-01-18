<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Apitong Village Website Admin Panel
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url('home');?>"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="<?php echo base_url('gallery2');?>"><i class="fa fa-picture-o"></i> Gallery</a></li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<!-- Your Page Content Here -->
	<div class='row'>
		<div class='col-md-12'>
			<div class='box box-primary'>
				<div class='box-header with-border'>
					<h3 class='box-title'>Gallery</h3>
				</div>
				<div class='box-body'>
					<div id="elfinder"></div>
				</div>
			</div>

		</div>
	</div>
	

</section>
<!-- /.content -->

<script type="text/javascript" src="<?php echo base_url('assets/plugins/elfinder/js/elfinder.min.js'); ?>"></script>
<script>
$(document).ready(function(){
	var elf = $('#elfinder').elfinder({
            // lang: 'ru',             // language (OPTIONAL)
            url : '<?php echo base_url('ex_cont/elfinder_init'); ?>'  // connector URL (REQUIRED)
        }).elfinder('instance');
});
</script>