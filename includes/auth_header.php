<?php 

session_start(); 

if (isset($_SESSION['username'])) {
    header("Location: ../dashboard/"); // Redirect to dashboard if already logged in
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="The Everything Inventory App">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
<meta name="author" content="The Everything Inventory App">
<meta name="robots" content="noindex, nofollow">
<title>Login - Tech Drive Solutions</title>

<link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

<link rel="stylesheet" href="../assets/css/bootstrap.min.css">

<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="../assets/css/style.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>