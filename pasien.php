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

    <title>Daftar Pasien</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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
                        <h1 class="h3 mb-0 text-gray-800">Daftar Pasien</h1>
                    </div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahModal">
  Tambah Pasien
</button>

<!-- Modal -->
<div class="modal fade" id='tambahModal' tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pasien</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <label for="nik">NIK Pasien(16 digit)</label><br>
        <input class='form-control' type="number" name="nik" min="1000000000000000" id="nik" required><br>
        <label for="nama">Nama Pasien</label><br>
        <input class='form-control' type="text" name="nama" id="nama" required><br>
        <label for="jk">Jenis Kelamin Pasien</label><br>
        <select name="jk" id="jk">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select><br>
        <label for="lahir">Tanggal Lahir Pasien</label><br>
        <input type="date" name="lahir" id="lahir" required><br>
      </div>
      <div class="modal-footer">
        <button name="tambahPasien" class="btn btn-success">Tambah Pasien</button>
        <?php
        if(isset($_POST['tambahPasien'])){
          $nik = $_POST['nik'];
          $nama = $_POST['nama'];
          $jk = $_POST['jk'];
          $lahir = $_POST['lahir'];
          $sqlTambah = "INSERT INTO `pasien` (`nik`, `nama_pasien`, `gender`, `tanggal_kelahiran`) VALUES ('$nik', '$nama', '$jk', '$lahir')";
          $result = mysqli_query($conn,$sqlTambah);
          $sqlA = "INSERT INTO `activity_log` (`id_activity`, `nama`, `aktifitas`, `akses`, `waktu`) VALUES (NULL, '$namaUser', 'Menambahkan data seorang pasien bernik $nik dengan nama $nama berjenis kelamin $jk dengan tanggal lahir $lahir', '$aksesUser', CURRENT_TIMESTAMP)";
          $resultA = mysqli_query($conn,$sqlA);
        }
        ?>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
?><table id="tabel" class="table table-striped" style="width:100%">
<thead>
    <tr>
    <th>Nik Pasien</th>
    <th>Nama Pasien</th>
    <th>Jenis Kelamin</th>
    <th>Tanggal Kelahiran Pasien</th>
    <th>Riwayat Pasien</th>
    <?php 
    if($_SESSION["akses"]=="Admin"){
    echo "<th>Action</th>";
    }
    ?>
    </tr>
