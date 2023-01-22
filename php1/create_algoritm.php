
<?php

$factor="";
$mediu="";
$situatia="";
$element="";


//create connection

@include '../php1/config1.php';

$conn = mysqli_connect('localhost','root','','centrul_de_consultanta');

$errorMessage="";
$successeMessage ="";

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $factor=$_POST["factor"];
    $mediu=$_POST["mediu"];
    $situatia=$_POST["situatia"];
    $element=$_POST["element"];
   
   

    do{
        if(empty($factor)||empty ($mediu) ||empty ($situatia) || empty ($element)){
            $errorMessage = "All the fields are required";
            break;
        }
       
        //add a new book to DB
        $sql = "INSERT INTO algoritm_decizie (factor,mediu,situatia,element)
        VALUES ('$factor' ,'$mediu','$situatia','$element')";
        $result = mysqli_query($conn, $sql);
       
        if(!$result){
            $errorMessage = "Invalid query:".$conn->error;
            break;
              }
       
              $factor="";
              $mediu="";
              $situatia="";
              $element="";
              

$successeMessage = "Row added correctly";
header("location:../menu1/algoritm_decizie.php");
exit;

    }while(false);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css1/library.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<title>Create a new row registration </title>
</head>
<body style="font-family: 'Garamond', sans-serif;">
<div class="home-btn">
    <a href="../php1/admin_page1.php">Centru de consultanta</a>
</div>
<div class="home-btn">
    <a href="../menu1/algoritm_decizie.php">Algoritm Decizie</a>
</div>
    <div class="container my-5">
        <h2 style="position:relative;top:-40vh;left:20vh;">New Row</h2>
<?php
if(!empty($errorMessage)){
    echo"
    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>$errorMessage</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
    
    ";
}


?>
        <form method="post">
       
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Factor</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="factor" value="<?php echo $factor; ?>">
</div>
            </div>
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Mediu</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="mediu" value="<?php echo $mediu; ?>">
</div>
            </div>
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Situatia</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="situatia" value="<?php echo $situatia; ?>">
</div>
            </div>
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Element</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="element" value="<?php echo $element; ?>">
</div>
            </div>
            
           
<?php
if(!empty($successeMessage)){
    echo"
    div class='row mb-3'>
    <div class='offset-sm-3 col-sm-6'>
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>$successeMessage</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
    </div>
    </div>
    ";
    
}


?>


            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button style="color:white;background-color:lightslategray;"type="submit" class="btn btn-primary">Submit</button>
</div>
<div class="col-sm-3 d-grid">
    <a style="color:lightslategray;background-color:white;" class="btn btn-outline-primary" href="../menu1/algoritm_decizie.php" role="button">Cancel</a>
</div>
            </div>
        </form>
    </div>
</body>
</head>
</html>