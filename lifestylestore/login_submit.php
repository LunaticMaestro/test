<?php

require("includes/common.php");
if (isset($_SESSION["server_error"])){
    header("location: error.php");
}
elseif (!isset($_SESSION["email"])) {
    header("location: index.php");
}

$email = $_POST['e-mail'];
$email = mysqli_real_escape_string($con, $email);
$password = $_POST['password'];
$password = mysqli_real_escape_string($con, $password);
$password = MD5($password);

// Search for email
$query = "SELECT id, email, password FROM users WHERE email='$email';";
$result = mysqli_query($con, $query)or die($mysqli_error($con));

// If the email and password are not present in the database, the mysqli_num_rows returns 0, it is assigned to $num.
if (mysqli_num_rows($result)>0) {
    // Search for email
    $row = mysqli_fetch_array($result);
    if ($row["password"] == $password){
        $_SESSION['email'] = $row['email'];
        $_SESSION['user_id'] = $row['id'];
        header('location: products.php');
    }
    else {
        $_SESSION["login_error"]="Incorrect Password";  
    }
} else {  
    $_SESSION["login_error"]="Unregistered email :(";  
}
header("location: login.php");
?>