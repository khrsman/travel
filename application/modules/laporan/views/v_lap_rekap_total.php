        <section class="content">

          <div class="row" id="tabel">
              <div class="col-md-6">
                  <div class="box box-primary">
                      <div class="box-header">
                          Pendapatan
                      </div>
                      <div class="box-body">
                          <table id="dt" class="table table-hover table-bordered display nowrap" width="100%" cellspacing="0">
                              <thead>
                                  <tr>
                                     <th>Bis</th>
                                     <th>Jumlah</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                $total_pendapatan = 0;
                                foreach ($data_rekap_pemasukan as $key => $value) {
                                    $total_pendapatan = $total_pendapatan + $value;
                                     ?>

                                  <tr>
                                      <td><?php echo $key ?></td>
                                      <td>Rp. <?php echo number_format($value) ?></td>
                                  </tr>
                                  <?php   } ?>
                              </tbody>
                              <tfooter>
                              <tr>
                                  <td > Total </td>
                                  <td>Rp. <?php echo number_format($total_pendapatan) ?></td>
                              </tr>
                          <tfooter>
                          </table>
                      </div>
                  </div>
              </div>


              <div class="col-md-6">
                  <div class="box box-primary">
                      <div class="box-header">
                          Pengeluaran
                      </div>
                      <div class="box-body">
                          <table id="dt" class="table table-hover table-bordered display nowrap" width="100%" cellspacing="0">
                              <thead>
                                  <tr>
                                     <th>Kategori</th>
                                     <th>Jumlah</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                $total_pengeluaran = 0;
                                foreach ($data_rekap_pengeluaran as $key => $value) {
                                  $total_pengeluaran = $total_pengeluaran + $value['jumlah'];
                                  ?>
                                  <tr>
                                      <td><?php echo $value['kategori'] ?></td>
                                      <td>Rp. <?php echo number_format($value['jumlah']) ?></td>
                                  </tr>
                                  <?php   } ?>
                              </tbody>
                              <tfooter>
                              <tr>
                                  <td > Total </td>
                                  <td>Rp. <?php echo number_format($total_pengeluaran) ?></td>
                              </tr>
                            </tfooter>
                          </table>
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="box box-primary">
                      <div class="box-header">
                          Selisih
                      </div>
                      <div class="box-body">
                          <table id="dt" class="table table-hover table-bordered display nowrap" width="100%" cellspacing="0">
                              <tr>
                                  <td > Total </td>
                                  <td>Rp. <?php echo number_format($total_pendapatan - $total_pengeluaran) ?></td>
                              </tr>
                          </table>
                      </div>
                  </div>
              </div>
          </div>

    </div>
</div>
</section>
