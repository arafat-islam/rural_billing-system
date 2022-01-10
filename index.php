<?php include_once "includes/header.php"; ?>

<?php include "includes/navigation.php"; ?>

<?php 

  if(Session::get("userRole") == "admin") {
    Session::set("logged_in_as_admin", true);
    header("location: users.php");
  }
  elseif (Session::get("userRole") == "manager") {
    Session::set("logged_in_as_manager", true);
    header("location: users.php");
  }
  elseif (Session::get("userRole") == "consumer") {
    Session::set("logged_in_as_consumer", true);
    header("location: bills.php");
  } else {
    Session::set("logged_in_as_biller", true);
    header("location: bills.php");
  }

?>


<?php include "includes/footer.php"; ?>
