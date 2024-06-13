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

    <title>Daftar Dokter</title>
    
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="style/sb-admin-2.min.css" rel="stylesheet">
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
                        <h1 class="h3 mb-0 text-gray-800">Daftar Dokter</h1>
                    </div>
                    <!-- Button trigger modal -->
<?php if($_SESSION["akses"]=="Admin"){
    ?>
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahModal">
  Tambah Dokter
</button>

<!-- Modal -->
<div class="modal fade" id='tambahModal' tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Dokter</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <label for="nama">Nama Dokter</label><br>
        <input class='form-control' type="text" name="nama" id="nama" required>
        <br><label for="spesialis">Spesialisasi Dokter</label><br>
        <select name="spesialis" id="spesialis">
            <option value="THT">THT</option>
            <option value="Umum">Umum</option>
            <option value="Gigi">Gigi</option>
        </select>
      </div>
      <div class="modal-footer">
        <button name="tambahDokter" class="btn btn-success">Tambah Dokter</button>
        <?php
        if(isset($_POST['tambahDokter'])){
          $nama = $_POST['nama'];
          $spesialisasi = $_POST['spesialis'];
          $sqlTambah = "INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `spesialisasi_dokter`) VALUES (NULL, '$nama', '$spesialisasi')";
          $result = mysqli_query($conn,$sqlTambah);
          $sqlA = "INSERT INTO `activity_log` (`id_activity`, `nama`, `aktifitas`, `akses`, `waktu`) VALUES (NULL, '$namaUser', 'Menambahkan data seorang dokter bernama $nama dengan spesialisasi $spesialisasi', '$aksesUser', CURRENT_TIMESTAMP)";
          $resultA = mysqli_query($conn,$sqlA);
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
        <th>Nama Dokter</th>
                        <th>Spesialisasi Dokter</th>
                        <?php 
                        if($_SESSION["akses"]=="Admin"){
                        echo "<th>Action</th>";
                        }
                        ?>
            </tr>
        </thead>
        <tbody>
        <?php
                    $sql = "SELECT * FROM dokter ORDER BY nama_dokter";
                    $query = mysqli_query($conn,$sql); 
                while($rewind = mysqli_fetch_assoc($query)){
                    echo "<tr>";
                    echo "<td>".$rewind['nama_dokter']."</td>";
                    echo "<td>".$rewind['spesialisasi_dokter']."</td>";
                    if($_SESSION["akses"]=="Admin"){
                    echo "<td>";?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ubahModal<?=$rewind['id_dokter'];?>">Ubah Dokter</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $rewind['id_dokter'];?>">Hapus Dokter</button>                   
                    <?php echo "</td>";
                    echo "</tr>";?>
 

<!-- Ubah Modal -->
<div class="modal fade" id="ubahModal<?=$rewind['id_dokter']?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Dokter</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <input type="hidden" name="id" id="id" value="<?=$rewind['id_dokter']?>" required>
        <input type="hidden" name="namaS" value="<?=$rewind['nama_dokter']?>">
        <label for="nama">Nama Dokter</label><br>
        <input class='form-control' type="text" name="nama" id="nama" value="<?=$rewind['nama_dokter']?>" required><br>
        <input type="hidden" name="spesialisS" value="<?=$rewind['spesialisasi_dokter']?>">
        <label for="spesialis">Spesialisasi Dokter</label><br>
        <select name="spesialis" id="spesialis">
            <option value="THT"<?php if($rewind['spesialisasi_dokter'] == 'THT') echo 'selected="selected"';?>>THT</option>
            <option value="Umum"<?php if($rewind['spesialisasi_dokter'] == 'Umum') echo 'selected="selected"';?>>Umum</option>
            <option value="Gigi"<?php if($rewind['spesialisasi_dokter'] == 'Gigi') echo 'selected="selected"';?>>Gigi</option>
        </select>
      </div>
      <div class="modal-footer">
        <button name="ubahDokter" class="btn btn-primary">Ubah Dokter</button> 
        </form>
      </div>
    </div>
  </div>
</div>
               
<!-- Hapus Modal -->
<div class="modal fade" id="hapusModal<?=$rewind['id_dokter']?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Dokter</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <input type="hidden" name="id" id="id" value="<?=$rewind['id_dokter']?>" required>
        <input type="hidden" name="nama" value="<?=$rewind['nama_dokter']?>">
        <label for="namaD">Nama Dokter</label><br>
        <input class='form-control' type="text" name="namaD" id="namaD" value="<?=$rewind['nama_dokter']?>" required disabled><br>
        <input type="hidden" name="spesialis" value="<?=$rewind['spesialisasi_dokter']?>">
        <label for="spesialisD">Spesialisasi Dokter</label><br>
        <select name="spesialisD" id="spesialisD" disabled>
            <option value="THT"<?php if($rewind['spesialisasi_dokter'] == 'THT') echo 'selected="selected"';?>>THT</option>
            <option value="Umum"<?php if($rewind['spesialisasi_dokter'] == 'Umum') echo 'selected="selected"';?>>Umum</option>
            <option value="Gigi"<?php if($rewind['spesialisasi_dokter'] == 'Gigi') echo 'selected="selected"';?>>Gigi</option>
        </select>
      </div>
      <div class="modal-footer">
        <button name="hapusDokter" class="btn btn-danger">Hapus Dokter</button>
        </form>
      </div>
    </div>
  </div>
</div>                   
        <?php
                    }
            }
            if(isset($_POST['ubahDokter'])){
              $id = $_POST['id'];
              $namaS = $_POST['namaS'];
              $nama = $_POST['nama'];
              $spesialisasiS = $_POST['spesialisS'];
              $spesialisasi = $_POST['spesialis'];
              $resultA = mysqli_query($conn,"INSERT INTO `activity_log` (`id_activity`, `nama`, `aktifitas`, `akses`, `waktu`) VALUES (NULL, '$namaUser', 'Mengubah data seorang dokter sebelumnya bernama $namaS menjadi $nama dengan spesialisasi $spesialisasiS menjadi $spesialisasi', '$aksesUser', CURRENT_TIMESTAMP)");
              $sqlUbah = "UPDATE `dokter` SET `nama_dokter` = '$nama', `spesialisasi_dokter` = '$spesialisasi' WHERE `dokter`.`id_dokter` = $id";
              $ResultUbah = mysqli_query($conn,$sqlUbah);
            }
            if(isset($_POST['hapusDokter'])){
              $id = $_POST['id'];
              $nama = $_POST['nama'];
              $spesialisasi = $_POST['spesialis'];
              $sqlA = "INSERT INTO `activity_log` (`id_activity`, `nama`, `aktifitas`, `akses`, `waktu`) VALUES (NULL, '$namaUser', 'Menghapus data seorang dokter bernama $nama dengan spesialisasi $spesialisasi', '$aksesUser', CURRENT_TIMESTAMP)";
              $resultA = mysqli_query($conn,$sqlA);
              $sqlHapus = "DELETE FROM dokter WHERE `dokter`.`id_dokter` = $id";
              $ResultHapus = mysqli_query($conn,$sqlHapus);     
            }
                ?>
                        <tfoot>
            <tr>
            <th>Nama Dokter</th>
                        <th>Spesialisasi Dokter</th>
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