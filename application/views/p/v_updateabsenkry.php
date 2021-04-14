<!-- main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row centered ">
              <h3 style="color: #008de4"><b>EDIT ABSEN KARYAWAN</b></h3>
              <!-- <hr width="50%"> -->
        </div>
       <form role="form" class="form-horizontal" action="<?php echo site_url('c_pimpinan/updateAbsenKry');?>" method="post" enctype="multipart/form-data">
        <?php foreach ($absen->result() as $k ): ?>
          
        <div class="row">
          <div class="col-lg-12 ">
                         
               <div class="col-lg-12 detailed mt" style="margin-top: 10px">
                          <input type="hidden" name="ab_id" value="<?php echo $k->ab_id;?>">
                           <div class="form-group">
                            <label class="col-lg-3 control-label">Nama</label>
                            <div class="col-lg-6">
                              <input type="text" name="kry_nama" value="<?php echo $k->kry_nama;?>" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Tanggal</label>
                            <div class="col-lg-6">
                              <input type="text" value="<?php echo $k->ab_tgl;?>" name="ab_tgl" class="form-control" readonly>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Jam Masuk</label>
                            <div class="col-lg-6">
                              <input type="time" name="ab_masuk" value="<?php echo $k->ab_masuk;?>" class="form-control">
                            </div>
                          </div>
                        
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Jam Pulang</label>
                            <div class="col-lg-6">
                              <input type="time" name="ab_pulang" value="<?php echo $k->ab_pulang;?>" class="form-control">
                            </div>
                          </div>
                         
                           
                            <div class="form-group">
                            <label class="col-lg-3 control-label">Kehadiran</label>
                            <div class="col-lg-6">
                              <select class="form-control" name="status_id">
                                <option value="">Pilih Absensi</option>
                                <?php foreach ($status->result() as $s) { ?>
                                <option value="<?php echo $s->status_id;?>" <?php if ($s->status_id == $k->status_id) {echo "selected";} ?> ><?php echo $s->status_nama;?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>

                       

                           
                </div>
              </div>


                  <div class="centered mt mt" style="margin-top: 30px">
                             <button style="width: 50%" class="btn btn-primary" type="submit"> SIMPAN PERUBAHAN </button>
                    </div>

        <?php endforeach ?>
   </form>
           
      </section>
      <!-- /wrapper -->
    </section>

