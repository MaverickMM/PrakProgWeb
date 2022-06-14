<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$databasename = "gofit";
$conn = mysqli_connect($servername, $username, $password, $databasename) or die("Koneksi gagal.");

if (isset($_GET["id"])){
    $id = $_GET["id"];
    $sqlKategori = "SELECT * FROM ketegori WHERE idKategori = '$id'";
    // ! Run Query
    $runQuery = mysqli_query($conn, $sqlKategori);
    $resultKategori = mysqli_fetch_assoc($runQuery);

    //! ambil value dari kategori yang dipilih
    $nama = $resultKategori["namaKategori"];
    $deskripsi = $resultKategori["deskripsiKategori"];
    $locImg = $resultKategori["imgKategori"];
}
// else{
//     header("Location:../kategoriWorkout.php" );
// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/addKategori.css">
    <title>Update Category</title>
</head>
<body>
    <div id="input-form">
            <h1 >Update Category Form</h1>
            <form action="formUpdate.php?id=<?php echo $id?>" method="POST" name="formTambahData" enctype="multipart/form-data">

                <div class="Kategori-image">
                    <div class="form-element">
                        <input type="file" id="foto" name="foto">
                        <label for="foto" id="file-preview">
                            <img src="../<?php echo $locImg; ?>" alt="">
                        </label>
                    </div>
                </div>


                <div class="DetailKategori-label">
                    <label for = "nama"> Nama Kategori : </label>
                    <br>
                    <input type="text" id="nama" name="nama" required value="<?php echo $nama; ?>">
                </div>

                <div class="DetailKategori-label">
                    <label for="deskripsi"> Deskripsi Kategori : </label>
                    <br>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" required > <?php echo $deskripsi; ?> </textarea>
                </div>

                <div class="DetailKategori-label">
                    <button type="submit" name ="submit"> Update </button>
                </div>
            </form>  
    </div>

    <?php

if($_POST){
    if(isset($_FILES['foto'])){
        $namaKategori = $_POST["nama"];
        $deskripsiKategori = $_POST["deskripsi"];

        //Data Gambar Video
        $date = time();
        $filegambar = $_FILES["foto"]["tmp_name"];
        $namaGambar = $_FILES["foto"]["name"];

        //ekstrak extensi file gambar
        $str_to_arry = explode('.',$namaGambar);
        $extension = end($str_to_arry);

        if($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "jfif"){
            // !pisahkan spasi di nama file
            $deletespace = explode(' ',$str_to_arry[0]);
            $newfilename = implode ($deletespace);
            $newname = $newfilename."-".$date.".".$extension;
            $uploadfile1 = "kategori/".$newname;
            $uploadfile2 = "../kategori/".$newname;

            // ! insert file ke database
            $queryInsert = "UPDATE ketegori 
            SET namaKategori = '$namaKategori', deskripsiKategori = '$deskripsiKategori',imgKategori = '$uploadfile1'
            WHERE
            idKategori = '$id'";

            if(move_uploaded_file($filegambar,$uploadfile2)){
                if(mysqli_query($conn, $queryInsert)){
                    echo "
                        <script>
                            alert('Data Kategori 321Berhasil Diubah');
                            document.location.href = '../kategoriWorkout.php';
                        </script>
                    ";
                }
            }else{
                echo "
                <script>
                    alert('Data Foto Gagalxzsadsad Diubah');
                    window.location.href = window.location.href;
                </script>
            ";
            }
            
        }

    }else{
        $namaKategori = $_POST["nama"];
        $deskripsiKategori = $_POST["deskripsi"];

        

            // ! insert file ke database
            $queryInsert = "UPDATE ketegori 
            SET namaKategori = '$namaKategori', deskripsiKategori = '$deskripsiKategori'
            WHERE
            idKategori = '$id'";
                if(mysqli_query($conn, $queryInsert)){
                    echo "
                        <script>
                            alert('Data Kategori Berhasil Diubah');
                            document.location.href = '../kategoriWorkout.php';
                        </script>
                    ";
                }else{
                echo "
                <script>
                    alert('Data Foto Gagal Diubah');
                    window.location.href = window.location.href;
                </script>
            ";
            }
    }
}
?>
</body>

<script >
    function previewBeforeUpload(id){
    document.querySelector("#"+id).addEventListener("change",function(e){
      if(e.target.files.length == 0){
        return;
      }
      let file = e.target.files[0];
      let url = URL.createObjectURL(file);
      document.querySelector("#file-preview img").src = url;
    });
  }
  previewBeforeUpload("foto");
  </script>
</html>