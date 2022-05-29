<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$conn = mysqli_connect("localhost","root","","uas_akun");
$query = "SELECT * FROM data";
$result = mysqli_query($conn,$query);
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="../style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <title>GoFit</title>
  <link rel="shortcut icon" href="image/Logo.png" type="image/x-icon" />
</head>

<body class="cardio-body">

  <header class="topnav">
    <a class="logolink" href="../home.html"><img class="logoimage" src="../Logo.png" /></a>

    <nav class="header-center">
      <a href="../home.html">Home</a>
      <a class="active" href="../Workouts.php">Workouts</a>
      <a href="../Training.php">Training</a>
      <a href="#">About</a>
      <a href="#">Contact</a>
    </nav>

    <div class="search-container">
      <input type="search" placeholder="Search Workouts..." />
      <button type="submit"><i class="fa fa-search"></i></button>
    </div>
  </header>

  <?php
        $tipe = $_SESSION["tipe"];
        $sql="SELECT * FROM tipe_olahraga INNER JOIN data ON tipe_olahraga.id = data.id WHERE data.nama_kategori ='$tipe' ";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){

  echo"<main class=","content-cardio",">";
  echo"<div class=","video-container",">";
  echo"<div class=","video-embed",">";
  echo"<iframe src=",$row['link_youtube']," frameborder=","0"," allow=","accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"," allowfullscreen>";
    echo"</iframe>";
    echo"</div>";

    echo"<dl class=","deskripsi-video",">";
    echo"<a class=","back-button"," href=","$tipe/$tipe.php","><b><i class=","fa fa-angle-left fa-lg","></i> Go Back </b></a>";


        echo"<h1>Detail Workout</h1>";
        echo"<dt> Durasi: <b class=","isi-content",">",$row['durasi'],"</b></dt>";
        echo"<dt> Tingkat Kesulitan: <b class=","isi-content",">",$row['kesulitan'],"</b> </dt>";
        echo"<dt> Peralatan: <b class=","isi-content",">",$row['peralatan'],"</b> </dt>";
        echo"<dt> Ketegori Workout: <b class=","isi-content",">",$row['nama_kategori'],"</b> </dt>";
        echo"<dt> Video Player: <b><a class=","isi-content"," href=",$row['link_youtube'],">Lihat di YouTube</a></b> </dt>";
        echo"<p>Coach by: <b class=","isi-content",">",$row['nama_instruktor'],"</b> </p>";
        
        
      echo"</dl>";
      echo"</div>";

      echo"<p class=","solid","></p>";
      echo"<div class=","video-detail",">";
      echo"<h1 class=","judul-video",">",$row['nama'],"</h1>";
      echo"<div class=","container-penjelasan",">";
      echo"<p class=","penjelasan-video",">";
          echo"$row[keterangan]";
          echo"</p>";
          echo"</div>";
          echo"</div>";
          echo"</main>";
        }
  ?>
  <footer>
    <div class="logo">
      <img src="../Logo.png" alt="" />
      <p>Wellness for the People</p>
    </div>

    <div class="term">
      <p>Term of Use</p>
      <p>Privacy Policy</p>
      <p>Reference</p>
    </div>

    <div class="footermedia">
      <p>Follow us</p>
      <a href="#" class="fa fa-facebook fa-2x"></a>
      <a href="#" class="fa fa-twitter fa-2x"></a>
      <a href="#" class="fa fa-youtube fa-2x"></a>
      <a href="#" class="fa fa-instagram fa-2x"></a>
    </div>

    <div class="copyright">
      <span>Copyright &copy; All rights reserved | made by </span>
      <span>Dedi Yanto, Maverick Mikolas, Michelle Shannen</span>
    </div>

  </footer>


</body>

</html>