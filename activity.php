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

    <title>Activity log</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
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
                        <h1 class="h3 mb-0 text-gray-800">Activity log</h1>
                    </div>
                    <table id="tabel" class="table table-striped" style="width:100%">
        <thead>
            <tr>
            <th>Nama User</th>
            <th>Aktifitas</th>
            <th>Waktu</th>  
            </tr>
        </thead>
        <tbody>
            <?php
                    $sql = "SELECT * FROM `activity_log` ORDER BY `id_activity` DESC";
                    $query = mysqli_query($conn,$sql); 
                while($rewind = mysqli_fetch_assoc($query)){
                    echo "<tr>";
                    echo "<td>".$rewind['nama']."(".$rewind['akses'].")</td>";
                    echo "<td>".$rewind['aktifitas']."</td>";
                    echo "<td>".$rewind['waktu']."</td>";
                    echo "</tr>";?>  
                <?php
                    }
                ?>
        </tbody>
        <tfoot>
            <tr>
            <th>Nama User</th>
            <th>Aktifitas</th>
            <th>Waktu</th>  
            </tr>
        </tfoot>
    </table>
<?php
    include_once 'footer.php';
?>