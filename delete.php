<?php

$conn = mysqli_connect("localhost", "root", "", "wtsem6");

if (isset($_GET["delete"])) {
 $query = "DELETE FROM addproduct WHERE id=" . $_GET['id'];
 if (mysqli_query($conn, $query)) {
 header('Location: product.php');
 die();
 } else {
 echo "Error: " . $query . "<br>" . mysqli_error($conn);
 }
}
?>