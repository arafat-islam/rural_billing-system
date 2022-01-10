<?php include_once "includes/header.php"; ?>

<?php include "includes/navigation.php"; ?>

<?php 

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "UPDATE bill_details SET isPaid = 1 WHERE id = $id";

        $db->update($query);
    }

    Session::set("payment_success", true); 
    header("location: bills.php");
?>

<?php include "includes/footer.php"; ?>