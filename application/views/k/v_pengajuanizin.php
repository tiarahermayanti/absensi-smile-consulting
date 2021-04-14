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

  <script src="<?php echo base_url();?>assets/lib/jquery/jquery.min.js"></script>

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

  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/lib/bootstrap-fileupload/bootstrap-fileupload.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/lib/bootstrap-daterangepicker/daterangepicker.css" />

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
            <a class="active" href="<?php echo site_url("c_karyawan/izin"); ?>">
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
    <section id="main-content">
      <section class="wrapper">
          <!-- page start-->
          <div class="content-panel" style="padding-right: 2%; padding-left: 2%">
           
              <div class="row mb" style="padding-right: 2%; padding-left: 2%" >
                <h3 style="float: left;">Pengajuan Izin</h3>

                 <a href="#" data-toggle="modal" data-target="#tambah-data"><button  style="float: right; margin-top: 20px" class="btn btn-primary"><i class="fa fa-plus"></i> Ajukan Izin</button> </a>
              </div>
        
            <div class="adv-table" style="overflow: auto; margin-top: 50px" >
               
              <table class="table table-striped table-advance table-hover" id="hidden-table-info" style="color: #000000; border: 1px solid #ccc">
                <!-- <table class="table table-striped table-advance table-hover" id="hidden-table-info> -->
                
                <thead class="text-primary">
                  <tr>
                        <th>No</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Jenis</th>
                        <th>Periode Tanggal</th>
                        <th>Keterangan</th>
                        <th>Foto Pendukung</th>
                        <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                   <?php 
                        $no=1;
                        foreach ($izin->result() as $x ) { ?>
                          
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $x->izin_tgl_pengajuan; ?></td>
                          <td><?php echo $x->nama_izin_jenis; ?></td>
                          <td><?php echo $x->izin_mulai; ?> s/d <?php echo $x->izin_berakhir; ?></td>
                          <td style="width: 30%;"><?php echo $x->izin_ket; ?></td>
                           <td style="width: 15%;">
                            <?php if($x->izin_upload == "null"){ ?>
                              <p style="color: #ccc">Tidak ada foto</p>
                           <?php  } else {
                              ?>
                              <div>
                              <div class="project-wrapper">
                                <div class="project">
                                  <div class="photo-wrapper">
                                    <div class="photo">
                                      <a class="fancybox" href="<?php echo base_url();?>uploads/izin/<?php echo $x->izin_upload; ?>"><img class="img-responsive" src="<?php echo base_url();?>uploads/izin/<?php echo $x->izin_upload; ?>" alt=""></a>
                                    </div>
                                    <div class="overlay"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <?php } ?>
                          </td>
                          <td>
                            <?php if($x->id_izin_status == 1){ ?>
                                <span class="label label-warning label-mini"><?php echo $x->nama_status_izin; ?></span></td>
                            <?php } else if($x->id_izin_status == 2){ ?>
                                <span class="label label-success label-mini"><?php echo $x->nama_status_izin; ?></span></td>
                            <?php } else if($x->id_izin_status == 3){?>
                                <span class="label label-danger label-mini"><?php echo $x->nama_status_izin; ?></span></td>
                            <?php } ?>
                         
                          <!-- <td><a href="<?php echo base_url('c_karyawan/detailIzin/'.$x->izin_id);?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a> </td>
                        </tr> -->

                        <?php $no++; } ?>
                </tbody>
              </table>
            
          <!-- page end-->
        </div>
      </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->

    <!-- Modal Tambah -->
     <div class="col-lg-12">
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">

     <div class="modal-dialog">

         <div class="modal-content">
             <div class="modal-header">
                  <strong style="color: #ffffff">PENGAJUAN IZIN</strong>
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button> 
             </div>

             <div class="row">
              <div class="col-lg-12">
                <div class="form-panel">
                  <form action="<?php echo site_url('c_karyawan/saveIzin');?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                      <div class="form-group">
                          <label class="control-label col-md-3">Jenis Absen</label>
                          <div class="col-md-9 col-xs-11">
                            <select class="form-control" name="jenis" id="jenis" required>
                              <option value="">Pilih Jenis Absensi</option>
                               <?php  foreach ($jenis->result() as $j ) { ?>
                              <option value="<?php echo $j->id_izin_jenis; ?>"><?php echo $j->nama_izin_jenis;?></option>
                              <?php } ?>
                            </select>
                            
                          </div>
                        </div>

                         <div id="sisacuti" style="display:none">
                        <div id="perulangan"></div>
                             
                        </div>

                      <div class="form-group">
                          <label class="control-label col-md-3">Tanggal Absen</label>
                              <div class="col-md-9 col-xs-11">
                                <div class="input-group input-large" >
                                  <input type="date" class="form-control" name="mulai" required>
                                  <span class="input-group-addon">s/d</span>
                                  <input type="date" class="form-control" name="sampai" required>
                                </div>
                              </div>
                           
                          </div>

                         <div class="form-group">
                          <label class="control-label col-md-3">Keterangan</label>
                          <div class="col-md-9 col-xs-11">
                                <textarea rows="6" cols="30" class="form-control" name="keterangan" placeholder="Wajib menyertakan keterangan yang menunjang pilihan dalam absensi anda" required></textarea>
                          </div>
                        </div>
 
                        <div class="form-group">
                          <label class="control-label col-md-3">Upload</label>
                          <div class="col-md-9 col-xs-11 controls">
                             <div class="fileupload fileupload-new" data-provides="fileupload">
                                <span class="btn btn-theme02 btn-file">
                                  <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select file</span>
                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                <input type="file" name="foto" class="default" />
                                </span>
                                <span class="fileupload-preview" style="margin-left:5px;"></span>
                                <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>

                              </div>
                              <div class="row" style="margin-bottom: 10px; text-align: left; margin-left:5px;">
                                <span style="font-size: 10px">
                                      Format foto : gif, jpg, jpeg, png, bmp. Ukuran foto max : 5MB
                                      </span>
                              </div>
                              
                          </div>
                        </div>

                         <div class="form-group">
                          <label class="control-label col-md-3"></label>
                          <div class="col-md-9 col-xs-11">
                                <button style="float: right; margin-top: 20px;" type="submit" class="btn btn-primary btn-sm">KIRIM</button>
                          </div>
                        </div>
                        

                         
                      </form>                 
                  </div>
             </div>
                                    
            </div>
             </div>
         </div>
     </div>
 </div>
 <!-- END Modal Tambah -->

    <!--main content end-->
    

    <!-- js placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url();?>assets/lib/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/bootstrap/js/bootstrap.min.js"></script>
  <!-- <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/lib/advanced-datatable/js/jquery.js"></script> -->
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
    
      var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [1, 'asc']
        ]
      });

    });
  </script>

   <script>
$(document).ready(function(){

    $("#jenis").change(function(){
        var jenis = $('#jenis').find(":selected").val();
         var id = $('#kry_id').find(":selected").val();
          if (jenis == "4") {
              $('#perulangan').append(
                // "<?php foreach ($this->m_izin->get_sisacuti("+12345+")->result() as $key) { ?> " +
                 "<div class='form-group'>" +
                              "<label class='control-label col-md-3'>Sisa Cuti</label>"+
                              "<div class='col-md-9 col-xs-11'>" +
                               " <input type='text' name='sisacuti' class='form-control' value='<?php echo $key->kry_cuti_sisa?>' readonly>"+
                              "</div>"+
                            "</div>" +
              // " <?php } ?>");

                $("#sisacuti").show();

          } else{
            $("#sisacuti").hide();
          }
    });
});
</script>

 

</body>

  

</html>
