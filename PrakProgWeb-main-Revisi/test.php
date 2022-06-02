<?php 
  
if(isset($_GET['submit'])) {
    $var = $_GET['option1'];
    $var2 = $_GET['option2'];
    $var3 = $_GET['option3'];
    $var4 = $_GET['option4'];
    $va5r = $_GET['option5'];
    if(isset($var)) {
        echo "Option 1 submitted successfully";
    }elseif(isset($var2)){
        echo "Option 2 submitted successfully";
    }
    elseif(isset($var4)){
        echo "Option 4 submitted successfully";
    }
    elseif(isset($var3)){
        echo "Option 3 submitted successfully";
    }
    elseif(isset($va5r)){
        echo "Option 5 submitted successfully";
    };
}
?>
<html lang="en">
<head>
    <title>GeeksforGeeks Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href=
    "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .gfg {
            font-size:40px;
            font-weight:bold;
            color:green;
        }
        body {
            text-align:center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class = "gfg">GeeksforGeeks</div>
        <h2>Form control: checkbox</h2>
        <p>The form below contains one checkbox.</p>
        <form method="get">
            <div class="checkbox">
                <label><input type="checkbox" name = "option1" 
                        value="Option 1">Option 1</label>
                        <label><input type="checkbox" name = "option2" 
                        value="Option 1">Option 1</label>
                        <label><input type="checkbox" name = "option3" 
                        value="Option 1">Option 1</label>
                        <label><input type="checkbox" name = "option4" 
                        value="Option 1">Option 1</label>
                        <label><input type="checkbox" name = "option5" 
                        value="Option 1">Option 1</label>
                <label><button name="submit" value='true' 
                    class="btn btn-default">SUBMIT</button>
            </div>
        </form>
    </div>
</body>
</html>