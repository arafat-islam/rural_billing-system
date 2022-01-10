<?php
    include "./lib/Session.php";
    Session::init();
    include "./config/config.php";
    include "./lib/Database.php";
    $db = new Database();
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<div class="container">
    <h2>Apply For a new Connection</h2>
    <form action="action/new-connection.action.php" method="POST">
        <div>
            <label for="name">Enter Name</label>
            <input class="form-control" type="text" name="name">
        </div>
        <div>
            <label for="name">Enter Email</label>
            <input class="form-control" type="text" name="email">
        </div>
        <div>
            <label for="name">Phone</label>
            <input class="form-control" type="text" name="phone">
        </div>
        <div>
            <label for="name">District</label>
            <input class="form-control" type="text" name="district">
        </div>
        <div>
            <label for="name">Address</label>
            <input class="form-control" type="text" name="address">
        </div>
        <div>
        <input style="margin-top: 20px;" class="btn btn-primary" type="submit" value="Apply">
        <a style="margin-top: 20px;"  class="btn btn-info" href="login.php">Back To Login</a>
        </div>
    </form>
</div>


<?php if(isset($_SESSION['connection_sent'])) : ?>
<script>
    Swal.fire({
  position: 'center',
  icon: 'success',
  title: "New Connection Request Has Been Sent Successfully",
  showConfirmButton: false,
  timer: 2000
})
</script>
<?php endif; unset($_SESSION['connection_sent']);?>