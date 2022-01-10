<?php
    include "../lib/Database.php";
    include "../lib/Session.php";
    Session::init();
    include "../config/config.php";
    $db = new Database();

    if(isset($_POST['submit'])) {
        
        extract($_POST);
        $userId = $_POST['user'];

        $get_user = "SELECT * FROM users WHERE id = $user";

        $get_post = $db->select($get_user);

        $user = $get_post->fetch_assoc();

        $meterId = $user['meterId'];


        $query = "INSERT INTO bill_details (userId, month, unit, meterId) VALUES ('$userId', '$month', $unit, '$meterId')";


        if($db->insert($query)) {
            Session::set("bill_inserted", true);
            header("location: ../bills.php");
        }


    }