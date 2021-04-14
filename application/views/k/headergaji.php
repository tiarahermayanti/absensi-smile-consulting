
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Absensi Smile Consulting Indonesia</title>

  <!-- Favicons -->
  <link href="<?php echo base_url();?>assets/img/favicon.png" rel="icon">
  <link href="<?php echo base_url();?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url();?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="<?php echo base_url();?>assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/style-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>
<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="<?php echo site_url("c_karyawan");?>" class="logo"><b>SMILE CONSULTING INDONESIA</b></a>
      <!--logo end-->
      
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li style="padding-right: 30px; padding-top: 20px">
            <?php
                if(function_exists ('date_default_timezone_set'))
                date_default_timezone_set('Asia/Jakarta');
                ?>
                <span id="clock">&nbsp;</span>
          </li>
          <li><a class="logout" href="<?php echo site_url("c_login/logout");?>">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><img src="<?php echo base_url();?>uploads/foto_profile/<?php echo $this->session->userdata('foto'); ?>" class="img-circle" width="80"></a></p>
          <h5 class="centered"><?php echo $this->session->userdata('nama'); ?></h5>
          <li class="mt">
            <a  href="<?php echo site_url("c_karyawan");?>">
              <i class="fa fa-home"></i>
              <span>Absensi</span>
              </a>
          </li>
          
          <li>
            <a href="<?php echo site_url("c_karyawan/infoKaryawan");?>">
              <i class="fa fa-address-book"></i>
              <span>Informasi Karyawan</span>
              </a>
          </li>
         
          <li>
            <a href="<?php echo site_url("c_karyawan/jadwalKaryawan");?>">
              <i class="fa fa-clock-o"></i>
              <span>Jadwal Kantor</span>
              </a>
          </li> 

          <li>
            <a href="<?php echo site_url("c_karyawan/lapAbsen");?>">
              <i class="fa fa-file-o"></i>
              <span>Laporan Absensi</span>
              </a>
          </li>

          <li>
            <a href="<?php echo site_url("c_karyawan/izin"); ?>">
              <i class="fa fa-calendar-o "></i>
              <span>Pengajuan Izin</span>
              </a>
          </li>
          <li>
            <a class="active" href="<?php echo site_url("c_karyawan/gaji"); ?>">
              <i class="fa fa-money"></i>
              <span>Informasi Gaji</span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    
     <?php echo $contents; ?>


  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url();?>assets/lib/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="<?php echo base_url();?>assets/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="<?php echo base_url();?>assets/lib/jquery.scrollTo.min.js"></script>
  <script src="l<?php echo base_url();?>assets/ib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="<?php echo base_url();?>assets/lib/common-scripts.js"></script>
  <!--script for this page-->

</body>

</html>