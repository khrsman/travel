


<div class="row" id="form_view">
    <form role="form" class="form-horizontal xform">
        <div class="col-md-8">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah Booking</h3><span style="font-size:20px;margin: 0px;float: right;display: inline;" id="kode_booking"></span>
                </div>
                <div class="box-body">

                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" id="id_booking" name="id_bookingg">
                            <input type="hidden" id="kode" name="kode">
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
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Tujuan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="tujuan" id="tujuan" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Lokasi jemput</label>
                                <div class="col-sm-8">
                                    <input type="text" name="lokasi_jemput" id="lokasi_jemput" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal</label>
                                <div class="col-sm-8">
                                    <div id="mdp_tanggal_booking"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal &unit</label>
                                <div class="col-sm-10 form_harga_unit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer" style="text-align:right">
                        <a class="btn btn-primary add_page" id="btn_simpan_detail"><span class="fa fa-check "></span> Lanjutkan</a>
                    </div>
                </div>
            </div>
        </div>
</div>

</form>
</div>



<script type="text/javascript">
    $(document).ready(function() {
      get_kode();

//action on click disini --------------------------------------------------------------------------------------------------------------------

        $('body').on('click', '#btn_simpan_detail', function() {
            var data = $('form').serialize();
            insert(data, redirect);
        });
        $("#id_sumber").change(function() {
            get_kode();
        })

        eventSelect = $('.select2').select2({
            placeholder: "Pilih",
        });
        $('#mdp_tanggal_booking').multiDatesPicker({
            dateFormat: "d-m-yy",
            // altField: '#tanggal',
            onSelect: function(date) {
                val = date;
                text = date;

                if ($('#' + val).length === 0) {
                    var request = $.get("<?php echo base_url(); ?>booking/select_unit", {
                        date: date
                    });
                    request.done(function(data) {
                        add3 = '<div class="harga_per_unit" id="' + val + '"><label class="col-sm-3 control-label">' + text + ' </label><div class="col-sm-9">' + data + '</div>'
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
                } else {
                    $('#' + val).remove();

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
    });
    // $('#tanggal_input').datepicker({
    //       format: 'dd/mm/yyyy',
    //       todayBtn: "linked",
    //       language: "id",
    //       calendarWeeks: true,
    //       autoclose: true
    //  });

// fungsi disini --------------------------------------------------------------------------------------------------------------------

function get_kode() {
    tanggal = $("#tanggal_input").val();
    id_sumber = $("#id_sumber").val();
    $.get("<?php echo base_url('booking/get_kode_booking')?>", {
        tanggal: tanggal,
        id_sumber: id_sumber
    }).done(function(data) {
        $("#kode_booking").text(data);
        $("#kode").val(data);
    });
}
    function redirect() {
        $.post("<?php echo base_url('booking/input_harga_unit')?>").done(function(data) {
            $("#page_content").html(data);
        });
    }


</script>
