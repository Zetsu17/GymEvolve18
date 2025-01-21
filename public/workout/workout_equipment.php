<?php
require_once '../php/workout.php';  // Include the workout.php where getWorkouts is defined

// Check if the workout type is set in the URL (either 'Equipment' or 'No Equipment')
$type = isset($_GET['type']) ? $_GET['type'] : 'Equipment';  // Default to 'Equipment'

// Get workouts based on the type
$workouts = getWorkouts($type);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workouts</title>
    <link rel="stylesheet" href="../css/styles.css">  <!-- Link to your styles.css -->
</head>
<body>
    <header>
        <h1>Workout List: <?php echo $type == 'Equipment' ? 'With Equipment' : 'Without Equipment'; ?></h1>
        <nav>
            <a href="?type=Equipment">Workouts With Equipment</a> |
            <a href="?type=No Equipment">Workouts Without Equipment</a>
        </nav>
    </header>

    <main>
        <h2>Workouts</h2>

        <!-- Add the HTML form to choose workout type -->
        <form method="GET" action="workout_equipment.php">
            <label for="workoutType">Choose workout type:</label>
            <select name="type" id="workoutType">
                <option value="Equipment" <?php echo $type == 'Equipment' ? 'selected' : ''; ?>>With Equipment</option>
                <option value="No Equipment" <?php echo $type == 'No Equipment' ? 'selected' : ''; ?>>Without Equipment</option>
            </select>
            <button type="submit">Filter</button>
        </form>

        <!-- Display the list of workouts -->
        <?php if (count($workouts) > 0): ?>
            <ul>
                <?php foreach ($workouts as $workout): ?>
                    <li>
                        <h3><?php echo $workout['name']; ?></h3>
                        <p><?php echo $workout['description']; ?></p>
                        <p>Level: <?php echo $workout['level']; ?></p>
                        <p>Duration: <?php echo $workout['duration']; ?> minutes</p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No workouts available for this type.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 Gym Evolve</p>
    </footer>
</body>
</html>
