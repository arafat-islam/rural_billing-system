<?php
    include "./config/config.php";
    include "./lib/Database.php";
    include "./lib/Session.php";
    Session::init();
    $db = new Database;
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $get_user = "SELECT * FROM new_applications WHERE id = $id";
    $post = $db->select($get_user);

    if($post) {
        $result = $post->fetch_assoc();

        extract($result);

        $insert_user_query = "INSERT INTO users (name, email, phone, password, district, address, userType) VALUES ('$name', '$email', '$phone', '202cb962ac59075b964b07152d234b70', '$district', '$address', 3)";

        $db->insert($insert_user_query);

    }

    $query = "UPDATE new_applications SET isConfirmed = 1 WHERE id = $id";
    if($db->update($query)) {
        Session::set("user_confirmed", true);
        header("location: new-applications.php");
    }
?>