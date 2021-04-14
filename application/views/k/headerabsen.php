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
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/style-responsive.css" rel="stylesheet">
  <script src="<?php echo base_url();?>assets/lib/chart-master/Chart.js"></script>

  <!-- advanced form -->
   <!--external css-->
  <link href="<?php echo base_url();?>assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/lib/bootstrap-fileupload/bootstrap-fileupload.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/lib/bootstrap-daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/lib/bootstrap-timepicker/compiled/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/lib/bootstrap-datetimepicker/datertimepicker.css" />
  <!-- Custom styles for this template -->


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
        <!--   <li style="padding-right: 15px; padding-top: 20px">
            <?php
                if(function_exists ('date_default_timezone_set'))
                date_default_timezone_set('Asia/Jakarta');
                ?>
                <span id="clock" style="font-size: 13px">&nbsp;</span>
          </li> -->
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
            <a class="active" href="<?php echo site_url("c_karyawan");?>">
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
            <a href="<?php echo site_url("c_karyawan/gaji"); ?>">
              <i class="fa fa-money"></i>
              <span>Informasi Gaji</span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    
    
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        
    <!--main content start-->
    <?php echo $contents; ?>
    <!--main content end-->

    <!--footer start-->
<!--     <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div>
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
 -->    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url();?>assets/lib/jquery/jquery.min.js"></script>

  <script src="<?php echo base_url();?>assets/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="<?php echo base_url();?>assets/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="<?php echo base_url();?>assets/lib/jquery.scrollTo.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="<?php echo base_url();?>assets/lib/common-scripts.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="<?php echo base_url();?>assets/lib/sparkline-chart.js"></script>
  <script src="<?php echo base_url();?>assets/lib/zabuto_calendar.js"></script>

  <!-- advance form -->
    <!-- js placed at the end of the document so the pages load faster -->
  
  <!--common script for all pages-->
  <!--script for this page-->
  <script src="<?php echo base_url();?>assets/lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/lib/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="<?php echo base_url();?>assets/lib/advanced-form-components.js"></script>


  <!-- <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome to Dashio!',
        // (string | mandatory) the text inside the notification
        text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
        // (string | optional) the image to display on the left
        image: 'img/ui-sam.jpg',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script> -->
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>

   <script type="text/javascript">
          var d = new Date();
          var hours = d.getHours();
          var minutes = d.getMinutes();
          var seconds = d.getSeconds();
          var hari = d.getDay();
          var namaHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
          hariIni = namaHari[hari];
          var tanggal = ("0" + d.getDate()).slice(-2);
          var month = new Array();
          month[0] = "Januari";
          month[1] = "Februari";
          month[2] = "Maret";
          month[3] = "April";
          month[4] = "Mei";
          month[5] = "Juni";
          month[6] = "Juli";
          month[7] = "Agustus";
          month[8] = "September";
          month[9] = "Oktober";
          month[10] = "Nopember";
          month[11] = "Desember";
          var bulan = month[d.getMonth()];
          var tahun = d.getFullYear();
          var date = Date.now(),
          second = 1000;
          function pad(num) {
            return ('0' + num).slice(-2);
            }
          function updateClock() {
              var clockEl = document.getElementById('clock'),
              dateObj;
              date += second;
              dateObj = new Date(date);
              clockEl.innerHTML = '' + hariIni + '.  ' + tanggal + ' ' + bulan + ' ' + tahun + '. ' + pad(dateObj.getHours()) + ':' + pad(dateObj.getMinutes()) + ':' + pad(dateObj.getSeconds());
          }
          setInterval(updateClock, second);
      </script>
</body>

</html>
