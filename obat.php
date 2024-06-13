<?php 
session_start();
$_SESSION["hal"] = "obat";
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

    <title>Daftar Obat</title>
    
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
                        <h1 class="h3 mb-0 text-gray-800">Daftar Obat</h1>
                    </div>
                    <!-- Button trigger modal -->
<?php if($_SESSION["akses"]=="Admin"){
    ?>
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahModal">
  Tambah Obat
</button>

<!-- Modal -->
<div class="modal fade" id='tambahModal' tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Obat</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <label for="nama">Nama Obat</label><br>
        <input class='form-control' type="text" name="nama" id="nama" required><br>
        <label for="stok">Stok Obat</label><br>
        <input class='form-control' type="number" name="stok" id="stok" required>
      </div>
      <div class="modal-footer">
        <button name="tambahObat" class="btn btn-success">Tambah Obat</button>
        <?php
        if(isset($_POST['tambahObat'])){
          $nama = $_POST['nama'];
          $stok = $_POST['stok'];
          $sqlA = "INSERT INTO `activity_log` (`id_activity`, `nama`, `aktifitas`, `akses`, `waktu`) VALUES (NULL, '$namaUser', 'Menambahkan jenis obat bernama $nama dengan stok $stok', '$aksesUser', CURRENT_TIMESTAMP)";
          $resultA = mysqli_query($conn,$sqlA);
          $sqlTambah = "INSERT INTO `obat` (`id_obat`, `nama_obat`, `stok`) VALUES (NULL, '$nama', '$stok')";
          $result = mysqli_query($conn,$sqlTambah);
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
            <th>Nama Obat</th>
            <th>Stok</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
                    $sql = "SELECT * FROM obat ORDER BY nama_obat";
                    $query = mysqli_query($conn,$sql); 
                while($rewind = mysqli_fetch_assoc($query)){
                    echo "<tr>";
                    echo "<td>".$rewind['nama_obat']."</td>";
                    echo "<td>".$rewind['stok']."</td>";
                    echo "<td>";?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSModal<?=$rewind['id_obat'];?>">Tambah Stok</button>
                    <?php 
                    if($_SESSION["akses"]=="Admin"){?>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?=$rewind['id_obat'];?>">Hapus Obat</button>
                    <?php }echo "</td>";
                    echo "</tr>";?>

<!-- TambahS Modal -->
<div class="modal fade" id="tambahSModal<?=$rewind['id_obat']?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Stok Obat</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post">
        <input type="hidden" name="id" id="id" value="<?=$rewind['id_obat']?>">
        <input type="hidden" name="namaS" value="<?=$rewind['nama_obat']?>">
        <label for="nama">Nama Obat</label><br>
        <input class='form-control' type="text" name="nama" id="nama" value="<?=$rewind['nama_obat']?>" required disabled><br>
        <label for="stokS">Stok Obat Sekarang</label><br>
        <input type="number" name="stokS" id="stokS" value="<?=$rewind['stok']?>" required disabled><br>
        <label for="stok">Tambah Stok Obat</label><br>
        <input class='form-control' type="number" name="stok" id="stok" required>
      </div>
      <div class="modal-footer">
        <button name="tambahSObat" class="btn btn-primary">Tambah Stok Obat</button>
        </form>
      </div>
    </div>
  </div>
</div>
               
<!-- Hapus Modal -->
<div class="modal fade" id="hapusModal<?=$rewind['id_obat']?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Obat</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post">
        <input type="hidden" name="id" id="id" value="<?=$rewind['id_obat']?>">
        <input type="hidden" name="namaS" value="<?=$rewind['nama_obat']?>">
        <label for="nama">Nama Obat</label><br>
        <input class='form-control' type="text" name="nama" id="nama" value="<?=$rewind['nama_obat']?>" required disabled><br>
        <label for="stok">Stok Obat</label><br>
        <input class='form-control' type="number" name="stok" id="stok" value="<?=$rewind['stok']?>" required disabled>
      </div>
      <div class="modal-footer">
        <button name="hapusObat" class="btn btn-danger">Hapus Obat</button>
        </form>
      </div>
    </div>
  </div>
</div>                   
        <?php
                    }
                    if(isset($_POST['tambahSObat'])){
                      $id = $_POST['id'];
                      $nama = $_POST['namaS'];
                      $stokS = $_POST['stokS'];
                      $stok = $_POST['stok'];
                      $sqlA = "INSERT INTO `activity_log` (`id_activity`, `nama`, `aktifitas`, `akses`, `waktu`) VALUES (NULL, '$namaUser', 'Menambahkan stok obat bernama $nama menambah sejumlah $stok', '$aksesUser', CURRENT_TIMESTAMP)";
                      $sqlTambahS = "UPDATE `obat` SET `stok` = stok +'$stok' WHERE `obat`.`id_obat` = $id";
                      $resultA = mysqli_query($conn,$sqlA);
                      $result = mysqli_query($conn,$sqlTambahS);
                    }
                    if(isset($_POST['hapusObat'])){
                      $id = $_POST['id'];
                      $nama = $_POST['namaS'];
                      $sqlHapus = "DELETE FROM obat WHERE `obat`.`id_obat` = $id";
                      $result = mysqli_query($conn,$sqlHapus);
                      $sqlA = "INSERT INTO `activity_log` (`id_activity`, `nama`, `aktifitas`, `akses`, `waktu`) VALUES (NULL, '$namaUser', 'Menghapus jenis obat bernama $nama', '$aksesUser', CURRENT_TIMESTAMP)";
                      $resultA = mysqli_query($conn,$sqlA);
                    }
                ?>
 </tbody>
        <tfoot>
            <tr>
            <th>Nama Obat</th>
            <th>Stok</th>
            <th>Action</th>
            </tr>
        </tfoot>
    </table>
                <?php
    include_once 'footer.php';
?>