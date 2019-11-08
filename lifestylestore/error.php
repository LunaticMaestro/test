<?php
require("includes/common.php");
// Redirects the user to products page if logged in.
if (isset($_SESSION['email'])) {
    header('location: products.php');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Service Unavailable | Life Style Store</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php include 'includes/header.php'; ?>
        <div id="content">
            <div class="container-fluid decor_bg">
                <div class="row">
                    <div class="col-sm-2 col-sm-offset-5 thumbnail no-border">
                        <img src="img/contact.png" alt="vector cartoon of helpdesk person"
                             class="img-fluid">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h1>Server Error</h1>
                        <p>We deeply regret for unavailable services, seems like our server needs maintenance.
                           You can still reach out to us through mail and phone.
                        </p>
                        <p>
                            phone: +91 8448444853 <br>
                            email: trainings@internshala.com
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'includes/footer.php'; ?>
    </body>
</html>
