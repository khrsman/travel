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
<script src="<?php echo base_url() ?>js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url() ?>js/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url() ?>js/khrsman-pagination.js"></script>
<script type="text/javascript">
$(document).ready(function () {
pagination = $('#table').pagination({
    href:"<?php echo site_url() ?>/invoice/page",
    // plus_column: ,
    hide: "id_invoice",
    edit: "id_invoice",
    delete: "id_invoice",
    search: true,
  });
  pagination.init();
      });

</script>
