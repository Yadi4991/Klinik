<?php 
include 'connect.php';
session_start();
if(isset($_SESSION['status'])){
    header("location:index.php"); 
    exit();
}
?>
    <!doctype html>
    <html lang="en" data-bs-theme="auto">
      <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        <link href="style/login.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="shortcut icon" href="https://cdn-icons-png.freepik.com/512/169/169869.png" type="image/x-icon">

      </head>
      <body class="d-flex align-items-center py-4">
    <main class="form-signin w-100 m-auto">
        <form action="" method="post">
        <img class="gambar" src="https://i.ibb.co.com/k9DSsHW/Healty-hospital-1-removebg-preview.png" alt="Healty-hospital-1-removebg-preview" >  
        <div class="form-floating">
          <input type="text" name="username" class="form-control my-1" id="floatingInput" placeholder="Username">
          <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control my-1" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
        <?php
if(isset($_POST['submit'])){
  $username = mysqli_real_escape_string($conn,$_POST['username']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);
  $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn,$sql);
  if($result->num_rows > 0){
    $row =mysqli_fetch_assoc($result);
      $_SESSION['status'] = "logged";
      $_SESSION["nama"] = $row['nama'];
      $_SESSION["akses"] = $row['akses'];
      header("location:index.php");
      exit();
  }
  else{
      echo "<p style='color:red;'>Username atau password anda salah</p>";
  }
}
        ?>
        <button class="btn btn-info w-100 py-2 my-1" name="submit">Sign in</button>
      </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>    
        </body>
    </html>
    