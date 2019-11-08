<?php
    $con = @mysqli_connect("localhost", "root", "", "lifestylestore");
    if ($con == FALSE){
        $_SESSION["server_error"] = TRUE;
    }
    else {
        session_start();
        unset($_SESSION['server_error']);
    }
?>        
    
