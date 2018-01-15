<link rel="stylesheet" href="<?php echo base_url() ?>css/notify.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/animate.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/khrsman-process.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/khrsman-pagination.css" />
<link rel="stylesheet" href="<?php echo base_url('css') ?>/jquery-ui.min.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url('css') ?>/select2.css">
<link rel="stylesheet" href="<?php echo base_url('css') ?>/jquery-ui.multidatespicker.css">
<link href="<?php echo base_url() ?>css/jquery.multiselect.css" rel="stylesheet" type="text/css">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>booking</h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">booking</li>
            </ol>
        </section>
        <section class="content">
          <button class="btn bg-purple" id="btn_data" style="margin-bottom:10px"><span class="fa fa-file"></span> Data Booking</button>
          <!-- <button class="btn bg-purple" id="btn_add" style="margin-bottom:10px"><span class="fa fa-plus"></span> Tambah Booking</button> -->
          <div class="" id="page_content">
        </div>
</section>

<script src="<?php echo base_url() ?>js/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url() ?>js/khrsman-pagination.js"></script>
<script src="<?php echo base_url() ?>js/khrsman-process.js"></script>


<script src="<?php echo base_url() ?>js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url('js') ?>/select2.js"></script>
<script type="text/javascript" src="<?php echo base_url('js') ?>/jquery-ui.multidatespicker.js"></script>
<script src="<?php echo base_url() ?>js/jquery.multiselect.js"></script>
<script type="text/javascript" src="<?php echo base_url('js') ?>/select2.js"></script>
<script type="text/javascript">

$(document).ready(function(){
  var request = $.get("<?php echo base_url(); ?>booking/editor");
  request.done(function(data) {
      $("#page_content").html(data);
  });

  $("#btn_data").click(function(){
    var request = $.get("<?php echo base_url(); ?>booking/data");
  request.done(function(data) {
      $("#page_content").html(data);
  });
  })

})
</script>
