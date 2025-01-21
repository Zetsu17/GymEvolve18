<?php
session_start();
include('includes/db.php');
include('includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = loginUser($username, $password, $conn);
    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: index.php');
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('assets/images/login-bg2.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            position: relative;
            background: rgba(0, 0, 0, 0.8);
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 100%;
            max-width: 400px;
            overflow: hidden;
            z-index: 1;
        }

        .container::before, .container::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 380x;
            height: 420px;
            border-radius: 12px;
            z-index: -1;
           
            animation: neon-border 6s infinite linear;
        }

        .container::after {
            filter: blur(15px);
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 120px;
            height: auto;
            filter: drop-shadow(0 0 10px rgb(111, 0, 255));
            animation: logo-bounce 2s infinite;
        }
        @keyframes logo-bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-2px);
            }
        }

        h2 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #fff;
            text-shadow: 0 0 10px #ff5722, 0 0 20px #ff5722, 0 0 30px #ff5722, 0 0 40px #ff5722;
            animation: colorGlow 3s infinite alternate;
            text-align: center; /* Centers text within the hero */
        }
        @keyframes colorGlow {
    0% {
        text-shadow: 0 0 10px #ff5722, 0 0 20px #ff5722, 0 0 30px #ff5722, 0 0 40px #ff5722;
        color: #fff; /* White text */
    }
    33% {
        text-shadow: 0 0 10px rgb(21, 255, 0), 0 0 20px rgb(21, 255, 0), 0 0 30px rgb(21, 255, 0), 0 0 40px rgb(21, 255, 0);
        color: #fff; /* White text */
    }
    66% {
        text-shadow: 0 0 10px rgb(0, 132, 255), 0 0 20px rgb(0, 132, 255), 0 0 30px rgb(0, 132, 255), 0 0 40px rgb(0, 132, 255);
        color: #fff; /* White text */
    }
    100% {
        text-shadow: 0 0 10px #ff4081, 0 0 20px #ff4081, 0 0 30px #ff4081, 0 0 40px #ff4081;
        color: #fff; /* White text */
    }
}

        p {
            margin: 10px 0;
            color: #ccc;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #444;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            color: #fff;
            background: transparent;
            outline: none;
            transition: 0.3s ease;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #00ffcc;
            box-shadow: 0 0 12px rgba(0, 255, 204, 0.7);
        }

        button {
            background: linear-gradient(45deg,rgb(54, 104, 255),rgb(0, 191, 255));
            color: #fff;
            border: none;
            padding: 12px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }

        button:hover {
            background: linear-gradient(45deg, rgb(54, 104, 255), rgb(0, 191, 255));
            box-shadow: 0 0 15px rgba(0, 191, 255,0.6), 0 0 25px rgba(54, 104, 255,0.6);
        }

        button:active {
            transform: scale(0.98);
        }

        a {
            color: #00ffcc;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #00ccff;
        }

        .error {
            color: red;
            font-size: 14px;
            margin: 10px 0;
        }

        @keyframes neon-border {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="assets/images/logo.png" alt="Logo">
        </div>
        <form method="POST">
            <h2>Login</h2>
            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
            <p><a href="forgot_password.php">Forgot Password?</a></p>
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </form>
    </div>
</body>
</html>
