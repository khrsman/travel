<!-- <link href="<?php echo base_url() ?>css/jquery.multiselect.css" rel="stylesheet" type="text/css"> -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Laporan</h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">pengeluaran</li>
            </ol>
        </section>
        <section class="content">
          <div class="row" id="form_tambah">
              <div class="col-md-12">
                <div class="box box-primary box-solid">
                  <div class="box-header with-border">
                      <h3 class="box-title add_page">Jenis Laporan </h3>
                  </div>
                    <div class="box-body">
                <button type="button" class="btn btn-primary jenis_laporan" id="lap_mutasi" name="button">Mutasi </button>
                <button type="button" class="btn btn-primary jenis_laporan" id="lap_pengeluaran" name="button">Pengeluaran </button>
              
              </div>
              </div>
              </div>
              </div>           
         
            <div class="row input_laporan"  style="display:none" id="mutasi">
                <div class="col-md-6">
                    <div class="box box-success box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title add_page">Mutasi</h3>
                        </div>
                        <div class="box-body">
                            <form role="form" id="mutasi" class="form-horizontal form_mutasi" action="laporan/mutasi" method="post">
                                <div class="form-group">
                                        <label class="col-sm-4 control-label">Tanggal</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                            <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                            </div>
                                            <input class="form-control datepicker" value="<?php echo date('d/m/Y') ?>" name="tanggal_dari" id="tanggal_dari" type="text">
                                            <div class="input-group-addon">
                                            S.d
                                            </div>
                                            <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                            </div>
                                            <input class="form-control datepicker" value="<?php echo date('d/m/Y') ?>" name="tanggal_sampai" id="tanggal_sampai" type="text">
                                        </div>
                                        </div>
                                  </div>
                        </div>
                        <div class="box-footer" style="float:right">
                            <button type="input" class="btn btn-primary edit_page"><span class="fa fa-check"></span> Tampilkan</button>                           
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row input_laporan"  style="display:none" id="pengeluaran">
                <div class="col-md-6">
                    <div class="box box-success box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title add_page">Pengeluaran</h3>
                        </div>
                        <div class="box-body">
                            <form role="form" id="pengeluaran" class="form-horizontal form_pengeluaran" action="laporan/pengeluaran" method="post">
                                <div class="form-group">
                                        <label class="col-sm-4 control-label">Tanggal</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                            <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                            </div>
                                            <input class="form-control datepicker" value="<?php echo date('d/m/Y') ?>" name="tanggal_dari" id="tanggal_dari" type="text">
                                            <div class="input-group-addon">
                                            S.d
                                            </div>
                                            <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                            </div>
                                            <input class="form-control datepicker" value="<?php echo date('d/m/Y') ?>" name="tanggal_sampai" id="tanggal_sampai" type="text">
                                        </div>
                                        </div>
                                  </div>
                        </div>
                        <div class="box-footer" style="float:right">
                            <button type="input" class="btn btn-primary edit_page"><span class="fa fa-check"></span> Tampilkan</button>                           
                        </div>
                        </form>
                    </div>
                </div>
            </div>
           
            <br>
            <div class="" id="page_content">
              <!-- kaharisman -->
            </div>
    </div>
</div>
</section>


<script type="text/javascript" src="<?php echo base_url() ?>js/datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/datepicker/locales/bootstrap-datepicker.id.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>js/datepicker/css/bootstrap-datepicker.css">
<script src="<?php echo base_url() ?>js/jquery.multiselect.js"></script>

<script>
	 $(function(){

      
    $( ".form_mutasi" ).on( "submit", function( event ) {
      event.preventDefault();
      thiss = $(this);
      if(validate(thiss)){
        action = $(this).attr('action');
        get_laporan(action, thiss);
      };
     });
     $( ".form_pengeluaran" ).on( "submit", function( event ) {
      event.preventDefault();
      thiss = $(this);
      if(validate(thiss)){
        action = $(this).attr('action');
        get_laporan(action, thiss);
      };
     });


     $('.jenis_laporan').click(function(){        
      if($( ".jenis_laporan" ).hasClass( "btn-danger" )){
      $(".jenis_laporan").removeClass("btn-danger" );
      }    
       $(this).addClass( "btn-danger" );
       var jenis_laporan = this.id;
       $(".input_laporan").hide();
        $("#page_content").hide();

     switch(jenis_laporan) {
    case 'lap_mutasi':
        $("#mutasi").slideDown();
        break;   
        case 'lap_pengeluaran':
        $("#pengeluaran").slideDown();
        break;  
    default:
        //code block
}
     })

     $('.datepicker').datepicker({
           format: 'dd/mm/yyyy',
           todayBtn: "linked",
           language: "id",
           calendarWeeks: true,
           autoclose: true
      });



     function validate(thiss){
  var valid = true;
  thiss.find('.input_validation').each(function() {
    if(!this.value){
      valid = false;
      $.notify({
        title: "Error :",
        message: "Data inputan tidak boleh kosong!",
        icon: 'fa fa-remove'
      },{
        type: "danger"
      });
    $(this).addClass("focus");
 }
});
return valid;
}

function get_laporan(action, thiss){
  var request = $.ajax({
                   url: "<?php echo site_url(); ?>/"+action,
                   data: {data:  thiss.serialize()},
                   type: "POST",
                  //  dataType: "html"
               });
               request.done(function(data) {
                 $(".input_laporan").slideUp();
                  $("#page_content").html(data);
                  $("#page_content").show();
               });
}



     
	 });
</script>
