<?php
require("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Order History | Life Style Store</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid" id="content">
            <?php include 'includes/header.php'; ?>
            <div class="row decor_bg">
                <div class="col-md-8 col-md-offset-2">
                                         <!--show table only if there are items added in the cart-->
                        <?php
                        $sum = 0;
                        $user_id = $_SESSION['user_id'];
                        $query = "SELECT p.name as Name, p.price as Price, up.order_date_time as order_date_time from users_items up
                                    JOIN items p ON p.id= up.item_id
                                    JOIN users u ON u.id = up.user_id
                                    WHERE u.id = '$user_id' AND up.status='Confirmed';";
                        $result = mysqli_query($con, $query)or die(mysqli_error($con));
                        if (mysqli_num_rows($result) >= 1) {
                        ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <caption class="table-title">Order History</caption>
                                <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Price</th>
                                        <th>Order Date & Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                        $sum+= $row["Price"];
                                    ?>
                                    <tr>
                                        <td><?php echo $row['Name']?></td>
                                        <td><?php echo $row['Price']?></td>
                                        <td><?php echo $row['order_date_time']?></td>                                    
                                    </tr>

                                    <?php
                                    }
                                    ?>
                                    <tr>
                                        <td>Total</td>
                                        <td>Rs <?php echo $sum ?></td>
                                        <td></td>
                                    </tr>

                                </tbody>
                                <?php
                            } else {
                                ?>
                                <p>No Order has been place! <a href="products.php">Start Shopping</a></p>
                            <?php }
                            ?>
                            <?php
                            ?>
                        </table>
                    </div>                    
                </div>
            </div>
        </div>
        <?php include("includes/footer.php"); ?>
    </body>
</html>