<?php include "includes/header.php"; ?>

<?php include "includes/navigation.php"; ?>

<script>document.title = "Add User";</script>

<?php if(Session::get("userRole") != "admin") { header('location: login.php'); }?> 



<div id="" class="container">
    <h2>Add New Consumer</h2>
    <form action="action/addusers.action.php" method="POST">
        <div class="form-group">
            <input type="text" required  name="username" class="form-control" id="username" aria-describedby=""
                placeholder="Enter User's Name">
        </div>
        <div class="form-group">
            <input type="email" required  name="email" class="form-control" id="email" aria-describedby=""
                placeholder="Enter User's Email">
        </div>
        <div class="form-group">
            <input type="password"  required name="password" class="form-control" id="password" aria-describedby=""
                placeholder="Enter User's Password">
        </div>
        <div class="form-group">
            <input type="text"  required name="phone" class="form-control" id="phone" aria-describedby=""
                placeholder="Enter User's Phone">
        </div>
        <div class="form-group">
            <input type="text" required  name="address" class="form-control" id="address" aria-describedby=""
                placeholder="Enter User's Address">
        </div>
        <div class="form-group">
            <input type="text"  required name="district" class="form-control" id="district" aria-describedby=""
                placeholder="Enter User's District">
        </div>
        <div class="form-group">
           <select class="form-control" name="meterId" id="">
               <option value="">--Select Meter--</option>
               <?php 
                    $get_avaliable_meter = "SELECT * FROM meters";
                    $get_meter_post = $db->select($get_avaliable_meter);
                    if($get_meter_post) {
                        while($meter = $get_meter_post->fetch_assoc()) {

                            if(is_null($meter['userId'])) {}

              ?>

                <option name="<?php echo $meter['id']; ?>" value="<?php echo $meter['id']; ?>" <?php echo $red = is_null($meter['userId']) ? "style = 'color: green'" : "style = 'color: red'" ; ?> ><?php echo $available_meter =  is_null($meter['userId']) ? $meter['name'] . " -Available" : $meter['name'] . " - Already Used"; ?></option>
<?php
}
}               
?>
           </select>
        </div>
        <button type="submit" class="btn btn-primary">Add User</button>
    </form>

</div>




<?php include "includes/footer.php"; ?>