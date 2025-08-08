<?php
require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $_SESSION['error'] = "Invalid CSRF token.";
        header("Location: login.php");
        exit();
    }

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Email and password are required.";
        header("Location: login.php");
        exit();
    }

    $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            $_SESSION['user_id'] = $user["id"];
            $_SESSION['user_name'] = $user["name"];
            header("Location: welcome.php");
            exit();
        } else {
            $_SESSION['error'] = "Invalid password.";
        }
    } else {
        $_SESSION['error'] = "Invalid email.";
    }
    $stmt->close();
    $conn->close();

    header("Location: login.php");
    exit();
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: login.php");
    exit();
}
?>