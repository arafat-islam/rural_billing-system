<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rural Electricity Billing System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>

<?php
    include "./lib/Session.php";
    Session::init();
    include "./config/config.php";
    include "./lib/Database.php";
    $db = new Database();

    if(!Session::get("userRole")) {
      header("location: ./login.php");
    }
?>