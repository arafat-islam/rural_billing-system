<?php include "includes/header.php"; ?>

<?php include "includes/navigation.php"; ?>

<?php 

if(!Session::get("userRole") == "admin") {
    header("location: login.php");
   }

   if(isset($_GET['id'])) {
    $id = $_GET['id'];
    }

   $query = "SELECT * FROM meters WHERE id = $id";
   
   $post = $db->select($query);

   if($post) {
       $result = $post->fetch_assoc();

?>


<div class="container">
    <h1>Update Meter</h1>
    <form action="" method="POST">
        <div class="form-group">
            <input type="text" name="metername" class="form-control" id="metername" aria-describedby=""
                value="<?php echo $result['name']; ?>">
        </div>
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php

}

if(isset($_POST['submit'])) {
    $meterName = $_POST['metername'];

    $query  = "UPDATE meters SET name = '$meterName' WHERE id = $id";
    
    
        $post = $db->update($query);
    
        if($post) {
            header("location: ./index.php");
        }
    
}



?>
</div>




<?php include "includes/footer.php"; ?>