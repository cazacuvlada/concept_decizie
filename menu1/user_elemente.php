<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User page</title>

    <link rel="stylesheet" href="../css1/library.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="home-btn">
    <a href="../php1/user_page1.php">Centrul de consultanta</a>
</div>
<div class="container_2 my-5">
    <h2 style="text-align:center;"  >Elemente Decizionale</h2>
   
    <table class="new_row">
        <thead>
        <tr>
            <th>Id</th>
            <th>Clasificarea Deciziilor</th>
            <th>Conceptul de decizie</th>
            <th>Mecanismul Decizional</th>
            <th>Rationalizarea deciziei</th>
           
        </tr>
        </thead>
        <tbody>
        <?php

        @include '../php1/config1.php';
        //check connection to db
        if($conn->connect_error){
            die("Connection failed:".$conn->connect_error);
        }
        //read all row from db table
        $sql = "SELECT * FROM elemente_decizie";
        $result =mysqli_query($conn,$sql);
        if(!$result){
            die("Invalid query:".$conn->error);
        }
        //read data of each row
        while($row = $result->fetch_assoc()){
            echo " <tr>
           <td>$row[id]</td>
            <td>$row[clasificarea_deciziilor]</td>
            <td>$row[conceptul_decizie]</td>
            <td>$row[mecanismul_decizie]</td>
            <td>$row[rationalizare_decizie]</td>
          
            
           </tr>";
           }
        ?>

        </tbody>
    </table>


</div>

</body>
</html>
