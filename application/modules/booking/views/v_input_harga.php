<div class="row" id="form_view">
<div class="col-md-4">
   <div id="email_form" >
    <div class="box box-success box-solid">
        <div class="box-header with-border">
            <h3 class="box-title ">Data Booking</h3>
        </div>
        <div class="box-body">
        <table id="modal_table" class="table" style="border: 0px">                          
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
                        </table>
        </div>
    </div>
    </div>
</div>
<div class="col-md-6">
   <div id="email_form" >
    <div class="box box-success box-solid">
        <div class="box-header with-border">
            <h3 class="box-title ">Data Booking</h3>
        </div>
        <div class="box-body">
        <form role="form" class="form-horizontal xform">
							<div class="form-group">
                                  <label class="col-sm-4 control-label">Harga Pokok</label>
                                  <div class="col-sm-4">
                                  <input class="form-control" name="harga_pokok" id="harga_pokok" type="text">
                                  </div>
                            </div>
                            <div class="form-group">
                                  <label class="col-sm-4 control-label">Harga Jual</label>
                                  <div class="col-sm-4">
                                  <input class="form-control" name="harga_jual" id="harga_jual"  type="text">
                                  </div>
                                  <div class="col-sm-2">
                                  <a class="btn btn-primary" id="btn_update_harga"><span class="fa fa-check "></span> update</a>
                                  </div>
                            </div>
                            </form>

        </div>
    </div>
    </div>
</div>
</div>



<script>
$(document).ready(function() {

$('#id_booking').change(function(){
id = $(this).val();

request = $.get("<?php echo base_url('booking') ?>/detail_harga",{id : id});
request.done(function(data){
arr = JSON.parse(data);

$.each(arr, function(key, value){
          var id_val = key;
          $("#"+id_val).text(value);
          $("#"+id_val).val(value);
        });
})
})

$('#btn_update_harga').click(function(){
   if( validate()){
    var data = $('form').serialize();
    request = $.post("<?php echo base_url('booking') ?>/update_harga",{data : data});
    request.done(function(data){
        notify_success('Data berhasil di update');
        data_page();
    })
    request.fail(function() {
        notify_error('Terjadi Kesalahan');
    })
}
    })

});

</script>