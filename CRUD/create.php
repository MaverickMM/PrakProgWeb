<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $deskripsi = $image = $tipe_kategori = "";
$name_err = $deskripsi_err = $image_err = $tipe_kategori_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["namaKategori"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate Desk
    $input_deskripsi = trim($_POST["deskripsiKategori"]);
    if(empty($input_deskripsi)){
        $deskripsi_err = "Please enter an deskripsi.";     
    } else{
        $deskripsi = $input_deskripsi;
    }

    // Validate Img
    $input_img = trim($_POST["imgKategori"]);
    if(empty($input_img)){
        $image_err = "Please enter an Image.";     
    } else{
        $image = $input_img;
    }

    // Validate Tipe_Kategori
    $input_kategori = trim($_POST["tipe_kategori"]);
    if(empty($input_kategori)){
        $tipe_kategori_err = "Please enter an Tipe Kategori.";     
    } else{
        $tipe_kategori = $input_kategori;
    }
    
 
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($deskripsi_err) && empty($image_err) && empty($tipe_kategori_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO Kategori (namaKategori, deskripsiKategori, imgKategori, tipe_kategori) VALUES (?, ?, ?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_deskripsi, $param_img,$param_kategori);
            
            // Set parameters
            $param_name = $name;
            $param_deskripsi = $deskripsi;
            $param_img = $image;
            $param_kategori = $tipe_kategori;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add Kategori record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <table width="40%" border="0">
                    <tr>
                        <div class="form-group">
                            <td><label>Name</label></td>
                            <td><input type="text" name="namaKategori" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>"></td>
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        </tr>
                        <tr>
                        <div class="form-group">
                        <td><label>Deskripsi</label></td>
                        <td><textarea name="deskripsiKategori" class="form-control <?php echo (!empty($deskripsi_err)) ? 'is-invalid' : ''; ?>"><?php echo $deskripsi; ?></textarea></td>
                            <span class="invalid-feedback"><?php echo $deskripsi_err;?></span>
                        </div>
                        </tr>
                        <tr>
                        <div class="form-group">
                        <td><label>Image</label></td>
                        <td><textarea name="imgKategori" class="form-control <?php echo (!empty($image_err)) ? 'is-invalid' : ''; ?>"><?php echo $image; ?></textarea></td>
                            <span class="invalid-feedback"><?php echo $image_err;?></span>
                        </div>
                        </tr>
                        <tr>
                        <div class="form-group">
                        <td><label>Tipe_kategori</label></td>
                        <td><input type="text" name="tipe_kategori" class="form-control <?php echo (!empty($tipe_kategori_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $tipe_kategori; ?>"></td>
                            <span class="invalid-feedback"><?php echo $tipe_kategori_err;?></span>
                        </div>
                        </tr>
                        <tr>
                        <td><input type="submit" class="btn btn-primary" value="Submit"></td>
                        <td><a href="index.php" class="btn btn-secondary ml-2">Cancel</a></td>
                        </tr>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>