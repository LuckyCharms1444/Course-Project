<?php
$page_title = "Product Search results";

require_once ('includes/header.php');
require_once 'includes/database.php';

//retrieve search term
if(!filter_has_var(INPUT_GET, "q")) {
    $error = "There was no search terms found.";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}
$term = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING);
//explode the search terms into an array
$terms = explode(" ", $term);
//select statement using pattern search. Multiple terms are concatnated in the loop.
$sql = "SELECT product_name, brand, price, category
 FROM $tblProducts, $tblCategory
 WHERE $tblProducts.category_id = $tblCategory.category_id AND ";
foreach ($terms as $t) {
    $sql .= "title LIKE '%$t%' AND ";
}
$sql = rtrim($sql, "AND "); //remove the extra "AND " at the end of the string
//execute the query
$query = $conn->query($sql);
//Handle selection errors
if (!$query) {
    $error = "Selection failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}
?>
    <h2>Product search results for: '<?= $term ?>'</h2>
<?php
if ($query->num_rows == 0) {
    echo "Your search '$term' did not match any books in our inventory";
    exit;
}
?>

    <div class="booklist">
        <div class="row header">
            <div class="col1">Product</div>
            <div class="col2">Brand</div>
            <div class="col3">Category</div>
            <div class="col4">Price</div>
        </div>
        <!-- insert a row into the table for each book -->
        <?php while ($row = $query->fetch_assoc()) { ?>
            <div class="row">
                <div class="col1"><?= $row['product_name'] ?></div>
                <div class="col2"><?= $row['brand'] ?></div>
                <div class="col3"><?= $row['category'] ?></div>
                <div class="col4"><?= $row['price'] ?></div>
            </div>
        <?php } ?>
    </div>