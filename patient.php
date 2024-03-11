<?php
// Start session
session_start();

// Include database connection
include 'db_connection.php';

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Retrieve user data from the database
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);

// Check if user exists
if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    // Redirect to login page if user not found
    header("Location: login.php");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $newUsername = $_POST['username'];
    $preferredMode = $_POST['preferred_mode_of_therapy'];
    $primaryConcern = $_POST['primary_concern'];

    // Update user data in the database
    $updateSql = "UPDATE users SET username='$newUsername', preferred_mode_of_therapy='$preferredMode', primary_concern='$primaryConcern' WHERE username='$username'";
    if (mysqli_query($conn, $updateSql)) {
        // Update session with new username
        $_SESSION['username'] = $newUsername;
        // Redirect to dashboard with success message
        header("Location: patient.php?message=success");
        exit();
    } else {
        // Redirect to dashboard with error message
        header("Location: patient.php?message=error");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        .dashboard {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #dddddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }
        .success {
            background-color: #ccffcc;
            border: 1px solid #00ff00;
            color: #009900;
        }
        .error {
            background-color: #ffcccc;
            border: 1px solid #ff0000;
            color: #ff0000;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h2>Welcome, <?php echo $user['username']; ?>!</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required>
            <label for="preferred_mode_of_therapy">Preferred Mode of Therapy:</label>
            <select id="preferred_mode_of_therapy" name="preferred_mode_of_therapy" required>
                <option value="In-person" <?php if ($user['preferred_mode_of_therapy'] == 'In-person') echo 'selected'; ?>>In-person</option>
                <option value="Online" <?php if ($user['preferred_mode_of_therapy'] == 'Online') echo 'selected'; ?>>Online</option>
                <option value="Text-based" <?php if ($user['preferred_mode_of_therapy'] == 'Text-based') echo 'selected'; ?>>Text-based</option>
            </select>
            <label for="primary_concern">Primary Concern:</label>
            <input type="text" id="primary_concern" name="primary_concern" value="<?php echo $user['primary_concern']; ?>" required>
            <button type="submit">Update Profile</button>
        </form>
        <?php
        // Display success/error message if set
        if (isset($_GET['message'])) {
            if ($_GET['message'] == 'success') {
                echo '<div class="message success">Profile updated successfully!</div>';
            } elseif ($_GET['message'] == 'error') {
                echo '<div class="message error">Error updating profile. Please try again later.</div>';
            }
        }
        ?>
        <div class="back-button">
            <a href="index.php">Back</a>
        </div>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
