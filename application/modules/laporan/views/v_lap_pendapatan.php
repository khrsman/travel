        <section class="content">
          <div class="row" id="tabel">
                                  <?php
                                
                                  $total = 0;
                                  foreach ($data as $key => $value) {                                                  
                                    ?>
                                          <div class="col-md-12"> 
                                              <div class="box box-primary box-solid">
                                                  <div class="box-header ">
                                                  Pendapatan bus <?php echo $key ?>
                                                  </div>
                                                  <div class="box-body">

                                      <table id="dt" class="table table-hover table-bordered display nowrap" width="100%" cellspacing="0">
                                          <thead>
                                              <tr>                                                  
                                                  <th>Tanggal</th>
                                                  <th>Nama</th>
                                                  <th>Alamat</th>
                                                  <th>Tujuan</th>
                                                  <th>Hari</th>
                                                  <th>Harga</th>                                                
                                                  <th>Kas Jalan</th>                                                
                                                  <th>Sisa</th>                                                
                                              </tr>
                                          </thead>
                                          <tbody>
                                      <?php
                                    $total = $total_harga = $total_kas_jalan =  0;
                                    foreach ($value as $key2 => $value2) {   
                                        $selisih =  $value2['harga'] - $value2['kas_jalan'];
                                        $total = $total + $selisih; 
                                        $total_harga = $total_harga + $value2['harga'];
                                        $total_kas_jalan = $total_kas_jalan +$value2['kas_jalan'];                   
                                      ?>
                                    <tr>                                       
                                        <td><?php echo $value2['tanggal'] ?></td>
                                        <td><?php echo $value2['nama_penyewa'] ?></td>
                                        <td><?php echo $value2['alamat_jemput'] ?></td>
                                        <td><?php echo $value2['tujuan'] ?></td>                                       
                                        <td><?php echo $value2['jumlah_hari'] ?></td>
                                        <td>Rp. <?php echo number_format($value2['harga']) ?></td>
                                        <td>Rp. <?php echo number_format($value2['kas_jalan']) ?></td>
                                        <td>Rp. <?php echo number_format($selisih) ?></td>
                                    </tr>
                                    <?php

                                      } ?>
                                </tbody>
                                <tfooter>
                                <tr>
                                    <td colspan="5"> Total </td>
                                    <td>Rp. <?php echo number_format($total_harga) ?></td>
                                    <td>Rp. <?php echo number_format($total_kas_jalan) ?></td>
                                    <td>Rp. <?php echo number_format($total) ?></td>
                                </tr>
                            <tfooter>
                            </table>
                        </div>
                    </div>
                </div>
                                  <?php
                                  }
                                    ?>
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
