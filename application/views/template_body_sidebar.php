<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <!-- <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url() ?>/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Admin</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div> -->
    <!-- search form -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <!-- <li class="header">MAIN NAVIGATION</li> -->
      <!-- <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard text-red"></i> <span>Dashboard</span></a></li> -->
      <li><a href="<?php echo base_url() ?>booking/jadwal"><i class="fa fa-dashboard text-red"></i> <span>Jadwal</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-folder-open "></i> <span>Data Master</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" >
          <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Pengguna sistem </a></li> -->
          <li><a href="<?php echo base_url('unit') ?>"><i class="fa fa-circle-o"></i> Unit Kendaraan </a></li>
          <li><a href="<?php echo base_url('vendor') ?>"><i class="fa fa-circle-o"></i> Vendor </a></li>
          <li><a href="<?php echo base_url('penanggung_jawab') ?>"><i class="fa fa-circle-o"></i> Admin </a></li>
          <li><a href="<?php echo base_url('sumber') ?>"><i class="fa fa-circle-o"></i> Sumber web </a></li>
          <li><a href="<?php echo base_url('customer') ?>"><i class="fa fa-circle-o"></i> Customer </a></li>
          <li><a href="<?php echo base_url('kategori_pengeluaran') ?>"><i class="fa fa-circle-o"></i> Kategori Pengeluaran </a></li>
          <li><a href="<?php echo base_url('jenis_pembayaran') ?>"><i class="fa fa-circle-o"></i> Jenis Pembayaran </a></li>

        </ul>
      </li>
      <li class=" treeview menu-open">
        <a href="#">
          <i class="fa fa-folder-open "></i> <span>Transaksi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: block;">
          <li><a href="<?php echo base_url('booking') ?>"><i class="fa fa-circle-o"></i>Booking </a></li>
          <li><a href="<?php echo base_url('pembayaran') ?>"><i class="fa fa-circle-o"></i> Pembayaran Customer</a></li>
          <li><a href="<?php echo base_url('pembayaran_vendor') ?>"><i class="fa fa-circle-o"></i> Pembayaran Vendor</a></li>
          <!-- <li><a href="<?php echo base_url('invoice') ?>"><i class="fa fa-circle-o"></i> Invoice </a></li> -->
          <li><a href="<?php echo base_url('pengeluaran') ?>"><i class="fa fa-circle-o"></i> Pengeluaran </a></li>
        </ul>
      </li>
      <li class=" treeview">
        <a href="#">
          <i class="fa fa-folder-open "></i> <span>Laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('laporan') ?>"><i class="fa fa-circle-o"></i> Laporan </a></li>
        </ul>
      </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
