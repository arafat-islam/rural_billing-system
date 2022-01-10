<?php include "includes/header.php"; ?>

<?php include "includes/navigation.php"; ?>
<script>document.title = "User's Complaint" </script>
<?php if(Session::get("userRole") == "consumer") { ?>
<?php 
 $id = Session::get("userId");
 $user = "SELECT * FROM users WHERE id = $id";

 $get_user_name_post = $db->select($user);
  if($get_user_name_post) {
    $get_user = $get_user_name_post->fetch_assoc();
  }
  
?>

<?php 
 $id = Session::get("userId");
 $previous_complaints = "SELECT * FROM user_complains WHERE complaintBy = $id";


 $get_previous_complaints_post = $db->select($previous_complaints);
  if($get_previous_complaints_post) {
    $showUser = $get_previous_complaints_post->fetch_assoc();

  }
  
?>
<div class="container">
  <hr>
  <div class="row">
    <div style="border-right: 1px solid #ddd;" class="col-md-6">
    <h1>Submit a Complaint</h1>
  <form action="action/complains.action.php" method="POST">
    <div class="form-group">
      <label for="name">Name</label>
      <?php $id = Session::get("userId"); ?>
      <input type="hidden" name="complaintBy" value="<?= $id; ?>">
      <input type="name" value="<?= $get_user['name'] ?>"  readonly class="form-control" name="name" id="name" placeholder="Enter Name">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" name="email" value="<?= $get_user['email'] ?>"  readonly class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
        placeholder="Enter Email">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Complain</label>
      <textarea required name="message" id="" cols="30" rows="10" class="form-control"
        placeholder="Enter Your Complain Here"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    </div>
    <div class="col-md-6">
      <h3>My Previous Complaints</h3>
      <?php
       
        $serial = 1;

        $get_complain = "SELECT * FROM user_complains WHERE complaintBy = $id";


        $complain_post = $db->select($get_complain);
         if($complain_post) {
           while($comp = $complain_post->fetch_assoc()) {
       
    ?>

              <div style="margin-top:10px">
                <p><?php echo $comp['message']; ?></p>
                <small style="margin-left: 100px; color:green">------<?php echo $com =  is_null($comp['reply']) ? "<span style='color: red;'>Hasn't replied yet</span>" :  $comp['reply']; ?></small>
              </div>
<?php } } ?>
    </div>
  </div>
</div>
<?php } ?>


<?php if(Session::get("userRole") == "admin" || Session::get("userRole") == "manager") { ?>
<div class="container">
  <h2>User's complaints</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">SL No.</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th>Complaints</th>
        <th>Complaint At</th>
        <?php if(Session::get("userRole") == "admin") { ?>
        <th>Action</th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php
        $query = "SELECT * FROM user_complains ORDER BY complained_at DESC";

        $post = $db->select($query);
        $serial = 1;
        if($post) {
            while($result = $post->fetch_assoc()) { ?>

      <tr style="background-color: <?php if(is_null($result['reply'])) { echo "gainsboro"; } ?> ;">
        <th scope="row"><?php echo $serial++; ?></th>
        <td><?php echo $result['name']; ?></td>
        <td><?php echo $result['email']; ?></td>
        <td><?php echo $result['message']; ?></td>
        <td><?php echo date($result['complained_at']); ?></td>
        <?php if(Session::get("userRole") == "admin") { ?>
        <td>
          <?php 
          
              if(is_null($result['reply'])) { ?>
                 <a href='reply-complains.php?id=<?php echo $result['id']; ?>'>Reply</a>
            <?php  }
            else {
              ?>
                <small><?php echo $result['reply']; ?></small>
              <?php
            }
          
          ?>
        </td>
        <?php } ?>
        <td></td>
      </tr>
      <?php                
            }
        }
    ?>
    </tbody>
  </table>
</div>
<?php } ?>
<?php include "includes/footer.php"; ?>



<?php if(isset($_SESSION['complaint_sent'])) : ?>
<script>
    Swal.fire({
  position: 'center',
  icon: 'success',
  title: "Complaints Sent Successfully",
  showConfirmButton: false,
  timer: 2000
})
</script>
<?php endif; unset($_SESSION['complaint_sent']);?>