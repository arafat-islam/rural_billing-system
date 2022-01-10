<?php include_once "includes/header.php"; ?>

<?php include "includes/navigation.php"; ?>
<script>document.title = "Users" </script>

<?php  
    $get_total_user_query = "SELECT * FROM users";
    $result = $db->select($get_total_user_query);
    $rowcount=mysqli_num_rows($result);
?>



<?php  
    $query = "SELECT * FROM users ORDER BY id DESC limit 5";
    $post = $db->select($query);
?>

<script>
  $(document).ready(function() {
    var userCount = 5;
    $(".btn").click(function() {
      userCount = userCount + 2;
      $('table').load("load-users.php", {
        newUser : userCount
      })
    })
  })
</script>

<div id="" class="container">

    <hr>


  <div class="header-information-user-page">
  <h2>User Information</h2>
  <h2>Total Users: <?= $rowcount; ?></h2>
  </div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">SL No.</th>
        <th scope="col">User Name</th>
        <th scope="col">Meter Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone Number</th>
        <th scope="col">District</th>
        <th scope="col">Address</th>
        <?php if(Session::get("userRole") == "admin") { ?> 
        <th colspan ="2">Action</th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
  
  <?php
    $serial = 1;
    if($post) {
    while($result = $post->fetch_assoc()) {
    ?>

      <tr>
        <th scope="row"><?php echo $serial++; ?></th>
        <td><?php echo $result['name']; ?></td>
        <td>
          <?php
            $meterid = $result['meterId'];  
            $get_meter_name = "SELECT * FROM meters WHERE id = $meterid";
     
            $get_meter_post = $db->select($get_meter_name);
            if($get_meter_post) {
              $meter = $get_meter_post->fetch_assoc();      
              echo $meter['name'];
            }

        ?>
        </td>
        <td><?php echo $result['email']; ?></td>
        <td><?php echo $result['phone']; ?></td>
        <td><?php echo $result['district']; ?></td>
        <td><?php echo $result['address']; ?></td>
        <?php if(Session::get("userRole") == "admin") { ?> 
        <td><a class="btn btn-primary" href="./edituser.php?id=<?php echo $result['id']; ?>">Edit</a></td>

        <td><a onclick="return confirm('Are you Sure?');" class="btn btn-danger" href="./deleteuser.php?id=<?php echo $result['id']; ?>">Delete</a></td>
        <?php } ?>
      </tr>
      <?php } } ?>
    </tbody>
  </table>
        <button class="btn btn-primary" href="">Show More</button>
</div>


<?php include "includes/footer.php"; ?>



<?php if(isset($_SESSION['user_added'])) : ?>
<script>
    Swal.fire({
  position: 'center',
  icon: 'success',
  title: "User Added Successfully",
  showConfirmButton: false,
  timer: 2000
})
</script>
<?php endif; unset($_SESSION['user_added']);?>

<?php if(isset($_SESSION['logged_in_as_admin'])) : ?>
<script>
    Swal.fire({
  position: 'center',
  icon: 'success',
  title: "Successfully Logged In as Admin",
  showConfirmButton: false,
  timer: 2000
})
</script>
<?php endif; unset($_SESSION['logged_in_as_admin']);?>

<?php if(isset($_SESSION['logged_in_as_manager'])) : ?>
<script>
    Swal.fire({
  position: 'center',
  icon: 'success',
  title: "Successfully Logged In as Manager",
  showConfirmButton: false,
  timer: 2000
})
</script>
<?php endif; unset($_SESSION['logged_in_as_manager']);?>

<?php if(isset($_SESSION['user_updated'])) : ?>
<script>
    Swal.fire({
  position: 'center',
  icon: 'success',
  title: "User updated Successfully",
  showConfirmButton: false,
  timer: 2000
})
</script>
<?php endif; unset($_SESSION['user_updated']);?>

<?php if(isset($_SESSION['deleted'])) : ?>
<script>
    Swal.fire({
  position: 'center',
  icon: 'success',
  title: "User deleted Successfully",
  showConfirmButton: false,
  timer: 2000
})
</script>
<?php endif; unset($_SESSION['deleted']);?>




