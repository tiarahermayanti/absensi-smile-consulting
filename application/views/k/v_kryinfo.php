<!-- main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row centered ">
              <h3 style="color: #008de4"><b>DETAIL DATA KARYAWAN</b></h3>
              <!-- <hr width="50%"> -->
        </div>
      <form role="form" class="form-horizontal">
        <?php foreach ($kry->result() as $k ): ?>
          
        
        <div class="row">
          <div class="col-lg-12 ">
                          <div class="centered">
                                <h5 style="color: #000000"><b>Data Pribadi</b></h5>
                                <hr width="50%">
                          </div>
                          
               <div class="col-lg-8 detailed" style="margin-top: 10px">
                         
                            <div class="form-group">
                            <label class="col-lg-3 control-label">NIK</label>
                            <div class="col-lg-6">
                              <input type="text" name="kry_nik" value="<?php echo $k->kry_nik;?>" class="form-control" readonly>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-3 control-label">Nama Lengkap</label>
                            <div class="col-lg-6">
                              <input type="text" value="<?php echo $k->kry_nama;?>" name="kry_nama" class="form-control" readonly>
                            </div>
                          </div>
                            <div class="form-group">
                            <label class="col-lg-3 control-label">Jenis Kelamin</label>
                            <div class="col-lg-6">
                              <input type="text" value="<?php echo $k->kry_jk;?>" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Posisi</label>
                            <div class="col-lg-6">
                              <input type="text" name="kry_posisi" value="<?php echo $k->kry_posisi;?>" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Email</label>
                            <div class="col-lg-6">
                              <input type="email" name="kry_email" value="<?php echo $k->kry_email;?>" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Telepon</label>
                            <div class="col-lg-6">
                              <input type="number" name="kry_tlp" value="<?php echo $k->kry_tlp;?>" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Alamat</label>
                            <div class="col-lg-6">
                              <textarea rows="6" cols="30" class="form-control" name="kry_alamat" readonly><?php echo $k->kry_alamat;?></textarea>
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-lg-3 control-label">Jatah Cuti</label>
                            <div class="col-lg-6">
                                  <input style="width: 20%;border-radius: 3px; border: 1px solid #ccc; padding: 5px; background: #eee" value="<?php echo $k->kry_cuti;?>" type="number" name="kry_cuti" readonly >
                                    <label style="width: 30%; padding-left: 2%;">Masa Berlaku</label>
                                 <input style="width: 47%; border-radius: 3px; border: 1px solid #ccc; padding: 8px; background: #eee" type="date" value="<?php echo $k->kry_cuti_sampai;?>" name="kry_cuti_sampai" readonly>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-3 control-label">Sisa Cuti</label>
                            <div class="col-lg-6">
                              <input style="width: 20%;" type="number" name="kry_cuti_sisa" value="<?php echo $k->kry_cuti_sisa;?>" class="form-control" readonly>
                            </div>
                          </div>

                           
                </div>


                 <div class="col-lg-4 detailed centered">

                   <div class="form-group">
                            <label class="col-lg-3 control-label">Foto Diri</label>
                            <div class="col-lg-8">
                               <?php if($k->kry_foto != ""){ ?>
                                 <div class="project">
                                    <div class="photo-wrapperkry">
                                        <div class="photo centered">
                                         
                                           <a class="fancybox " href="<?php echo base_url();?>uploads/foto_profile/<?php echo $k->kry_foto;?>"><img  class="img-responsive" style=" height: 150px;  border-radius: 3px; display: block; margin: auto; " src="<?php echo base_url();?>uploads/foto_profile/<?php echo $k->kry_foto;?>" alt=""></a>
                                        
                                       </div>
                                     </div>
                                    <div class="overlay"></div>
                                </div>
                                 <?php }else{ ?>
                                        <p>Tidak Ada Foto</p>
                                  <?php } ?>
                            </div>
                    </div>

                    <div class="form-group">
                            <label class="col-lg-3 control-label">Foto Diri</label>
                            <div class="col-lg-8">
                                <?php if($k->kry_ktp != ""){ ?>
                                 <div class="project-wrapper centered">
                                          <div class="project">
                                        <div class="photo-wrapper">
                                          <div class="photo">
                                          
                                               <a class="fancybox" href="<?php echo base_url();?>uploads/foto_ktp/<?php echo $k->kry_ktp;?>"><img class="img-responsive imgkry" src="<?php echo base_url();?>uploads/foto_ktp/<?php echo $k->kry_ktp;?>" alt=""></a>
                                            
                                            </div>
                                          </div>
                                          <div class="overlay"></div>
                                        </div>
                                      </div>
                                 <?php }else{ ?>
                                   <p>Tidak Ada Foto</p>
                                <?php } ?>
                            </div>
                    </div>

                     <div class="form-group">
                            <label class="col-lg-3 control-label">Foto Diri</label>
                            <div class="col-lg-8">
                                <?php if($k->kry_kk != ""){ ?>
                                  <div class="project-wrapper centered">
                                          <div class="project">
                                        <div class="photo-wrapper">
                                          <div class="photo">
                                            
                                               <a class="fancybox" href="<?php echo base_url();?>uploads/foto_kk/<?php echo $k->kry_kk;?>"><img class="img-responsive imgkry" src="<?php echo base_url();?>uploads/foto_kk/<?php echo $k->kry_kk;?>" alt=""></a>
                                            </div>
                                          </div>
                                          <div class="overlay"></div>
                                        </div>
                                      </div>
                            <?php }else{ ?>
                                 <p>Tidak Ada Foto</p>
                           <?php } ?>
                            </div>
                    </div>
                           
                </div>
                        
          </div>
        </div>

          <div class="row ">
          <div class="col-lg-12 " style="margin-top: 10px">
                       
               <div class="col-lg-8 detailed" >
                         
                           <div class="centered mt">
                                <h5 style="color: #000000"><b>Data Gaji per Bulan</b></h5>
                                <hr width="50%">
                          </div>

                          <div class="form-group">
                            <label class="col-lg-3 control-label">Bank</label>
                            <div class="col-lg-6">
                              <input type="text" name="rekening" value="<?php echo $k->nama_bank;?>" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Nomor Rekening</label>
                            <div class="col-lg-6">
                              <input type="number" name="rekening" value="<?php echo $k->kry_rekening;?>" class="form-control" readonly>
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-lg-3 control-label">Nama Pemilik</label>
                            <div class="col-lg-6">

                              <input type="text" value="<?php echo $k->kry_an_rekening; ?>" name="kry_an_rekening" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Gaji Pokok</label>
                            <div class="col-lg-6">
                              <input type="number" name="gj_pokok" value="<?php echo $k->gj_pokok;?>" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Tunjangan Makan</label>
                            <div class="col-lg-6">
                              <input type="number" name="gj_makan" class="form-control" value="<?php echo $k->gj_makan;?>" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Tunjangan Kesehatan</label>
                            <div class="col-lg-6">
                              <input type="number" value="<?php echo $k->gj_kesehatan;?>" name="gj_kesehatan" class="form-control" readonly>
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-lg-3 control-label">Kedisiplinan</label>
                            <div class="col-lg-6">
                              <input type="number" name="gj_disiplin" value="<?php echo $k->gj_disiplin;?>" class="form-control" readonly>
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-lg-3 control-label">Transportasi</label>
                            <div class="col-lg-6">
                              <input type="number" name="gj_transport" value="<?php echo $k->gj_transport;?>" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Total Gaji</label>
                            <div class="col-lg-6">
                              <?php $gaji = $k->gj_pokok + $k->gj_makan + $k->gj_kesehatan + $k->gj_disiplin + $k->gj_transport; ?>
                              <input type="number" name="gj_transport" value="<?php echo $gaji;?>" class="form-control" readonly>
                            </div>
                          </div>
                          
                          
                </div>

                 <div class="col-lg-4 detailed">
                         
                         <?php foreach ($user->result() as $u) { ?>
                           
                         
                          <div class="centered mt">
                                <h5 style="color: #000000"><b>Data Login Pengguna</b></h5>
                                <hr width="50%">
                          </div>

                          <div class="form-group">
                            <label class="col-lg-4 control-label">ID Karyawan</label>
                            <div class="col-lg-6">
                               <input type="text" value="<?php echo $u->kry_id;?>" name="kry_id" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">Password</label>
                            <div class="col-lg-6">
                               <input type="password" name="password" value="<?php echo $u->password;?>" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">Hak Akses</label>
                            <div class="col-lg-6">
                               <input type="text" name="role" value="<?php echo $u->role;?>" class="form-control" readonly>
                            </div>
                          </div>
                          <?php } ?>

                          
                  </div>

                 
                        
          </div>

        </div>
     <!-- ROW -->
                 
                  <div class="centered mt" style="margin-top: 30px">
                           <a href="<?php echo site_url("c_karyawan/editKaryawan");?>" style="width: 50%" class="btn btn-primary"> Edit Informasi</a>
                    </div>

        <?php endforeach ?>
        </form>

           
      </section>
      <!-- /wrapper -->
    </section>

 <script type="text/javascript">
            $(document).ready(function(){

                // Format mata uang.
                $( '.uang' ).mask('000.000.000', {reverse: true});

            })
        </script>
