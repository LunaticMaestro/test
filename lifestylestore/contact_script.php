<?php
require("includes/common.php");
if (isset($_SESSION["server_error"])){
    header("location: error.php");
}
$name = $_POST['name'];
$name = mysqli_real_escape_string($con, $name);
$email = $_POST['e-mail'];
$email = mysqli_real_escape_string($con, $email);
$query = $_POST['query'];
$query = mysqli_real_escape_string($con, $query);

// Insert into database
$insert_query = "INSERT INTO consumer_forum (name, email, query) VALUES ('$name', '$email', '$query');";
$insert_query_result = mysqli_query($con, $insert_query)or die($mysqli_error($con));

// Retrive id of above insert statement
$select_query = "SELECT ref_id FROM consumer_forum 
WHERE email = '$email'
ORDER BY query_date_time DESC
LIMIT 1";
$select_query_result = mysqli_query($con, $select_query)or die(mysqli_error($con));
$row = mysqli_fetch_array($select_query_result);
$_SESSION["ref_id"] = $row["ref_id"];

header("location: contact.php");
?>