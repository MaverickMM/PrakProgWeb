<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $deskripsi = $image = $tipe_kategori = "";
$name_err = $deskripsi_err = $image_err = $tipe_kategori_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate Desk
    $input_deskripsi = trim($_POST["deskripsi"]);
    if(empty($input_deskripsi)){
        $deskripsi_err = "Please enter an deskripsi.";     
    } else{
        $deskripsi = $input_deskripsi;
    }

    // Validate Img
    $input_img = trim($_POST["image"]);
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
        // Prepare an update statement
        $sql = "UPDATE Kategori SET namaKategori=?, deskripsiKategori=?, imgKategori=?, tipe_kategori=? WHERE idKategori=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssi", $param_name, $param_deskripsi, $param_img,$param_kategori, $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_deskripsi = $deskripsi;
            $param_img = $image;
            $param_kategori = $tipe_kategori;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM Kategori WHERE idKategori = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $name =$row['namaKategori'];
                    $deskripsi = $row['deskripsiKategori'];
                    $image = $row['imgKategori'];
                    $tipe_kategori = $row['tipe_kategori'];
                    
                    
                    
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the Kategori record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <table width="40%" border="0">
                    <tr>
                        <div class="form-group">
                        <td><label>Name</label></td>
                        <td><input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>"></td>
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        </tr>
                        <tr>

                        <div class="form-group">
                        <td><label>Deskripsi</label></td>
                        <td><textarea name="deskripsi" class="form-control <?php echo (!empty($deskripsi_err)) ? 'is-invalid' : ''; ?>"><?php echo $deskripsi; ?></textarea></td>
                            <span class="invalid-feedback"><?php echo $deskripsi_err;?></span>
                        </div>
                        </tr>
                        <tr>

                        <div class="form-group">
                        <td><label>Image</label></td>
                        <td><textarea name="image" class="form-control <?php echo (!empty($image_err)) ? 'is-invalid' : ''; ?>"><?php echo $image; ?></textarea></td>
                            <span class="invalid-feedback"><?php echo $image_err;?></span>
                        </div>
                        </tr>
                        <tr>

                        <div class="form-group">
                        <td><label>Tipe_kategori</label></td>
                        
                        <td>
                        <select name="tipe_kategori" class="form-control <?php echo (!empty($tipe_kategori_err)) ? 'is-invalid' : ''; ?>">
   <option value="Workouts" <?php echo $tipe_kategori == 'Workouts' ? 'selected="selected"' : '' ?>>Workouts</option>
   <option value="Training" <?php echo $tipe_kategori == 'Training' ? 'selected="selected"' : '' ?>>Training</option>
  </select>    
                        
                       
                            <span class="invalid-feedback"><?php echo $tipe_kategori_err;?></span>
                        </div>
                        </tr>
                        <tr>

                        <td><input type="hidden" name="id" value="<?php echo $id; ?>"/></td>
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