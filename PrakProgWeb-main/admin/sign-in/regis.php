<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "uas_akun");

if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $password = $_POST["password"];
    $query = "INSERT INTO users VALUES(
        '$email', '$password', '$nama', '$jenis_kelamin')";
    $result_query = mysqli_query($connection, $query);
    $success = mysqli_affected_rows($connection);

    if ($success) {
        header("Location: form_login.php");
    }
}
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
        <form method="POST" action="regis.php">
            <img class="mb-4" src="../assets/brand/tiukdw.png" width="250" alt="Logo TI UKDW">
            <h1 class="h3 mb-3 fw-normal">Registrasi</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="name" placeholder="name" name="nama">
                <label for="name">Name</label>
            </div>

            <div class="form-floating">
                <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
                <label for="email">Email address</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                <label for="password">Password</label>
            </div>

            <div class="form-radio">
                <input type="radio" class="btn-check" id="pria" autocomplete="off" name="jenis_kelamin" value="pria" checked>
                <label class="btn btn-outline-primary" for="pria">Pria</label>

                <input type="radio" class="btn-check" id="wanita" autocomplete="off" name="jenis_kelamin" value="wanita">
                <label class="btn btn-outline-primary" for="wanita">Wanita</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" name="submit" value="submit" type="submit">Sign in</button>


            <p class="mt-5 mb-3 text-muted">&copy; UAS Progweb 2022 Genap</p>
        </form>
    </main>
</body>

</html>