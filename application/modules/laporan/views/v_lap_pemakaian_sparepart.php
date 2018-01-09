            <div class="row" id="tabel">
                <div class="col-md-12">
                    <div class="box box-primary box-solid">

                        <div class="box-header">
                         Laporan Pemakaian Sparepart
                        </div>
                        <div class="box-body">
                            <table id="dt" class="table table-hover table-bordered display nowrap" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                       <th>Unit</th>
                                       <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $total = 0;
                                  foreach ($data as $key => $value) {
                                    $jumlah = $value['jumlah'];
                                    $jumlah =  str_replace(",","",$jumlah);
                                    $total = $total+$jumlah
                                    ?>
                                    <tr>
                                        <td><?php echo $value['tanggal'] ?></td>
                                        <td><?php echo $value['nama_sparepart'] ?></td>
                                        <td><?php echo $value['unit'] ?></td>
                                        <td><?php echo $value['jumlah'] ?> </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                                <tfooter>
                                <tr>
                                    <td colspan="3"> Total </td>
                                    <td><?php echo number_format($total) ?></td>
                                </tr>
                            <tfooter>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


<script type="text/javascript" src="<?php echo base_url() ?>js/datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/datepicker/locales/bootstrap-datepicker.id.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>js/datepicker/css/bootstrap-datepicker.css">
<script src="<?php echo base_url() ?>js/jquery.multiselect.js"></script>
<script>
	 $(function(){
     $('.datepicker').datepicker({
           format: 'dd/mm/yyyy',
           todayBtn: "linked",
           language: "id",
           calendarWeeks: true,
           autoclose: true
      });
      $('#langOpt').multiselect({
          selectAll: true,
          columns: 2,
          placeholder: 'Pilih Kategori'
      });
	 });
</script>
