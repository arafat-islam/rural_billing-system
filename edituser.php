<?php include "includes/header.php"; ?>

<?php include "includes/navigation.php"; ?>

<?php 

if(!Session::get("userRole") == "admin") {
    header("location: login.php");
   }

   if(isset($_GET['id'])) {
    $id = $_GET['id'];
    }

   $query = "SELECT * FROM users WHERE id = $id";
   
   $post = $db->select($query);

   if($post) {
       $result = $post->fetch_assoc();

?>


<div class="container">
    <h1>Update User</h1>
    <form action="./action/edituser.action.php" method="POST">
        <div class="form-group">
            <input type="hidden" name="userId" value="<?= $result['id'] ?>">
            <input type="text" name="username" class="form-control" id="username " aria-describedby=""
                value="<?php echo $result['name']; ?>">
        </div>
        <div class="form-group">
            <input type="text" name="email" class="form-control" id="email" aria-describedby=""
                value="<?php echo $result['email']; ?>">
        </div>
        <div class="form-group">
            <input type="text" name="phone" class="form-control" id="phone" aria-describedby=""
                value="<?php echo $result['phone']; ?>">
        </div>
        <div class="form-group">
            <input type="text" name="district" class="form-control" id="district" aria-describedby=""
                value="<?php echo $result['district']; ?>">
        </div>
        <div class="form-group">
            <input type="text" name="address" class="form-control" id="address" aria-describedby=""
                value="<?php echo $result['address']; ?>">
        </div>
        <div>
            <select class="form-control" name="meterId" id="">
                <?php 
                    $get_meter = "SELECT * FROM meters";
                    $get_meter_post = $db->select($get_meter);

                    if($get_meter_post) {
                        while($meter = $get_meter_post->fetch_assoc()) {
                ?>
                
                <option value="<?php echo $meter['id']; ?>"><?php echo $meter['name']; ?></option>

                <?php             
                        }
                    }
                ?>
            </select>
        </div>
        <button style="margin-top: 15px;" name="submit" type="submit" class="btn btn-primary">Submit</button>
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