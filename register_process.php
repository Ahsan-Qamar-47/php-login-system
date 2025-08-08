<?php
require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $_SESSION['error'] = "Invalid CSRF token.";
        header("Location: register.php");
        exit();
    }

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validation
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        $_SESSION['error'] = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email address.";
    } elseif (strlen($password) < 8) {
        $_SESSION['error'] = "Password must be at least 8 characters long.";
    } elseif ($password !== $confirm_password) {
        $_SESSION['error'] = "Passwords do not match.";
    } else {
        // Check if email exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        if (!$stmt) {
            $_SESSION['error'] = "Database error: " . $conn->error;
            header("Location: register.php");
            exit();
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $_SESSION['error'] = "Email already exists.";
        } else {
            // Insert user
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            if (!$stmt) {
                $_SESSION['error'] = "Database error: " . $conn->error;
                header("Location: register.php");
                exit();
            }
            $stmt->bind_param("sss", $name, $email, $hashed_password);

            if ($stmt->execute()) {
                $_SESSION['success'] = "Account created successfully! Please log in.";
                header("Location: register.php");
                exit();
            } else {
                $_SESSION['error'] = "Registration failed: " . $stmt->error;
            }
        }
        $stmt->close();
    }
    $conn->close();
    header("Location: register.php");
    exit();
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: register.php");
    exit();
}
?>