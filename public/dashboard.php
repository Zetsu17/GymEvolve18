<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

include 'includes/db.php';
include 'includes/functions.php';
// Ensure this file establishes your database connection

// Fetch user information
$username = isset($_SESSION['user']) ? (is_array($_SESSION['user']) ? $_SESSION['user']['username'] : $_SESSION['user']) : 'Guest';

// Fetch workout history
$workoutHistoryQuery = "SELECT workout_name, workout_type, duration, calories_burned FROM workouts1 ORDER BY id DESC LIMIT 5";
$workoutHistoryResult = $conn->query($workoutHistoryQuery);

// Fetch upcoming workouts
$upcomingWorkoutsQuery = "SELECT workout_name, workout_type, duration FROM workouts1 LIMIT 3";
$upcomingWorkoutsResult = $conn->query($upcomingWorkoutsQuery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: #f7f8fc;
            color: #4a4a4a;
            line-height: 1.6;
        }

        header {
            background: #333;
            padding: 20px;
            color: #fff;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        nav ul {
            display: flex;
            justify-content: center;
            gap: 25px;
            padding: 10px 0;
            list-style: none;
            background-color: #4CAF50;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            padding: 8px 20px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #45a049;
        }

        main {
            padding: 40px;
            text-align: center;
            max-width: 1200px;
            margin: auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #4CAF50;
            color: #fff;
        }

        footer {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
<header>
    <h1>Welcome to Your Dashboard</h1>
</header>

<nav>
    <ul>
        <li><a href="workout/workout.php">Workouts</a></li>
        <li><a href="diet/plan.php">Diet Plan</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="aboutus.html">About Us</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>

<main>
    <h2>Hello, <?= htmlspecialchars($username); ?>! Welcome to your fitness journey.</h2>
    <p>Here you can manage your workouts, diet, and track your progress.</p>

    <!-- Progress Tracker -->
    <h3>Progress Tracker</h3>
    <progress value="70" max="100"></progress>

    <!-- Upcoming Workouts -->
    <h3>Upcoming Workouts</h3>
    <ul>
        <?php if ($upcomingWorkoutsResult->num_rows > 0): ?>
            <?php while ($row = $upcomingWorkoutsResult->fetch_assoc()): ?>
                <li><?= htmlspecialchars($row['workout_name']); ?> - <?= htmlspecialchars($row['workout_type']); ?> (<?= htmlspecialchars($row['duration']); ?> mins)</li>
            <?php endwhile; ?>
        <?php else: ?>
            <li>No upcoming workouts found.</li>
        <?php endif; ?>
    </ul>

    <!-- Workout History -->
    <h3>Workout History</h3>
    <table>
        <tr>
            <th>Workout Name</th>
            <th>Workout Type</th>
            <th>Duration</th>
            <th>Calories Burned</th>
        </tr>
        <?php if ($workoutHistoryResult->num_rows > 0): ?>
            <?php while ($row = $workoutHistoryResult->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['workout_name']); ?></td>
                    <td><?= htmlspecialchars($row['workout_type']); ?></td>
                    <td><?= htmlspecialchars($row['duration']); ?> mins</td>
                    <td><?= htmlspecialchars($row['calories_burned']); ?> kcal</td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No workout history available.</td>
            </tr>
        <?php endif; ?>
    </table>
</main>

<footer>
    <p>&copy; 2024 Gym Evolve. All rights reserved.</p>
</footer>

</body>
</html>
