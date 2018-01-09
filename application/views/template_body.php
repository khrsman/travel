<body class="hold-transition skin-purple sidebar-mini fixed">
<div class="wrapper" style="overflow:auto">
<?php $this->load->view('template_body_header'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php $this->load->view('template_body_sidebar'); ?>
  <!-- Content Wrapper. Contains page content -->
<?php $this->load->view($page); ?>

</div>

<!-- jQuery 3 -->

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>


</body>

