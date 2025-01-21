<?php
include('includes/db.php');
include('includes/functions.php');

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $query = "SELECT * FROM password_resets WHERE token = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if ($result) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $password = $_POST['password'];
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            
            $updateQuery = "UPDATE users SET password = ? WHERE email = ?";
            $stmt = $conn->prepare($updateQuery);
            $stmt->bind_param("ss", $hashed_password, $result['email']);
            $stmt->execute();

            // Delete the token after password is reset
            $deleteQuery = "DELETE FROM password_resets WHERE token = ?";
            $stmt = $conn->prepare($deleteQuery);
            $stmt->bind_param("s", $token);
            $stmt->execute();

            header('Location: login.php');
        }
    } else {
        echo "Invalid token!";
    }
} else {
    echo "No token provided!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <form method="POST">
            <h2>Reset Password</h2>
            <input type="password" name="password" placeholder="Enter new password" required><br>
            <button type="submit">Reset Password</button>
        </form>
    </div>
</body>
</html>
