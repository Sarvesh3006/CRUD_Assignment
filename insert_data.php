<?php
include 'dbcon.php';
$name = $_POST['name'];
$item = $_POST['item'];
$quantity = $_POST['quantity'];
$total_amount = $_POST['total_amount'];
$include_gst = $_POST['include_gst'];
$payable_amount = $_POST['payable_amount'];

if(empty($name)) {
    header('location:index.php?message=You need to fill in the name!');
    exit();
} 
else {
    // Corrected SQL query
    $query = "INSERT INTO `customers` (`name`, `item`, `quantity`, `total_amount`, `include_gst`, `payable_amount`) VALUES ('$name', '$item','$quantity', '$total_amount', '$include_gst','$payable_amount')";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        header('location:index.php?insert_msg=Your data has been added successfully');
    }
}
?>