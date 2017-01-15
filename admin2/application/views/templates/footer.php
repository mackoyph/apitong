</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->
  <div class="pull-right hidden-xs">
    Anything you want
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; 2017 <a href="#">Developers' Name here</a>.</strong> All rights reserved.
</footer>

<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
  <!-- REQUIRED JS SCRIPTS -->
	
  <!-- AdminLTE App -->
  <script src="<?php echo base_url('assets/dist/js/app.js');?>"></script>
  <!-- Fastclick plugin for mobile browsers  -->
  <script src="<?php echo base_url('assets/plugins/fastclick/fastclick.min.js');?>"></script>
  <!-- adminlte others -->
  <!--<script src="<?php echo base_url('assets/dist/js/demo.js');?>"></script> -->
  <!-- slim scroll for fixed layout -->
  <script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>
  
  
<script>
  $(document).ready(function() {
    console.log("inside jquery on document ready");

    //set active menu in sidebar
    <?php echo "var php_variables = " . json_encode($jsvars) . "\n";?>
    var active = "#" + php_variables.sidebar_active;
    console.log("active: " + active);
    $(active).addClass('active');
  });

  
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
Both of these plugins are recommended to enhance the
user experience. Slimscroll is required when using the
fixed layout. -->
</body>

</html>