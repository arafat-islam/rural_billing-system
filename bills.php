<?php include "includes/header.php"; ?>

<?php include "includes/navigation.php"; ?>
<script>document.title = "Bills";</script>

<?php 

function billCalculation($unit, $demandCharge) {
        $demandCharge = $demandCharge;
        $unit = $unit;
        $firstUnit = $unit;

        $total = 0;

        if($unit > 500) {
            $total = $total + ($unit - 500) * 7;
            $unit = 500;
        }
        
        if ($unit > 300) {
            $total = $total + ($unit - 300) * 5;
            $unit = 300;
        }

        if ($unit > 100) {
            $total = $total + ($unit - 100) * 4;
            $unit = 100;
        }
        
        $total = $total + $unit * 3.5;
        
        if($firstUnit < 500) {
            $total += (($total * 5) / 100);
        } else {
            $total += (($total * 10) / 100);
        }

        return $total + $demandCharge;

    }

?>


<?php if(Session::get("userRole") == "biller") : ?>

<div class="container">
  <form action="action/bills.action.php" method="POST">
    <div style="padding: 0 20px">
      <label for="user">Enter User's Name</label>
      <select class="form-control" name="user" id="user">
      <option value="">--Select User--</option>
        <?php
            $get_users = "SELECT * FROM users WHERE userType = 3";
          $user_post = $db->select($get_users);
          if($user_post) {
            while($users_result = $user_post->fetch_assoc()) {
          ?>

        <option class="form-control" value="<?php echo $users_result['id'] ?>"><?php echo $users_result['name'] ?>
        </option>

        <?php 

}
}

?>
      </select>
    </div>

    <div style="padding: 20px">
      <label for="month">Enter Month</label>
      <select class="form-control" id="month" name="month">
        <option>--Select Month--</option>
        <option value="January">January</option>
        <option value="February">February</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="September">September</option>
        <option value="October">October</option>
        <option value="November">November</option>
        <option value="December">December</option>
      </select>
    </div>
    <div style="padding: 0 20px">
      <label for="month">Enter Unit Usage</label>
      <input class="form-control" type="number" name="unit" required id="">
    </div>
    <div style="padding: 20px;">
      <input class="btn btn-outline-success" name="submit" type="submit" value="Enter Bill">
    </div>
  </form>
</div>

<?php endif;?>

<?php if(Session::get("userRole") == "admin" || Session::get("userRole") == "manager" ) : ?>

<div class="container">

</div>
<div class="container">
  <hr>
  <h4>Bills</h4>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">SL No.</th>
        <th scope="col">Name</th>
        <th scope="col">METER NO</th>
        <th scope="col">Unit</th>
        <th scope="col">Total Bill (Taka)</th>
        <th scope="col">Month</th>
      </tr>
    </thead>
    <tbody>

      <?php
    $query = "SELECT * FROM bill_details";

    $post = $db->select($query);
    $result = $post->fetch_assoc();

// $getUser = "SELECT * FROM users WHERE id = $userId";

// $get_user_post = $db->select($getUser);
//  $user = $get_user_post->fetch_assoc();

    $serial = 1;
    if($post) {
    while($result = $post->fetch_assoc()) {
      $userId = $result['userId'];
      $getUser = "SELECT * FROM users WHERE id = $userId";
      $get_user_post = $db->select($getUser);
      $user = $get_user_post->fetch_assoc();

      
      $meterId = $result['meterId'];

      $getMeter = "SELECT * FROM meters WHERE id = $meterId";
      $get_meter_post = $db->select($getMeter);
      $meter = $get_meter_post->fetch_assoc();

      ?>

      <tr>
        <th scope="row"><?php echo $serial++; ?></th>
        <td><?php echo $user['name']; ?></td>
        <td><?php echo $meter['name']; ?></td>
        <td><?php echo $result['unit']; ?></td>
        <td><?php echo billCalculation($result['unit'], 50); ?></td>
        <td><?php echo $result['month']; ?></td>
      </tr>

      <?php }} ?>
    </tbody>
  </table>
</div>
<?php endif;?>


<?php if(Session::get("userRole") == "consumer") : ?>

<div class="container">
  <hr>
  <h4>My Bills Details</h4>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Sl. No</th>
        <th>Name</th>
        <th>Unit</th>
        <th>Total Bills</th>
        <th>Month</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

    <?php 
    $consumerId = Session::get("userId");

  $get_bill_details = "SELECT * FROM bill_details WHERE userId = $consumerId";
  
  $get_bill_post = $db->select($get_bill_details);
  $serial = 1;
  if($get_bill_post) {
    while($bill = $get_bill_post->fetch_assoc()) {

     $total_bill = billCalculation($bill['unit'], 50);
      $billId = $bill['id'];
     $insert_bill = "UPDATE bill_details SET total_bill = '$total_bill' WHERE id = $billId";

     $db->update($insert_bill);

?>
      <tr>
      <td><?= $serial++; ?></td>
        <td>
          <?php 
            $userId = $bill['userId'];

            $get_user_name = "SELECT * FROM users WHERE id = $userId";
            $get_post = $db->select($get_user_name);
            if($get_post) {
              $user = $get_post->fetch_assoc();
              echo $user['name'];
            }
          ?>
        </td>
        <td><?php echo $bill['unit'] ?></td>
        <td><?php echo billCalculation($bill['unit'], 50); ?></td>
        <td><?php echo $bill['month'] ?></td>
        <td><a href="<?php echo $paid = ($bill['isPaid'] == 0) ? "payment.php" : ""; ?>?id=<?= $bill['id'];?>"><?php echo $paid = ($bill['isPaid'] == 0) ? "Pay" : "Paid"; ?></a></td>
      </tr>

      <?php     }
  }
?>
    </tbody>
  </table>
</div>



<?php endif; ?>




<?php include "includes/footer.php"; ?>
<?php if(isset($_SESSION['bill_inserted'])) : ?>
<script>
    Swal.fire({
  position: 'center',
  icon: 'success',
  title: "Bill Assigned uccessfully",
  showConfirmButton: false,
  timer: 2000
})
</script>
<?php endif; unset($_SESSION['bill_inserted']);?>



<?php if(isset($_SESSION['payment_success'])) : ?>
<script>
    Swal.fire({
  position: 'center',
  icon: 'success',
  title: "Payment Successfully",
  showConfirmButton: false,
  timer: 2000
})
</script>
<?php endif; unset($_SESSION['payment_success']);?>



<?php if(isset($_SESSION['logged_in_as_consumer'])) : ?>
<script>
    Swal.fire({
  position: 'center',
  icon: 'success',
  title: "Successfully Logged in as Consumer",
  showConfirmButton: false,
  timer: 2100
})
</script>
<?php endif; unset($_SESSION['logged_in_as_consumer']);?>


