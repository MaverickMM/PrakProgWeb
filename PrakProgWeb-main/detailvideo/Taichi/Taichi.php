<!DOCTYPE html>
<?php
session_start();
$_SESSION["tipe"] = "Taichi";
$tipe = $_SESSION["tipe"];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>GoFit</title>
<link rel="shortcut icon" href="../../image/Logo.png" type="image/x-icon">

</head>

<body class="cardio-body">
    <header class="topnav">
        <a class="logolink"href="../../Workouts.php"><img class="logoimage"src ="../../Logo.png"></a>
    
        <nav class="header-center">
          <a href="../../home.html">Home</a>
          <a class="active"href="../../Workouts.php">Workouts</a>
          <a href="../../Training.php">Training</a>
          <a href = "#">About</a>
          <a href = "#">Contact</a>
        </nav>
    
        <div class="search-container">
          <input type="search" placeholder="Search Workouts...">
          <button type="submit"><i class="fa fa-search"></i></button>
        </div>
      </header>
      <br>

    <main class="detail">
        <img src="../../image/CARDIO.png" alt="CARDIO">
        <div class="penjelasan">
        <H2><?php
        echo "$tipe" ?></H2>
        <p class="box">
            Cardio didefinisikan sebagai semua jenis latihan yang meningkatkan detak jantung anda dan mempertahankannya untuk jangka waktu yang lama. Sistem pernapasan anda akan mulai bekerja lebih keras saat anda mulai bernapas lebih cepat dan lebih dalam. Pembuluh darah anda akan melebar untuk membawa lebih banyak oksigen ke otot anda, dan tubuh anda akan melepaskan obat penghilang rasa sakit alami (endorfin). Manfaat fisik dan mental dari jenis latihan ini antara lain adalah menurutkan berat badan kita, menangkal penyakit jantung, meningkatkan suasana hati, dan hidup panjang.
        </p>
        </div>
    </main>

    <p class="solid"></p>

    <div class="Video">
        <h1>Kumpulan Video <?php
        echo "$tipe" ?></h1>
        <p class="solid"></p>

        <div class="video-nav">

            <div class="video-card">
                <a href="../detail-1.php">
                    <img src="../../image/cardio/Cardio1.jpg" alt="">
                    <h3>15 MIN BEGINNER CARDIO Workout (At Home No Equipment)</h3>
                    <h3 class="durasi">Durasi : 17:38</h3>
                    <span class="views"><i class="fa fa-eye fa-lg"> </i>4.507.210</span>
                    <div class="overlay" id="video-overlay">
                        <span>Watch Video ...</span>
                    </div>
                </a>
            </div>

            <div class="video-card">
                <a href="detail-2.html">
                    <img src="../../image/cardio/Cardio2.jpg" alt="">
                    <h3>10 MIN CARDIO WORKOUT AT HOME (Equipment Free)</h3>
                    <h3 class="durasi">Durasi : 13:01</h3>
                    <span class="views"><i class="fa fa-eye fa-lg"> </i>4.169.034</span>
                    <div class="overlay" id="video-overlay">
                        <span>Watch Video ...</span>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <footer>
        <div class="logo">
          <img src="../../Logo.png" alt="">
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