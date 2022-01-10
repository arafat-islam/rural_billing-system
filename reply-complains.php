<?php include "includes/header.php"; ?>

<?php include "includes/navigation.php"; ?>
<script>document.title = "Reply Complaint" </script>
<?php 
    if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM user_complains WHERE id = $id";
    $post = $db->select($query);

    if($post) {
        while($result = $post->fetch_assoc()) {

    ?>

<div class="container">
<h1>Reply To <?php echo $result['name']; ?>'s complaints</h1>
<form action="action/reply-complains.action.php?id=<?php echo $id; ?>" method="POST">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="name" class="form-control" name="name" id="name" value="<?php echo $result['name']; ?>" readonly placeholder="Enter Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" value="<?php echo $result['email']; ?>" readonly id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Complain</label>
    <textarea name="message" id="" cols="30" rows="10" class="form-control" placeholder="Reply To the User"></textarea>
   </div>
  <button type="submit" class="btn btn-primary">Reply</button>
</form>
</div>

<?php


}
}
}



?>

<?php include "includes/footer.php"; ?>