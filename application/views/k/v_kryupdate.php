<!-- main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row centered ">
              <h3 style="color: #008de4"><b>EDIT DATA KARYAWAN</b></h3>
              <!-- <hr width="50%"> -->
        </div>
       <form role="form" class="form-horizontal" action="<?php echo site_url('c_karyawan/updateKaryawan');?>" method="post" enctype="multipart/form-data">
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
                              <input type="text" name="kry_nik" value="<?php echo $k->kry_nik;?>" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Nama Lengkap</label>
                            <div class="col-lg-6">
                              <input type="text" value="<?php echo $k->kry_nama;?>" name="kry_nama" class="form-control">
                            </div>
                          </div>
                            <div class="form-group">
                            <label class="col-lg-3 control-label">Jenis Kelamin</label>
                            <div class="col-lg-6">
                              <select class="form-control" name="kry_jk">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Pria" <?php if ($k->kry_jk == "Pria") {echo "selected";} ?> >Pria</option>
                                <option value="Wanita" <?php if ($k->kry_jk == "Wanita") {echo "selected";} ?> >Wanita</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Posisi</label>
                            <div class="col-lg-6">
                              <input type="text" name="kry_posisi" value="<?php echo $k->kry_posisi;?>" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Email</label>
                            <div class="col-lg-6">
                              <input type="email" name="kry_email" value="<?php echo $k->kry_email;?>" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Telepon</label>
                            <div class="col-lg-6">
                              <input type="number" name="kry_tlp" value="<?php echo $k->kry_tlp;?>" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Alamat</label>
                            <div class="col-lg-6">
                              <textarea rows="6" cols="30" class="form-control" name="kry_alamat" value=""><?php echo $k->kry_alamat;?></textarea>
                            </div>
                          </div>
                          <div class="form-group" style="display:none">
                            <label class="col-lg-3 control-label">Jatah Cuti</label>
                            <div class="col-lg-6">
                                  <input style="width: 20%;border-radius: 3px; border: 1px solid #ccc; padding: 5px; background: #eee" value="<?php echo $k->kry_cuti;?>" type="number" name="kry_cuti" readonly >
                                    <label style="width: 30%; padding-left: 2%;">Masa Berlaku</label>
                                 <input style="width: 47%; border-radius: 3px; border: 1px solid #ccc; padding: 8px; background: #eee" type="date" value="<?php echo $k->kry_cuti_sampai;?>" name="kry_cuti_sampai" readonly>
                            </div>
                          </div>

                          <div class="form-group" style="display:none">
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
                                  <div class="centered fileupload fileupload-new" data-provides="fileupload">
                                  <div class="fileupload-new thumbnail" style="width: 150px; height: 110px;">
                                     <?php if($k->kry_foto != ""){ ?>
                                        <img src="<?php echo base_url();?>uploads/foto_profile/<?php echo $k->kry_foto;?>" alt="" />
                                      <?php }else{ ?>
                                         <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                                        <?php } ?>
                                  </div>
                                  <div class="fileupload-preview fileupload-exists thumbnail" style="width: 150px; height: 110px; line-height: 20px;"></div>
                                  <div>
                                    <span class="btn btn-theme02 btn-file">
                                      <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                    <input type="file" name="kry_foto" class="default" />
                                    </span>
                                    <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                  </div>
                                  </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-3 control-label">Foto KTP</label>
                            <div class="col-lg-8">
                                 <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 150px; height: 110px;">
                                  <?php if($k->kry_ktp != ""){ ?>
                                    <img src="<?php echo base_url();?>uploads/foto_ktp/<?php echo $k->kry_ktp;?>" alt="" />
                                  <?php }else{ ?>
                                     <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                                    <?php } ?>
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="width: 150px; height: 110px; line-height: 20px;"></div>
                                <div>
                                  <span class="btn btn-theme02 btn-file">
                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                  <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                  <input type="file" name="kry_ktp" class="default" />
                                  </span>
                                  <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        
                         <div class="form-group">
                            <label class="col-lg-3 control-label">Foto KK</label>
                            <div class="col-lg-8">
                                 <div class="fileupload fileupload-new" data-provides="fileupload">
                                  <div class="fileupload-new thumbnail" style="width: 150px; height: 110px;">
                                     <?php if($k->kry_kk != ""){ ?>
                                        <img src="<?php echo base_url();?>uploads/foto_kk/<?php echo $k->kry_kk;?>" alt="" />
                                      <?php }else{ ?>
                                         <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                                        <?php } ?>
                                  </div>
                                  <div class="fileupload-preview fileupload-exists thumbnail" style="width: 150px; height: 110px; line-height: 20px;"></div>
                                  <div>
                                    <span class="btn btn-theme02 btn-file">
                                      <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                    <input type="file" name="kry_kk" class="default" />
                                    </span>
                                    <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                      </div>
                        
          </div>
        </div>

          <div class="row mt">
          <div class="col-lg-12 " style="margin-top: 10px">
                       
               <div class="col-lg-8 detailed" >
                         
                           <div class="centered mt">
                                <h5 style="color: #000000"><b>Data Gaji per Bulan</b></h5>
                                <hr width="50%">
                          </div>

                           <div class="form-group">
                            <label class="col-lg-3 control-label">Bank</label>
                            <div class="col-lg-6">
                              <select class="form-control" name="id_bank">
                                <option value="">Pilih Bank</option>
                                <?php foreach ($bank->result() as $key) { ?>
                                  <option <?php if($k->id_bank == $key->id_bank){ echo "selected";}?> value="<?php echo $key->id_bank;?>"><?php echo $key->nama_bank; ?></option>
                                <?php } ?>
                                
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-3 control-label">Nomor Rekening</label>
                            <div class="col-lg-6">
                              <input type="number" name="rekening" value="<?php echo $k->kry_rekening;?>" class="form-control">
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-lg-3 control-label">Nama Pemilik</label>
                            <div class="col-lg-6">

                              <input type="text" value="<?php echo $k->kry_an_rekening; ?>" name="kry_an_rekening" class="form-control" >
                            </div>
                          </div>
                          <div class="form-group" style="display:none">
                            <label class="col-lg-3 control-label">Gaji Pokok</label>
                            <div class="col-lg-6">
                              <input type="hidden" name="gj_pokok" value="<?php echo $k->gj_pokok;?>" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="form-group" style="display:none">
                            <label class="col-lg-3 control-label">Tunjangan Makan</label>
                            <div class="col-lg-6">
                              <input type="number" name="gj_makan" class="form-control" value="<?php echo $k->gj_makan;?>" readonly>
                            </div>
                          </div>
                          <div class="form-group" style="display:none">
                            <label class="col-lg-3 control-label">Tunjangan Kesehatan</label>
                            <div class="col-lg-6">
                              <input type="number" value="<?php echo $k->gj_kesehatan;?>" name="gj_kesehatan" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="form-group" style="display:none">
                            <label class="col-lg-3 control-label">Kedisiplinan</label>
                            <div class="col-lg-6">
                              <input type="number" name="gj_disiplin" value="<?php echo $k->gj_disiplin;?>" class="form-control" readonly>
                            </div>
                          </div>
                           <div class="form-group" style="display:none">
                            <label class="col-lg-3 control-label">Transportasi</label>
                            <div class="col-lg-6">
                              <input type="number" name="gj_transport" value="<?php echo $k->gj_transport;?>" class="form-control" readonly>
                            </div>
                          </div>
                          
                          
                </div>

