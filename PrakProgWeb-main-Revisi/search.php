<!DOCTYPE html>
<html>

<head>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>GoFit</title>
  <link rel="shortcut icon" href="image/Logo.png" type="image/x-icon">

  <?php
  session_start();
  $conn = mysqli_connect("localhost", "root", "", "uas");
  $query = "SELECT
  *
FROM
  pelatih
INNER JOIN detailpelatih ON pelatih.idPelatih = detailpelatih.idPelatih
INNER JOIN video ON video.idVideo = detailpelatih.idVideo
INNER JOIN detailperalatan ON video.idVideo = detailperalatan.idVideo
INNER JOIN peralatan ON peralatan.idPeralatan = detailperalatan.idPeralatan
INNER JOIN kategori ON kategori.idKategori = video.idKategori";
  $result = mysqli_query($conn, $query);
  ?>
  <style>
    body {
      font-family: "Lato", sans-serif;
    }

    .sidebar {

      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #614385;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }

    .sidebar a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      color: #89A6FB;
      color: #818181;
      display: block;
      transition: 0.3s;
    }

    .sidebar a:hover {
      color: #f1f1f1;
    }

    .sidebar .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }

    .openbtn {
      font-size: 20px;
      cursor: pointer;
      background-color: #111;
      color: white;
      padding: 10px 15px;
      border: none;
      float: right;
    }

    .openbtn:hover {
      background-color: #444;
    }

    #main {
      transition: margin-left .5s;
      padding: 16px;
    }

    .newcla {
      color: #89A6FB;
      font-size: 22px;
    }

    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
      .sidebar {
        padding-top: 15px;
      }

      .sidebar a {
        font-size: 18px;
      }
    }
  </style>
</head>

<body>
  <header class="topnav">
    <a class="logolink" href="home.html"><img class="logoimage" src="Logo.png"></a>

    <nav class="header-center">
      <a href="home.html">Home</a>
      <a class="active" href="Workouts.php">Workouts</a>
      <a href="Training.php">Training</a>
      <a href="#">About</a>
      <a href="#">Contact</a>
    </nav>

    <div class="search-container">
      <form action="search.php" method="get">
        <input type="search" name="cari" placeholder="Search Workouts...">
        <button type="submit" value="Submit" name="submit"><i class="fa fa-search"></i></button>
        <input type="radio" name="kategori" value="tipe_kategori" onclick="validasi()"> Tipe Kategori </br>
        <input type="radio" name="kategori" value="nama_kategori" onclick="validasi()"> Nama Kategori </br>
        <input type="radio" name="kategori" value="kesulitan" onclick="validasi()"> Kesulitan </br>
        <input type="radio" name="kategori" value="nama" onclick="validasi()"> Nama </br>
        <button class="openbtn" onclick="openNav()">☰</button>
      </form>


    </div>
  </header>
  <main>

    <?php
    if (isset($_GET['submit'])) {
      if (isset($_GET['kategori'])) {
        $var = $_GET['kategori'];
        if (isset($var)) {
          if (isset($_GET['cari'])) {
            $cari = $_GET['cari'];

            if ($var == "tipe_kategori") {

              $sql = "SELECT * FROM kategori INNER JOIN video ON kategori.idKategori = video.idKategori WHERE tipe_kategori LIKE '$cari%'";
              $result = mysqli_query($conn, $sql);
              Search($result);
            } elseif ($var == "nama_kategori") {


              $sql = "SELECT * FROM kategori INNER JOIN video ON kategori.idKategori = video.idKategori WHERE namaKategori LIKE'$cari%'";
              $result = mysqli_query($conn, $sql);

              Search($result);
            } elseif ($var == "kesulitan") {

              $sql = "SELECT * FROM video WHERE kesulitan LIKE'$cari%'";
              $result = mysqli_query($conn, $sql);
              Search($result);
            } elseif ($var == "nama") {



              $sql = "SELECT * FROM video WHERE namaVideo LIKE'$cari%'";

              $result = mysqli_query($conn, $sql);
              Search($result);
            }
          }
        }
      } else {
        if (isset($_GET['cari'])) {
          $cari = $_GET['cari'];

          $sql = "SELECT
    video.durasiVideo,video.namaVideo,video.kesulitan,video.linkVideo,video.deskripsiVideo,kategori.namaKategori,peralatan.namaPeralatan,pelatih.namaPelatih,video.videoImg
FROM
    pelatih
INNER JOIN detailpelatih ON pelatih.idPelatih = detailpelatih.idPelatih
INNER JOIN video ON video.idVideo = detailpelatih.idVideo
INNER JOIN detailperalatan ON video.idVideo = detailperalatan.idVideo
INNER JOIN peralatan ON peralatan.idPeralatan = detailperalatan.idPeralatan
INNER JOIN kategori ON kategori.idKategori = video.idKategori 
WHERE video.namaVideo LIKE'$cari%' or kategori.namaKategori LIKE'$cari%' or kategori.tipe_kategori LIKE'$cari%' or video.kesulitan LIKE'$cari%'";

          $result = mysqli_query($conn, $sql);
          Search($result);
        }
      }
    }


    function Search($result)
    {

      $count = 0;
      while ($row = mysqli_fetch_assoc($result)) {
        if ($count == 0) {
          echo "<section>";
        }
        $_SESSION["tipe"] = $row['namaKategori'];
        echo "<div class = ", "menu-card", ">";
        echo "<a href=",'detailvideo/video.php',">";
        echo "<img src=", $row['videoImg'], " alt=", 'BridgePose', ">";
        echo "<h1 class = ", "menu-title", ">", $row['namaVideo'], "</h1>";
        echo "<div class=", "overlay", ">";
        echo "<span>Show More ...</span>";
        echo  "</div>";
        echo "</a>";
        echo "</div>";
        if ($count == 2) {
          echo "</section>";
          $count = 0;
        } else {
          $count += 1;
        }
      }
    }







    ?>


  </main>

  <footer>
    <div class="logo">
      <img src="Logo.png" alt="">
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