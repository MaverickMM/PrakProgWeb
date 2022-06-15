<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>
    <link rel="stylesheet" href="../css/login.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/tombol.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="logo/Logo2.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>


    <link rel="stylesheet" href="../css/database.css">
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="judul">Kategori</h2>
                        <div class="signinout">
                            <a id="signinout" href="../index.php">
                                <p id="content-signinout" style="font-size:24px;">
                                    Home
                                    <i class="fa fa-sign-in" aria-hidden="true" style="font-size:34px;"></i>
                                </p>
                            </a>
                        </div>
                        <a href="create.php" class="tombol"><i class="fa fa-plus"></i>+ Add Kategori Baru</a>
                        <br>
                        <br>
                        <br>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";

                    // Attempt select query execution
                    $sql = "SELECT * FROM kategori";
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table width=' . "80%" . '  border="2" class="table">';
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>Id Kategori</th>";
                            echo "<th>Nama Kategori</th>";
                            echo "<th>Deskripsi Kategori</th>";
                            echo "<th>image Kategori</th>";
                            echo "<th>Tipe kategori</th>";
                            echo "<th>Action</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['idKategori'] . "</td>";
                                echo "<td>" . $row['namaKategori'] . "</td>";
                                echo "<td>" . $row['deskripsiKategori'] . "</td>";
                                echo "<td>" . $row['imgKategori'] . "</td>";
                                echo "<td>" . $row['tipe_kategori'] . "</td>";
                                echo "<td>";
                                echo '<a href="update.php?id=' . $row['idKategori'] . '">Update</a>';
                                echo '<br>';
                                echo '<a href="delete.php?id=' . $row['idKategori'] . '">Delete</a>';
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else {
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>