</thead>
<tbody>
                <?php
                    $sql = "SELECT * FROM pasien ORDER BY nik";
                    $query = mysqli_query($conn,$sql); 
                while($rewind = mysqli_fetch_assoc($query)){
                    $nik = $rewind['nik'];
                    echo "<tr>";
                    echo "<td>".$rewind['nik']."</td>";
                    echo "<td>".$rewind['nama_pasien']."</td>";
                    echo "<td>".$rewind['gender']."</td>";
                    echo "<td>".$rewind['tanggal_kelahiran']."</td>";
                    $sqlR = "SELECT * FROM riwayat WHERE nik = '$nik'";
                    $queryR = mysqli_query($conn,$sqlR);
                    echo "<td>";
                    while($rewindR = mysqli_fetch_assoc($queryR)){
                    echo "(".$rewindR['diagnosa'].", ".$rewindR['obat'].", ".$rewindR['dokter'].", ".$rewindR['date'].") ";
                    }
                    echo "</td>";
                    if($_SESSION["akses"]=="Admin"){
                    echo "<td>";?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ubahModal<?=$rewind['nik'];?>">Ubah Pasien</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $rewind['nik'];?>">Hapus Pasien</button>                   
                    <?php echo "</td>";
                    echo "</tr>";?>

<!-- Ubah Modal -->
<div class="modal fade" id="ubahModal<?=$rewind['nik']?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Pasien</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <input type="hidden" name="nikS" value="<?=$rewind['nik']?>">
        <label for="nik">NIK Pasien(16 digit)</label><br>
        <input class='form-control' type="number" name="nik" min="1000000000000000" id="nik" value="<?=$rewind['nik']?>" required><br>
        <input type="hidden" name="namaS" value="<?=$rewind['nama_pasien']?>">
        <label for="nama">Nama Pasien</label><br>
        <input class='form-control' type="text" name="nama" id="nama" value="<?=$rewind['nama_pasien']?>" required><br>
        <input type="hidden" name="jkS" value="<?=$rewind['gender']?>">
        <label for="jk">Jenis Kelamin Pasien</label><br>
        <select name="jk" id="jk">
            <option value="Laki-laki"<?php if($rewind['gender'] == 'Laki-laki') echo 'selected="selected"';?>>Laki-laki</option>
            <option value="Perempuan"<?php if($rewind['gender'] == 'Perempuan') echo 'selected="selected"';?>>Perempuan</option>
        </select><br>
        <input type="hidden" name="lahirS" value="<?=$rewind['tanggal_kelahiran']?>">
        <label for="lahir">Tanggal Lahir Pasien</label><br>
        <input type="date" name="lahir" id="lahir" value="<?=$rewind['tanggal_kelahiran']?>" required><br>
      </div>
      <div class="modal-footer">
        <button name="ubahPasien" class="btn btn-primary">Ubah Pasien</button>
        <?php
        ?>       
        </form>
      </div>
    </div>
  </div>
</div>
               
<!-- Hapus Modal -->
<div class="modal fade" id="hapusModal<?=$rewind['nik']?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Pasien</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <input type="hidden" name="nikS" value="<?=$rewind['nik']?>">
        <label for="nik">NIK Pasien(16 digit)</label><br>
        <input class='form-control' type="number" name="nik" min="1000000000000000" id="nik" value="<?=$rewind['nik']?>" required disabled><br>
        <input type="hidden" name="namaS" value="<?=$rewind['nama_pasien']?>">
        <label for="nama">Nama Pasien</label><br>
        <input class='form-control' type="text" name="nama" id="nama" value="<?=$rewind['nama_pasien']?>" required disabled><br>
        <input type="hidden" name="jkS" value="<?=$rewind['gender']?>">
        <label for="jk">Jenis Kelamin Pasien</label><br>
        <select name="jk" id="jk" disabled>
            <option value="Laki-laki"<?php if($rewind['gender'] == 'Laki-laki') echo 'selected="selected"';?>>Laki-laki</option>
            <option value="Perempuan"<?php if($rewind['gender'] == 'Perempuan') echo 'selected="selected"';?>>Perempuan</option>
        </select><br>
        <input type="hidden" name="lahirS" value="<?=$rewind['tanggal_kelahiran']?>">
        <label for="lahir">Tanggal Lahir Pasien</label><br>
        <input type="date" name="lahir" id="lahir" value="<?=$rewind['tanggal_kelahiran']?>" required disabled><br>
      </div>
      <div class="modal-footer">
        <button name="hapusPasien" class="btn btn-danger">Hapus Pasien</button>
        </form>
      </div>
    </div>
  </div>
</div>                   
        <?php
                    }
            } if(isset($_POST['ubahPasien'])){
              $nikS = $_POST['nikS'];
              $nik = $_POST['nik'];
              $namaS = $_POST['namaS'];
              $nama = $_POST['nama'];
              $jkS = $_POST['jkS'];
              $jk = $_POST['jk'];
              $lahirS = $_POST['lahirS'];
              $lahir = $_POST['lahir'];
              $sqlUbah = "UPDATE `pasien` SET `nik` = '$nik', `nama_pasien` = '$nama', `gender` = '$jk', `tanggal_kelahiran` = '$lahir' WHERE `pasien`.`nik` = $nikS";
              $ResultUbah = mysqli_query($conn,$sqlUbah);
              $sqlA = "INSERT INTO `activity_log` (`id_activity`, `nama`, `aktifitas`, `akses`, `waktu`) VALUES (NULL, '$namaUser', 'Mengubah data seorang pasien sebelumnya bernik $nikS sekarang bernik $nik dengan nama sebelumnya $namaS diganti menjadi $nama berjenis kelamin sebelumnya $jkS diganti menjadi $jk dengan tanggal lahir sebelumnya $lahirS diganti menjadi $lahir', '$aksesUser', CURRENT_TIMESTAMP)";
              $resultA = mysqli_query($conn,$sqlA);
            }
            if(isset($_POST['hapusPasien'])){
              $nikS = $_POST['nikS'];
              $namaS = $_POST['namaS'];
              $jkS = $_POST['jkS'];
              $lahirS = $_POST['lahirS'];
              $sqlHapus = "DELETE FROM pasien WHERE `pasien`.`nik` = $nikS";
              $ResultHapus = mysqli_query($conn,$sqlHapus);
              $sqlA = "INSERT INTO `activity_log` (`id_activity`, `nama`, `aktifitas`, `akses`, `waktu`) VALUES (NULL, '$namaUser', 'Menghapus data seorang pasien bernik $nikS dengan nama $namaS berjenis kelamin $jkS dengan tanggal lahir $lahirS', '$aksesUser', CURRENT_TIMESTAMP)";
              $resultA = mysqli_query($conn,$sqlA);
            }
                ?>
        <tfoot>
            <tr>
    <th>Nik Pasien</th>
    <th>Nama Pasien</th>
    <th>Jenis Kelamin</th>
    <th>Tanggal Kelahiran Pasien</th>
    <th>Riwayat Pasien</th>
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