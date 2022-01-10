<?php
    include "../lib/Session.php";
    Session::init();
    include "../config/config.php";
    include "../lib/Database.php";
    $db = new Database();


    if(!Session::get("userRole") == "admin") {
        header("location: ../login.php");
    } 


    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    
    $reply = mysqli_real_escape_string($db->link, $_POST['message']);

    $query = "UPDATE user_complains set reply = '$reply' WHERE id = $id";

    if($db->update($query)) {
        header('location: ../complaints.php');
    }


