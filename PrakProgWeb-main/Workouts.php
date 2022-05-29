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
$conn = mysqli_connect("localhost","root","","uas_akun");
$query = "SELECT * FROM data";
$result = mysqli_query($conn,$query);
?>

</head>

<body>
  <header class="topnav">
    <a class="logolink"href="home.html"><img class="logoimage"src ="Logo.png"></a>

    <nav class="header-center">
      <a href="home.html">Home</a>
      <a class="active" href="Workouts.php">Workouts</a>
      <a href="Training.php">Training</a>
      <a href = "#">About</a>
      <a href = "#">Contact</a>
    </nav>

    <div class="search-container">
      <input type="search" placeholder="Search Workouts...">
      <button type="submit"><i class="fa fa-search"></i></button>
    </div>
  </header>
  <main>
<?php
$sql="SELECT * FROM data WHERE Tipe_kategori = 'Workouts'";
$result=mysqli_query($conn,$sql);
$count=0;
 while($row=mysqli_fetch_assoc($result)){
   if($count==0){
    echo"<section>";
   }
  echo"<div class = ","menu-card",">";
  echo"<a href=",$row['link'],">";
  echo"<img src=",$row['gambar']," alt=",'BridgePose',">";
  echo"<h1 class = ","menu-title",">",$row['nama_kategori'],"</h1>";
  echo"<div class=","overlay",">";
  echo"<span>Show More ...</span>";
  echo  "</div>";
  echo"</a>";
  echo"</div>";
  if($count==2){
    echo"</section>";
    $count=0;
   }
   else{
    $count+=1;
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
