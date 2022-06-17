<?php
/**
 * Author: Louie Zhu
 * Date: Date: May 28, 2019
 * File: listbooks.php
 * Description: this script lists all books from the books table.
 *
 */
$page_title = "Books in Our Store";
require 'includes/header.php';
require_once 'includes/database.php';
//SELECT statement to retrieve book id, title, author, price, and category id from
//the books table.
$sql = "SELECT product_id, product_name, brand,price, category 
 FROM $tblProducts, $tblCategory
 WHERE $tblProducts.category_id = $tblCategory.category_id";
//execute the query
$query = $conn->query($sql);
//Handle errors
if (!$query) {
    $error = "Selection failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

?>

    <h2>Books in Our Store</h2>
    <div class="booklist">
        <div class="row header">
            <div class="col1">Product</div>
            <div class="col2">Brand</div>
            <div class="col3">Category</div>
            <div class="col4">Price</div>
        </div>
        <!-- add PHP code here to list all books from the "books" table -->
        <?php while ($row = $query->fetch_assoc()) { ?>
            <div class="row">
                <div class="col1"> <a href="productdetails.php?id=<?= $row['product_id'] ?>"><?= $row['product_name'] ?></a></div>
                <div class="col2"><?= $row['brand'] ?></div>
                <div class="col3"><?= $row['category'] ?></div>
                <div class="col4"><?= $row['price'] ?></div>
            </div>
        <?php } ?>
    </div>

<?php
