<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$databasename = "gofit";
$conn = mysqli_connect($servername, $username, $password, $databasename) or die("Koneksi gagal.");

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="DW-addForm" >
        <h1>Workout Add Video Form</h1>
        <div id="input-form">
        <form action="addformDW.php" method="POST" name="formTambahData">
            <label class="DetailWorkout-label"> </label>
        </form>   
        </div>
    </div>
</body>



<?php
$adminId = $_SESSION["adminId"];




?>


</html>