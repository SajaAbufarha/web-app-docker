<?php
// Start session
session_start();



// Include database connection
include 'db_connection.php';

// Function to delete a user
function deleteUser($conn, $id) {
    $sql_delete = "DELETE FROM users WHERE id=$id";
    if (mysqli_query($conn, $sql_delete)) {
        return true;
    } else {
        return false;
    }
}

// Check if delete request is sent
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    if (deleteUser($conn, $id)) {
        echo "<script>alert('User deleted successfully!');</script>";
    } else {
        echo "<script>alert('Error deleting user.');</script>";
    }
}

// Retrieve patients from the database
$sql_patients = "SELECT * FROM users WHERE user_type='patient'";
$result_patients = mysqli_query($conn, $sql_patients);

// Check for errors
if (!$result_patients) {
    echo "Error: " . mysqli_error($conn);
    exit();
}

// HTML for therapist panel
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Therapist Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        .therapist-panel {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .back-button {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="therapist-panel">
        <h2>Patients List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Preferred Mode of Therapy</th>
                <th>Primary Concern</th>
                <th>Action</th>
            </tr>
            <?php
            // Display patients in a table with delete option
            while ($row = mysqli_fetch_assoc($result_patients)) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['username']."</td>";
                echo "<td>".$row['preferred_mode_of_therapy']."</td>";
                echo "<td>".$row['primary_concern']."</td>";
                // Remove the action button
                echo "<td></td>";
                echo "</tr>";
            }
            ?>
        </table>

        <div class="back-button">
            <a href="index.php">Back</a>
        </div>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
