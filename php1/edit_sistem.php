<?php
$id = "";
$adoptarea_decizie="";
$proces="";
$finalizare="";

$errorMessage="";
$successeMessage ="";

@include "../php1/config1.php";
$conn = mysqli_connect('localhost','root','','centrul_de_consultanta');


$adoptarea_decizie="";
$proces="";
$finalizarea="";




if($_SERVER['REQUEST_METHOD']=='GET'){
if(!isset($_GET["id"])){
    header("location:../menu1/sistem_decizional.php");
    exit;
}

$id = $_GET["id"];
//Get method : show the data of the client
//read the row of the selected client from db
$sql = "SELECT * FROM `sistem_decizional` WHERE id=$id";
$result =mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
if(!$row){
    header("location:../menu1/sistem_decizional.php");
    exit;
}

}
else{
//post method: update the data of the client
$id = $_POST["id"];
$adoptarea_decizie=$_POST["adoptarea_decizie"];
$proces=$_POST["proces"];
$finalizarea=$_POST["finalizarea"];
   
 
    do{
        if(empty($doptarea_decizie)||empty ($proces) || empty ($rfinalizarea)){
            $errorMessage = "All the fields are required";
            break;
        }
        $sql="UPDATE sistem_decizional 
        SET adoptarea_decizie= '$adoptarea_decizie' , proces = '$proces', finalizarea = '$finalizarea' 
        WHERE id = '$id' ";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            $errorMessage="Invalid query:".$conn->error;
            break;
        }

        $successeMessage="Row update correctly";
        header("location:../menu1/sistem_decizional.php");
        exit;
 }while(true);

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
<title>Edit  a  row  </title>
</head>
<body style="font-family: 'Garamond', sans-serif;">
<div class="home-btn">
    <a href="../php1/admin_page1.php">Centrul de consultanta </a>
</div>
<div class="home-btn">
    <a href="../menu1/sistem_decizional.php">Sistemul decizional</a>
</div>
    <div class="container my-5">
    <h2 style="position:relative;top:-50vh;left:20vh;">Edit the Row</h2>
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
            <input type="hidden"  name="id" value="<?php echo $id?>">
         
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Adoptarea decizionala</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="adoptarea_decizie" value="<?php echo $adoptarea_decizie; ?>">
</div>
            </div>
          
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Proces</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="proces" value="<?php echo $proces; ?>">
</div>
            </div>
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Finalizare</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="finalizare" value="<?php echo $finalizare; ?>">
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
                    <button type="submit" class="btn btn-primary">Submit</button>
</div>
<div class="col-sm-3 d-grid">
    <a class="btn btn-outline-primary" href="../menu1/sistem_decizional.php" role="button">Cancel</a>
</div>
            </div>
        </form>
    </div>
</body>
</head>
</html>