<link rel="stylesheet" href="<?php echo base_url() ?>css/notify.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/animate.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/khrsman-process.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/khrsman-pagination.css" />

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
          <button class="btn bg-purple" id="btn_add" style="margin-bottom:10px"><span class="fa fa-plus"></span> Tambah Booking</button>
          <button class="btn bg-purple" id="btn_input_harga" style="margin-bottom:10px"><span class="fa fa-plus"></span> Input / Update Harga</button>
          <div class="" id="page_content">
        </div>
</section>

<script src="<?php echo base_url() ?>js/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url() ?>js/khrsman-pagination.js"></script>
<script src="<?php echo base_url() ?>js/khrsman-process.js"></script>
<script type="text/javascript">

$(document).ready(function(){
  var request = $.get("<?php echo base_url(); ?>booking/editor");
  request.done(function(data) {
      $("#page_content").html(data);
  });

  $("#btn_input_harga").click(function(){
    var request = $.get("<?php echo base_url(); ?>booking/input_harga");
  request.done(function(data) {
      $("#page_content").html(data);
  });
  })

})
</script>
