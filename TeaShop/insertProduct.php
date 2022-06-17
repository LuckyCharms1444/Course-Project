
<?php


//Do not proceed if there are no post data
if (!$_POST) {
    $error = "Direct access to this script is not allowed.";
    header("Location: error.php?m=$error");
    die();
}

//if the script did not received post data, display an error message and then terminite the script immediately
if (!filter_has_var(INPUT_POST, 'product_name') ||
    !filter_has_var(INPUT_POST, 'brand') ||
    !filter_has_var(INPUT_POST, 'category') ||
    !filter_has_var(INPUT_POST, 'price') ||
    !filter_has_var(INPUT_POST, 'image') ||
    !filter_has_var(INPUT_POST, 'description')) {

    echo "There were problems retrieving book details. New book cannot be added.";
    header("Location: error.php?m=$error");
    die();
}

//include code from database.php file
require_once('includes/database.php');


$product_name = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'product_name', FILTER_SANITIZE_STRING)));
$brand = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_STRING)));
$category = $conn->real_escape_string(filter_input(INPUT_POST, 'category', FILTER_DEFAULT));
$price = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING)));
$image = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));

//add your code below
//Define MySQL insert statement
$sql = "INSERT INTO $tblProducts VALUES (NULL, '$product_name', '$brand', '$price', '$category', '$image', '$description')";
//execute the query
$query = @$conn->query($sql);
//Handle potential errors
if (!$query) {
    $error = "Insertion failed: $conn->error.";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}
//determine the book id
$id = $conn->insert_id;
//close the database connection
$conn->close();
header("Location: productdetails.php?product_id=$product_id&m=insert");
