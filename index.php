<?php
// Gimna Chnaged

session_start(); 

if(isset($_SESSION['username'])){
    header("Location: ./dashboard");
    exit(0);
}else{
    header('Location: ./auth/signin.php');
    exit(0);
}



?>