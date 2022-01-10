<?php
    include "../lib/Session.php";
    Session::init();
    include "../config/config.php";
    include "../lib/Database.php";
    $db = new Database();

    $email = $_POST['email'];
    $password = $_POST['password'];
    $md5Password = md5($password);

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$md5Password'";

    $post = $db->select($query);

    if($post) {

        $result = $post->fetch_assoc();

        if($result['userType'] == 1) {
            Session::set('userRole', "admin");
            Session::set('userId', $result['id']);
        } 
        if($result['userType'] == 2) {
            Session::set('userRole', "biller");
            Session::set('userId', $result['id']);
        } 
        if($result['userType'] == 3) {
            Session::set('userRole', "consumer");
            Session::set('userId', $result['id']);
        } 
        if($result['userType'] == 4) {
            Session::set('userRole', "manager");
            Session::set('userId', $result['id']);
        } 

        Session::set("login_success", true);
        
        header("location: ../index.php");
    }

    else {
        $_SESSION['user_doesnot_exist'] = true;
        header("location: ../login.php");
    }
