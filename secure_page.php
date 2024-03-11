<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .secure-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 600px;
            width: 100%;
            text-align: center;
            transition: transform 0.3s ease;
        }
        .secure-container:hover {
            transform: translateY(-5px);
        }
        .secure-container h2 {
            margin-bottom: 20px;
            color: #333333;
        }
        .secure-container p {
            margin-bottom: 20px;
            color: #666666;
        }
        .secure-container .logout-link a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .secure-container .logout-link a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="secure-container">
        <h2>Welcome to the Secure Page</h2>
        <p>You have successfully logged in!</p>
        <div class="logout-link">
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
