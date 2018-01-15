<link rel="stylesheet" href="<?php echo base_url() ?>css/notify.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/animate.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/khrsman-process.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/khrsman-pagination.css" />

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>pembayaran Vendor</h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">pembayaran</li>
            </ol>
        </section>
        <section class="content">
          <button class="btn bg-purple" id="btn_data" style="margin-bottom:10px"><span class="fa fa-plus"></span> Data pembayaran</button>
          <div class="" id="page_content">
        </div>
</section>

<script src="<?php echo base_url() ?>js/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url() ?>js/khrsman-pagination.js"></script>
<script src="<?php echo base_url() ?>js/khrsman-process.js"></script>
<script type="text/javascript">

$(document).ready(function(){
  var request = $.get("<?php echo base_url(); ?>pembayaran_vendor/editor");
  request.done(function(data) {
      $("#page_content").html(data);
  });

  $("#btn_data").click(function(){
    var request = $.get("<?php echo base_url(); ?>pembayaran_vendor/data");
    request.done(function(data) {
        $("#page_content").html(data);
    });
  })


})
</script>
