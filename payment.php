<?php include_once "includes/header.php"; ?>

<?php include "includes/navigation.php"; ?>

<?php
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        
    $query = "SELECT * FROM bill_details WHERE id = $id";
    
    $post = $db->select($query);


    if($post) {
        $result = $post->fetch_assoc(); ?>


        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Month</th>
                                <th>Total Bill</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $result['month']; ?></td>
                                <td><?php echo $result['total_bill']; ?></td>
                                <td><a href="make-payment.php?id=<?php echo $result['id']; ?>" class="btn btn-success">Make Payment</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

<?php   }} ?>


<?php include "includes/footer.php"; ?>



