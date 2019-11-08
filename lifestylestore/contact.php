<?php
require("includes/common.php");
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Contact | Life Style Store</title>

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
                    <div class="col-md-7 col-md-offset-2">
                        <h2>Live Support</h2>
                        <blockquote class="blockquote">Shhh... the <u>secret</u> of successful company is cosumer's complaint hunters
                            not the sturdy CEO.</blockquote>
                        <p style="text-align: justify">
                            Our employees are available 24x7 in your assisstance. Feel free to make contact with 
                            us from anywhere in the world. To underestand your problems better our employees are 
                            profficient in international languages (<i>English, French, German</i>) and
                            indigenous languages (<i>Marathi, Hindi, Bangla, Telgu</i>). Kindly mention your comfortable
                            medium of communication to your assisstance personnel.
                            Our consumer forum will respond to you with 1hr if contacted via mail.                         
                        </p>
                        <?php if(isset($_SESSION["ref_id"])){
                        ?>
                        <p class="notification-green">Your query has been recorded, we will get back to you through 
                            mail. Note <strong>reference id (#<?php echo ($_SESSION["ref_id"]); ?>)</strong>
                        of your query for future references.
                        </p>
                        <?php  
                        unset($_SESSION["ref_id"]);
                        }                        
                        ?>
                    </div>
                    <div class="col-sm-2 thumbnail no-border visible-md visible-lg">
                        <img src="img/contact.png" alt="vector cartoon of helpdesk person" class="img-responsive">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-2">
                        <h2>Contact Us</h2>
                        <form action="contact_script.php" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Name" name="name" maxlength="256" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" name="e-mail" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Briefly describe your query(Max. 1000 chracters)" name="query" maxlength="1000" rows="5" required></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button><br><br>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <h2>Company Information</h2>
                        <p>Gurgaon, India - 122018 <br><br>
                           phone : +91 8448444853 <br><br>
                           email : trainings@internshala.com
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'includes/footer.php'; ?>
    </body>
</html>
