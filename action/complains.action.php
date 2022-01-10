<?php
    include "../lib/Session.php";
    Session::init();
    include "../config/config.php";
    include "../lib/Database.php";
    $db = new Database();


    if(!Session::get("userRole") == "admin") {
        header("location: ../login.php");
    } 

    extract($_POST);
    $message = mysqli_real_escape_string($db->link, $_POST['message']);


    $query = "INSERT INTO user_complains (name,email,message, complaintBy) VALUES ('$name', '$email', '$message', '$complaintBy')";


    if($post = $db->insert($query)) {
        Session::set("complaint_sent", true);
        header("location: ../complaints.php");
    }


