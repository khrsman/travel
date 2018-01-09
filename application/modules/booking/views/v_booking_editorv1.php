<link rel="stylesheet" href="<?php echo base_url('css') ?>/jquery-ui.min.css"  type="text/css">
<link rel="stylesheet" href="<?php echo base_url('css') ?>/select2.css">
<link rel="stylesheet" href="<?php echo base_url('css') ?>/jquery-ui.multidatespicker.css">
<link href="<?php echo base_url() ?>css/jquery.multiselect.css" rel="stylesheet" type="text/css">


              <div class="row" id="form_view">
                  <form role="form" class="form-horizontal xform">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <!-- <h3 class="box-title">Editor</h3> -->
                        </div>
                        <div class="box-body">
<!-- gatau kenapa kalo id_booking selalu null saat dikirim ke fungsi updatenya, makanya jadi id_bookingg -->
                                <input type="hidden" id="id_booking" name="id_bookingg" >
                                <div class="form-group">
                            <label class="col-sm-4 control-label">Tanggal Input</label>
                            <div class="col-sm-8">
                            <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control datepicker" value="<?php echo date('d/m/Y') ?>" name="tanggal_input" id="tanggal_input" type="text">
                          </div>
                            </div>
                      </div>
                                <div class="form-group">
                                        <label class="col-sm-4 control-label">Sumber web</label>
                                        <div class="col-sm-8">
                                          <?php
                                          $this->load->library('cb_options');
                                          $this->cb_options->sumber();
                                          ?>
                                        </div>
                                  </div>
                                <div class="form-group">
                                        <label class="col-sm-4 control-label">Admin</label>
                                        <div class="col-sm-8">
                                          <?php
                                          $this->load->library('cb_options');
                                          $this->cb_options->penanggung_jawab();
                                          ?>
                                        </div>
                                  </div>
                                  <!-- <div class="form-group">
                                          <label class="col-sm-4 control-label">Status</label>
                                          <div class="col-sm-8">
                                            <?php
                                            // $this->load->library('cb_options');
                                            // $this->cb_options->status();
                                            ?>
                                          </div>
                                    </div> -->

													<div class="form-group">
                                  <label class="col-sm-4 control-label">Vendor</label>
                                  <div class="col-sm-8">
                                    <?php
                                    $this->load->library('cb_options');
                                    $this->cb_options->vendor();
                                    ?>
                                  </div>
                          </div>
                          <div class="form-group">
                                  <label class="col-sm-4 control-label">Nama pelanggan</label>
                                  <div class="col-sm-8">
                                  <?php
                                      $this->load->library('cb_options');
                                      $this->cb_options->customer();
                                  ?>                                  
                                      <!-- <input type = "text" name="nama_pelanggan" id="nama_pelanggan" class="form-control"  > -->
                                  </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-4 control-label">Tujuan</label>
                                    <div class="col-sm-8">
                                        <input type = "text" name="tujuan" id="tujuan" class="form-control"  >
                                    </div>
                              </div>

                                
													<div class="form-group">
                                  <label class="col-sm-4 control-label">Lokasi jemput</label>
                                  <div class="col-sm-8">
                                      <input type = "text" name="lokasi_jemput" id="lokasi_jemput" class="form-control"  >
                                  </div>
                            </div>
													<!-- <div class="form-group">
                                  <label class="col-sm-4 control-label">Unit</label>
                                  <div class="col-sm-3">
                                    <input type = "text" name="jumlah_unit" id="jumlah_unit" class="form-control" placeholder="jumlah"  >
                                  </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-4 control-label"></label>
                                    <div class="col-sm-8">
                                      <?php
                                      $this->load->library('cb_options');
                                      $this->cb_options->unit();
                                      ?>
                                    </div>
                              </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-body">
                                <input type="hidden" id="id_booking" name="id_booking" >
                                <div class="form-group">
                                        <label class="col-sm-2 control-label">Tanggal</label>
                                        <div class="col-sm-8">
                                          <!-- <input type="text"  readonly="" name="tanggal" id="tanggal" class="form-control"> -->
                                          <div id="mdp_tanggal_booking"></div>
                                        </div>
                                  </div>
                                  <div class="form-group">
                                          <label class="col-sm-2 control-label">Tanggal &unit</label>
                                          <div class="col-sm-10 form_harga_unit">                                       
                                    </div>
                                    </div>								
                        </div>
                        <div class="box-footer" style="text-align:right">
                            <a class="btn btn-danger" id="btn_cancel"><span class="fa fa-remove "></span> Cancel</a>
                            <a class="btn btn-primary add_page" id="btn_save"><span class="fa fa-check "></span> Simpan</a>
                            <a class="btn btn-primary edit_page" id="btn_update"><span class="fa fa-check "></span> update</a>
                        </div>
                    </div>
                </div>
                </form>
            </div>

<script src="<?php echo base_url() ?>js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url('js') ?>/select2.js"></script>
<script type="text/javascript" src="<?php echo base_url('js') ?>/jquery-ui.multidatespicker.js"></script>
<script src="<?php echo base_url() ?>js/jquery.multiselect.js"></script>
<script type="text/javascript" src="<?php echo base_url('js') ?>/select2.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url() ?>js/datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/datepicker/locales/bootstrap-datepicker.id.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>js/datepicker/css/bootstrap-datepicker.css"> -->


<script type="text/javascript">
$(document).ready(function() {
 
    eventSelect =  $('.select2').select2({
        placeholder: "Pilih",
        // minimumInputLength: 2,
     });

      
    //   $("#id_sumber").val('2');
    //   $('#id_sumber option[value=2]').attr('selected','selected');

  
  $('#mdp_tanggal_booking').multiDatesPicker({
    dateFormat: "d-m-yy",   
  	// altField: '#tanggal',
    onSelect: function (date) {
      val = date;
      text = date;

       if($('#'+val).length === 0){
      var request = $.get("<?php echo base_url(); ?>booking/select_unit",{date: date});
  request.done(function(data) { 
        add3 = '<div class="harga_per_unit" id="'+val+'"><label class="col-sm-3 control-label">'+text+' </label><div class="col-sm-9">'+data+'</div>'
        $('.form_harga_unit').append(add3);
                $('select[multiple].tanggal_unit').multiselect({
    columns: 2,
    placeholder: '--- PILIH ---',
    search: true,
    searchOptions: {
        'default': 'Cari Unit'
    }
  });

  });
        } else{
         $('#'+val).remove();
    
        }
   }
  });


  
});


$('select[multiple].select_unit').multiselect({
    columns: 2,
    placeholder: '--- PILIH ---',
    search: true,
    searchOptions: {
        'default': 'Cari Unit'
    }
    
  
  });

  $('#tanggal_input').datepicker({
    dateFormat: 'dd/mm/yy',
        //    format: 'dd/mm/yyyy',
        //    todayBtn: "linked",
        //    language: "id",
        //    calendarWeeks: true,
        //    autoclose: true
      });





</script>
