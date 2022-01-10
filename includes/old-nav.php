<div class="container">
<nav class="navbar collapse navbar-collapse">
  <div class="container-fluid">
    <div class="navbar-header">
      <h5><?php if(Session::get("userRole") == "admin") {echo "WELCOME ADMIN";}?> <?php if(Session::get("userRole") == "biller") {echo "WELCOME BILLER";} ?>
      <?php if(Session::get("userRole") == "consumer") {echo "WELCOME CONSUMER";} ?><?php if(Session::get("userRole") == "manager") {echo "WELCOME MANAGER";} ?></h5>
    </div>
    <ul class="nav navbar-nav">
      <?php 
        $get_new_application = "SELECT * FROM new_applications WHERE isConfirmed = 0";
        $post = $db->select($get_new_application);

        if($post) {
          $result = $post->fetch_assoc();
          $row = mysqli_num_rows($post);
        }
      ?>
    <?php
      if(Session::get("userRole") == "admin" || Session::get("userRole") == "manager") { ?>
      <li class="active"><a href="users.php">Users</a></li>
      <?php if(Session::get("userRole") == "admin") { ?> 
      <li><a href="addusers.php">Add Users</a></li>
      <li class="active"><a href="meters.php">Meters</a></li>
      <?php } } ?>
      <?php if(Session::get("userRole") == "admin" || Session::get("userRole") == "manager" || Session::get("userRole") == "consumer" ) { ?> 
      <li><a href="complaints.php">Complaints</a></li>
      <?php }  ?>
      <?php if(Session::get("userRole") == "admin") { ?> 
      <li><a href="new-applications.php">New Applications (<?php echo $r = ($row > 0) ? $row : "" ?>)</a></li>
      <?php } ?>
      <li><a href="bills.php">Bill</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in" ></span> Sign Out</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-user" ></span> Login</a></li>
    </ul>
  </div>
</nav>
</div>