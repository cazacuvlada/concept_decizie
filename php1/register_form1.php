<?php

@include '../php1/config1.php';


if(isset($_POST['submit'])) {
    $name_1 = mysqli_real_escape_string($conn, $_POST['name_1']);
    $email_1 = mysqli_real_escape_string($conn, $_POST['email_1']);
    $pass_1 = md5($_POST['password_1']);
    $cpass_1 = md5($_POST['cpassword_1']);
    $user_type_1 = $_POST['user_type_1'];


    $select = "SELECT * FROM user_form1  WHERE email_1 = '$email_1' && password_1= '$pass_1' ";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result)>0) {
  $error[] = 'user already exists!';
 }
    else
    {
        if($pass != $cpass){
            $error[] = 'password not matched!';
        }else{
            $insert = "INSERT  INTO  user_form1 (name_1,email_1,password_1 ,user_type_1	) VALUES ('$name_1', '$email_1','$pass_1','$user_type_1')";
            mysqli_query($conn, $insert);
            header('location:../php1/login_form1.php');
        }
    }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Form </title>
    <link rel="stylesheet" href="../css1/library.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body >

<div class="form-container">
    <form action="" method="post">
        <h3>Register now</h3>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            }
        };
        ?>
        <input type="text" name="name_1" required placeholder="enter your name">
        <input type="email_1" name="email_1" required placeholder="enter your email">
        <input type="password_1" name="password_1" required placeholder="enter your password">
        <input type="password_1" name="cpassword_1" required placeholder="confirm your password">
     <select name="user_type_1">
         <option value="user">user</option>
         <option value="admin">admin</option>
     </select>
        <input type="submit" name="submit" value="register now" class="form-btn">
        <p>Already have an account? <a href="../php1/login_form1.php">login now</a></p>



    </form>
</div>
</body>
</html>
