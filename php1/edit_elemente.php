<?php
$id = "";
$clasificarea_deciziilor="";
$conceptul_decizie="";
$mecanismul_decizie="";
$rationalizare_decizie="";

$errorMessage="";
$successeMessage ="";

@include "../php1/config1.php";
$conn = mysqli_connect('localhost','root','','centrul_de_consultanta');


$clasificarea_deciziilor="";
$conceptul_decizie="";
$mecanismul_decizie="";
$rationalizare_decizie="";



if($_SERVER['REQUEST_METHOD']=='GET'){
if(!isset($_GET["id"])){
    header("location:../menu1/elemente_decizie.php");
    exit;
}

$id = $_GET["id"];
//Get method : show the data of the client
//read the row of the selected client from db
$sql = "SELECT * FROM `elemente_decizie` WHERE id='$id'";
$result =mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
if(!$row){
    header("location:../menu1/elemente_decizie.php");
    exit;
}
   
    
   
}
else{
//post method: update the data of the client
$id = $_POST["id"];
$clasificarea_deciziilor=$_POST["clasificarea_deciziilor"];
$conceptul_decizie=$_POST["conceptul_decizie"];
$mecanismul_decizi=$_POST["mecanismul_decizi"];
$rationalizare_decizieC=$_POST["rationalizare_decizie"];


   
 
do{
    if(empty($indicatori)||empty ($produse_A) || empty ( $produse_B)|| empty ( $produse_C)|| empty ( $total) ){
        $errorMessage = "All the fields are required";
        break;
    }
   
    $sql = "UPDATE `elemente_decizie` 
     SET clasificarea_deciziilor= '$clasificarea_deciziilor' , conceptul_decizie = '$conceptul_decizie, mecanismul_decizie = '$mecanismul_decizie', rationalizare_decizie = '$rationalizare_decizie'
    WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    #$result=$conn->query($sql);
    if(!$result){
  $errorMessage = "Invalid query:".$conn->error;
  break;
    }
    $successeMessage="Row update correctly";
    header("location:../menu1/elemente_decizie.php");
    exit;
}
while(true);

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
    <a href="../php1/admin_page1.php">Centrul de Consultanta</a>
</div>
<div class="home-btn">
    <a href="../menu1/elemente_decizie.php">Elemente decizionale </a>
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
<label class="col-sm-3 col-form-label ">Clasificarea deciziilor</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="clasificarea_deciziilor" value="<?php echo $clasificarea_deciziilor; ?>">
</div>
            </div>
           
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Conceptul Decizional</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="conceptul_decizie" value="<?php echo $conceptul_decizie; ?>">
</div>
            </div>
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Mecanismul Decizional</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="mecanismul_decizie" value="<?php echo $mecanismul_decizie; ?>">
</div>
            </div>
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Rationalizarea Decizionala</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="rationalizare_decizie" value="<?php echo $rationalizare_decizie; ?>">
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
    <a style="color:lightslategray;background-color:white;" class="btn btn-outline-primary" href="../menu1/elemente_decizie.php" role="button">Cancel</a>
</div>
            </div>
        </form>
    </div>
</body>
</head>
</html>