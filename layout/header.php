<?php
    include '../config/app.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $logged_in = isset($_SESSION['userId']);
    $nama = isset($_SESSION['full_name']);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../../app//assets/css/app.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Poppins:wght@200&family=Ysabeau+Infant:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Poppins:ital,wght@0,100;1,100&family=Ysabeau+Infant:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>
  <body>