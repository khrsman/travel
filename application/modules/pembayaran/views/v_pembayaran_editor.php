              <div class="row" id="form_view">
                <div class="col-md-4">
                <div class="box box-primary  box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title ">Pembayaran</h3>
                        </div>
                        <div class="box-body">
                            <form role="form" class="form-horizontal xform">
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
                                <input type="hidden" id="id_pembayaran" name="id_pembayaran" >
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
                                  <label class="col-sm-4 control-label">Status</label>
                                  <div class="col-sm-8">
                                  <?php

                                  $this->cb_options->status();
                              ?>
                                  </div>
                            </div>
													<div class="form-group">
                                  <label class="col-sm-4 control-label">Jumlah</label>
                                  <div class="col-sm-8">
                                      <input type = "text" name="jumlah" id="jumlah" class="form-control"  >
                                  </div>
                            </div>


													<div class="form-group">
                                  <label class="col-sm-4 control-label">Sisa</label>
                                  <div class="col-sm-8">
                                      <input type = "text" name="sisa" id="sisa" class="form-control"  >
                                  </div>
                            </div>

                            </form>
                        </div>
                        <div class="box-footer" style="text-align:right">
                            <a class="btn btn-danger btn_aksi" id="btn_cancel"><span class="fa fa-remove "></span> Cancel</a>
                            <a class="btn btn-primary  btn_aksi add_page" id="btn_simpan_pembayaran"><span class="fa fa-check "></span> Simpan</a>
                            <!-- <a class="btn btn-primary edit_page" id="btn_update"><span class="fa fa-check "></span> update</a> -->
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                        <div class="box box-success  box-solid" id="aksi" style="display:none">
                          <div class="box-header with-border">
                              <h3 class="box-title ">Aksi</h3>
                          </div>
                          <div class="box-body">
                            <div class="aksi" display="none">
                              <a class="btn btn-primary download" id="download_inv"><span class="fa fa-remove "></span> Download invoice</a>
                              <a class="btn btn-primary download" id="download_kwitansi"><span class="fa fa-remove "></span> Download Kwitansi</a>
                            </div>
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


    <div class="box box-success box-solid" id="detail_booking">
        <div class="box-header with-border">
            <h3 class="box-title ">Data Booking</h3>
        </div>
        <div class="box-body">
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
                            <td><h3><span id="harga_jual" > - </span></h3></td>
                          </tr>
                        </table>
        </div>
    </div>
</div>

            </div>

            <script type="text/javascript" src="<?php echo base_url() ?>js/datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/datepicker/locales/bootstrap-datepicker.id.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>js/datepicker/css/bootstrap-datepicker.css">

<script>
$(document).ready(function() {


  function redirect(){
    id = $("#id_booking").val();
    $.get("<?php echo base_url('booking/view_invoice')?>", {id: id }).done(function(data){
      $("#page_content").html(data);
    });
  }

  $('#btn_simpan_pembayaran').click(function(){
      var data = $('form').serialize();
      request = $.post("<?php echo base_url('pembayaran') ?>/add",{data : data});
      request.done(function(data){
          notify_success('Data berhasil di simpan');
          $("#aksi").show();
          $("#detail_booking").hide();
          $(".btn_aksi").hide();

          // redirect();
      })
      request.fail(function() {
          notify_error('Terjadi Kesalahan ');
      })
      });

      $('#selesai').click(function(){
        location.reload();
      });

      $('#download_kwitansi').click(function(){
        id = $('#id_booking').val();
        $("#loading").show();
        request = $.get("<?php echo base_url('pembayaran') ?>/create_kwitansi_file",{id : id});
        request.done(function(data){
            arr = JSON.parse(data);
            $("#loading").hide();
             window.open(arr.link,'_blank');
        })
      });


$('#jumlah').keyup(function(){
    total = $("#harga_jual").text();
    jumlah = $(this).val();
    sisa = total-jumlah;
    $("#sisa").val(sisa);
})

         $('.datepicker').datepicker({
           format: 'dd/mm/yyyy',
           todayBtn: "linked",
           language: "id",
           calendarWeeks: true,
           autoclose: true
      });

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
      });
</script>
