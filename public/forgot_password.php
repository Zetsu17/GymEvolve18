<?php
include('includes/db.php');
include('includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    sendResetLink($email, $conn);
    $message = "Password reset link has been sent to your email.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('assets/images/forget-password.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }
        .container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .logo {
            max-width: 120px;
            margin: 0 auto 20px;
            display: block;
        }
        h2 {
            font-size: 24px;
            color: #4a4a4a;
            margin-bottom: 20px;
        }
        p {
            font-size: 14px;
            color: #666;
            margin: 10px 0;
        }
        input[type="email"] {
            width: 100%;
            padding: 12px;
            margin: 15px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            box-sizing: border-box;
            outline: none;
        }
        input[type="email"]:focus {
            border-color: #2575fc;
            box-shadow: 0 0 8px rgba(37, 117, 252, 0.5);
        }
        button {
            background: #2575fc;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background: #1a5dc8;
        }
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            h2 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Logo -->
        <img src="assets/images/logo.png" alt="Logo" class="logo">

        <!-- Form -->
        <form method="POST">
            <h2>Forgot Password</h2>
            <?php if (isset($message)) echo "<p>$message</p>"; ?>
            <input type="email" name="email" placeholder="Enter your email" required><br>
            <button type="submit">Send Reset Link</button>
        </form>
    </div>
</body>
</html>
