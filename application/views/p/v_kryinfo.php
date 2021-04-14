 <style>
th, td {
  padding-top: 4px;
  padding-left: : 4px;  
  padding-bottom: : 4px;  
  text-align: left;
}
</style>
 <section id="main-content">
      <section class="wrapper">

          <!-- page start-->
          <div class="content-panel" style="padding-left: 2%; padding-right: 2%;">
            <div class="row mb centered">
              <h3 style="color: #000000"><b>INFORMASI KARYAWAN</b></h3>
              <hr width="50%">
              </div>

              <div class="row mb mt" >
                <div class="col-md-8" style="float: left;">
                  <form action="<?php echo site_url('c_pimpinan/infoKaryawan');?>" method="post" class="form-horizontal">
                  <div style="float: left;">
                      <input type="text" class="form-control" name="cari" placeholder="Cari berdasarkan ID, nama, dan status" required>
                     
                      </div>
                  <div class="col-md-1">
                         <button style="padding-right: 10px;" class="btn btn-primary" type="submit">Cari</button>
                  </div>
                  </form>
                </div>
                

                <div class="col-md-4" style="float: right;">
                   <a href="<?php echo site_url("c_pimpinan/tambahKaryawan");?>"><button  style=" float: right; " class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button> </a>

                   <div class="btn-group " style=" float: right; margin-right: 20px">
                      <button type="button" class="btn btn-theme02 dropdown-toggle" data-toggle="dropdown">
                        Export <span class="caret"></span>
                        </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo site_url('exportKaryawan');?>">Excel Semua Karyawan</a></li>
                        <li><a href="<?php echo site_url('exportKaryawan/getbyAktif');?>">Excel Karyawan Aktif</a></li>
                        <li><a href="<?php echo site_url('exportKaryawan/getbyNonaktif');?>">Excel Karyawan Non Aktif</a></li>

                      </ul>
                    </div>
                </div>
              </div>

              <div class="row mb mt" style="margin-top: 70px">
                 <div class="col-md-12">
                  <?php foreach ($kry->result() as $x) { ?>
                    <?php if($x->kry_status == "nonaktif") { ?>
                      <div style="opacity: 0.3;">
                    <?php } ?>
                    
                     <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" style="margin-bottom: 50px">
                      <?php if($x->kry_foto != ""){ ?>
                          <img width="150px" height="150px" src="<?php echo base_url();?>uploads/foto_profile/<?php echo $x->kry_foto;?>">
                      <?php } else{?>
                           <img width="150px" height="150px" src="<?php echo base_url();?>uploads/foto_profile/empty.png">
                      <?php }?>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 mb" style="margin-bottom: 50px">
                      <h5><b><?php echo $x->kry_nama;?></b></h5>
                      <table width="100%">
                        <tr>
                          <td>ID</td>
                          <td>:</td>
                          <td><?php echo $x->kry_id; ?></td>
                        </tr>
                         <tr>
                          <td>Jabatan</td>
                          <td>:</td>
                          <td><?php echo $x->kry_posisi; ?></td>
                        </tr>
                        
                      </table>
                      <h5><i class="fa fa-envelope"></i> <?php echo $x->kry_email;?></h5>
                      <div>
                       <a href="<?php echo site_url("c_pimpinan/detailKaryawan/" . $x->kry_id);?>" class="btn btn-info">Detail</a>
                      <a href="<?php echo site_url("c_pimpinan/editKaryawan/" . $x->kry_id);?>" class="btn btn-warning">Edit</a>
                       <a href="#" onclick="hapus('<?php echo $x->kry_id;?>')" class="btn btn-danger">Hapus</a>
                       <?php if($x->kry_status == "aktif"){?>
                       <a href="<?php echo site_url("c_pimpinan/updateStatus/". $x->kry_id . "/nonaktif");?>" class="btn btn-success">Aktif</a>
                     <?php } else if($x->kry_status == "nonaktif") {?>
                       <a href="<?php echo site_url("c_pimpinan/updateStatus/". $x->kry_id . "/aktif");?>" style="background: #908d8d; color: #fff" class="btn">Non Aktif</a>

                      <?php } ?>
                    </div>
                    </div>

                    <?php if($x->kry_status == "nonaktif") { ?>
                      </div>
                    <?php } ?>
                    
               <?php } ?>
               </div>
              </div>
              

          </div>
          <!-- page end-->
        <!-- /row -->

       
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->

     <div  aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hapus-data" class="modal fade">

     <div class="modal-dialog">

         <div class="modal-content" style="width: 90%;  display: block; margin: auto;">
             <div class="modal-header">
                  <strong style="color: #ffffff">Hapus Data Karyawan</strong>
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button> 
             </div>

             <div class="cardhapus" >
                
                <div class="card-body card-block">
                    <form action="<?php echo base_url('c_pimpinan/deleteKaryawan');?>" method="post">
                            <label style="margin-left: 2%; margin-top: 10px ">Apakah yakin menghapus data?</label>
                            <p style="padding-left: 2%; font-size: 12px">Melanjutkan aksi mengakibatkan terhapusnya semua data yang terhubung dengan karyawan</p>


                            
                            <input type="hidden" name="kry_id" class="form-control">
                        

                    <div class="card-footer" style="margin-right: 4%; ">
                        

                         <button style="float: right; margin-left: 5%; margin-top: 10px" type="button" class="btn btn-danger" data-dismiss="modal">Tidak </button>

                          <button style="float: right; margin-top: 10px" type="submit" class="btn btn-primary">Iya</button>
                                        
                    </div>

                </form>
                </div>
                                    
               </div>
        </div>
      </div>
   </div>

  <script type="text/javascript">

    function hapus(id){

             $('#hapus-data').modal('show');
              $('[name="kry_id"]').val(id);

}

    // $(document).ready(function() {
    //     // Untuk sunting
        

    //      $('#hapus-data').on('show.bs.modal', function (event) {
    //         var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
    //         var modal = $(this)

    //         // Isi nilai pada field
    //         modal.find('#hapus_id').attr("value",div.data('idh'));
    //     });

    // });

</script>