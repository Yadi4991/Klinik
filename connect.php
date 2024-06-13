<?php
if(substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)=="connect.php"){
    header("location:login.php");
} 
    $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
$S = "localhost";
$U = "newuser";
$P = "password";
$D = "klinik";
$conn = new mysqli($S,$U,$P,$D);
$namaUser = $_SESSION['nama'];
$aksesUser = $_SESSION['akses'];
if($conn->connect_error){
    die("Connection failed". $conn->connect_error);
}
?>
<html>
    
</html>