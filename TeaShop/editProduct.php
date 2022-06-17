<?php
/**
 * Author: Louie Zhu
 * Date: May 28, 2019
 * File: bookdetails.php
 *  Description: This script displays details of a particular book in a form.
 */
$page_title = "Edit Book Details";
require_once ('includes/header.php');
require_once('includes/database.php');

//if book id cannot retrieved, terminate the script.
if (!filter_has_var(INPUT_GET, "id")) {
    $error = "Your request cannot be processed since there was a problem retrieving book id.";
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

    <h2>Edit Book Details</h2>
    <form action="updateProduct.php" method="post">
        <div class="bookdetails">
            <div class="label">
                <!-- display book attributes  -->
                <div>Product:</div>
                <div>Brand:</div>
                <div>Category</div>
                <div>Price:</div>
                <div>Image:</div>
                <div>Description</div>
            </div>

            <div class="content">
                <!-- display book details -->
                <div><input name="Product" size="80" value="<?php echo $row['product_name'] ?>" required></div>
                <div><input name="Brand" value="<?php echo $row['brand'] ?>" required></div>
                <div><select name="category">
                        <option value="1" <?= $row['category'] == 'Black' ? 'selected' : ''; ?>>Black</option>
                        <option value="2" <?= $row['category'] == 'Green' ? 'selected' : ''; ?>>Green</option>
                        <option value="3" <?= $row['category'] == 'White' ? 'selected' : ''; ?>>White</option>
                        <option value="4" <?= $row['category'] == 'Oolong' ? 'selected' : ''; ?>>Oolong</option>
                        <option value="4" <?= $row['category'] == 'Herbal' ? 'selected' : ''; ?>>Herbal</option>
                    </select>
                </div>
                <div><input name="price" type="number" step="0.01" value="<?php echo $row['price'] ?>" required></div>
                <div><input name="image" size="100" value="<?php echo $row['image'] ?>" required></div>
                <div><textarea name="description" rows="6" cols="65"><?php echo $row['description'] ?></textarea></div>
            </div>
        </div>
        <div class="bookstore-button">
            <input type="hidden" name="id" value="<?php echo $product_id ?>" />
            <input type="submit" value=" Update " />
            <input type="button" value="Cancel" onclick="window.location.href = 'productdetails.php?id=<?= $id ?>'" />
        </div>
    </form>
<?php
// close the connection.
$conn->close();
