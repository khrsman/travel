              <div class="row" id="form_view">
                <div class="col-md-4">
                  <div class="box box-success box-solid" id="detail_booking">
                      <div class="box-header with-border">
                          <h3 class="box-title ">Data Booking</h3>
                      </div>
                      <div class="box-body">
                        <input readonly="" class="form-control" id="id_booking" type="hidden" value="<?php echo $id_booking ?>">
                      <table id="modal_table" class="table table-stripped" style="border: 0px">
                      <tr>
                                          <td><strong>Kode</strong></td>
                                          <td>: </td>
                                          <td><span id="detail_kode" >-</span></td>
                                        </tr>
                                        <tr>
                                        <tr>
                                          <td width=100px><strong>Nama</strong></td>
                                          <td>: </td>
                                          <td><span id="detail_nama" >-</span></td>
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
                                          <td><strong>Vendor</strong></td>
                                          <td>: </td>
                                          <td><span id="detail_vendor" > - </span></td>
                                        </tr>
                                        </tr>
                                          <td><strong>Harga</strong></td>
                                          <td>: </td>
                                          <td><h3>Rp. <span id="harga_jual" > - </span></h3></td>
                                        </tr>
                                      </table>
                      </div>
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="box box-success  box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title ">Aksi</h3>
                        </div>
                        <div class="box-body">
                          <a class="btn btn-primary download" id="download_inv"><span class="fa fa-remove "></span> Download invoice</a>
                          <a class="btn btn-primary download" id="download_penawaran"><span class="fa fa-remove "></span> Download Penawaran</a>
                          <br>

                          <!-- <a class="btn btn-primary add_page" id="send_email"><span class="fa fa-check "></span> Kirim Email </a> -->
                        </div>
                        <div class="box-footer" style="text-align:right">
                            <a class="btn btn-success add_page" id="selesai"><span class="fa fa-check "></span> Selesai</a>
                        </div>
                    </div>
                    <div id="loading" style="display:none">
                    <center>
                         <img src="<?php echo base_url('css/images/Loading_icon.gif') ?>" alt="">
                         </center>
                    </div>
                </div>
            </div>



<script src="<?php echo base_url() ?>/AdminLTE/bower_components/ckeditor/ckeditor.js"></script>

<script>
$(document).ready(function() {
id = $('#id_booking').val();
  request = $.get("<?php echo base_url('booking') ?>/detail_harga",{id : id});
  request.done(function(data){
  arr = JSON.parse(data);

  $.each(arr, function(key, value){
            var id_val = key;
            $("#"+id_val).text(value);
            $("#"+id_val).val(value);
          });
  })
$('#lanjutkan').click(function(){
        $("#loading").hide();
        $("#email_form").show();
});

$('#selesai').click(function(){
  location.reload();
});

$('.download').click(function(){
    // console.log(id);
    $("#loading").show();
    $("#email_form").hide();
    request = $.get("<?php echo base_url('invoice') ?>/create_invoice_file",{id : id});
    request.done(function(data){
        arr = JSON.parse(data);
        $("#loading").hide();
         window.open(arr.link,'_blank');
    })
});

    CKEDITOR.replace('editor1');

      });


</script>
