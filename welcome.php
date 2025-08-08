<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$user_name = htmlspecialchars($_SESSION['user_name']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to AppFlow</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #eef1f6, #d8eefe);
        }
        .form-body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: white;
            padding: 30px;
            width: 350px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            margin-bottom: 0.5rem;
            color: #2b2b2b;
        }
        p {
            margin-bottom: 1.5rem;
            color: #777;
            font-size: 0.95rem;
        }
        .highlight {
            color: #007bff;
            font-weight: bold;
            display: inline-block;
        }
        .button {
            display: inline-block;
            padding: 12px 20px;
            background: linear-gradient(to right, #667eea, #00c6ff);
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 1rem;
            margin: 0.5rem;
            text-decoration: none;
            cursor: pointer;
            transition: opacity 0.3s ease-in-out;
        }
        .button:hover {
            opacity: 0.9;
        }
        .logout {
            background: linear-gradient(to right, #dc3545, #ff6b6b);
        }
    </style>
</head>
<body class="form-body">
    <div class="form-container">
        <h1>Welcome, <span class="highlight"><?php echo $user_name; ?>!</span></h1>
        <p>You're now part of AppFlow. Explore our collaboration tools and start building.</p>
        <p>Ready to dive in? Check out your dashboard or connect with your team!</p>
        <a href="logout.php" class="button logout">Logout</a>
    </div>
</body>
</html>