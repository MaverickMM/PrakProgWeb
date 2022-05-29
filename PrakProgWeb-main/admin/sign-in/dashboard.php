<?php
session_start();

if(!isset($_SESSION["email"])){
    header("Location:form_login.php");
  }

if(isset($_POST["Logout"])){
    session_destroy();
    header("Location: form_login.php");

  }

?>
<!DOCTYPE html>
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

<body>
    <main class="form-signin">
        <table class="tabel-data">
            <tr>
                <td>
                    Email
                </td>
                <td>
                    <?= $_SESSION["email"] ?>
                </td>
            </tr>

            <tr>
                <td>
                    Nama
                </td>
                <td>
                <?= $_SESSION["nama"] ?>
                </td>
            </tr>

            <tr>
                <td>
                    Jenis Kelamin
                </td>
                <td>
                <?= $_SESSION["jenis_kelamin"] ?>
                </td>
            </tr>
        </table>
        <form action="dashboard.php" method="POST">
            <input class="form-control" type="submit" value="Logout" name="Logout">
        </form>
    </main>
</body>

</html>
