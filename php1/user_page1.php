<?php

@include '../php1/config1.php';
session_start();
if(!isset($_SESSION['user_name'])){
    header('location:../php1/user_page1.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User page</title>

    <link rel="stylesheet" href="../css1/library.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body >
<div  class="container">
<h1>Centru de consultanță privind procesul decisional al unei firme</h1>
<div class="content">
    <h3>Hi,<span>User</span></h3>
    <h2>Welcome<span>
            <?php
            echo $_SESSION['user_name'];
            ?>
        </span></h2>
    <p>This is user page</p>

    <a href="../php1/logout1.php" class="btn">logout</a>
</div>
</div>
<div class="wrapper">
    <div class="sidebar">
        <h2>Menu</h2>
        <ul>
        <li><a href="#"  class="btn" >Informatii generale</a></li>
        <li><a href="#" class="btn" >Sistemul decizional</a></li>
            <li><a href="#"  class="btn" >Procesul decizional</a></li>
            <li><a href="#"  class="btn" >Elementele decizionale</a></li>
            <li><a href="#" class="btn" >Algoritmul decizional</a></li>
           
        </ul>
    </div>
</div>

</body>
</html>