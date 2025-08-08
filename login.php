<?php
require_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body,
        html {
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

        .form-container h2 {
            margin-bottom: 0.5rem;
            color: #2b2b2b;
        }

        .form-container p {
            margin-bottom: 1.5rem;
            color: #777;
            font-size: 0.95rem;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 300px;
            padding: 12px;
            margin: 0.4rem 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            font-size: 1rem;
            transition: border 0.3s;
        }

        input:focus {
            border-color: #007bff;
        }

        button {
            width: 150px;
            padding: 12px;
            background: linear-gradient(to right, #667eea, #00c6ff);
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 1rem;
            margin-top: 1rem;
            cursor: pointer;
            transition: opacity 0.3s ease-in-out;
        }

        button:hover {
            opacity: 0.9;
        }

        .switch-link {
            margin-top: 1rem;
            font-size: 0.9rem;
        }

        .switch-link a {
            color: #007bff;
            text-decoration: none;
        }

        .switch-link a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .success {
            color: green;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body class="form-body">
    <div class="form-container">
        <h2>Login</h2>
        <p>Sign in to get started with your account</p>
        <?php if (isset($_SESSION['error'])): ?>
            <p class="error" style="            color: red;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            font-weight: 600;"><?php echo htmlspecialchars($_SESSION['error']);
                                    unset($_SESSION['error']); ?></p>
        <?php endif; ?>
        <?php if (!empty($_SESSION['success'])): ?>
            <p class="success" style="color: green;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            font-weight: 600;">
                <?php echo htmlspecialchars($_SESSION['success']); ?>
            </p>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
        <form action="login_process.php" method="post">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p class="switch-link">Don't have an account? <a href="register.php">Sign up</a></p>
    </div>
</body>

</html>