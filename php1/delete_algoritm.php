<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    @include "../php1/config1.php";
$conn = mysqli_connect('localhost','root','','centrul_de_consultanta');


$sql = "DELETE FROM `algoritm_decizie` WHERE id='$id'  ";
$result=mysqli_query($conn,$sql);
if($result){
        echo "Deleted successfull";
    header("location:../menu1/algoritm_decizie.php");
}
else{
        die(mysqli_error($conn));
}
}


?>
