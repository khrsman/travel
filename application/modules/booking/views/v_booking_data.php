            <div class="row" id="data_view">
                <div class="col-md-12">
                    <div class="box box-primary">

                        <div class="box-body">
                            <table id="table" class="table table-hover table-bordered display nowrap" width="100%" cellspacing="0">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail Booking</h4>
                  </div>
                  <div class="modal-body" style="padding:20">
                    <div class="row">
                      <div class="col-md-6">
                        <table id="modal_table" class="table">
                          <tr>
                            <td><strong>Web</strong></td>
                            <td>: </td>
                            <td><span id="detail_web" >-</span></td>
                          </tr>
                          <tr>
                            <td><strong>Admin</strong></td>
                            <td>: </td>
                            <td><span id="detail_admin" >-</span></td>
                          </tr>
                          <tr>
                            <td><strong>Status Pembayaran</strong></td>
                            <td>: </td>
                            <td><span id="detail_pembayaran" > - </span></td>
                          </tr>
                          <tr>
                            <td><strong>Vendor</strong></td>
                            <td>: </td>
                            <td><span id="detail_vendor" > - </span></td>
                          </tr>
                        </table>
                        <table id="modal_table" class="table">
                          <tr>
                            <td><strong>Harga Pokok</strong></td>
                            <td>: </td>
                            <td><span id="harga_pokok" >-</span></td>
                          </tr>
                          <tr>
                            <td><strong>Harga Jual</strong></td>
                            <td>: </td>
                            <td><span id="harga_jual" >-</span></td>
                          </tr>                         
                        </table>
                      </div>
                      <div class="col-md-6 ">
                        <table id="modal_table" class="table">
                          <tr>
                            <td><strong>Nama</strong></td>
                            <td>: </td>
                            <td><span id="detail_nama" >-</span></td>
                          </tr>
                          <tr>
                            <td><strong>Telepon</strong></td>
                            <td>: </td>
                            <td><span id="detail_telepon" >-</span></td>
                          </tr>
                          <tr>
                            <td><strong>Tujuan</strong></td>
                            <td>: </td>
                            <td><span id="detail_tujuan" > - </span></td>
                          </tr>
                          <tr>
                            <td><strong>Alamat Jemput</strong></strong></td>
                            <td>: </td>
                              <td><span id="detail_alamat_jemput" > - </span></td>
                          </tr>

                          <tr>
                            <td><strong>Tanggal</strong></td>
                            <td>: </td>
                            <td><span id="detail_tanggal" > - </span></td>
                          </tr>
                          <tr>
                            <td><strong>Unit</strong></td>
                            <td>: </td>
                            <td><span id="detail_unit" > - </span></td>
                          </tr>
                        </table>
                      </div>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                  </div>
                </div>

              </div>
            </div>
            <!-- /Modal -->
<!-- <script src="<?php echo base_url() ?>js/jquery-2.1.4.min.js"></script> -->
<script src="<?php echo base_url() ?>js/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url() ?>js/khrsman-pagination.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  


  $(document).on( "click", "tbody>tr",function(e){
    if($(e.target).hasClass('btn_edit_custom') || $(e.target).hasClass('btn_delete') ){
          // e.preventDefault();
          return;
      }
      id = $(this).find(".btn_edit_custom").val();
request = $.get("<?php echo base_url('booking') ?>/detail_harga",{id : id});
request.done(function(data){
arr = JSON.parse(data);

$.each(arr, function(key, value){
          var id_val = key;
          $("#"+id_val).text(value);        
        });
})

       $("#myModal").modal();
    });



pagination = $('#table').pagination({
    href:"<?php echo site_url() ?>/booking/page",
    // plus_column: ,
    hide: "id_booking",
    edit: "id_booking",
    edit_custom: true,
    delete: "id_booking",
    search: true,
  });
  pagination.init();
      });


      $('body').on('click', '.btn_edit_custom', function() {
  var page = window.location.href;
  var url_edit = page+'/get_for_edit';
  var url_editor = page+'/editor';
  var id = $(this).val();
    get_content = $.post(url_editor).done(function(data){
    $("#page_content").html(data);
  });
  get_content.done(function(){
    $('.add_page').hide();

      request = $.get(url_edit,{id: id});
      request.done(function(data){
        $('.form_harga_unit').empty();
        $('.edit_protection').prop('readonly', true);
        var arr = JSON.parse(data);
        // console.log(data);

        $.each(arr.data_booking[0], function(key, value){
          var id_val = key;
          $("#"+id_val).val(value);
        });

        add3 ='';
        $.each(arr.input, function(key, value){
            val =value.date;
            data =value.select;
            // console.log(add3);

            $('#mdp_tanggal_booking').multiDatesPicker('addDates',val);

           add3 = '<div class="harga_per_unit" id="'+val+'"><label class="col-sm-3 control-label">'+val+' </label><div class="col-sm-9">'+data+'</div>'
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
      });
      request.fail(function() {
        notify_error('Terjadi Kesalahan');
    })


  })
  });





</script>
