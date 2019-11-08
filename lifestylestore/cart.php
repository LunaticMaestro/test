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
        <title>Cart | Life Style Store</title>
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
                        $id = "";
                        $user_id = $_SESSION['user_id'];
                        $query = "SELECT up.item_id as Item_id, p.name as Name, p.price as Price FROM users_items up
                                    JOIN items p ON p.id= up.item_id
                                    JOIN users u ON u.id = up.user_id
                                    WHERE u.id = '$user_id' AND up.status = 'Added to cart';";
                        $result = mysqli_query($con, $query)or die(mysqli_error($con));
                        if (mysqli_num_rows($result) >= 1) {
                        ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Item Number</th>
                                        <th>Item Name</th>
                                        <th>Item Price</th>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($result)) {
                                        $sum+= $row["Price"];
                                        $id .= $row["Item_id"] . ", ";
                                    ?>
                                    <tr>
                                        <td><?php echo $i?></td>
                                        <td><?php echo $row['Name']?></td>
                                        <td><?php echo $row['Price']?></td> 
                                        <td><a href='cart-remove.php?id=<?php echo $row['Item_id'] ?>' class='btn btn-danger btn-sm'> Remove</a></td>
                                    </tr>

                                    <?php
                                    $i = $i+1;
                                    }
                                    ?>
                                    <tr>
                                        <td><a href='products.php' class='btn btn-warning btn-sm' title="Continue Shopping"> Go Back</a></td>
                                        <td>Total</td>
                                        <td>Rs <?php echo $sum ?></td>
                                        <td><a href='success.php?itemsid=<?php echo $id; $_SESSION['cart']= True; ?>' class='btn btn-primary'> Confirm Order</a></td>
                                    </tr>

                                </tbody>
                                <?php
                            } else {
                                ?>
                                <p>Add items to cart first! <br>
                                Choose your fav <a href="products.php">products</a>.</p>
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