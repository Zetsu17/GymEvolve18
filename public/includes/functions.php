<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Load PHPMailer via Composer

// Database connection function
function getDatabaseConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "Palrajthevar18";
    $dbname = "user_db"; // Replace with your database name

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Check if user exists
function userExists($username, $email, $conn) {
    $query = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    return $stmt->get_result()->num_rows > 0;
}

// Register user
function registerUser($username, $password, $email, $conn) {
    $hash_password = password_hash($password, PASSWORD_BCRYPT);
    $query = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $username, $hash_password, $email);

    if ($stmt->execute()) {
        sendRegistrationNotification($username, $email);
        return true;
    } else {
        return false;
    }
}

// Send email notification to admin for new user registration
function sendRegistrationNotification($username, $email) {
    $adminEmail = 'Palrajthevar456456@gmail.com'; // Replace with your admin email

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'Palrajthevar456456@gmail.com'; // Replace with your email
        $mail->Password = 'smdj fzwb ejtq sbuy';   // Replace with your app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('Palrajthevar456456@gmail.com', 'GymEvolve');
        $mail->addAddress($adminEmail);

        $mail->isHTML(true);
        $mail->Subject = 'New User Registration';
        $mail->Body = "A new user has registered:<br>Username: $username<br>Email: $email";

        $mail->send();
    } catch (Exception $e) {
        error_log("Mailer Error: " . $mail->ErrorInfo);
    }
}

// Send password reset link to the user
function sendResetLink($email, $conn) {
    $token = bin2hex(random_bytes(50));
    $query = "INSERT INTO password_resets (email, token) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $token);
    $stmt->execute();

    $ngrok_url = "https://dac7-103-162-47-203.ngrok-free.app"; // Replace with your actual ngrok URL
    $reset_link = "$ngrok_url/reset_password.php?token=$token";

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'Palrajthevar456456@gmail.com'; // Replace with your email
        $mail->Password = 'smdj fzwb ejtq sbuy';   // Replace with your app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('Palrajthevar456456@gmail.com', 'GymEvolve');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Password Reset Request';
        $mail->Body = "Click the link below to reset your password:<br><a href='$reset_link'>$reset_link</a>";

        $mail->send();
        echo "Password reset link has been sent to your email.";
    } catch (Exception $e) {
        error_log("Mailer Error: " . $mail->ErrorInfo);
        echo "Failed to send password reset link.";
    }
}

// Login user
function loginUser($username, $password, $conn) {
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if ($result && password_verify($password, $result['password'])) {
        return $result;
    } else {
        return false;
    }
}
?>
