<?php
$page_title = "Confirm Book Deletion";
require_once('includes/header.php');
require_once('includes/database.php');

//if book id cannot retrieved, terminate the script.
if (!filter_has_var(INPUT_GET, 'product_id')) {
    $error = "There was a problem retrieving book id.";
    header("Location: error.php?m=$error");
    die();
}

//retrieve book id from a query string variable.
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//MySQL SELECT statement
$sql = "SELECT * FROM $tblProducts, $tblCategory WHERE products.category_id = category.category_id AND id=$id";

//execute the query
$query = @$conn->query($sql);

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
?>

    <h2>Product Details</h2>
    <div class="bookdetails">
        <div class="cover">
            <!-- display book image -->
            <img src="<?= $row['image'] ?>">
        </div>
        <div class="label">
            <!-- display book attributes  -->
            <div>Product:</div>
            <div>Brand:</div>
            <div>Category</div>
            <div>Price:</div>
            <div>Description</div>
        </div>

        <div class="content">
            <!-- display book details -->
            <div><?= $row['Product'] ?></div>
            <div><?= $row['Brand'] ?></div>
            <div><?= $row['category'] ?></div>
            <div>$<?= $row['price'] ?></div>
            <div><?= $row['description'] ?></div>
        </div>
    </div>
    <div class="bookstore-button">
        <input type="button" value="Delete"
               onclick="window.location.href = 'removeproduct.php?product_id=<?= $product_id ?>'">
        <input type="button" value="Cancel"
               onclick="window.location.href = 'productdetails.php?product_id=<?= $product_id ?>'">
        <div style="color: red; display: inline-block;">Are you sure you want to delete the book?</div>
    </div>

