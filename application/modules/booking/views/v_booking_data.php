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
                                <td><span id="detail_web">-</span></td>
                            </tr>
                            <tr>
                                <td><strong>Admin</strong></td>
                                <td>: </td>
                                <td><span id="detail_admin">-</span></td>
                            </tr>
                            <tr>
                                <td><strong>Status Pembayaran</strong></td>
                                <td>: </td>
                                <td><span id="detail_pembayaran"> - </span></td>
                            </tr>
                            <tr>
                                <td><strong>Vendor</strong></td>
                                <td>: </td>
                                <td><span id="detail_vendor"> - </span></td>
                            </tr>
                        </table>
                        <table id="modal_table" class="table">
                            <tr>
                                <td><strong>Harga Pokok</strong></td>
                                <td>: </td>
                                <td><span id="harga_pokok">-</span></td>
                            </tr>
                            <tr>
                                <td><strong>Harga Jual</strong></td>
                                <td>: </td>
                                <td><span id="harga_jual">-</span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6 ">
                        <table id="modal_table" class="table">
                            <tr>
                                <td><strong>Nama</strong></td>
                                <td>: </td>
                                <td><span id="detail_nama">-</span></td>
                            </tr>
                            <tr>
                                <td><strong>Telepon</strong></td>
                                <td>: </td>
                                <td><span id="detail_telepon">-</span></td>
                            </tr>
                            <tr>
                                <td><strong>Tujuan</strong></td>
                                <td>: </td>
                                <td><span id="detail_tujuan"> - </span></td>
                            </tr>
                            <tr>
                                <td><strong>Alamat Jemput</strong></strong>
                                </td>
                                <td>: </td>
                                <td><span id="detail_alamat_jemput"> - </span></td>
                            </tr>

                            <tr>
                                <td><strong>Tanggal</strong></td>
                                <td>: </td>
                                <td><span id="detail_tanggal"> - </span></td>
                            </tr>
                            <tr>
                                <td><strong>Unit</strong></td>
                                <td>: </td>
                                <td><span id="detail_unit"> - </span></td>
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

<!-- <script src="<?php echo base_url() ?>js/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url() ?>js/khrsman-pagination.js"></script> -->
<script type="text/javascript">
    $(document).ready(function() {

// onclick disini -----------------------------------------------------------------------------------------------------------------------------

      $('body').on('click', '.edit_harga', function() {
      id = $(this).attr("value");
        $.get("<?php echo base_url('booking/input_harga_unit')?>",{id: id}).done(function(data){
          $("#page_content").html(data);
        });
      });

        $(document).on("click", "tbody>tr", function(e) {
            if ($(e.target).hasClass('btn_detail') || $(e.target).hasClass('btn_delete')) {
                return;
            }
            id = $(this).find(".btn_edit_custom").val();
            request = $.get("<?php echo base_url('booking') ?>/detail_harga", {
                id: id
            });
            request.done(function(data) {
                arr = JSON.parse(data);
                $.each(arr, function(key, value) {
                    var id_val = key;
                    $("#" + id_val).text(value);
                });
            })
            $("#myModal").modal();
        });
        pagination = $('#table').pagination({
            href: "<?php echo site_url() ?>/booking/page",
            plus_column: [2, {
                'class': 'edit_detail',
                'id': 'id_booking',
                'text': 'Edit detail'
            }, {
                'class': 'edit_harga',
                'id': 'id_booking',
                'text': 'Edit harga'
            }],
            hide: "id_booking",
            // edit: "id_booking",
            edit_custom: true,
            delete: "id_booking",
            search: true,
        });
        pagination.init();

// fungsi disini -----------------------------------------------------------------------------------------------------------------------------


    });
</script>
