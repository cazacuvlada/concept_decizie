<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    @include "../php1/config1.php";
$conn = mysqli_connect('localhost','root','','centrul_de_consultants');


$sql = "DELETE FROM `sistem_decizional` WHERE id= '$id'  ";
$result=mysqli_query($conn,$sql);
if($result){
        echo "Deleted successfull";
    header("location:../menu1/sistem_decizional.php");
}
else{
        die(mysqli_error($conn));
}
}


?>
