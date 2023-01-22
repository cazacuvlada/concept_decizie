<?php

@include '../php1/config1.php';
session_start();
$name_1 = "";
$email_1 = "";
$pass_1 = "";
$cpass_1 = "";
$user_type_1= "";

if(isset($_POST['submit'])) {
   
    $email_1 = mysqli_real_escape_string($conn, $_POST["email_1"]);
    $pass_1 = md5($_POST["password_1"]);
   

    $select = "SELECT * FROM user_form1  WHERE email_1 = '$email_1' && password_1 = '$pass_1' ";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result)>0) {
    $row = mysqli_fetch_array($result);
    if($row['user_type_1']=='admin'){
        $_SESSION['admin_name_1'] = $row['name_1'];
        header('location:../php1/admin_page1.php');
    }
    else if
    ($row['user_type_1']=='user'){

        $_SESSION['user_name_1'] = $row['name_1'];
        header('location:../php1/user_page1.php');
    }
    }
    else{
        $error[]='incorrect email or password';
    }

};
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login Form </title>
        <link rel="stylesheet" href="../css1/library.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body >

    <div class="form-container">
        <form action="" method="post">
            <h3>Login now</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                }
            };
            ?>
            <input type="email_1" name="email_1" required placeholder="enter your email">
            <input type="password_1" name="password_1" required placeholder="enter your password">
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>Don't have an account? <a href="../php1/register_form1.php">Register now</a></p>
            <a style="color:black; font-size:4vh;text-decoration:none;" href="../php1/login_form1.php">Centru de consultanță privind procesul decisional al unei firme</a>
        </form>
    </div>
    </body>
    </html>
<?php
