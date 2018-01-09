        <section class="content">
          <div class="row" id="tabel">
              <div class="col-md-12">
                  <div class="box box-primary box-solid">
                      <div class="box-header">
                         Laporan Rekap Pendapatan 
                      </div>
                      <div class="box-body">
                          <table id="dt" class="table table-hover table-bordered display nowrap" width="100%" cellspacing="0">
                              <thead>
                                  <tr>
                                     <th>Unit</th>
                                     <th>Jumlah Hari</th>
                                     <th>Total</th>
                                     <th>Kas Jalan</th>
                                     <th>Selisih</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($data_rekap as $key => $value) { ?>
                                  <tr>
                                      <td><?php echo $value['seri'] ?></td>
                                      <td><?php echo $value['jumlah_hari'] ?> Hari</td> 
                                      <td>Rp. <?php echo  number_format($value['total']) ?></td> 
                                      <td>Rp. <?php echo  number_format($value['kas_jalan']) ?></td> 
                                      <td>Rp. <?php echo  number_format($value['total'] - $value['kas_jalan']) ?></td> 
                                  </tr>
                                  <?php   } ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>

    </div>
</div>
</section>
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