<style type="text/css">
   #mybutton {
            position: relative;
            z-index: 1;
            left: 85%;
            top: -25px;
      cursor: pointer;
         }
</style>
                 <div class="col-lg-4 detailed">
                         
                         <?php foreach ($user->result() as $u) { ?>
                           
                         
                          <div class="centered mt">
                                <h5 style="color: #000000"><b>Data Login Pengguna</b></h5>
                                <hr width="50%">
                          </div>
                          <div class="form-group" style="display:none">
                            <label class="col-lg-4 control-label">ID Karyawan</label>
                            <div class="col-lg-6">
                               <input  type="text" value="<?php echo $u->kry_id;?>" name="kry_id" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="form-group" style="display:none">
                            <label class="col-lg-4 control-label">Password</label>
                            <div class="col-lg-6">
                               <input type="password" name="password" value="<?php echo $u->password;?>" class="form-control" required>
                            </div>
                          </div>
                          <div class="form-group" style="display:none">
                            <label class="col-lg-4 control-label" >Hak Akses</label>
                            <div class="col-lg-6" >
                               <input type="text" name="role" value="<?php echo $u->role;?>" class="form-control" readonly>
                            </div>
                          </div>
                          <?php } ?>

                            <div class="centered mt">
                              <div class="col-lg-12">
                                 <span id="ubah" style="display: block;margin: auto; width: 50%; " class="btn btn-warning generate">Ubah Password</span>
                              </div>
                        </div>

                        <div id="lama" style="display:none">
                          <div  class="form-group">
                              <label class="col-lg-6 control-label">Password Lama</label>
                            <div class="col-lg-6">
                               <input type="password" id="passlama" name="passlama" class="form-control">
                                <span id="mybutton" onclick="change()"><i class="glyphicon glyphicon-eye-open"></i></span>
                            </div>
                          </div>

                            <div  class="form-group">
                              <label class="col-lg-6 control-label">Password Baru</label>
                            <div class="col-lg-6">
                               <input type="password" id="passbaru" name="passbaru" class="form-control">
                                <span id="mybutton1" onclick="change1()"><i class="glyphicon glyphicon-eye-open"></i></span>
                            </div>
                        </div>

                          
                  </div>
                        
          </div>

        </div>
     <!-- ROW -->
                  <div class="centered mt" style="margin-top: 30px">
                             <button style="width: 50%" class="btn btn-primary" type="submit"> SIMPAN PERUBAHAN </button>
                    </div>

        <?php endforeach ?>
   </form>
           
      </section>
      <!-- /wrapper -->
    </section>

  <script type="text/javascript">
    function change()
         {
            var x = document.getElementById('passlama').type;

            if (x == 'password')
            {
               document.getElementById('passlama').type = 'text';
               document.getElementById('mybutton').innerHTML = '<i class="glyphicon glyphicon-eye-close"></i>';
            }
            else
            {
               document.getElementById('passlama').type = 'password';
               document.getElementById('mybutton').innerHTML = '<i class="glyphicon glyphicon-eye-open"></i>';
            }
         }

          function change1()
         {
            var x = document.getElementById('passbaru').type;

            if (x == 'password')
            {
               document.getElementById('passbaru').type = 'text';
               document.getElementById('mybutton1').innerHTML = '<i class="glyphicon glyphicon-eye-close"></i>';
            }
            else
            {
               document.getElementById('passbaru').type = 'password';
               document.getElementById('mybutton1').innerHTML = '<i class="glyphicon glyphicon-eye-open"></i>';
            }
         }
  </script>

   <script>
$(document).ready(function(){


    $("#ubah").click(function(){
       
          $("#ubah").hide();
          $("#lama").show();
          
    });
});
</script>
