<?php
session_start();
        if(empty($_SESSION['username']))
        {
            header('location:?p=login');
        }
        
        $user=$_SESSION['username'];
        $aktif=$induk->useraktif($con,$user);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Learning SMKN 1 Banyuwangi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  
  <!-- jvectormap -->

  <!-- Date Picker -->
  
  <!-- Daterange picker -->
 
  <!-- DataTables -->
  
  <link rel="stylesheet" href="css/style.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green fixed sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b>-L</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>E</b>Learning Esemkasa</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top"> 
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
        
     
          
        
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
    
          <!-- Notifications: style can be found in dropdown.less -->
 
          <!-- Tasks: style can be found in dropdown.less -->
        
          <!-- User Account: style can be found in dropdown.less -->
   
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="img/user0.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            
            <p><b><?php echo $aktif['nm_guru'];?></b></p>
          
          
          <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $aktif['kd_guru'];?></a>
            <a href="?p=logout" class="btn-xs btn-danger">Logout</a>
        </div>
      </div>
      <!-- search form -->

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>

        <li>
          <a href="?p=main">
            <i class="fa fa-home"></i> <span>Beranda</span>
          </a>
        </li>
          
      
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-secret"></i>
            <span>Akun Saya</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=profil"><i class="fa fa-user"></i> Profil Saya</a></li>
            <li><a href="?p=logout"><i class="fa fa-sign-out"></i> Logout</a></li>
          </ul>
        </li>
        </ul>
        
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      
        
        
        <?php
        if ($_GET['p'] == "main")
        {
            require_once('statistic.php');
        }
        else if ($_GET['p'] == "mapel")
        {
            require_once('mapel.php');
        }
        else if ($_GET['p'] == "materi")
        {
            require_once('tambahmateri.php');
        }
        else if ($_GET['p'] == "diskusi")
        {
            require_once('forumdiskusi.php');
        }
        else if ($_GET['p'] == "logsiswa")
        {
            require_once('logsiswa.php');
        }
        else if ($_GET['p'] == "post")
        {
            require_once('tbdiskusi.php');
        }
        else if ($_GET['p'] == "detail")
        {
            require_once('detailmateri.php');
        }
        else if($p=="profil")
        {
            require_once('profilguru.php');
        }
        else if ($p=="gantipw")
        {
            require_once('gantipw.php');
        }
        else if ($p=="presensi")
        {
            require_once('presensi.php');
        }
        ?>
        
        
        

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer fixed">
    <div class="pull-right hidden-xs">
   
    </div>
   Developed By : Esemkasa IT Development Team
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->

<!-- 
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
 -->

<!-- Slimscroll -->
<script src="../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- DataTables -->

</body>
</html>
