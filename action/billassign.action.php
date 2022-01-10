<?php
    include "../lib/Session.php";
    Session::init();
    include "../config/config.php";
    include "../lib/Database.php";
    $db = new Database();


    if(!Session::get("userRole") == "admin") {
        header("location: ../login.php");
    } 


    $unit = $_POST['unit'];
    $userId = $_POST['userId'];
  

    $query  = "INSERT INTO bill_details userId, unit VALUES('$userId', '$unit')";

    $post = $db->insert($query);

    if($post) {
        header("location: ../users.php");
    }

