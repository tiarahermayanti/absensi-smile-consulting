
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

                 <!-- <a href="<?php echo base_url();?>c_pimpinan/tambahIzin"><button  style="float: right; margin-top: 20px" class="btn btn-primary"><i class="fa fa-plus"></i> Ajukan Izin</button> </a> -->
              </div>
        
            <div class="adv-table" style="overflow: auto; margin-top: 50px" >
               
              <table class="table table-striped table-advance table-hover" id="hidden-table-info" style="color: #000000; border: 1px solid #ccc">
                <!-- <table class="table table-striped table-advance table-hover" id="hidden-table-info> -->
 <style type="text/css">
   th,td{
    text-align: center;
   }
 </style>               
                <thead class="text-primary">
                  <tr>
                        <th style="vertical-align:middle;">No</th>
                        <th style="vertical-align:middle;">Nama</th>
                        <th style="vertical-align:middle;">Tanggal Pengajuan</th>
                        <th style="vertical-align:middle;">Jenis</th>
                        <th style="vertical-align:middle;">Periode Tanggal</th>
                        <th style="vertical-align:middle;">Keterangan</th>
                        <th style="vertical-align:middle;">Foto Pendukung</th>
                        <th style="vertical-align:middle;">Status</th>
                        <th style="vertical-align:middle;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                   <?php 
                        $no=1;
                        foreach ($izin->result() as $x ) { ?>
                           
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $x->kry_nama; ?></td>
                          <td><?php echo date('d-m-Y', strtotime($x->izin_tgl_pengajuan)); ?></td>
                          <td><?php echo $x->nama_izin_jenis; ?></td>
                          <td><?php echo date('d-m-Y', strtotime($x->izin_mulai)); ?> s/d <?php echo date('d-m-Y', strtotime($x->izin_berakhir)); ?></td>
                          <td style="width: 10%;"><?php echo $x->izin_ket; ?></td>
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
                                <span class="label label-warning label-mini"><?php echo $x->nama_status_izin; ?></span>
                            <?php } else if($x->id_izin_status == 2){ ?>
                                <span class="label label-success label-mini"><?php echo $x->nama_status_izin; ?></span>
                            <?php } else if($x->id_izin_status == 3){?>
                                <span class="label label-danger label-mini"><?php echo $x->nama_status_izin; ?></span>
                            <?php } ?>
                            </td>
                            <td style="width: 8%">
                              <!--  <a href="<?php echo base_url();?>c_pimpinan/editIzin/<?php echo $x->izin_id; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a> 

                               <a href="#" onclick="hapus('<?php echo $x->izin_id;?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a> -->

                                <?php if($x->id_izin_status == 1){ ?>
                               <a href="#" onclick="konfirmasi('<?php echo $x->izin_id;?>')" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
                               <a href="#" onclick="tolak('<?php echo $x->izin_id;?>')" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></a>
                            <?php } else if($x->id_izin_status == 2 ){ ?>
                                
                              <?php } else if($x->id_izin_status == 3){ ?>
                                <a href="#" onclick="hapus('<?php echo $x->izin_id;?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                              <?php } ?>

                            </td>
                         
                          

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

<!-- Modal Terima -->
<div  aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="konfirmasi" class="modal fade">

     <div class="modal-dialog">

         <div class="modal-content" style="width: 70%;  display: block; margin: auto;">
             <div class="modal-header">
                  <strong style="color: #ffffff">Konfirmasi Izin</strong>
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button> 
             </div>

             <div class="cardhapus">
                
                <div class="card-body card-block">
                    <form action="<?php echo base_url('c_pimpinan/konfimasiIzin');?>" method="post" class="form-horizontal">
                        <div class="row form-group mt">
                            <label style="margin-left: 7%; color: #000" class="form-control-label"><strong>Apakah yakin menerima pengajuan izin?</strong></label>
                            
                            <input type="hidden" name="izin_id" class="form-control">
                        
                        </div>

                    <div class="card-footer" style="margin-right: 3%">
                        

                         <button style="float: right; margin-left: 5%;" type="button" class="btn btn-danger" data-dismiss="modal">Tidak </button>

                          <button style="float: right;" type="submit" class="btn btn-primary">Iya</button>
                                        
                    </div>

                </form>
                </div>
                                    
               </div>
        </div>
      </div>
   </div>
<!-- End MOdal Terima -->

<!-- Modal Tolak -->
<div  aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tolak" class="modal fade">

     <div class="modal-dialog">

         <div class="modal-content" style="width: 70%;  display: block; margin: auto;">
             <div class="modal-header">
                  <strong style="color: #ffffff">Konfirmasi Izin</strong>
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button> 
             </div>

             <div class="cardhapus">
                
                <div class="card-body card-block">
                    <form action="<?php echo base_url('c_pimpinan/tolakIzin');?>" method="post" class="form-horizontal">
                        <div class="row form-group mt">
                            <label style="margin-left: 7%; color: #000" class="form-control-label"><strong>Apakah yakin menolak pengajuan izin?</strong></label>
                            
                            <input type="hidden" name="izin_id" class="form-control">
                        
                        </div>

                    <div class="card-footer" style="margin-right: 3%">
                        

                         <button style="float: right; margin-left: 5%;" type="button" class="btn btn-danger" data-dismiss="modal">Tidak </button>

                          <button style="float: right;" type="submit" class="btn btn-primary">Iya</button>
                                        
                    </div>

                </form>
                </div>
                                    
               </div>
        </div>
      </div>
   </div>
<!-- End MOdal Tolak -->
  <!-- Modal Hapus -->

 <div  aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hapus-data" class="modal fade">

     <div class="modal-dialog">

         <div class="modal-content" style="width: 70%;  display: block; margin: auto;">
             <div class="modal-header">
                  <strong style="color: #ffffff">Hapus Data Izin</strong>
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button> 
             </div>

             <div class="cardhapus">
                
                <div class="card-body card-block">
                    <form action="<?php echo base_url('c_pimpinan/deleteIzin');?>" method="post" class="form-horizontal">
                        <div class="row form-group mt">
                            <label style="margin-left: 7%; color: #000" class=" form-control-label"><strong>Apakah yakin menghapus data?</strong></label>
                            
                            <input type="hidden" name="izin_id" class="form-control">
                        
                        </div>

                    <div class="card-footer" style="margin-right: 3%">
                        

                         <button style="float: right; margin-left: 5%;" type="button" class="btn btn-danger" data-dismiss="modal">Tidak </button>

                          <button style="float: right;" type="submit" class="btn btn-primary">Iya</button>
                                        
                    </div>

                </form>
                </div>
                                    
               </div>
        </div>
      </div>
   </div>

    <!--main content end-->


  <script type="text/javascript">

     function hapus(id){

                 $('#hapus-data').modal('show');
                  $('[name="izin_id"]').val(id);

    }

    function konfirmasi(id){
          $('#konfirmasi').modal('show');
          $('[name="izin_id"]').val(id);
    }

    function tolak(id){
          $('#tolak').modal('show');
          $('[name="izin_id"]').val(id);
    }

    $(document).ready(function(){

    $("#jenis").change(function(){
        var jenis = $('#jenis').find(":selected").val();
         
          if (jenis == "4") {
             // alert("data :" + jenis);

                $("#sisacuti").show();
          } else{
            $("#sisacuti").hide();
          }
    });
});


  </script>

 