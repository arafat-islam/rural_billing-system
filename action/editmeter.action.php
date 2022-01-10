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

    $meterName = $_POST['metername'];

    $query  = "UPDATE meters SET name = '$meterName' WHERE id = $id";

    $post = $db->update($query);

    if($post) {
        header("location: ../index.php");
    }

