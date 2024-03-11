<?php
// Start session
session_start();

// Include database connection
include 'db_connection.php';

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// Retrieve user from database
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
        // Check user type to determine redirection
        $user_type = $row['user_type'];
        switch ($user_type) {
            case 'admin':
                // Set session variable for administrator
                $_SESSION['username'] = $username;
                // Redirect to admin page
                header("Location: admin.php");
                exit();
                break;
            case 'therapist':
                // Set session variable for therapist
                $_SESSION['username'] = $username;
                // Redirect to therapist page
                header("Location: therapist.php");
                exit();
                break;
            case 'patient':
                // Set session variable for patient
                $_SESSION['username'] = $username;
                // Redirect to patient page
                header("Location: patient.php");
                exit();
                break;
            default:
                // Invalid user type, redirect to login page
                header("Location: login.php");
                exit();
        }
    } else {
        // Incorrect password, show error message
        $_SESSION['login_error'] = "Incorrect password. <a href='login.php'>Try again</a>";
        header("Location: login.php");
        exit();
    }
} else {
    // User not found, show error message
    $_SESSION['login_error'] = "User not found. <a href='register.php'>Register</a>";
    header("Location: login.php");
    exit();
}

// Close connection
mysqli_close($conn);
?>
