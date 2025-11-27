<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main Login Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            position: relative;
            overflow: hidden;
        }

        .background-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .background-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s ease;
        }

        .background-container:hover img {
            transform: scale(1.05);
        }

        .background-container::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.2); /* subtle dark layer for better contrast */
        }

        .overlay {
            position: relative;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.4); /* lighter overlay */
            backdrop-filter: blur(2px); /* reduced blur */
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .split-container {
            display: flex;
            width: 100%;
            padding: 40px;
            justify-content: space-between; /* Added space between the user and admin sections */
        }

        #admin {
            width: 10%;  /* Adjusted width */
            padding: 20px;
            border-radius: 10px;
        }

        #user {
            width: 10%;  /* Adjusted width */
            padding: 20px;
            border-radius: 10px;
        }

        .split {
            flex: 1;
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            border-right: 0px solid #ccc;
        }

        .split:last-child {
            border-right: none;
        }

        h2 {
            font-weight: 600;
            font-size: 28px;
            margin: 20px 0 10px;
            color: #222;
        }

        .btn {
            padding: 12px 24px;
            font-size: 16px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .link-group {
            margin-top: 30px;
            font-size: 14px;
        }

        .link-group a {
            margin: 0 5px;
            text-decoration: none;
            font-weight: bold;
        }

        .link-sales {
            color: #008000;
        }
    </style>
</head>
<body>

    <!-- Background Image -->
    <div class="background-container">
        <img src="photos/auction.jpeg" alt="Auction Background">
    </div>

    <!-- Foreground Content Overlay -->
    <div class="overlay">
        <div class="split-container">
            <!-- User Login Section -->
            <div class="split" id="user">
                <h2>For <em>Users</em></h2>
                <button class="btn" onclick="window.location.href='login.php'">Login</button>
                <div class="link-group">
                    Don’t have an account? 
                    <a href="register.php" class="link-sales">Register</a>
                </div>
            </div>

            <!-- Admin Login Section -->
            <div class="split" id="admin">
                <h2>For <em>Admin</em></h2>
                <button class="btn" style="background-color: #f5f5f5; color: black;" onclick="window.location.href='admin_login.php'">Login</button>
            </div>
        </div>
    </div>

</body>
</html>

<?php
// Include footer (you may have a footer.php file for common footer structure)
include_once("footer.php"); 
?>
