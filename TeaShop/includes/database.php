<?php
/**
 * Author: Jon Ross Richardson
 * Date: 6/12/2022
 * File: ${FILENAME}
 * Description:
 */

//define parameters
$host = "localhost";
$login = "phpuser"; //use different account if necessary
$password = "phpuser"; //use the correct password for the account
$database = "teastore-db"; //database name
$tblProducts = "products";
$tblCategory = "category";
$tblUser = "users";
$tblRole = "role";
//Connect to the mysql server
$conn = @new mysqli($host, $login, $password, $database);
if ($conn->connect_errno) {
    $error = $conn->connect_error;
    header("Location: error.php?m=$error");
    die();
};
