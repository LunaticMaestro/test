<?php

require("includes/common.php");

require("includes/common.php");
if (isset($_SESSION["server_error"])){
    header("location: error.php");
}
elseif (isset($_SESSION["email"])) {
    header("location: index.php");
}
  // Getting the values from the signup page using $_POST[] and cleaning the data submitted by the user.
  $name = $_POST['name'];
  $name = mysqli_real_escape_string($con, $name);

  $email = $_POST['e-mail'];
  $email = mysqli_real_escape_string($con, $email);

  $password = $_POST['password'];
  $password = mysqli_real_escape_string($con, $password);
  $password = MD5($password);

  $contact = $_POST['contact'];
  $contact = mysqli_real_escape_string($con, $contact);

  $city = $_POST['city'];
  $city = mysqli_real_escape_string($con, $city);

  $address = $_POST['address'];
  $address = mysqli_real_escape_string($con, $address);

  $regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
  $regex_num = "/^[0-9]{10}$/";

  $query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($con, $query)or die($mysqli_error($con));
  $num = mysqli_num_rows($result);
  
  if ($num != 0) {
    $_SESSION['signup_error'] = "Email already registered.";
    header('location: signup.php');
  } else if (!preg_match($regex_email, $email)) {
    $_SESSION['signup_error'] = "NOt a valid email id.";
    header('location: signup.php');
  } else if (!preg_match($regex_num, $contact)) {
    $_SESSION['signup_error'] = "Not a valid number.";
    header('location: signup.php');
  } else {
    
    $query = "INSERT INTO users(name, email, password, contact, city, address)VALUES('$name','$email','$password','$contact','$city','$address');";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $user_id = mysqli_insert_id($con);
    $_SESSION['email'] = $email;
    $_SESSION['user_id'] = $user_id;
    header('location: products.php');
  }
?>