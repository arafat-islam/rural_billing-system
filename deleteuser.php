<?php include "includes/header.php"; ?>

<?php
   if(!Session::get("userRole") == "admin") {
    header("location: login.php");
   }

   if(isset($_GET['id'])) {
       $id = $_GET['id'];
   }

   $query = "DELETE FROM users WHERE id = $id";

   if($db->delete($query)){
       Session::set("deleted", true);
       header("location: users.php");
   }


?>