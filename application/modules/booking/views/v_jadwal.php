<div id="page_custom" value="schedule">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- <section class="content-header">
            <h1>Schedule/ Rencana Pemberangkatan</h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">booking</li>
            </ol>
        </section> -->
        <section class="content" id="content">
          <div  id="page_content">
          </div>
            <div class="row" id="tabel">
                <div class="col-md-8">
                    <div class="box box-primary">
                        <div class="box-body">
                          <form role="form" class="form-horizontal xform">
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="col-md-4 control-label">Tahun</label>
                                  <div class="col-md-8">
                                      <?php
                                      $this->load->library('Cb_options');
                                      $this->cb_options->tahun();
                                      ?>
                                  </div>
                              </div>
                              </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="col-md-4 control-label">Bulan</label>
                                    <div class="col-md-8">
                                        <?php
                                        $this->cb_options->bulan();
                                        ?>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-4">
                                  <btn id="lihat_jadwal" type="input" class="btn btn-primary edit_page"><span class="fa fa-check"></span> Lihat jadwal</btn>
                                </div>
                                  </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
</section>
</div>

<!-- <script src="<?php echo base_url() ?>js/jquery-2.1.4.min.js"></script> -->

<script type="text/javascript">
$(document).ready(function () {

  var request = $.ajax({
      url: "<?php echo site_url('booking/jadwal_table'); ?>",
      type: "POST",
      data: {bulan: <?php echo date('m') ?>, tahun:<?php echo date('Y') ?>},
      dataType: "html"
  });
  request.done(function(data) {
      $("#page_content").html(data);
  });


  $('#lihat_jadwal').click(function(){

    bulan = $('#bulan').val();
    tahun = $('#tahun').val();

    if(!bulan){
      alert('Pilih Bulan');
      return;
    }
        var request = $.ajax({
            url: "<?php echo site_url('booking/jadwal_table'); ?>",
            type: "POST",
            data: {bulan: bulan, tahun:tahun},
            dataType: "html"
        });
        request.done(function(data) {
            $("#page_content").html(data);
        });
  })
 });
 </script>
