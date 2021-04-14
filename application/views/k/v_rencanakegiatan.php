<style type="text/css">
 
  th, td {
  padding-right: 50px;  
  padding-left: 5px;
  }

  .form-control{
    color : #000000;
  }
</style>


<!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">
          <div class="col-lg-12">
            <div class="row content-panel">
              <?php foreach ($dinas->result() as $x) : 
                  $tgl = indonesian_date($x->dinas_tgl, 'l, d F Y'); ?>
             <div class="profile-text mt mb centered detailed" style="margin-bottom: 20px">
                <h3><b>AKTIFITAS</b></h3>
                <h3 style="padding-top: 5px; padding-bottom: 20px">Lokasi : <?php echo $x->dinas_tempat;?> </h3>
              </div>

                  <form action="<?php echo site_url("c_karyawan/saveRencanaKegiatan");?>" method="post">
                

                <!-- col-md-4 -->
              <div class="col-md-4 centered ">
                <div class="right-divider hidden-sm hidden-xs">
                   <div class="profile-ab">
                  <img src="<?php echo base_url();?>uploads/absen_dinas/<?php echo $x->ab_dinas_foto;?>" >
                 
                </div>
                </div>
              </div>
              <!-- /col-md-4 -->

              <!-- col-md-8 -->
             
              <div class="col-md-8 profile-text" style="color: #000000;">     
                     
                <form role="form" class="form-horizontal" >
                
                  <div class="row" style="margin-bottom: 15px; ">
                    <div class="form-group">
                            <label class="col-lg-3 control-label">Nama</label>
                            <div class="col-lg-8" >
                              <input type="text" value="<?php echo $this->session->userdata('nama');?>" class="form-control" readonly>
                            </div>
                          </div>
                  </div>
                  <div class="row" style="margin-bottom: 15px ">
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Tanggal</label>
                            <div class="col-lg-8">
                              <input type="text" value="<?php echo $tgl;?>" class="form-control" readonly>
                            </div>
                          </div>
                  </div>
                  <div class="row" style="margin-bottom: 15px ">
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Jam Kedatangan</label>
                            <div class="col-lg-8">
                              <input type="text" value="Pk. <?php echo $x->ab_dinas_jam;?>" class="form-control" readonly>
                            </div>
                          </div>
                  </div>

                  <div class="row" style="margin-bottom: 15px ">
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Rencana Kegiatan</label>
                            <div class="col-lg-8">
                              <textarea rows="6" cols="30" class="form-control" name="rencana" placeholder="Masukan rencana kegiatan" required></textarea>
                            </div>
                            </div>
                  </div>

                

                          <div class="form-group" >
                            <div class="col-lg-offset-2 col-lg-10">
                              <input type="hidden" name="ab_dinas_id" value="<?php echo $x->ab_dinas_id;?>">
                              <button  style="margin-bottom: 20px; margin-top: 10px" class="btn btn-theme" type="submit">SUBMIT</button>
                            </div>
                          </div>

                        </form>

             
             
            </div>
          </div>
             </form>
             <?php endforeach;?>
          </div>
        </div>
        <!-- /col-lg-12 -->
      </div>
      <!-- /row -->
        </section>
      </section>
          