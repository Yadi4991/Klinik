<?php 
session_start();
$_SESSION["hal"] = "pasien";
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

    <title>Riwayat Pasien</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- Custom styles for this template-->
    <link href="style/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                        <h1 class="h3 mb-0 text-gray-800">Riwayat Pasien</h1>
                    </div>
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah Riwayat</button>

<!-- Modal -->
<div class="modal fade" id='tambahModal' tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Riwayat</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <label for="nik">NIK Pasien(16 digit)</label><br>
        <select  class='form-control' name="nik" id="nik" onchange='get_nik(this)'>
        <option value=""></option>
          <?php
          $sqlB = "SELECT * FROM pasien";
          $resultB = mysqli_query($conn, $sqlB);
          while($rewindoB = mysqli_fetch_assoc($resultB)){
          ?>  
            <option value="<?=$rewindoB['nik']?>"><?=$rewindoB['nik']?></option>
          <?php
          }
          ?>
        </select><br>
        <label for="nama">Nama Pasien</label><br>
        <input class='form-control' type="text" name="nama" id="namaP" required><br>
        <label for="diagnosa">Diagnosa Pasien</label><br>
        <input class='form-control' type="text" name="diagnosa" id="diagnosa" required><br>
        <label for="obat">Obat Pasien</label><br>
            <?php
            $sqlo = "SELECT * FROM obat";
            $resulto = mysqli_query($conn,$sqlo);
            while($rewindo = mysqli_fetch_assoc($resulto)){
            ?>
            <input type="checkbox" name="obat[]" id="<?=$rewindo['nama_obat']?>" value="<?=$rewindo['nama_obat']?>">
            <label for="<?=$rewindo['nama_obat']?>"><?=$rewindo['nama_obat']?></label>
            <br>
            <?php
            }
            ?>  
        <label for="dokter">Dokter Pasien</label><br>
        <select class='form-control' name="dokter" id="dokter">
            <?php
            $sqlo = "SELECT * FROM dokter";
            $resulto = mysqli_query($conn,$sqlo);
            while($rewindo = mysqli_fetch_assoc($resulto)){
            ?>
            <option value="<?=$rewindo['nama_dokter']?>"<?php if($rewind['dokter'] == $rewindo['nama_dokter']) echo 'selected="selected"';?>><?=$rewindo['nama_dokter']?></option>
            <?php
            }
            ?>
        </select><br>
      </div>
      <div class="modal-footer">
        <button name="tambahPasien" class="btn btn-success">Tambah Riwayat</button>
        <?php
        if(isset($_POST['tambahPasien'])){
          $nik = $_POST['nik'];
          $nama = $_POST['nama'];
          $diagnosa = $_POST['diagnosa'];
          $obatS = $_POST['obat'];
          $obat = "";
          $obatI = "";
          for($i=0;$i<count($obatS);$i++){
            if($i===count($obatS)-1){
            $obatI .= "'" .$obatS[$i]. "'";
            }else{
            $obatI .= "'" .$obatS[$i]. "', ";
            }
          }
          foreach($obatS as $OS){
            $obat .= $OS . " ";
          }
          $dokter = $_POST['dokter'];
          $sqlTambah = "INSERT INTO `riwayat` (`id_riwayat`, `nik`, `nama_pasien`, `diagnosa`, `obat`, `dokter`, `date`) VALUES (NULL, '$nik', '$nama', '$diagnosa', '$obat', '$dokter', CURRENT_TIMESTAMP);";
          $result = mysqli_query($conn,$sqlTambah);
          $sqlA = "INSERT INTO `activity_log` (`id_activity`, `nama`, `aktifitas`, `akses`, `waktu`) VALUES (NULL, '$namaUser', 'Menambahkan data riwayat bernik $nik dengan nama $nama didiagnosa $diagnosa dengan obat $obat ditangani dokter $dokter' , '$aksesUser',CURRENT_TIMESTAMP)";
          $resultA = mysqli_query($conn,$sqlA);
          $sqlK = "UPDATE `obat` SET `stok` = stok - '1' WHERE `obat`.`nama_obat` IN($obatI)";
          $resultK = mysqli_query($conn,$sqlK);
        }
        ?>
        </form>
      </div>
    </div>
  </div>
