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
  <link href="<?php echo base_url();?>assets/lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo base_url();?>assets/lib/advanced-datatable/css/DT_bootstrap.css" />
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/style-responsive.css" rel="stylesheet">

  <link href="<?php echo base_url();?>assets/lib/fancybox/jquery.fancybox.css" rel="stylesheet" />
  <script src="<?php echo base_url();?>assets/lib/jquery/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/lib/bootstrap-fileupload/bootstrap-fileupload.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/lib/bootstrap-daterangepicker/daterangepicker.css" />

  <!-- untuk menampilkan modal -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
      <a href="<?php echo site_url("c_pimpinan");?>" class="logo"><b>SMILE CONSULTING INDONESIA</b></a>
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
          <?php if($this->session->userdata('foto') != ""){ ?>
          <p class="centered"><img src="<?php echo base_url();?>uploads/foto_profile/<?php echo $this->session->userdata('foto'); ?>" class="img-circle" width="80"></a></p>
          <?php } else {?>
            <p class="centered"><img src="<?php echo base_url();?>uploads/foto_profile/empty.png" class="img-circle" width="80"></a></p>
          <?php } ?>
          <h5 class="centered"><?php echo $this->session->userdata('nama'); ?></h5>
          <li class="mt">
            <a  href="<?php echo site_url("c_pimpinan");?>">
              <i class="fa fa-tachometer"></i>
              <span>Dashboard</span>
              </a>
          </li>
          
          <li>
            <a href="<?php echo site_url("c_pimpinan/infoKaryawan");?>">
              <i class="fa fa-address-book"></i>
              <span>Informasi Karyawan</span>
              </a>
          </li>
         
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-clock-o"></i>
              <span>Jadwal Kantor</span>
              </a>
            <ul class="sub">
              <li><a href="<?php echo site_url("c_pimpinan/jadwalKaryawan");?>">Jam Kerja </a></li>
              <li><a href="<?php echo site_url("c_pimpinan/KegiatanLuar");?>">Jadwal Kegiatan Luar</a></li>
              
            </ul>
          </li>

         
          <li  class="sub-menu">
            <a   href="javascript:;">
              <i class="fa fa-file-o"></i>
              <span>Laporan Absensi</span>
              </a>
            <ul class="sub">
              <li><a href="<?php echo site_url("c_pimpinan/laporanToday");?>">Laporan Hari Ini</a></li>
              <li><a href="<?php echo site_url("c_pimpinan/laporanAll");?>">Laporan Per Departemen</a></li>
              <li><a href="<?php echo site_url("c_pimpinan/absenKaryawan");?>">Laporan Per Karyawan</a></li>
            </ul>
          </li>

          <li>
            <a href="<?php echo site_url("c_pimpinan/izin"); ?>">
              <i class="fa fa-calendar-o "></i>
              <span>Pengajuan Izin</span>
              </a>
          </li>
          <li>
            <a class="active" href="<?php echo site_url("c_pimpinan/gaji"); ?>">
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

    <!--main content end-->
   

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url();?>assets/lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/lib/advanced-datatable/js/jquery.js"></script>
  <script src="<?php echo base_url();?>assets/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="<?php echo base_url();?>assets/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="<?php echo base_url();?>assets/lib/jquery.scrollTo.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="<?php echo base_url();?>assets/lib/common-scripts.js"></script>

   <!-- image bisa diperbesar -->
  <script src="<?php echo base_url();?>assets/lib/fancybox/jquery.fancybox.js"></script>

  <!-- advanced form -->
  <script src="<?php echo base_url();?>assets/lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/lib/bootstrap-daterangepicker/moment.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/advanced-form-components.js"></script>

 <script type="text/javascript">
    $(function() {
      //    fancybox
      jQuery(".fancybox").fancybox();
    });
  </script>

  <script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
      sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
      sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
      sOut += '</table>';

      return sOut;
    }

    $(document).ready(function() {
      /*
       * Insert a 'details' column to the table
       */
      // var nCloneTh = document.createElement('th');
      // var nCloneTd = document.createElement('td');
      // nCloneTd.innerHTML = '<img src="<?php echo base_url();?>assets/lib/advanced-datatable/images/details_open.png">';
      // nCloneTd.className = "center";

      // $('#hidden-table-info thead tr').each(function() {
      //   this.insertBefore(nCloneTh, this.childNodes[0]);
      // });

      // $('#hidden-table-info tbody tr').each(function() {
      //   this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
      // });

      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
      var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [1, 'asc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
      // $('#hidden-table-info tbody td img').live('click', function() {
      //   var nTr = $(this).parents('tr')[0];
      //   if (oTable.fnIsOpen(nTr)) {
      //     /* This row is already open - close it */
      //     this.src = "<?php echo base_url();?>assets/lib/advanced-datatable/media/images/details_open.png";
      //     oTable.fnClose(nTr);
      //   } else {
      //     /* Open this row */
      //     this.src = "<?php echo base_url();?>assets/lib/advanced-datatable/images/details_close.png";
      //     oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
      //   }
      // });
    });
  </script>

 

</body>

  

</html>
