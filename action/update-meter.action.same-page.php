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

    $getName = "SELECT * FROM meters WHERE name = '$name'";

    $checkName  = $db->select($getName);

    if($checkName) {
        Session::set("alread_exists", true);
        header("location: ../meters.php");
    }

    else {
        $query  = "UPDATE `meters` SET `name` = '$name' WHERE id = $id";
    
        if($db->update($query)) {
            Session::set("meter_updated", true);
            header("location: ../meters.php");
        } else {
            echo "asdfasd";
        }  
    }

