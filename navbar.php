<?php 
session_start();
include "connect.php";

?>
<!-- Page Wrapper -->
<div id="wrapper">

<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion toggled" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
<div class="sidebar-brand-icon">
    <i class="fas fa-hospital"></i>
</div>
<div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<?php 
if($_SESSION["hal"] == "utama"){
?>
<li class="nav-item active">
<a class="nav-link" href="index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePasien"
    aria-expanded="true" aria-controls="collapsePasien">
    <i class="fa-solid fa-hospital-user"></i>    
    <span>Pasien</span>
</a>
<div id="collapsePasien" class="collapse" aria-labelledby="headingPasien" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pilihlah menu</h6>
        <a class="collapse-item" href="pasien.php">Daftar pasien</a>
        <a class="collapse-item" href="riwayat.php">Riwayat pasien</a>
    </div>
</div>
</li>
<li class="nav-item">
    <a class="nav-link" href="obat.php">
        <i class="fas fa-solid fa-kit-medical"></i>
        <span>Obat</span></a>
    </li>
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
    aria-expanded="true" aria-controls="collapseTwo">
    <i class="fa-solid fa-user-doctor"></i>    
    <span>Dokter</span>
</a>
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pilihlah menu</h6>
        <a class="collapse-item" href="dokter.php">Daftar Dokter</a>
        <a class="collapse-item" href="jadwal.php">Jadwal Dokter</a>
    </div>
</div>
</li>

<?php 
if($_SESSION["akses"]=="Admin"){
?><li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAkun"
    aria-expanded="true" aria-controls="collapseAkun">
    <i class="fa-solid fa-user"></i>
    <span>Akun</span>
</a>
<div id="collapseAkun" class="collapse" aria-labelledby="headingAkun"
    data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pilihlah Menu:</h6>
        <a class="collapse-item" href="akun.php">Daftar Akun</a>
        <a class="collapse-item" href="activity.php">Activity Log</a>
    </div>
</div>
</li>
<?php 
}
?>

<?php
}if($_SESSION["hal"] =="pasien"){
?>
<li class="nav-item">
<a class="nav-link" href="index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<li class="nav-item active">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePasien"
    aria-expanded="true" aria-controls="collapsePasien">
    <i class="fa-solid fa-hospital-user"></i>    
    <span>Pasien</span>
</a>
<div id="collapsePasien" class="collapse" aria-labelledby="headingPasien" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pilihlah menu</h6>
        <a class="collapse-item" href="pasien.php">Daftar pasien</a>
        <a class="collapse-item" href="riwayat.php">Riwayat pasien</a>
    </div>
</div>
</li>

<li class="nav-item">
    <a class="nav-link" href="obat.php">
        <i class="fas fa-solid fa-kit-medical"></i>
        <span>Obat</span></a>
    </li>

<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
    aria-expanded="true" aria-controls="collapseTwo">
    <i class="fa-solid fa-user-doctor"></i>    
    <span>Dokter</span>
</a>
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pilihlah menu</h6>
        <a class="collapse-item" href="dokter.php">Daftar Dokter</a>
        <a class="collapse-item" href="jadwal.php">Jadwal Dokter</a>
    </div>
</div>
</li>

<?php 
if($_SESSION["akses"]=="Admin"){
?><li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAkun"
    aria-expanded="true" aria-controls="collapseAkun">
    <i class="fa-solid fa-user"></i>
    <span>Akun</span>
</a>
<div id="collapseAkun" class="collapse" aria-labelledby="headingAkun"
    data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pilihlah Menu:</h6>
        <a class="collapse-item" href="akun.php">Daftar Akun</a>
        <a class="collapse-item" href="activity.php">Activity Log</a>
    </div>
</div>
</li>
<?php 
}
?>
<?php
}if($_SESSION["hal"] =="obat"){
?>
<li class="nav-item">
<a class="nav-link" href="index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePasien"
    aria-expanded="true" aria-controls="collapsePasien">
    <i class="fa-solid fa-hospital-user"></i>    
    <span>Pasien</span>
</a>
<div id="collapsePasien" class="collapse" aria-labelledby="headingPasien" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pilihlah menu</h6>
        <a class="collapse-item" href="pasien.php">Daftar pasien</a>
        <a class="collapse-item" href="riwayat.php">Riwayat pasien</a>
    </div>
</div>
</li>

<li class="nav-item active">
    <a class="nav-link" href="obat.php">
        <i class="fas fa-solid fa-kit-medical"></i>
        <span>Obat</span></a>
    </li>

<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
    aria-expanded="true" aria-controls="collapseTwo">
    <i class="fa-solid fa-user-doctor"></i>    
    <span>Dokter</span>
</a>
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pilihlah menu</h6>
        <a class="collapse-item" href="dokter.php">Daftar Dokter</a>
        <a class="collapse-item" href="jadwal.php">Jadwal Dokter</a>
    </div>
</div>
</li>

<?php 
if($_SESSION["akses"]=="Admin"){
?><li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAkun"
    aria-expanded="true" aria-controls="collapseAkun">
    <i class="fa-solid fa-user"></i>
    <span>Akun</span>
</a>
<div id="collapseAkun" class="collapse" aria-labelledby="headingAkun"
    data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pilihlah Menu:</h6>
        <a class="collapse-item" href="akun.php">Daftar Akun</a>
        <a class="collapse-item" href="activity.php">Activity Log</a>
    </div>
</div>
</li>
<?php 
}
?>
<?php 
} if($_SESSION["hal"] =="dokter"){
?>
<li class="nav-item">
<a class="nav-link" href="index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePasien"
    aria-expanded="true" aria-controls="collapsePasien">
    <i class="fa-solid fa-hospital-user"></i>    
    <span>Pasien</span>
</a>
<div id="collapsePasien" class="collapse" aria-labelledby="headingPasien" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pilihlah menu</h6>
        <a class="collapse-item" href="pasien.php">Daftar pasien</a>
        <a class="collapse-item" href="riwayat.php">Riwayat pasien</a>
    </div>
</div>
</li>

<li class="nav-item">
    <a class="nav-link" href="obat.php">
        <i class="fas fa-solid fa-kit-medical"></i>
        <span>Obat</span></a>
    </li>

<li class="nav-item active">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
    aria-expanded="true" aria-controls="collapseTwo">
    <i class="fa-solid fa-user-doctor"></i>    
    <span>Dokter</span>
</a>
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pilihlah menu</h6>
        <a class="collapse-item" href="dokter.php">Daftar Dokter</a>
        <a class="collapse-item" href="jadwal.php">Jadwal Dokter</a>
    </div>
</div>
</li>

<?php 
if($_SESSION["akses"]=="Admin"){
?><li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAkun"
    aria-expanded="true" aria-controls="collapseAkun">
    <i class="fa-solid fa-user"></i>
    <span>Akun</span>
</a>
<div id="collapseAkun" class="collapse" aria-labelledby="headingAkun"
    data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pilihlah Menu:</h6>
        <a class="collapse-item" href="akun.php">Daftar Akun</a>
        <a class="collapse-item" href="activity.php">Activity Log</a>
    </div>
</div>
</li>
<?php
} ?>    
    <?php 
    } if($_SESSION["hal"] =="akun"){
    ?>
    <li class="nav-item">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    
    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePasien"
        aria-expanded="true" aria-controls="collapsePasien">
        <i class="fa-solid fa-hospital-user"></i>    
        <span>Pasien</span>
    </a>
    <div id="collapsePasien" class="collapse" aria-labelledby="headingPasien" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pilihlah menu</h6>
            <a class="collapse-item" href="pasien.php">Daftar pasien</a>
            <a class="collapse-item" href="riwayat.php">Riwayat pasien</a>
        </div>
    </div>
    </li>

    <li class="nav-item">
    <a class="nav-link" href="obat.php">
        <i class="fas fa-solid fa-kit-medical"></i>
        <span>Obat</span></a>
    </li>
    
    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fa-solid fa-user-doctor"></i>    
        <span>Dokter</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pilihlah menu</h6>
            <a class="collapse-item" href="dokter.php">Daftar Dokter</a>
            <a class="collapse-item" href="jadwal.php">Jadwal Dokter</a>
        </div>
    </div>
    </li>
<?php
if($_SESSION["akses"]=="Admin"){
?>
    <li class="nav-item active">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAkun"
        aria-expanded="true" aria-controls="collapseAkun">
        <i class="fa-solid fa-user"></i>
        <span>Akun</span>
    </a>
    <div id="collapseAkun" class="collapse" aria-labelledby="headingAkun"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pilihlah Menu:</h6>
            <a class="collapse-item" href="akun.php">Daftar Akun</a>
            <a class="collapse-item" href="activity.php">Activity Log</a>
        </div>
    </div>
    </li>
    
    
    <?php
    } }
    ?>
</ul>
<!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                    
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hai, <?php echo $_SESSION["nama"]?> selamat datang</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->