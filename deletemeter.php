<?php include "includes/header.php"; ?>

<?php
   if(!Session::get("userRole") == "admin") {
    header("location: login.php");
   }

   if(isset($_GET['id'])) {
       $id = $_GET['id'];
   }

   $query = "DELETE FROM meters WHERE id = $id";

   if($db->delete($query)){
       Session::set("meter_deleted", true);
       header("location: meters.php");
   }


?>