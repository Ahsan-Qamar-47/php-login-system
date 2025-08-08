<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']);
$user_name = $is_logged_in ? htmlspecialchars($_SESSION['user_name']) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AppFlow - Digital Collaboration</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #eef1f6, #d8eefe);
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        .btn {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
            transition: opacity 0.3s;
        }
        .btn-primary {
            background: linear-gradient(to right, #667eea, #00c6ff);
            color: white;
        }
        .btn-primary:hover {
            opacity: 0.9;
        }
        .btn-outline {
            border: 1px solid #ccc;
            color: #333;
        }
        .btn-outline:hover {
            background-color: #e0e7ff;
        }
        .header {
            background-color: white;
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2b2b2b;
        }
        .nav-buttons {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        .hero {
            text-align: center;
            padding: 50px 15px;
        }
        .hero h1 {
            font-size: 2.5rem;
            color: #2b2b2b;
            margin-bottom: 20px;
        }
        .hero p {
            font-size: 1.2rem;
            color: #777;
            margin-bottom: 30px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }
        @media (min-width: 768px) {
            .hero h1 {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">AppFlow</div>
                <div class="nav-buttons">
                    <?php if ($is_logged_in): ?>
                        <span>Welcome, <?php echo $user_name; ?>!</span>
                        <a href="welcome.php" class="btn btn-outline">Dashboard</a>
                        <a href="logout.php" class="btn btn-primary">Logout</a>
                    <?php else: ?>
                        <a href="login.php" class="btn btn-outline">Sign In</a>
                        <a href="register.php" class="btn btn-primary">Get Started</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
    <section class="hero">
        <div class="container">
            <h1>Welcome to AppFlow</h1>
            <p>Seamless collaboration tools for modern teams. Join thousands of users today.</p>
            <div class="hero-buttons">
                <a href="register.php" class="btn btn-primary">Start Now</a>
                <a href="login.php" class="btn btn-outline">Sign In</a>
            </div>
        </div>
    </section>
</body>
</html>