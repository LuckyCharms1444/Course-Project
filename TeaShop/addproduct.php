<?php

$page_title = "Tea Store Add Product";
require_once 'includes/header.php';
?>

    <h2>Add New Product</h2>
    <form action="insertbook.php" method="post">
        <table cellspacing="0" cellpadding="3" style="border: 1px solid silver; padding:5px; margin-bottom: 10px">
            <tr>
                <td style="text-align: right; width: 100px">Product Name: </td>
                <td><input name="title" type="text" size="100" required /></td>
            </tr>
            <tr>
                <td style="text-align: right">Brand: </td>
                <td><input name="author" type="text" size="40" required /></td>
            </tr>
            <tr>
                <td style="text-align: right">Category:</td>
                <td>
                    <select name="category">
                        <option value="1">Black</option>
                        <option value="2">Green</option>
                        <option value="3">Herbal</option>
                        <option value="4">Oolong</option>
                        <option value="5">Herbal</option>

                    </select>
                </td>
            </tr>
            <tr>
                <td style="text-align: right">Price: </td>
                <td><input name="price" type="number" step="0.01" required /></td>
            </tr>
            <tr>
                <td style="text-align: right">Image: </td>
                <td><input name="image" type="text" size="100" required /></td>
            </tr>
            <tr>
                <td style="text-align: right; vertical-align: top">Description:</td>
                <td><textarea name="description" rows="6" cols="65"></textarea></td>
            </tr>
        </table>
        <div class="bookstore-button">
            <input type="submit" value="Add Book" onclick="window.location.href='productdetails.php'" />
            <input type="button" value="Cancel" onclick="window.location.href='productdetails.php'" />
        </div>
    </form>

<?php