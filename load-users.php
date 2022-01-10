<?php  
    include "./lib/Database.php";
    include "./lib/Session.php";
    Session::init();
    include "./config/config.php";
    $db = new Database();
    $userCount = $_POST['newUser'];
    $query = "SELECT * FROM users ORDER BY id DESC limit $userCount";

   
?>

<table>
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
            <th>Action</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        
        <?php 
        $serial = 1;
         $post = $db->select($query);
         $rowcount=mysqli_num_rows($post);
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

        <td><a class="btn btn-danger" href="./deleteuser.php?id=<?php echo $result['id']; ?>">Delete</a></td>
        <?php } } ?>
      </tr>
    </tbody>
</table>