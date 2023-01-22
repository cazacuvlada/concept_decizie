<?php

@include '../php1/config1.php';
session_start();
session_unset();
session_destroy();

header('location:../php1/login_form1.php');
?>

