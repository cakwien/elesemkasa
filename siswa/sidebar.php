  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $glob_nisn; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGASI UTAMA</li>
        <li>
          <a href="?page=beranda">
            <i class="fa fa-calendar"></i> <span>Beranda</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li>
          <a href="?page=mata_pelajaran">
            <i class="fa fa-calendar"></i> <span>Mata Pelajaran</span>
          </a>
        </li>
        <li>
          <a href="?page=laporan_presensi&tanggal_cari=<?php echo date("Y-m-1")?>">
            <i class="fa fa-calendar"></i> <span>Laporan Presensi</span>
          </a>
        </li>
        <li>
          <a href="?pag=login&aksi=logout">
            <i class="fa fa-calendar"></i> <span>Logout</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>