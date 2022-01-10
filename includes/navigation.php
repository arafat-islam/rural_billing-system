<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <div class="navbar-header">

      <?php 
        $get_new_application = "SELECT * FROM new_applications WHERE isConfirmed = 0";
        $post = $db->select($get_new_application);

        if($post) {
          $result = $post->fetch_assoc();
          $row = mysqli_num_rows($post);
        }
      ?>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href=""><?php if(Session::get("userRole") == "admin") {echo "WELCOME ADMIN";}?> <?php if(Session::get("userRole") == "biller") {echo "WELCOME BILLER";} ?>
      <?php if(Session::get("userRole") == "consumer") {echo "WELCOME CONSUMER";} ?><?php if(Session::get("userRole") == "manager") {echo "WELCOME MANAGER";} ?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <?php
      if(Session::get("userRole") == "admin" || Session::get("userRole") == "manager") { ?>
        <li class="active"><a href="users.php">Users</a></li>
        <?php if(Session::get("userRole") == "admin") { ?> 
        <li><a href="addusers.php">Add Users</a></li>
        <li><a href="meters.php">Meters</a></li>
        <?php } } ?>
        <?php if(Session::get("userRole") == "admin" || Session::get("userRole") == "manager" || Session::get("userRole") == "consumer" ) { ?> 
        <li><a href="complaints.php">Complaints</a></li>
        <?php }  ?>
        <?php if(Session::get("userRole") == "admin") { ?> 
        <li><a href="new-applications.php">New Applications (<?php echo $r = ($row > 0) ? $row : "" ?>) </a></li>
        <?php }  ?>
        <li><a href="bills.php">Bill</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in "></span> Log Out</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>