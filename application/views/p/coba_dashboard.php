<!DOCTYPE html>
<html>
<head>
    <title>Cara Membuat Grafik dengan CodeIgniter dengan Chart.js</title>
    <!-- Load file plugin Chart.js -->
     <script src="<?php echo base_url();?>assets/lib/chart/Chart.js"></script>
  
</head>
<body>
<br>
<h4>Cara Membuat Grafik dengan CodeIgniter dengan Chart.js</h4>
<canvas id="myChart"></canvas>
    <?php
    //Inisialisasi nilai variabel awal
    $status_id= "";
    $jumlah=null;
    foreach ($today as $item)
    {
        $jur=$item->status_id;
        $status_id .= "'$jur'". ", ";
        $jum=$item->total;
        $jumlah .= "$jum". ", ";
        echo $status_id;
        echo $jumlah;
    }
    ?>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: [<?php echo $status_id; ?>],
            datasets: [{
                label:'Status Absen ',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlah; ?>]
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>
</body>
</html>