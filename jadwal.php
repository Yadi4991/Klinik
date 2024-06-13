<?php 
session_start();
$_SESSION["hal"] = "dokter";
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

    <title>Jadwal Dokter</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="style/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                        <h1 class="h3 mb-0 text-gray-800">Jadwal Dokter</h1>
                    </div>
                    <?php if($_SESSION["akses"]=="Admin"){
    ?>
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahModal">
  Tambah Jadwal
</button>

<!-- Tambah Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jadwal</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <label for="hari">Hari</label><br>
        <select name="hari" id="hari">
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jumat">Jumat</option>
            <option value="Sabtu">Sabtu</option>
            <option value="Minggu">Minggu</option>
        </select><br>
        <label for="nama">Nama Dokter</label><br>
        <select name="nama" id="nama">
            <?php
            $sqlRun = mysqli_query($conn,"SELECT * FROM dokter");
            while($run = mysqli_fetch_assoc($sqlRun)){
            ?>
            <option value="<?=$run['nama_dokter']?>"><?=$run['nama_dokter']?></option> 
            <?php
            }
            ?>
        </select><br>
        <label for="mulaiP">Mulai Praktek</label><br>
        <input type="time" name="mulaiP" id="mulaiP"><br>
        <label for="selesaiP">Selesai Praktek</label><br>
        <input type="time" name="selesaiP" id="selesaiP">
      </div>
      <div class="modal-footer">
        <button name="tambahJadwal" class="btn btn-success">Tambah Jadwal</button>
      <?php
      if(isset($_POST['tambahJadwal'])){
      $hari = $_POST['hari'];  
      $nama = $_POST['nama'];
      $mulaiP = $_POST['mulaiP'];
      $selesaiP = $_POST['selesaiP'];
      $sqlA = "INSERT INTO `activity_log` (`id_activity`, `nama`, `aktifitas`, `akses`, `waktu`) VALUES (NULL, '$namaUser', 'Menambahkan jadwal dihari $hari seorang dokter bernama $nama dimulai dari jam $mulaiP selesai dijam $selesaiP', '$aksesUser', CURRENT_TIMESTAMP)";
      $resultA = mysqli_query($conn,$sqlA);
      $sql = "INSERT INTO `jadwal` (`id_jadwal`, `hari`, `nama_dokter`, `mulaiP`, `selesaiP`) VALUES (NULL, '$hari', '$nama', '$mulaiP', '$selesaiP')";
      $result = mysqli_query($conn,$sql);
    }
      ?>
      </form>
      </div>
    </div>
  </div>
</div>
<?php
}
?>
        <table id="tabel" class="table table-striped" style="width:100%">
        <thead>
            <tr>
            <th>Hari</th>
            <th>Nama Dokter</th>
            <th>Mulai Praktek</th>
            <th>Selesai Praktek</th>
                <?php 
                    if($_SESSION["akses"]=="Admin"){
                        echo "<th>Action</th>";
                    }
                ?>
            </tr>
        </thead>
        <tbody>
        <?php
                    $sql = "SELECT * FROM jadwal ORDER BY CASE WHEN hari = 'Senin' THEN 1 WHEN hari = 'Selasa' THEN 2 WHEN hari = 'Rabu' THEN 3 WHEN hari = 'Kamis' THEN 4 WHEN hari = 'Jumat' THEN 5 WHEN hari = 'Sabtu' THEN 6 WHEN hari = 'Minggu' THEN 7 END";
                    $query = mysqli_query($conn,$sql); 
                while($rewind = mysqli_fetch_assoc($query)){
                    echo "<tr>";
                    echo "<td>".$rewind['hari']."</td>";
                    echo "<td>".$rewind['nama_dokter']."</td>";
                    echo "<td>".$rewind['mulaiP']."</td>";
                    echo "<td>".$rewind['selesaiP']."</td>";
                    if($_SESSION["akses"]=="Admin"){
                    echo "<td>";?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ubahModal<?=$rewind['id_jadwal'];?>">Ubah Jadwal</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?=$rewind['id_jadwal'];?>">Hapus Jadwal</button>
                <?php
                    echo "</td>";
                    echo "</tr>";?>  

<!-- Ubah Modal -->
<div class="modal fade" id="ubahModal<?=$rewind['id_jadwal']?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Jadwal</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <input type="hidden" value="<?=$rewind['id_jadwal']?>" name="id">
        <input type="hidden" name="hariS" value="<?=$rewind['hari']?>">
        <label for="hari">Hari</label><br>
        <select name="hari" id="hari">
            <option value="Senin"<?php if($rewind['hari'] == 'Senin') echo 'selected="selected"';?>>Senin</option>
            <option value="Selasa"<?php if($rewind['hari'] == 'Selasa') echo 'selected="selected"';?>>Selasa</option>
            <option value="Rabu"<?php if($rewind['hari'] == 'Rabu') echo 'selected="selected"';?>>Rabu</option>
            <option value="Kamis"<?php if($rewind['hari'] == 'Kamis') echo 'selected="selected"';?>>Kamis</option>
            <option value="Jumat"<?php if($rewind['hari'] == 'Jumat') echo 'selected="selected"';?>>Jumat</option>
            <option value="Sabtu"<?php if($rewind['hari'] == 'Sabtu') echo 'selected="selected"';?>>Sabtu</option>
            <option value="Minggu"<?php if($rewind['hari'] == 'Minggu') echo 'selected="selected"';?>>Minggu</option>
        </select><br>
        <input type="hidden" name="namaS" value="<?=$rewind['nama_dokter']?>">
        <label for="nama">Nama Dokter</label><br>
        <select name="nama" id="nama">
            <?php
            $sqlRun = mysqli_query($conn,"SELECT * FROM dokter");
            while($run = mysqli_fetch_assoc($sqlRun)){
            ?>
            <option value="<?=$run['nama_dokter']?>"<?php if($rewind['nama_dokter'] == $run['nama_dokter']) echo 'selected="selected"';?>><?=$run['nama_dokter']?></option> 
            <?php
            }
            ?>
        </select><br>
        <input type="hidden" name="mulaiPS" value="<?=$rewind['mulaiP']?>">
        <label for="mulaiP">Mulai Praktek</label><br>
        <input type="time" name="mulaiP" value="<?=$rewind['mulaiP']?>" id="mulaiP" required><br>
        <input type="hidden" name="selesaiPS" value="<?=$rewind['selesaiP']?>">
        <label for="selesaiP">Selesai Praktek</label><br>
        <input type="time" name="selesaiP" value="<?=$rewind['selesaiP']?>" id="selesaiP" required>
      </div>
      <div class="modal-footer">
        <button name="ubahJadwal" class="btn btn-primary">Ubah Jadwal</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- hapus Modal -->
<div class="modal fade" id="hapusModal<?=$rewind['id_jadwal']?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Jadwal</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <input type="hidden" value="<?=$rewind['id_jadwal']?>" name="id">
        <input type="hidden" name="hariS" value="<?=$rewind['hari']?>">
        <label for="hari">Hari</label><br>
        <select name="hari" id="hari" disabled>
            <option value="Senin"<?php if($rewind['hari'] == 'Senin') echo 'selected="selected"';?>>Senin</option>
            <option value="Selasa"<?php if($rewind['hari'] == 'Selasa') echo 'selected="selected"';?>>Selasa</option>
            <option value="Rabu"<?php if($rewind['hari'] == 'Rabu') echo 'selected="selected"';?>>Rabu</option>
            <option value="Kamis"<?php if($rewind['hari'] == 'Kamis') echo 'selected="selected"';?>>Kamis</option>
            <option value="Jumat"<?php if($rewind['hari'] == 'Jumat') echo 'selected="selected"';?>>Jumat</option>
            <option value="Sabtu"<?php if($rewind['hari'] == 'Sabtu') echo 'selected="selected"';?>>Sabtu</option>
            <option value="Minggu"<?php if($rewind['hari'] == 'Minggu') echo 'selected="selected"';?>>Minggu</option>
        </select><br>
        <input type="hidden" name="namaS" value="<?=$rewind['nama_dokter']?>">
        <label for="nama">Nama Dokter</label><br>
        <select name="nama" id="nama" disabled>
            <?php
            $sqlRun = mysqli_query($conn,"SELECT * FROM dokter");
            while($run = mysqli_fetch_assoc($sqlRun)){
            ?>
            <option value="<?=$run['nama_dokter']?>"<?php if($rewind['nama_dokter'] == $run['nama_dokter']) echo 'selected="selected"';?>><?=$run['nama_dokter']?></option> 
            <?php
            }
            ?>
        </select><br>
        <input type="hidden" name="mulaiPS" value="<?=$rewind['mulaiP']?>">
        <label for="mulaiP">Mulai Praktek</label><br>
        <input type="time" name="mulaiP" value="<?=$rewind['mulaiP']?>" id="mulaiP" required disabled><br>
        <input type="hidden" name="selesaiPS" value="<?=$rewind['selesaiP']?>">
        <label for="selesaiP">Selesai Praktek</label><br>
        <input type="time" name="selesaiP" value="<?=$rewind['selesaiP']?>" id="selesaiP" required disabled>
      </div>
      <div class="modal-footer">
        <button name="hapusJadwal" class="btn btn-danger">Hapus Jadwal</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
                    }
                
                }
                if(isset($_POST['ubahJadwal'])){
                  $id = $_POST['id'];
                  $hariS = $_POST['hariS'];  
                  $hari = $_POST['hari'];
                  $namaS = $_POST['namaS'];  
                  $nama = $_POST['nama'];
                  $mulaiPS = $_POST['mulaiPS'];
                  $mulaiP = $_POST['mulaiP'];
                  $selesaiPS = $_POST['selesaiPS'];
                  $selesaiP = $_POST['selesaiP'];
                  $sqlA = "INSERT INTO `activity_log` (`id_activity`, `nama`, `aktifitas`, `akses`, `waktu`) VALUES (NULL, '$namaUser', 'Mengubah jadwal sebelumnya dihari $hariS menjadi $hari seorang dokter sebelumnya bernama $namaS menjadi $nama dimulai dijam sebelumnya $mulaiPS menjadi $mulaiP selesai dijam sebelumnya $selesaiPS menjadi $selesaiP', '$aksesUser', CURRENT_TIMESTAMP)";
                  $resultA = mysqli_query($conn,$sqlA);
                  $sqlUbah = "UPDATE `jadwal` SET `hari` = '$hari', `nama_dokter` = '$nama', `mulaiP` = '$mulaiP', `selesaiP` = '$selesaiP' WHERE `jadwal`.`id_jadwal` = $id";
                  $result = mysqli_query($conn,$sqlUbah);
                }
                if(isset($_POST['hapusJadwal'])){
                  $id = $_POST['id'];
                  $hariS = $_POST['hariS'];  
                  $namaS = $_POST['namaS']; 
                  $mulaiPS = $_POST['mulaiPS'];
                  $selesaiPS = $_POST['selesaiPS']; 
                  $sqlHapus = "DELETE FROM jadwal WHERE `jadwal`.`id_jadwal` = $id";
                  $result = mysqli_query($conn,$sqlHapus);
                  $sqlA = "INSERT INTO `activity_log` (`id_activity`, `nama`, `aktifitas`, `akses`, `waktu`) VALUES (NULL, '$namaUser', 'Menghapus jadwal dihari $hariS seorang dokter bernama $namaS dimulai dari jam $mulaiPS selesai dijam $selesaiPS', '$aksesUser', CURRENT_TIMESTAMP)";
                  $resultA = mysqli_query($conn,$sqlA);
                }
                ?>
        </tbody>
        <tfoot>
            <tr>
            <th>Hari</th>
            <th>Nama Dokter</th>
            <th>Mulai Praktek</th>
            <th>Selesai Praktek</th>
                <?php 
                    if($_SESSION["akses"]=="Admin"){
                        echo "<th>Action</th>";
                    }
                ?>
            </tr>
        </tfoot>
    </table>
                <?php
    include_once 'footer.php';
?>