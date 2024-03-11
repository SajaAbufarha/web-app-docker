<?php
// Include database connection
include 'db_connection.php';

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role']; // Get the selected role

// Check if username already exists
$sql_check_username = "SELECT * FROM users WHERE username='$username'";
$result_check_username = mysqli_query($conn, $sql_check_username);

if (mysqli_num_rows($result_check_username) > 0) {
    // Username already exists, display error message
    echo "<div style='background-color: #ffcccc; padding: 10px; border: 1px solid #ff0000; border-radius: 5px;'>Username already exists. Please choose a different username. <a href='register.php'>Back to Registration</a></div>";
} else {
    // Username does not exist, proceed with registration
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into users table
    $sql_insert_user = "INSERT INTO users (username, password, user_type) VALUES ('$username', '$hashed_password', '$role')";
    if (mysqli_query($conn, $sql_insert_user)) {
        // Registration successful
        echo "<div style='background-color: #ccffcc; padding: 10px; border: 1px solid #00ff00; border-radius: 5px;'>Registration successful! <a href='login.php'>Login</a></div>";

        // Insert additional data based on the selected role
        if ($role === 'therapist') {
            // You can insert therapist data here
            // For example:
            // $mode_of_therapy = $_POST['mode_of_therapy'];
            // $experience = $_POST['experience'];
            // $sql_insert_therapist = "INSERT INTO therapists (username, mode_of_therapy, experience) VALUES ('$username', '$mode_of_therapy', '$experience')";
            // mysqli_query($conn, $sql_insert_therapist);
        } elseif ($role === 'patient') {
            // You can insert patient data here
            // For example:
            // $preferred_mode_of_therapy = $_POST['preferred_mode_of_therapy'];
            // $primary_concern = $_POST['primary_concern'];
            // $sql_insert_patient = "INSERT INTO patients (username, preferred_mode_of_therapy, primary_concern) VALUES ('$username', '$preferred_mode_of_therapy', '$primary_concern')";
            // mysqli_query($conn, $sql_insert_patient);
        }

    } else {
        // Error inserting user into database
        echo "<div style='background-color: #ffcccc; padding: 10px; border: 1px solid #ff0000; border-radius: 5px;'>Error: Registration failed. Please try again later. <a href='register.php'>Back to Registration</a></div>";
    }
}

// Close connection
mysqli_close($conn);
?>
