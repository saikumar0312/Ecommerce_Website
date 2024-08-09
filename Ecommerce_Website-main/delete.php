<?php
include 'connect.php';

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    $stmt = $conn->prepare("DELETE FROM products WHERE id=?");  // Prepared statement
    $stmt->bind_param("i", $delete_id);                         

    if ($stmt->execute()) {                                      // Execute query
        header('location:view_product.php');                  // Redirect before any output
    } else {
        echo "Error deleting product.";                          // Error message
        header('location:view_product.php');                     // Redirect even on error
    }

    $stmt->close();                                             // Close statement
}
?>
