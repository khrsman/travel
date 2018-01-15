<div class="row" id="form_view">

<div class="col-md-8">
   <div id="email_form" >
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title ">Input Harga</h3>
        </div>
        <div class="box-body">

        <form role="form" class="form-horizontal xform">
        <table class="table" style="border:0;">
          <style media="screen">
          .table th{
            border: 1px solid #3C8DBC;
            color: #263238;
            background: transparent;
            text-align: center;
          }
          </style>
        <thead>
        <th>Unit</th>
        <th>Tanggal</th>
        <th>Vendor</th>
        <th>Tujuan</th>
        <th>Harga</th>
        </thead>
        <?php
        foreach ($data as $key => $value) {
        ?>
        <input readonly="" class="form-control" id="id_booking" type="hidden" value="<?php echo $value['id_booking'] ?>">
        <input readonly="" class="form-control" name="data[<?php echo $key ?>][id]" id="unit" type="hidden" value="<?php echo $value['id'] ?>">
        <tr>
        <td>
          <input class="form-control" name="data[<?php echo $key ?>][id_unit]" id="unit" type="hidden" value="<?php echo $value['id_unit'] ?>">
          <input readonly="" class="form-control" type="text" value="<?php echo $value['unit'] ?>">
        </td>
        <td><input readonly="" class="form-control" name="data[<?php echo $key ?>][tanggal]" id="tanggal" type="text" value="<?php echo $value['tanggal'] ?>"></td>
        <td>
          <input class="form-control" name="data[<?php echo $key ?>][id_vendor]" id="unit" type="hidden" value="<?php echo $value['id_vendor'] ?>">
          <input class="form-control" type="text" value="<?php echo $value['vendor'] ?>">
        </td>
        <td><input class="form-control" name="data[<?php echo $key ?>][tujuan]" id="tujuan" type="text" value="<?php echo $value['tujuan'] ?>"></td>
        <td><input class="form-control" name="data[<?php echo $key ?>][harga]" id="harga" type="text" value="<?php echo $value['harga'] ?>"></td>
        </tr>
        <?php
        }
        ?>
</table>
                            </form>
                            <div class="box-footer" style="text-align:right">
                                <a class="btn btn-primary" id="btn_simpan_harga"><span class="fa fa-check "></span> Lanjutkann</a>
                            </div>

        </div>
    </div>
    </div>
</div>
</div>



<script>
function redirect(){
  id = $("#id_booking").val();
  $.get("<?php echo base_url('booking/view_invoice')?>", {id: id }).done(function(data){
    $("#page_content").html(data);
  });
}

$('#btn_simpan_harga').click(function(){
    var data = $('form').serialize();
    request = $.post("<?php echo base_url('booking') ?>/update_harga",{data : data});
    request.done(function(data){
        notify_success('Data berhasil di simpan');
        redirect();
    })
    request.fail(function() {
        notify_error('Terjadi Kesalahan ');
    })
    });

</script>
