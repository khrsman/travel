        <section class="content">
          <div class="row" id="tabel">        
                                          <div class="col-md-12"> 
                                              <div class="box box-success box-solid">
                                                  <div class="box-header ">
                                                 Laporan Pengeluaran
                                                  </div>
                                                  <div class="box-body">

                                      <table id="dt" class="table table-hover table-bordered display nowrap" width="100%" cellspacing="0">
                                          <thead>
                                              <tr>                                                  
                                                  <th>Tanggal</th>
                                                  <th>Keterangan</th>
                                                  <th>Kategori</th>
                                                  <th>Jenis Pembayaran</th>
                                                  <th>Jumlah</th>                                                                                            
                                              </tr>
                                          </thead>
                                          <tbody>
                                      <?php
                                    $total = $total_harga = $total_kas_jalan =  0;
                                    foreach ($data as $key2 => $value2) {                                           
                                        $total = $total +  $value2['jumlah'];              
                                      ?>
                                    <tr>                                       
                                        <td><?php echo $value2['tanggal'] ?></td>
                                        <td><?php echo $value2['keterangan'] ?></td>
                                        <td><?php echo $value2['kategori'] ?></td>
                                        <td><?php echo $value2['jenis_pembayaran'] ?></td>
                                        <td>Rp.<?php echo  number_format($value2['jumlah']) ?></td>
                                    </tr>
                                    <?php

                                      } ?>
                                </tbody>
                                <tfooter>
                                <tr>
                                    <td colspan="4"> Total </td>
                                    <td>Rp. <?php echo number_format($total) ?></td>
                                </tr>
                            <tfooter>
                            </table>
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
