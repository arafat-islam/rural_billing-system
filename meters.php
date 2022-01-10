<?php include_once "includes/header.php"; ?>

<?php include "includes/navigation.php"; ?>
<script>document.title = "Meters" </script>
<?php

$query = "SELECT * FROM meters ORDER BY id DESC";
$post = $db->select($query);

$rowcount=mysqli_num_rows($post);

if(isset($_GET['edit_meter'])) {
    $id = $_GET['id'];
    $get_meter_name = "SELECT name FROM meters WHERE id = $id LIMIT 1";

    $meterNamePost = $db->select($get_meter_name);

    $meterName = $meterNamePost->fetch_assoc();

}
?>


<div class="row">
    <div class="col-md-8">

    </div>
    <div class="col-md-4">

    </div>
</div>

<div id="" class="container">
    <div class="row">
    <hr>
        <div class="col-md-8" style="border-right: 1px solid #ddd;">
            <div class="header-information-meter-page">
              
                <h2>Meter Information</h2>
                <h3>Total Meter: <?= $rowcount;?></h3>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">SL No.</th>
                        <th scope="col">Meter Name</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $serial = 1;
                        if($post) {
                        while($result = $post->fetch_assoc()) { ?>
                    <tr>
                        <th scope="row"><?php echo $serial++; ?></th>
                        <td><?php echo $result['name']; ?></td>
                        <td><a class="btn btn-primary" href="./meters.php?edit_meter&id=<?php echo $result['id']; ?>">Edit</a>
                        </td>
                        <td><a onclick="return confirm('Are you sure?')" class="btn btn-danger"
                                href="./deletemeter.php?id=<?php echo $result['id']; ?>">Delete</a></td>
                    </tr>

                    <?php }} ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <h1><?php echo $meternae = isset($_GET['edit_meter']) ? "Update" : "Add"; ?> Meter</h1>
            <form <?php  echo $meternae = isset($_GET['edit_meter']) ? "action='action/update-meter.action.same-page.php'" : "action='action/addmeter.action.same-page.php'";  ?> method="POST">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $id = isset($_GET['edit_meter']) ? $_GET['id'] : ''; ?>">
                    <input type="text" name="name" value="<?php echo $meternae = isset($_GET['edit_meter']) ? $meterName['name'] : ""; ?>" class="form-control" id="metername" aria-describedby=""
                        placeholder="Enter Meter Name">
                </div>
                <button type="submit" class="btn btn-primary"><?php echo $meternae = isset($_GET['edit_meter']) ? "Update" : "Add"; ?> Meter</button>
            </form>
        </div>
    </div>
</div>



<?php include "includes/footer.php"; ?>

<?php if((Session::get("meter_already_exists"))) { ?>

<script>
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'error',
  title: 'Meter Name Already Exists!'
})
</script>

<?php } unset($_SESSION['meter_already_exists']); ?>


<?php if((Session::get("meter_name_empty"))) { ?>

<script>
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'error',
  title: 'Meter Name cannot be Empty!'
})
</script>

<?php } unset($_SESSION['meter_name_empty']); ?>


<?php if((Session::get("meter_deleted"))) { ?>

<script>
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Meter Deleted Successfully!'
})
</script>

<?php } unset($_SESSION['meter_deleted']); ?>




<?php if((Session::get("meter_updated"))) { ?>

<script>
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Meter Updated Successfully!'
})
</script>

<?php } unset($_SESSION['meter_updated']); ?>



<?php if((Session::get("alread_exists"))) { ?>

<script>
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'error',
  title: 'Meter Already Exists!'
})
</script>

<?php } unset($_SESSION['alread_exists']); ?>