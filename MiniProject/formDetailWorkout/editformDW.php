<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "";
$databasename = "gofit";
$conn = mysqli_connect($servername, $username, $password, $databasename) or die("Koneksi gagal.");
if (isset($_GET['id'])) {
    $ID = $_GET['id'];
    $queryVideo = mysqli_query($conn, "SELECT * FROM video WHERE idVideo = '$ID'");
    $resultVideo = mysqli_fetch_assoc($queryVideo);
    $newNamaAdmin = $_SESSION["nama"];
    $newidAdmin = $_SESSION["idAdmin"];
    $queryPelatih = mysqli_query($conn, "SELECT * FROM `pelatih`");
    $idKategori = $resultVideo['idKategori'];
    $queryKategori = mysqli_query($conn, "SELECT * FROM `ketegori`");
    $namaVideo = $resultVideo['namaVideo'];
    $durasiVideo = $resultVideo['durasiVideo'];
    $kesulitan = $resultVideo['kesulitan'];
    $link = $resultVideo['linkVideo'];
    $deskripsi = $resultVideo['deskripsiVideo'];
    $jumlah = $resultVideo['jumlahViews'];
    $img = $resultVideo['videoImg'];
    $peralatan = $resultVideo['peralatan'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>From Edit Video</title>
    <link rel="stylesheet" href="../css/addVideoForm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="DW-addForm">
        <div id="input-form">
            <h1>Edit Workout Video Form</h1>
            <form action="addformDW.php" method="POST" name="formTambahData" enctype="multipart/form-data">
                <div class="DetailWorkout-image">
                    <div class="form-element">
                        <input type="file" id="foto" name="foto">
                        <label for="imgVideo" id="file-preview">
                            <img src="../<?php echo $img; ?>" alt="">
                            <div>
                                <p> Masukkan Gambar Video Di Sini </p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="DetailWorkout-label">
                    <label for="admin"> Publisher : </label>
                    <br>
                    <input type="text" value="<?php echo $newNamaAdmin; ?>" id="admin" readonly="readonly" name="admin">
                </div>
                <div class="DetailWorkout-label">
                    <select name="kategori" id="kategoriVideo">
                        <?php
                        while ($kategori = mysqli_fetch_assoc($queryKategori)) {
                        ?>
                        <option value="<?php echo $kategori['idKategori']; ?>">
                            <?php
                                echo $kategori['namaKategori'];
                                ?>
                        </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="DetailWorkout-label">
                    <label for="pelatih"> Instruktur : </label>
                    <br>
                    <select name="pelatih" id="pelatih" required>
                        <?php
                        while ($pelatih = mysqli_fetch_assoc($queryPelatih)) {
                        ?>
                        <option value="<?php echo $pelatih['idPelatih']; ?>">
                            <?php
                                echo $pelatih["namaPelatih"];
                                ?>
                        </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="DetailWorkout-label">
                    <label for="peralatan"> Peralatan : </label>
                    <br>
                    <input type="text" id="peralatan" name="peralatan" required
                        placeholder="Masukkan Peralatan Yang Di Butuhkan" value="<?php echo $peralatan; ?>">
                </div>
                <div class="DetailWorkout-label">
                    <label for="judulVideo"> Judul Video : </label>
                    <br>
                    <input type="text" id="judulVideo" name="judulVideo" required placeholder="Masukkan Judul Video"
                        value="<?php echo $namaVideo; ?>">
                </div>
                <div class="DetailWorkout-label">
                    <label for="durasiVideo"> Durasi Video : </label>
                    <br>
                    <input type="time" id="durasiVideo" name="durasiVideo" value="<?php echo $durasiVideo; ?>">
                </div>
                <div class="DetailWorkout-label">
                    <label for="kesulitanVideo"> Kesulitan Video : </label>
                    <br>
                    <select name="kesulitanVideo" id="kesulitasnVideo" required>
                        <option value="Beginner">Beginner</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Advanced">Advanced</option>
                    </select>
                </div>
                <div class="DetailWorkout-label">
                    <label for="linkVideo">Link Video : </label>
                    <br>
                    <textarea name="linkVideo" id="linkVideo" cols="30" rows="10"
                        value="<?php echo $link; ?>"><?php echo $link; ?></textarea>
                </div>
                <div class="DetailWorkout-label">
                    <label for="deskripsiVideo">Deskripsi video : </label>
                    <br>
                    <textarea name="deskripsiVideo" id="deskripsiVideo" cols="30" rows="10"
                        value="<?php echo $deskripsi ?>"><?php echo $deskripsi ?></textarea>
                </div>
                <div class="DetailWorkout-label">
                    <label for="jumlahViews">Jumlah Views : </label>
                    <br>
                    <input type="number" name="jumlahViews" id= "jumlahViews"
                        value="<?php echo str_replace(".", "", $jumlah); ?>">
                </div>
                <div class="DetailWorkout-label">
                    <button type="submit" name="submit"> Update </button>
                </div>
            </form>
        </div>
    </div>
</body>
<?php
if ($_POST) {
    if (isset($_FILES['foto'])) {
        $namaKategori = $_POST["name"];
        $deskripsiKategori = $_POST["deskripsi"];
        //Data Gambar Video
        $date = time();
        $filegambar = $_FILES["foto"]["tmp_name"];
        $namaGambar = $_FILES["foto"]["name"];
        //ekstrak extensi file gambar
        $str_to_arry = explode('.', $namaGambar);
        $extension = end($str_to_arry);
        if ($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "jfif") {
            // !pisahkan spasi di nama file
            $deletespace = explode(' ', $str_to_arry[0]);
            $newfilename = implode($deletespace);
            $newname = $newfilename . "-" . $date . "." . $extension;
            $uploadfile1 = "video/" . $newname;
            $uploadfile2 = "../video/" . $newname;
            $filebefore = "SELECT videoImg FROM video WHERE idVideo = '$id'";
            $run = mysqli_query($conn, $filebefore);
            $selectfile = mysqli_fetch_assoc($run);
            unlink("../" . $selectfile["videoImg"]);
            // ! insert file ke database
            $queryInsert = "UPDATE video 
        SET namaVideo = '$namaKategori', deskripsiVideo = '$deskripsiKategori',videoImg = '$uploadfile1'
        WHERE
        idVideo = '$id'";
            if (move_uploaded_file($filegambar, $uploadfile2)) {
                if (mysqli_query($conn, $queryInsert)) {
                    echo "
                    <script>
                        alert('Data Video Berhasil Diubah');
                        document.location.href = '../kategoriWorkout.php';
                    </script>
                ";
                }
            } else {
                echo "
            <script>
                alert('Data Foto Gagal Diubah');
                window.location.href = window.location.href;
            </script>
        ";
            }
        }
    } else {
        $namaKategori = $_POST["nama"];
        $deskripsiKategori = $_POST["deskripsi"];
        // ! insert file ke database
        $queryInsert = "UPDATE video 
        SET namaVideo = '$namaKategori', deskripsiVideo = '$deskripsiKategori'
        WHERE
        idVideo = '$id'";
        if (mysqli_query($conn, $queryInsert)) {
            echo "
                    <script>
                        alert('Data Kategori Berhasil Diubah');
                        document.location.href = '../detailVideo.php?id=$ID';
                    </script>
                ";
        } else {
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
<script>
function previewBeforeUpload(id) {
document.querySelector("#" + id).addEventListener("change", function(e) {
    if (e.target.files.length == 0) {
        return;
    }
    let file = e.target.files[0];
    let url = URL.createObjectURL(file);
    document.querySelector("#file-preview img").src = url;
});
}
previewBeforeUpload("foto");
</script>
?>


</html>