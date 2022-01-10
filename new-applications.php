<?php include_once "includes/header.php"; ?>

<?php include "includes/navigation.php"; ?>
<script>document.title = "New Applications";</script>
<div class="container">
    <h2>New Applications</h2>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped"> 
                <thead>
                    <tr>
                        <th>SL. No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Discrict</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
<?php
    $query = "SELECT * FROM new_applications WHERE isConfirmed = 0";

    $post = $db->select($query);
    $serial = 1;
    if($post) {
        while($result = $post->fetch_assoc()) { ?>
                    <tr>
                        <td>
                            <?php echo $serial++; ?>
                        </td>
                        <td>
                            <?php echo $result['name']; ?>
                        </td>
                        <td>
                            <?php echo $result['email']; ?>
                        </td>
                        <td>
                            <?php echo $result['phone']; ?>
                        </td>
                        <td>
                            <?php echo $result['district']; ?>
                        </td>
                        <td>
                            <?php echo $result['address']; ?>
                        </td>
                        <td>
                            <a href="confirm-applications.php?id=<?php echo $result['id']; ?>">Confirm</a>
                        </td>
                    </tr>
                    
<?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include "includes/footer.php"; ?>




<?php if(isset($_SESSION['user_confirmed'])) : ?>
<script>
    Swal.fire({
  position: 'center',
  icon: 'success',
  title: "User Confirmed Successfully",
  showConfirmButton: false,
  timer: 2000
})
</script>
<?php endif; unset($_SESSION['user_confirmed']);?>