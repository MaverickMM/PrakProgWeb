<?php
session_start();
//connect to database
$servername = "127.0.0.1";
$username = "root";
$password = "";
$databasename = "gofit";
$conn = mysqli_connect($servername, $username, $password, $databasename) or die("Koneksi gagal.");
$idKategori = $_SESSION["idKategori"];
$query = "SELECT * FROM video WHERE idKategori='$idKategori'";

$runQuery = mysqli_query($conn,$query);
$resultVideo = mysqli_fetch_assoc($runQuery);

if(isset($_POST['submit'])){
    $recordArr = $_POST['delVideo'];
    
    foreach($recordArr as $idVideo){
        $id
        $query2= "DELETE FROM detailPelatih Where idVideo='$idVideo' and idPelatih =";
        mysqli_query($conn,$query2) or die (mysql_error());
        $query1 = "DELETE FROM video Where idVideo='$idVideo'";
        mysqli_query($conn,$query1) or die(mysql_error());

    }
    echo "
        <script>
            alert('Data Yang Di Pilih Berhasil Di Hapus')
        </script>

    ";
    header("Location:delformDW.php" );
}else{
    echo "
    <script>
        alert('Tidak Ada Data Yang Terhapus')
    </script>

";
}
mysqli_close($conn);

?>