              <div class="row" id="form_view">
                <div class="col-md-4">
                    <div class="box box-primary  box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title ">Data booking</h3>
                        </div>
                        <div class="box-body">
                            <form role="form" class="form-horizontal xform">
                                <input type="hidden" id="id_invoice" name="id_invoice" >
																<div class="form-group">
                                  <label class="col-sm-4 control-label">Id booking</label>
                                  <div class="col-sm-8">
                                  <?php
$this->load->library('cb_options');
$this->cb_options->booking();
?>
                                  </div>
                            </div>
							<div class="form-group">
                                  <label class="col-sm-4 control-label">Tanggal</label>
                                  <div class="col-sm-8">
                                  <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input class="form-control datepicker" value="<?php echo date('d/m/Y') ?>" name="tanggal" id="tanggal" type="text">
                                </div>
                                  </div>
                            </div>
                            </form>
                        </div>
                        <div class="box-footer" style="text-align:right">
                            <a class="btn btn-danger" id="btn_cancel"><span class="fa fa-remove "></span> Cancel</a>
                            <a class="btn btn-primary add_page" id="lanjutkan"><span class="fa fa-check "></span> Lanjutkan </a>
                            <!-- <a class="btn btn-primary edit_page" id="btn_update"><span class="fa fa-check "></span> update</a> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                <div id="loading" style="display:none">
                <center>
                     <img src="<?php echo base_url('css/images/Loading_icon.gif') ?>" alt="">
                     </center>
                </div>
                   <div id="email_form" style="display:none">
                    <div class="box box-success box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title ">New Email</h3>
                        </div>
                        <div class="box-body">

                            <form role="form" class="form-horizontal xform">
							<div class="form-group">
                                  <label class="col-sm-2 control-label">To</label>
                                  <div class="col-sm-8">
                                  <input class="form-control" name="email_to" id="email_to" placeholder="to" type="text">
                                  </div>
                            </div>
                            <div class="form-group">
                                  <label class="col-sm-2 control-label">Subject</label>
                                  <div class="col-sm-8">
                                  <input class="form-control" name="email_subject" id="email_subject" placeholder="Subject" type="text">
                                  </div>
                            </div>
                            <div class="form-group">
                                  <label class="col-sm-2 control-label">Lampiran</label>
                                  <div class="col-sm-8">
                                  <span id="file_name"></span> <a href="#" target="blank" id="file_link" class="btn btn-small btn-success">lihat file</a>
                                  </div>
                            </div>
                            <div class="form-group">
                                  <label class="col-sm-2 control-label"></label>
                                  <div class="col-sm-10">
                                  <textarea id="editor1" name="editor1" rows="10" cols="80">

                                </textarea>
                                  </div>
                            </div>
                            </form>
                        </div>
                        <div class="box-footer" style="text-align:right">
                            <a class="btn btn-primary add_page" id="btn_save"><span class="fa fa-check "></span> Kirim</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>


            <script type="text/javascript" src="<?php echo base_url() ?>js/datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/datepicker/locales/bootstrap-datepicker.id.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>js/datepicker/css/bootstrap-datepicker.css">
<script src="<?php echo base_url() ?>/AdminLTE/bower_components/ckeditor/ckeditor.js"></script>

<script>
$(document).ready(function() {

$('#lanjutkan').click(function(){
    id = $('#id_booking').val();
    // console.log(id);
    $("#loading").show();
    $("#email_form").hide();
    request = $.get("<?php echo base_url('invoice') ?>/create_invoice_file",{id : id});
    request.done(function(data){
        arr = JSON.parse(data);
      $('#file_link').attr('href',arr.link);
      $('#file_name').text(arr.name);
        $("#loading").hide();
        $("#email_form").show();
        // alert('done');
    })
});

    CKEDITOR.replace('editor1');
         $('.datepicker').datepicker({
           format: 'dd/mm/yyyy',
           todayBtn: "linked",
           language: "id",
           calendarWeeks: true,
           autoclose: true
      });
      });


</script>
