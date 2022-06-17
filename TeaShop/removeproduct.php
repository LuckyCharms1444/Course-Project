<?php

$page_title = "Delete Product";
require_once 'includes/header.php';
require_once('includes/database.php');

//if book id cannot retrieved, terminate the script.
if (!filter_has_var(INPUT_GET, 'product_id')) {
    $error = "There was a problem retrieving book id.";
    header("Location: error.php?m=$error");
    die();
}

//retrieve book id from a query string variable.
$product_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//add your code here
//Define MySQL delete statement
$sql = "DELETE FROM $tblProduct WHERE product_id=$product_id";

//execute the query and handle errors
$query = @$conn->query($sql);
if (!$query) {
    $error = "Deletion failed: $conn->error.";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}
echo "<p>The book has been successfully deleted from the database.</p>";
$conn->close();