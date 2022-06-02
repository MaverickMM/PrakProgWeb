<?php
session_start();
$conn = mysqli_connect("localhost","root","","uas_akun");

if(isset($_SESSION["email"])){
  header("Location:dashboard.php");
}

if(isset($_POST["submit"])){
  $email = $_POST["email"];
  $password = $_POST["password"];

  $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";
  $result_query = mysqli_query($conn, $query);
  $jumlah_row = mysqli_num_rows($result_query);


  if($jumlah_row > 0){
    $rows = mysqli_fetch_assoc($result_query);
    $_SESSION["email"] = $rows["email"];
    $_SESSION["nama"] = $rows["nama"];
    $_SESSION["jenis_kelamin"] = $rows["jenis_kelamin"];

    header("Location:dashboard.php");

  }


}

mysqli_close($conn);
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Soal Post Test PHP#3 Prak Progweb 2022">
  <meta name="author" content="Harris & Revyn">
  <title>Post Test PHP#3</title>

  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin">
    <form method="POST" action="form_login.php">
      <img class="mb-4" src="../assets/brand/tiukdw.png" width="250" alt="Logo TI UKDW">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

      <div class="form-floating">
        <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
        <label for="email">Email address</label>
      </div>

      <div class="form-floating">
        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        <label for="password">Password</label>
      </div>

      <div>
        Belum punya akun?
        <a href="regis.php">Registrasi</a>
      </div>

      <button class="w-100 btn btn-lg btn-primary" name="submit" value="submit" type="submit">Sign in</button>


      <p class="mt-5 mb-3 text-muted">&copy; UAS Progweb 2022 Genap</p>
    </form>
  </main>
</body>

</html>
