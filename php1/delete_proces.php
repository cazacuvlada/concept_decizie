<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    @include "../php1/config.1php";
$conn = mysqli_connect('localhost','root','','centrul_de_consultanta');


$sql = "DELETE FROM `proces_decizie` WHERE id='$id'  ";
$result=mysqli_query($conn,$sql);
if($result){
        echo "Deleted successfull";
    header("location:../menu1/proces_decizie.php");
}
else{
        die(mysqli_error($conn));
}
}


?>
