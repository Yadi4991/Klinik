<?php 
session_start();
$_SESSION["hal"] = "akun";
if($_SESSION["akses"]=="Employee"){
    header("location:utama.php");
}

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

    <title>Daftar Akun</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">
        <link href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                        <h1 class="h3 mb-0 text-gray-800">Daftar Akun</h1>
                    </div>
                  <!-- Button trigger modal -->
                  <?php if($_SESSION["akses"]=="Admin"){
    ?>
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahModal">
  Tambah Akun
</button>

<!-- Modal -->
<div class="modal fade" id='tambahModal' tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Akun</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <label for="Unama">Username Akun</label><br>
        <input class='form-control' type="text" name="Unama" id="Unama" required><br>
        <label for="pass">Password Akun</label><br>
        <input class='form-control' type="text" name="pass" id="pass" required><br>
        <label for="nama">Nama Pengguna</label><br>
        <input class='form-control' type="text"name="nama" id="nama" required><br>
        <label for="akses">Akses Akun</label><br>
        <select name="akses" id="akses">
            <option value="Admin">Admin</option>
            <option value="Employee">Employee</option>
        </select>
      </div>
      <div class="modal-footer">
        <button name="tambahAkun" class="btn btn-success">Tambah Akun</button>
        <?php
        if(isset($_POST['tambahAkun'])){
          $Unama = $_POST['Unama'];
          $password = $_POST['pass'];
          $nama = $_POST['nama'];
          $akses = $_POST['akses'];
          $sqlA = "INSERT INTO `activity_log` (`id_activity`, `nama`, `aktifitas`, `akses`, `waktu`) VALUES (NULL, '$namaUser', 'Menambahkan akun dengan username $Unama dengan password $password dengan nama $nama diberikan akses setingkat $akses', '$aksesUser', CURRENT_TIMESTAMP)";
          $resultA = mysqli_query($conn,$sqlA);
          $sqlTambah = "INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `akses`) VALUES (NULL, '$Unama', '$password', '$nama', '$akses')";
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
        <th>Username</th>
                        <th>Password</th>
                        <th>Nama</th>
                        <th>Akses</th>
                        <?php 
                        if($_SESSION["akses"]=="Admin"){
                        echo "<th>Action</th>";
                        }
                        ?>
            </tr>
        </thead>
        <tbody>
        <?php
                    $sql = "SELECT * FROM user";
                    $query = mysqli_query($conn,$sql); 
                while($rewind = mysqli_fetch_assoc($query)){
                    echo "<tr>";
                    echo "<td>".$rewind['username']."</td>";
                    echo "<td>".$rewind['password']."</td>";
                    echo "<td>".$rewind['nama']."</td>";
                    echo "<td>".$rewind['akses']."</td>";
                    echo "<td>";?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ubahModal<?=$rewind['id_user'];?>">Ubah Akun</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $rewind['id_user'];?>">Hapus Akun</button>                   
                    <?php echo "</td>";
                    echo "</tr>";?>



<!-- Ubah Modal -->
<div class="modal fade" id="ubahModal<?=$rewind['id_user']?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Akun</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post">
        <input type="hidden" value="<?=$rewind['id_user']?>" name="id" id="id">
        <input type="hidden" name="UnamaS" value="<?=$rewind['username']?>">
        <label for="Unama">Username Akun</label><br>
        <input class='form-control' type="text" name="Unama" value="<?=$rewind['username']?>" id="Unama" required><br>
        <input type="hidden" name="passS" value="<?=$rewind['password']?>">
        <label for="pass">Password Akun</label><br>
        <input class='form-control' type="text" name="pass" value="<?=$rewind['password']?>" id="pass" required><br>
        <input type="hidden" name="namaS" value="<?=$rewind['nama']?>">
        <label for="nama">Nama Pengguna</label><br>
        <input class='form-control' type="text" name="nama" value="<?=$rewind['nama']?>" id="nama" required><br>
        <input type="hidden" name="aksesS" value="<?=$rewind['akses']?>">
        <label for="akses">Akses Akun</label><br>
        <select name="akses" id="akses">
            <option value="Admin"<?php if($rewind['akses'] == 'Admin') echo 'selected="selected"';?>>Admin</option>
            <option value="Employee"<?php if($rewind['akses'] == 'Employee') echo 'selected="selected"';?>>Employee</option>
        </select>
      </div>
      <div class="modal-footer">
        <button name="ubahAkun" class="btn btn-primary">Ubah Akun</button>
        </form>
      </div>
    </div>
  </div>
</div>
               
<!-- Hapus Modal -->
<div class="modal fade" id="hapusModal<?=$rewind['id_user']?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Akun</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post">
      <input type="hidden" value="<?=$rewind['id_user']?>" name="id" id="id">
        <input type="hidden" name="UnamaS" value="<?=$rewind['username']?>">
        <label for="Unama">Username Akun</label><br>
        <input class='form-control' type="text" name="Unama" value="<?=$rewind['username']?>" id="Unama" required disabled><br>
        <input type="hidden" name="passS" value="<?=$rewind['password']?>">
        <label for="pass">Password Akun</label><br>
        <input class='form-control' type="text" name="pass" value="<?=$rewind['password']?>" id="pass" required disabled><br>
        <input type="hidden" name="namaS" value="<?=$rewind['nama']?>">
        <label for="nama">Nama Pengguna</label><br>
        <input class='form-control' type="text" name="nama" value="<?=$rewind['nama']?>" id="nama" required disabled><br>
        <input type="hidden" name="aksesS" value="<?=$rewind['akses']?>">
        <label for="akses">Akses Akun</label><br>
        <select name="akses" id="akses" disabled>
            <option value="Admin"<?php if($rewind['akses'] == 'Admin') echo 'selected="selected"';?>>Admin</option>
            <option value="Employee"<?php if($rewind['akses'] == 'Employee') echo 'selected="selected"';?>>Employee</option>
        </select>
      </div>
      <div class="modal-footer">
        <button name="hapusAkun" class="btn btn-danger">Hapus Akun</button>
        </form>
      </div>
    </div>
  </div>
</div>                   
        <?php
            }
            if(isset($_POST['ubahAkun'])){
              $id = $_POST['id'];
              $UnamaS = $_POST['UnamaS'];
              $Unama = $_POST['Unama'];
              $passS = $_POST['passS'];
              $pass = $_POST['pass'];
              $namaS = $_POST['namaS'];
              $nama = $_POST['nama'];
              $aksesS = $_POST['aksesS'];
              $akses = $_POST['akses'];
              $sqlA = "INSERT INTO `activity_log` (`id_activity`, `nama`, `aktifitas`, `akses`, `waktu`) VALUES (NULL, '$namaUser', 'Mengubah akun dengan username sebelumnya $UnamaS menjadi $Unama dengan password sebelumnya $passS menjadi $pass dengan nama sebelumnya $namaS menjadi $nama diberikan akses sebelumnya setingkat $aksesS menjadi $akses', '$aksesUser', CURRENT_TIMESTAMP)";
              $resultA = mysqli_query($conn,$sqlA);
              $sqlUbah = "UPDATE `user` SET `username` = '$Unama', `password` = '$pass', `nama` = '$nama', `akses` = '$akses' WHERE `user`.`id_user` = $id";
              $result = mysqli_query($conn,$sqlUbah);
            }
            if(isset($_POST['hapusAkun'])){
              $id = $_POST['id'];
              $UnamaS = $_POST['UnamaS'];
              $passS = $_POST['passS'];
              $namaS = $_POST['namaS'];
              $aksesS = $_POST['aksesS'];
              $sqlA = "INSERT INTO `activity_log` (`id_activity`, `nama`, `aktifitas`, `akses`, `waktu`) VALUES (NULL, '$namaUser', 'Menghapus akun dengan username $UnamaS dengan password $passS dengan nama $namaS diberikan akses setingkat $aksesS', '$aksesUser', CURRENT_TIMESTAMP)";
              $resultA = mysqli_query($conn,$sqlA);
              $sqlHapus = "DELETE FROM user WHERE `user`.`id_user` = $id";
              $result = mysqli_query($conn,$sqlHapus);
            }
                ?>
                        <tfoot>
            <tr>
            <th>Username</th>
                        <th>Password</th>
                        <th>Nama</th>
                        <th>Akses</th>
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