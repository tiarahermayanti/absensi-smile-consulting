
<section id="main-content">
      <section class="wrapperab" >
        <div class="col-lg-12 mt" >
          <div class="row content-panelab centered">
                  <h1 style="color: #000000"><b>FOTO DIRI ANDA<b></h1>
                   <h4>Absensi Masuk</h4>
                    <div align="center" style="margin-top: 20px;">
                      <form  action="<?php echo site_url("c_karyawan/absenMasuk");?>" method="post" enctype="multipart/form-data">
                        <div id="my_camera"></div>
                        <div >
                        <video autoplay="true" id="video-webcam" width="45%" height="45%">
                            Browsermu tidak mendukung bro, upgrade donk!
                        </video>
                      </div>
                      
                       <button style="margin-top: 10px; margin-bottom: 20px; " class="btn btn-theme" align="center" onclick="takeSnapshot()">SUBMIT</button>

                         
                      </form>
                    </div>  
                  
        </div>
      </div>

      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->

<script type="text/javascript">


    // seleksi elemen video
    var video = document.querySelector("#video-webcam");

    // minta izin user
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

    // jika user memberikan izin
    if (navigator.getUserMedia) {
        // jalankan fungsi handleVideo, dan videoError jika izin ditolak
        navigator.getUserMedia({ video: true }, handleVideo, videoError);
    }

    // fungsi ini akan dieksekusi jika  izin telah diberikan
    function handleVideo(stream) {
        video.srcObject = stream;
    }

    // fungsi ini akan dieksekusi kalau user menolak izin
    function videoError(e) {
        // do something
        alert("Izinkan menggunakan webcam untuk demo!")
    }

    function takeSnapshot() {

      // buat elemen img
        var img = document.createElement('img');
        var context;

        // ambil ukuran video
        var width = 480
                , height = 640 ;

        // buat elemen canvas
        canvas = document.createElement('canvas');
        canvas.width = width;
        canvas.height = height;

        // ambil gambar dari video dan masukan 
        // ke dalam canvas
        context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, width, height);


        // render hasil dari canvas ke elemen img
        img.src = canvas.toDataURL('image/png');
        var dataURL = canvas.toDataURL('image/png');

        if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);

        
        } else {
            alert("Yah browsernya ngga support Geolocation bro!");
                window.location= "<?php echo site_url("c_karyawan");?>"
        }

        function showPosition(position) {
         var lat = position.coords.latitude;
         var long = position.coords.longitude;
          $.ajax({
            type: "POST",
            url: "<?php echo site_url("c_karyawan/absenMasuk");?>",
            data: { 
               getlat: lat,
               getlong : long,
               imgBase64: dataURL
            }
          });
     }
     
     function showError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                // view.innerHTML = "Yah, mau deteksi lokasi tapi ga boleh :("
                 alert("Yah, mau deteksi lokasi tapi ga boleh :(");
                 window.location= "<?php echo site_url("c_karyawan");?>"
                break;
            case error.POSITION_UNAVAILABLE:
                // view.innerHTML = "Yah, Info lokasimu nggak bisa ditemukan nih"
                 alert("Yah, Info lokasimu nggak bisa ditemukan nih");
                 window.location= "<?php echo site_url("c_karyawan");?>"
                break;
            case error.TIMEOUT:
                // view.innerHTML = "Requestnya timeout bro"
                 alert("Requestnya timeout bro");
                 window.location= "<?php echo site_url("c_karyawan");?>"
                break;
            case error.UNKNOWN_ERROR:
                // view.innerHTML = "An unknown error occurred."
                 alert("An unknown error occurred.");
                 window.location= "<?php echo site_url("c_karyawan");?>"
                break;
        }
     }


  }

</script>