</div>
<table id="tabel" class="table table-striped" style="width:100%">
        <thead>
            <tr>
            <th>Nik Pasien</th>
            <th>Nama Pasien</th>
            <th>Diagnosa</th>
            <th>Obat Pasien</th>
            <th>Dokter Pasien</th>
            <th>Tanggal Berobat</th>
            <?php 
            if($_SESSION["akses"]=="Admin"){
            echo "<th>Action</th>";
            }
            ?>
            </tr>
        </thead>
        <tbody>
        <?php
                    $sql = "SELECT * FROM riwayat ORDER BY id_riwayat DESC";
                    $query = mysqli_query($conn,$sql); 
                while($rewind = mysqli_fetch_assoc($query)){
                    echo "<tr>";
                    echo "<td>".$rewind['nik']."</td>";
                    echo "<td>".$rewind['nama_pasien']."</td>";
                    echo "<td>".$rewind['diagnosa']."</td>";
                    echo "<td>".$rewind['obat']."</td>";
                    echo "<td>".$rewind['dokter']."</td>";
                    echo "<td>".$rewind['date']."</td>";
                    if($_SESSION["akses"]=="Admin"){
                    echo "<td>";?>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $rewind['id_riwayat'];?>">Hapus Riwayat</button>                   
                    <?php echo "</td>";
                    echo "</tr>";?>
               
<!-- Hapus Modal -->
<div class="modal fade" id="hapusModal<?=$rewind['id_riwayat']?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Riwayat</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <input type="hidden" name="id" value="<?=$rewind['id_riwayat']?>">
        <input type="hidden" name="nikS" value="<?=$rewind['nik']?>">
        <label for="nik">NIK Pasien(16 digit)</label><br>
        <input class='form-control' type="number" name="nik" min="1000000000000000" id="nik" value="<?=$rewind['nik']?>" required disabled><br>
        <input type="hidden" name="namaS" value="<?=$rewind['nama_pasien']?>">
        <label for="nama">Nama Pasien</label><br>
        <input class='form-control' type="text" name="nama" id="nama" value="<?=$rewind['nama_pasien']?>" required disabled><br>
        <input type="hidden" name="obat" value="<?=$rewind['diagnosa']?>">
        <label for="diagnosa">Diagnosa Pasien</label><br>
        <input class='form-control' type="text" name="diagnosa" id="diagnosa" value="<?=$rewind['diagnosa']?>" required disabled><br>
        <input type="hidden" name="obatS" value="<?=$rewind['obat']?>">
        <label for="obat">Obat Pasien</label><br>
        <input class='form-control' type="text" name="obat" id="obat" value="<?=$rewind['obat']?>" required disabled><br>
        <input type="hidden" name="dokterS" value="<?=$rewind['dokter']?>">
        <label for="dokter">Dokter Pasien</label><br>
        <select name="dokter" id="dokter" disabled>
            <?php
            $sqlo = "SELECT * FROM dokter";
            $resulto = mysqli_query($conn,$sqlo);
            while($rewindo = mysqli_fetch_assoc($resulto)){
            ?>
            <option value="<?=$rewindo['nama_dokter']?>"<?php if($rewind['dokter'] == $rewindo['nama_dokter']) echo 'selected="selected"';?>><?=$rewindo['nama_dokter']?></option>
            <?php
            }
            ?>
        </select><br>
        <input type="hidden" name="dateS" value="<?=$rewind['date']?>">
        <label for="text">Tanggal Berobat Pasien</label><br>
        <input class='form-control' type="text" name="date" id="date" value="<?=$rewind['date']?>" required disabled><br>
      </div>
      <div class="modal-footer">
        <button name="hapusPasien" class="btn btn-danger">Hapus Riwayat</button>
        </form>
      </div>
    </div>
  </div>
</div>                   
        <?php
                    }
            }
            if(isset($_POST['hapusPasien'])){
              $id = $_POST['id'];
              $nikS = $_POST['nikS'];
              $namaS = $_POST['namaS'];
              $diagnosaS = $_POST['diagnosaS'];
              $obatS = $_POST['obatS'];
              $dokterS = $_POST['dokterS'];
              $dateS = $_POST['dateS'];
              $sqlHapus = "DELETE FROM riwayat WHERE `riwayat`.`id_riwayat` = $id";
              $ResultHapus = mysqli_query($conn,$sqlHapus);
              $sqlA = "INSERT INTO `activity_log` (`id_activity`, `nama`, `aktifitas`, `akses`, `waktu`) VALUES (NULL, '$namaUser', 'Menghapus data riwayat bernik $nikS dengan nama $namaS didiagnosa $diagnosaS dengan obat $obatS ditangani dokter $dokterS ditanggal $dateS', '$aksesUser', CURRENT_TIMESTAMP)";
              $resultA = mysqli_query($conn,$sqlA);
            }
        ?>
        </tbody>
        <tfoot>
            <tr>
            <th>Nik Pasien</th>
            <th>Nama Pasien</th>
            <th>Diagnosa</th>
            <th>Obat Pasien</th>
            <th>Dokter Pasien</th>
            <th>Tanggal Berobat</th>
            <?php 
            if($_SESSION["akses"]=="Admin"){
            echo "<th>Action</th>";
            }
            ?> 
            </tr>
        </tfoot>
    </table>



<script type="text/javascript">

function get_nik(e)
{
  var value = $(e).val();

  $.ajax({
        url: "get_nik.php",
        type: "post",
        data: {
          value : value,
        },
        dataType: "json",
        success: function (data) 
        {
           $('#namaP').val(data.nama_pasien);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });

};

</script>
<?php
    
    include_once 'footer.php';
?>