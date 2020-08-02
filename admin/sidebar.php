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
          <p>Admin Esemkasa</p>
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
          <a href="?page=kelas">
            <i class="fa fa-calendar"></i> <span>Kelas</span>
          </a>
        </li>
        <li>
          <a href="?page=guru">
            <i class="fa fa-calendar"></i> <span>Guru</span>
          </a>
        </li>
        <li>
          <a href="?page=siswa">
            <i class="fa fa-calendar"></i> <span>Siswa</span>
          </a>
        </li>
        <li>
          <a href="?page=mata_pelajaran">
            <i class="fa fa-calendar"></i> <span>Mata Pelajaran</span>
          </a>
        </li>
        <li>
          <a href="?page=pengampu">
            <i class="fa fa-calendar"></i> <span>Pengampu Mapel</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Materi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=materi&materi=tambah_materi"><i class="fa fa-circle-o"></i> Tambah Materi</a></li>
            <li><a href="?page=materi&materi=data_sekarang"><i class="fa fa-circle-o"></i> Materi</a></li>
            <!-- <li><a href="?page=materi&materi=data_kelas&id_kelas=201"><i class="fa fa-circle-o"></i> Materi per Kelas</a></li> -->
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Presensi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=presensi&presensi=guru&id_guru=1"><i class="fa fa-circle-o"></i> Presensi Guru</a></li>
            <li><a href="?page=presensi&presensi=siswa_awal&id_kelas=201"><i class="fa fa-circle-o"></i> Presensi Siswa</a></li>
          </ul>
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