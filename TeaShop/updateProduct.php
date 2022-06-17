<?php


//Do not proceed if there are no post data
if (!$_POST) {
    $error = "Direct access to this script is not allowed.";
    header("Location: error.php?m=$error");
    die();
}

//retrieve book id. Do not proceed if id was not found.
if (!filter_has_var(INPUT_POST, 'id')) {
    $error = "There was a problem retrieving book id.";
    header("Location: error.php?m=$error");
    die();
}

$product_id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

//include code from the database.php file
require_once('includes/database.php');

/* Proceed since id was successfully retrieved.
 * Retrieve book details.
 * For security purpose, call the built-in function real_escape_string to
 * escape special characters in a string for use in SQL statement.
 */
$product_name = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'product_name', FILTER_SANITIZE_STRING)));
$brand = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_STRING)));
$category_id = $conn->real_escape_string(filter_input(INPUT_POST, 'category', FILTER_DEFAULT));
$price = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING)));
$image = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));

//add your code below
//Define MySQL update statement
$sql = "UPDATE $tblProducts SET product_name='$product_name',  brand='$brand',
 price='$price',image='$image', description='$description', category_id='$category_id'
 WHERE product_id='$product_id'";

//execute the query
$query = @$conn->query($sql);
//Handle potential errors
if (!$query) {
    $error = "Update failed: $conn->error.";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}
//close the database connection
$conn->close();
header("Location: productdetails.php?product_id=$product_id&m=update");