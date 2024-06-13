<?php 
session_start();
$_SESSION["hal"] = "utama";
if(isset($_POST['logout'])||!isset($_SESSION['status'])){
    session_unset();
    session_destroy();
    header("location:login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="style/sb-admin-2.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="https://cdn-icons-png.freepik.com/512/169/169869.png" type="image/x-icon">

</head>

<body id="page-top" class="sidebar-toggled">
    <?php
    include_once 'navbar.php';
    ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <div class="container-fluid">

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Pasien (Harian)</div>
                            <?php
                            $date = date("Y-m-d"); 
                            $resultT = mysqli_query($conn,"SELECT COUNT(*) AS total FROM `riwayat` WHERE date LIKE '$date%'");
                            $caller = mysqli_fetch_assoc($resultT);
                            ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$caller['total']?></div>
                        <?php
                        ?>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-bed fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Pasien (Bulanan)</div>
                            <?php
                            $date = date("Y-m"); 
                            $resultT = mysqli_query($conn,"SELECT COUNT(*) AS total FROM `riwayat` WHERE date LIKE '$date%'");
                            $caller = mysqli_fetch_assoc($resultT);
                            ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$caller['total']?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-bed fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Dokter</div>
                            <?php
                            $resultT = mysqli_query($conn,"SELECT COUNT(*) AS total FROM `dokter`");
                            $caller = mysqli_fetch_assoc($resultT);
                            ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$caller['total']?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-user-doctor fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Obat</div>
                            <?php
                            $resultT = mysqli_query($conn,"SELECT COUNT(*) AS total FROM `obat`");
                            $caller = mysqli_fetch_assoc($resultT);
                            ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$caller['total']?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-file-medical fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Pasien perbulan</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
            <div class="chart-bar">
            <canvas id="myBarChart"></canvas>
            </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-warning">Stok obat yang menipis</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
            <table class="table">
  <thead>
    <tr>
      <th scope="col">Nama Obat</th>
      <th scope="col">Stok Obat</th>

    </tr>
  </thead>
  <tbody>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM `obat` ORDER BY `obat`.`stok` ASC LIMIT 5");
    while($caller = mysqli_fetch_assoc($result)){
    echo "<tr>";;
    echo "<td>".$caller['nama_obat']."</td>";
    echo "<td>".$caller['stok']."</td>";
    echo "</tr>";
    }
    ?>
  </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>



</div>
<!-- /.container-fluid -->
                          <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" dibawah jika anda ingin mengakhiri session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-dark" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script>
    <?php
    $dateY = date("Y");
    $result1 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM `riwayat` WHERE date LIKE '$dateY-01%'");
    $c1 = mysqli_fetch_assoc($result1);
    $result2 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM `riwayat` WHERE date LIKE '$dateY-02%'");
    $c2 = mysqli_fetch_assoc($result2);
    $result3 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM `riwayat` WHERE date LIKE '$dateY-03%'");
    $c3 = mysqli_fetch_assoc($result3);
    $result4 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM `riwayat` WHERE date LIKE '$dateY-04%'");
    $c4 = mysqli_fetch_assoc($result4);
    $result5 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM `riwayat` WHERE date LIKE '$dateY-05%'");
    $c5 = mysqli_fetch_assoc($result5);
    $result6 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM `riwayat` WHERE date LIKE '$dateY-06%'");
    $c6 = mysqli_fetch_assoc($result6);
    $result7 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM `riwayat` WHERE date LIKE '$dateY-07%'");
    $c7 = mysqli_fetch_assoc($result7);
    $result8 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM `riwayat` WHERE date LIKE '$dateY-08%'");
    $c8 = mysqli_fetch_assoc($result8);
    $result9 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM `riwayat` WHERE date LIKE '$dateY-09%'");
    $c9 = mysqli_fetch_assoc($result9);
    $result10 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM `riwayat` WHERE date LIKE '$dateY-10%'");
    $c10 = mysqli_fetch_assoc($result10);
    $result11 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM `riwayat` WHERE date LIKE '$dateY-11%'");
    $c11 = mysqli_fetch_assoc($result11);
    $result12 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM `riwayat` WHERE date LIKE '$dateY-12%'");
    $c12 = mysqli_fetch_assoc($result12);
    
    
    ?>
        // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "November", "Desember"],
    datasets: [{
      label: "Pasien",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: [<?=$c1['total']?>, <?=$c2['total']?>, <?=$c3['total']?>, <?=$c4['total']?>, <?=$c5['total']?>, <?=$c6['total']?>, <?=$c7['total']?>, <?=$c8['total']?>, <?=$c9['total']?>, <?=$c10['total']?>, <?=$c11['total']?>, <?=$c12['total']?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 100,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});

    </script>
    <script src="https://kit.fontawesome.com/a663f45242.js" crossorigin="anonymous"></script>
</body>

</html>