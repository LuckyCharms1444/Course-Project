<?php
/**
 * Author: Louie Zhu
 * Date: Date: May 28, 2019
 * File: bookdetails.php
 *  Description: This script displays details of a particular book.
 */
$page_title = "Product Details";
require_once ('includes/header.php');
require_once 'includes/database.php';
//if book id cannot be retrieved, terminate the script.
if (!filter_has_var(INPUT_GET, "id")) {
    $error = "Your request cannot be processed since there was a problem retrieving
 book id.";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}
//retrieve book id from a query string variable.
$product_id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

//select statement
$sql = "SELECT *
 FROM $tblProducts, $tblCategory
 WHERE products.category_id = category.category_id
 AND product_id=$product_id";
//execute the query
$query = $conn->query($sql);
//Handle errors
if (!$query) {
    $error = "Selection failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}
$row = $query->fetch_assoc();
if (!$row) {
    $error = "Book not found";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}


$confirm = "";
if (isset($_GET['m'])) {
    if ($_GET['m'] == "insert") {
        $confirm = "You have successfully added the new book.";
    } else if ($_GET['m'] == "update") {
        $confirm = "Your book has been successfully updated.";
    }
}


?>

    <h2>Product Details</h2>
    <div class="bookdetails">
        <div class="bookstore-button">
            <div style="color: red; display: inline-block;"><?= $confirm ?></div>
        </div>
        <div class="cover">
            <!-- display book image -->
            <img src="<?= $row['image'] ?>">
        </div>
        <div class="label">
            <!-- display product attributes  -->
            <div>Product:</div>
            <div>Brand:</div>
            <div>Category:</div>
            <div>Price:</div>
            <div>Description</div>
        </div>
        <div class="content">
            <!-- display book details -->
            <div><?= $row['product_name'] ?></div>
            <div><?= $row['brand'] ?></div>
            <div><?= $row['category'] ?></div>
            <div><?= $row['price'] ?></div>
            <div><?= $row['description'] ?></div>
        </div>
    </div>
    <div class="bookstore-button">
        <input type="button" onclick="window.location.href='editProduct.php?id=<?= $product_id ?>'" value="Edit">
        <input type="button" value="Delete" onclick="window.location.href='deleteproduct.php?id=<?= $product_id ?>'">
        <input type="button" onclick="window.location.href='listproducts.php'" value="Cancel">
    </div>
