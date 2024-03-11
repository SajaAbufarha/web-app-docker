<?php
// Start session
session_start();

// Check if user is logged in as admin
if (!isset($_SESSION['username']) || $_SESSION['username'] != 'admin') {
    // Redirect to login page if not logged in as admin
    header("Location: login.php");
    exit();
}

// Include database connection
include 'db_connection.php';

// Check if user ID is provided via GET parameter
if (isset($_GET['id'])) {
    // Get user ID from GET parameter
    $id = $_GET['id'];

    // Delete user from database
    $sql = "DELETE FROM users WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        // User deleted successfully
        header("Location: admin.php"); // Redirect back to admin page
        exit();
    } else {
        // Error deleting user
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    // User ID not provided
    echo "User ID not provided.";
}

// Close connection
mysqli_close($conn);
?>
