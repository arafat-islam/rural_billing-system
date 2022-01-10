<?php include "includes/header.php"; ?>

<?php include "includes/navigation.php"; ?>

<?php

    if(isset($_GET['userId'])) {
        $id = $_GET['userId'];
    }


?>

<div class="container">
    <h1>Assign Bill</h1>
    <form action="action/billassign.action.php?userId=<?php echo $id; ?>" method="POST">
        <div class="form-group">
            <input type="text" name="unit" class="form-control" id="unit" aria-describedby=""
                placeholder="Enter Meter Unit">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>



<?php include "includes/footer.php"; ?>