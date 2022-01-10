<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Rural Electricity Billing System</title>
</head>

<body class="login-page">

<?php 

session_start();
include_once "lib/Session.php";
if((Session::get("userRole"))) {
    header("location: index.php");
}
?>

    <div class="container">
        <div id = "form" class="card">
            <div class="card-body">
                <form action="action/login.action.php" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Email address</label>
                        <input type="text" name="email" class="form-control" id="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Log In"></input>
                    <a class="btn btn-warning text-dark btn-lg" style="color: white" href="new-connection.php">Apply For a new Connection</a>
                </form>
            </div>
        </div>
    </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>



<?php if(isset($_SESSION['user_doesnot_exist'])) : ?>

<script>
    Swal.fire({
  position: 'top-end',
  icon: 'error',
  title: "User Name Doesn't Exist",
  showConfirmButton: false,
  timer: 1500
})
</script>

<?php endif; unset($_SESSION['user_doesnot_exist']);?>